<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Application\Models\{Role, User};
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->login = 'Admin';
        $admin->email = 'admin@mail.ru';
        $admin->password = Hash::make('admin123');
        $admin->status = 'active';
        $admin->is_deleted = false;
        $admin->save();
        $admin->roles()->attach(Role::where('slug', 'admin')->first());

        User::factory()->count(10)->create();

        $role = collect(Role::get('id')->all())->random()->toArray();

        User::all()->each(function ($user) use ($role) { 
            $user->roles()->sync([$role['id']]); 
        });
    }
}
