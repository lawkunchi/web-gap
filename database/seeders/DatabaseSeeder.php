<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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

        DB::table('team_members')->insert([
            'name' => 'Robert Gibbons',
            'title' => 'Partner, Founder & Chief Investment Officer',
            'profile' => 'memebers/FvIl3gHPVsOqmCxG3blS4YxUhhn01SEAWMv0MpN1.jpg',
            'description' => 'For over 25 years, Robert Gibbins has applied his fascination with the development and transition of economies and societies to the management of global macro investment strategies – a distinctive focus that has personified Autonomy since its inception. After earning a BS in Economics from the Wharton School at the University of Pennsylvania, Robert began his career at JP Morgan in 1992. He subsequently traded northern European FX and interest rates at Lehman Brothers for two years, followed by seven years as head of emerging markets and global macro proprietary trading.',
        ]);

        DB::table('team_members')->insert([
            'name' => 'Ivan Ritossa',
            'title' => 'Chief Executive Officer',
            'profile' => 'memebers/sXXbd5wssd4S9TKt8F3Xz57aK7QSwbKuJjEBiR5P.jpg',
            'description' => 'Ivan has over 35 years of experience in the global financial services industry, building a rich diversity of businesses. He was previously an MD and a member of the executive committee at Barclays Capital, MD at Lehman Brothers, and a partner and senior MD at Bankers Trust. Ivan earned a Bachelor of Commerce (honors) degree, majoring in Finance, from the University of New South Wales, Australia. He has served on the New York Federal Reserve Foreign Exchange Committee, the Bank of England Foreign Exchange Joint Standing Committee, and the Singapore Foreign Exchange Markets Committee.',
        ]);


        DB::table('team_members')->insert([
            'name' => 'Sadat Mannan',
            'title' => 'Head of Treasury',
            'profile' => 'memebers/KYHAegfqfBMleRnmA11dyhINJfu7SfgjGtmPYeA6.png',
            'description' => 'Sadat is tasked with optimising Autonomy’s treasury management and launching a relative value fund. He brings data-driven discipline and innovation to the firm, as well as a proven ability to identify market imbalances. Prior to joining Autonomy, Sadat was the global head of Barclay’s Delta-1 strategic derivatives business.',
        ]);
    }
}
