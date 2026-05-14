<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'vehicle-list',
           'vehicle-create',
           'vehicle-edit',
           'vehicle-delete',
           'trip-poster-list',
           'trip-poster-create',
           'trip-poster-edit',
           'trip-poster-delete',
           'lead-list',
           'lead-create',
           'lead-edit',
           'lead-delete',
           'enquiry-list',
           'enquiry-create',
           'enquiry-edit',
           'enquiry-delete'
        ];
        
        foreach ($permissions as $permission) {
             Permission::firstOrCreate(['name' => $permission]);
        }
    }
}