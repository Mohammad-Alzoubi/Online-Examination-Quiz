<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = new User();
        $admin->name             = 'admin';
        $admin->email            = 'admin@gmail.com';
        $admin->password         = bcrypt('12345678');
        $admin->visible_password = '12345678';
        $admin->email_verified_at= NOW();
        $admin->occupation       = 'CEO';
        $admin->address          = 'Amman';
        $admin->phone            = '0795315097';
        $admin->is_admin         = 1;
        $admin->save();
    }
}
