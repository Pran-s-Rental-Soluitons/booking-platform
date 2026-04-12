@extends('layouts.app')

@section('content')
<div class="container" style="padding: 100px 0;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="border: none; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); overflow: hidden;">
                <div class="card-header" style="background: linear-gradient(135deg, #FF6B00 0%, #E65A00 100%); color: white; border: none; padding: 25px; text-align: center;">
                    <h3 style="margin: 0; font-weight: 700;">Join the Rentlee Family</h3>
                    <p style="margin: 5px 0 0; opacity: 0.8;">Register to book rides faster</p>
                </div>

                <div class="card-body" style="padding: 40px;">
                    @if(session('success'))
                        <div class="alert alert-success" style="border-radius: 10px; border: none; background: #E8F5E9; color: #2E7D32;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('leads.store') }}">
                        @csrf
                        <input type="hidden" name="type" value="registration_page">

                        <div class="mb-4">
                            <label for="name" class="form-label" style="font-weight: 600; color: #555;">Your Name</label>
                            <input id="name" type="text" class="form-control" name="name" required placeholder="John Doe" style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label" style="font-weight: 600; color: #555;">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" required placeholder="john@example.com" style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label" style="font-weight: 600; color: #555;">Contact Number</label>
                            <input id="phone" type="tel" class="form-control" name="phone" required placeholder="10-digit number" pattern="[0-9]{10}" style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;">
                        </div>

                        <div class="mb-4">
                            <label for="details" class="form-label" style="font-weight: 600; color: #555;">Preferred Vehicles / Locations</label>
                            <textarea id="details" class="form-control" name="details" placeholder="Tell us what you're looking for..." style="padding: 12px; border-radius: 10px; border: 1px solid #ddd;"></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #FF6B00 0%, #E65A00 100%); border: none; padding: 15px; border-radius: 10px; font-weight: 700; font-size: 16px; box-shadow: 0 5px 15px rgba(255, 107, 0, 0.3);">
                                Register Now
                            </button>
                        </div>
                    </form>

                    <div style="margin-top: 25px; text-align: center;">
                        <p style="color: #888; font-size: 14px;">Want to login? <a href="{{ route('login') }}" style="color: #FF6B00; font-weight: 600; text-decoration: none;">Click Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
