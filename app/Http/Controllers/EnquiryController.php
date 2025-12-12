<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'travel_date' => 'required|date',
            'seating_capacity' => 'required|string',
            'phone_number' => 'required|string|regex:/^[0-9]{10}$/',
        ]);

        // Extract distance from request if available
        $distanceKm = $request->input('distance_km');

        // Create enquiry record
        $enquiry = Enquiry::create([
            'from_location' => $request->from,
            'to_location' => $request->to,
            'travel_date' => $request->travel_date,
            'seating_capacity' => $request->seating_capacity,
            'phone_number' => $request->phone_number,
            'distance_km' => $distanceKm,
        ]);

        // Send WhatsApp message
        $this->sendWhatsAppMessage($enquiry);

        // Send Admin Email
        $this->sendAdminEmail($enquiry);

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been received. Our team will contact you shortly.',
            'enquiry_id' => $enquiry->id,
        ]);
    }

    private function sendAdminEmail(Enquiry $enquiry)
    {
        $adminEmail = "rentlee2025@gmail.com";

        try {
            Mail::send('emails.admin_enquiry_notification', [
                'enquiry' => $enquiry
            ], function ($message) use ($adminEmail) {
                $message->to($adminEmail)
                    ->subject('New Enquiry Received on Rentlee');
            });

            \Log::info('Admin Email Sent Successfully', [
                'enquiry_id' => $enquiry->id,
                'email' => $adminEmail
            ]);

        } catch (\Exception $e) {
            \Log::error('Admin Email Sending Failed', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function sendWhatsAppMessage(Enquiry $enquiry)
    {
        $accessToken = trim(env('WHATSAPP_ACCESS_TOKEN'));
        $phoneNumberId = trim(env('WHATSAPP_PHONE_NUMBER_ID'));

        $phoneNumber = $enquiry->phone_number;
        if (strlen($phoneNumber) === 10) {
            $phoneNumber = '91' . $phoneNumber;
        } elseif (!str_starts_with($phoneNumber, '91')) {
            $phoneNumber = '91' . $phoneNumber;
        }

        try {
            $url = "https://graph.facebook.com/v18.0/{$phoneNumberId}/messages";
            $travelDate = $enquiry->travel_date->format('d/m/Y');

            $payload = [
                'messaging_product' => 'whatsapp',
                'to' => $phoneNumber,
                'type' => 'template',
                'template' => [
                    'name' => 'transport_detail',
                    'language' => ['code' => 'en_US'],
                    'components' => [
                        [
                            'type' => 'body',
                            'parameters' => [
                                ['type' => 'text', 'text' => $enquiry->from_location],
                                ['type' => 'text', 'text' => $enquiry->to_location],
                                ['type' => 'text', 'text' => $travelDate],
                                ['type' => 'text', 'text' => $enquiry->seating_capacity],
                            ],
                        ],
                    ],
                ],
            ];

            \Log::info('WhatsApp API Request', [
                'url' => $url,
                'to_number' => $phoneNumber,
                'template_name' => 'transport_detail',
            ]);

            $response = Http::post($url . "?access_token={$accessToken}", $payload);

            \Log::info('WhatsApp API Response', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            if ($response->ok()) {
                $data = $response->json();
                $enquiry->update([
                    'wa_message_id' => $data['messages'][0]['id'] ?? null,
                    'wa_status' => 'sent',
                ]);
            } else {
                $enquiry->update([
                    'wa_status' => 'failed',
                    'wa_error' => $response->body(),
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('WhatsApp API Exception', [
                'error' => $e->getMessage()
            ]);

            $enquiry->update([
                'wa_status' => 'failed',
                'wa_error' => $e->getMessage(),
            ]);
        }
    }
}
