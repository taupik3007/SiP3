<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kesiswaan = User::create([
            'name'      => "kesiswaan",
            'email'     =>  "kesiswaan@gmail.com",
            'password'  =>  bcrypt('kesiswaan12312311'),
           
        ]);
        $kesiswaan->assignRole('kesiswaan');
        $osis->assignRole('osis');
    }
}
