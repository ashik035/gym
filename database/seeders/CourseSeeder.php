<?php

namespace Database\Seeders;
use App\Models\Course;

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'One-on-One Training',
            'name' => "1 Month's Plan",
            'included' => '3 Days in week,25k per month,limited Slot',
            'price' => '25000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'One-on-One Training',
            'name' => "1 Month's Plan",
            'included' => '2 Days in week,20k per month,limited Slot',
            'price' => '20000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Online Fitness Coaching for General',
            'name' => "1 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,2 Consultation Session',
            'price' => '5000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Online Fitness Coaching for General',
            'name' => "3 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,2 Consultation Session',
            'price' => '12000',
            'duration' => '3'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Online Fitness Coaching for General',
            'name' => "6 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,2 Consultation Session',
            'price' => '22000',
            'duration' => '6'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Online Fitness Coaching for General',
            'name' => "1 Year's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,2 Consultation Session',
            'price' => '40000',
            'duration' => '12'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'PCOS(Poly-Cystic Ovarian Syndrome)',
            'name' => "1 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,3 Consultation Session',
            'price' => '6000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'PCOS(Poly-Cystic Ovarian Syndrome)',
            'name' => "3 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,3 Consultation Session',
            'price' => '15000',
            'duration' => '3'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'PCOS(Poly-Cystic Ovarian Syndrome)',
            'name' => "6 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,3 Consultation Session',
            'price' => '25000',
            'duration' => '6'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'PCOS(Poly-Cystic Ovarian Syndrome)',
            'name' => "1 Years's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,3 Consultation Session',
            'price' => '42000',
            'duration' => '12'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Heart Disease Diabetes Arthritis',
            'name' => "1 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,4 Consultation Session',
            'price' => '6000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Heart Disease Diabetes Arthritis',
            'name' => "3 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,4 Consultation Session',
            'price' => '15000',
            'duration' => '3'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Heart Disease Diabetes Arthritis',
            'name' => "6 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,4 Consultation Session',
            'price' => '25000',
            'duration' => '6'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Heart Disease Diabetes Arthritis',
            'name' => "1 Years's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,4 Consultation Session',
            'price' => '42000',
            'duration' => '12'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Exercise and Diet For Older Adults',
            'name' => "1 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,4 Consultation Session',
            'price' => '6000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Exercise and Diet For Older Adults',
            'name' => "3 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,4 Consultation Session',
            'price' => '15000',
            'duration' => '3'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Exercise and Diet For Older Adults',
            'name' => "6 Month's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,4 Consultation Session',
            'price' => '25000',
            'duration' => '6'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Exercise and Diet For Older Adults',
            'name' => "1 Years's Plan",
            'included' => 'Customized Workout Plan, Diet Plan, Weekly Check-in,4 Consultation Session',
            'price' => '42000',
            'duration' => '12'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Customize Diet Plan',
            'name' => "Diet Plan",
            'included' => 'Customized Diet Plan',
            'price' => '1000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'PROGRAM',
            'sub_menu' => 'Customize Workout Diet',
            'name' => "Workout Plan",
            'included' => 'Customize Workout Plan',
            'price' => '1000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'ONLINE LIVE GROUP CLASS',
            'sub_menu' => '3 Days In a Week',
            'name' => "1 Month's Plan",
            'included' => '3 days in a week Group Class , Basic Nutrition',
            'price' => '4000',
            'duration' => '1'
        ]);

        Course::create([
            'menu_name' => 'ONLINE LIVE GROUP CLASS',
            'sub_menu' => '3 Days In a Week',
            'name' => "3 Month's Plan",
            'included' => '3 days in a week Group Class , Basic Nutrition',
            'price' => '11000',
            'duration' => '3'
        ]);

        Course::create([
            'menu_name' => 'ONLINE LIVE GROUP CLASS',
            'sub_menu' => '3 Days In a Week',
            'name' => "6 Month's Plan",
            'included' => '3 days in a week Group Class , Basic Nutrition',
            'price' => '20000',
            'duration' => '6'
        ]);

        Course::create([
            'menu_name' => 'ONLINE LIVE GROUP CLASS',
            'sub_menu' => '3 Days In a Week',
            'name' => "1 Year's Plan",
            'included' => '3 days in a week Group Class , Basic Nutrition',
            'price' => '35000',
            'duration' => '12'
        ]);
    }
}