<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'avatar' => 'https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTAxL3JtNjA5LTNkaG9sby1wby0wMjkucG5n.png',
            'full_name' => 'Administrators',
            'email' => 'kienhee.it@gmail.com',
            'description' => "",
            'facebook' => "",
            'instagram' => "",
            'whatsapp' => "",
            'linkedin' => "",
            'behance' => "",
            'dribbble' => "",
            'phone' => "0376172628",
            'password' => Hash::make('123456'),
            'group_id' => 1,
            'created_at' => Date('y-m-d h:m:s'),
            'updated_at' => Date('y-m-d h:m:s'),
        ]);
        DB::table('groups')->insert([
            'id' => 1, 'name' => "ADMIN", 'permissions' => ''
        ]);
    }
}
