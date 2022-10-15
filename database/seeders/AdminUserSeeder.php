<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ashik',
            'email' => 'admin@mailinator.com',
            'password' => bcrypt('gym@1234'),
        ]);
        User::create([
            'name' => 'tilo',
            'email' => 'tilottoma.nawar@gmail.com',
            'password' => bcrypt('janina-01'),
        ]);
        User::create([
            'name' => 'shiddique',
            'email' => 'abshiddique31@gmail.com',
            'password' => bcrypt('ab_s@1234'),
        ]);
    }
}
