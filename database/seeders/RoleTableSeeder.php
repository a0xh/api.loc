<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Application\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role->name = 'Администратор';
        $role->slug = 'admin';
        $role->is_deleted = false;
        $role->data = [];
        $role->save();

        Role::factory()->count(5)->create();
    }
}
