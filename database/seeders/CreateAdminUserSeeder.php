<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@rentlee.in'],
            [
                'name' => 'Rentlee Admin', 
                'password' => bcrypt('Pass@123'),
                'gender' => 'Other',
                'dob' => '1990-01-01',
                'home_town' => 'Admin City',
                'mobile_no' => '9999999999'
            ]
        );
        
        $role = Role::firstOrCreate(['name' => 'Admin']);
         
        $permissions = Permission::pluck('id','id')->all();
       
        $role->syncPermissions($permissions);
         
        $user->assignRole([$role->id]);
    }
}