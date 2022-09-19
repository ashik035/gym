<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Menu::create([
            'menu' => 'PROGRAM',
            'sub_menu' => 'One-on-One Training,Online Fitness Coaching for General,PCOS(Poly-Cystic Ovarian Syndrome),Heart Disease Diabetes Arthritis,Exercise and Diet For Older Adults,Customize Diet Plan,Customize Workout Diet'
        ]);
        Menu::create([
            'menu' => 'ONLINE LIVE GROUP CLASS',
            'sub_menu' => '3 Days In a Week'
        ]);
        Menu::create([
            'menu' => 'SHOP',
            'sub_menu' => 'Shop all,Accessories,Apparel'
        ]);
    }
}




