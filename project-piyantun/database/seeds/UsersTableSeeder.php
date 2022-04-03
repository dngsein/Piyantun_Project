<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            'name' => 'Sayuti',
            'email' => 'sayuti@piyantun.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            // 'tempat_lahir' => 'Bojonegoro',
            // 'tanggal_lahir' => '1992-04-09',
            // 'telepon' => '085678765456',
            // 'alamat' => '-',
            // 'password' => bcrypt('admin'),
        ];

        if (!User::where('email', $adminUser['email'])->exists()){
            User::create($adminUser);
        }
    }
}
