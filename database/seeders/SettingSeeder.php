<?php

namespace Database\Seeders;

use App\Models\Settings;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'id' => 1,
                'key' => 'website_name',
                'description' => 'HOA',
                'created_at' => '2023-07-20 13:20:35',
                'updated_at' => '2023-10-06 00:09:49',
            ],
            [
                'id' => 2,
                'key' => 'website_logo',
                'description' => '/storage/uploads/website/p4iF8niTrD0OjHCeU7VuKxQMXrXEhLjCdpjT5dYW.png',
                'created_at' => '2023-07-20 13:21:13',
                'updated_at' => '2023-10-12 05:25:33',
            ],
            [
                'id' => 3,
                'key' => 'website_frontend',
                'description' => 'basic',
                'created_at' => '2023-07-20 13:22:07',
                'updated_at' => '2023-07-20 10:32:26',
            ],
            [
                'id' => 4,
                'key' => 'header_subtitle',
                'description' => 'Home Association Managementada',
                'created_at' => '2023-09-14 10:34:52',
                'updated_at' => '2023-09-15 00:49:57',
            ],
            [
                'id' => 5,
                'key' => 'header_title',
                'description' => 'Header Title',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'key' => 'aboutus_subtitle',
                'description' => 'Amet assumenda pari',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 7,
                'key' => 'aboutus_title',
                'description' => 'Qui reprehenderit po',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 8,
                'key' => 'aboutus_desc',
                'description' => 'Nemo et pariatur La',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 9,
                'key' => 'aboutus_btn_text',
                'description' => 'Button Text',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 10,
                'key' => 'aboutus_btn_link',
                'description' => '#',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 11,
                'key' => 'aboutus_sec1_text',
                'description' => 'Amet exercitationem',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 12,
                'key' => 'aboutus_sec2_text',
                'description' => 'Autem distinctio Re',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 13,
                'key' => 'aboutus_sec3_text',
                'description' => 'Est enim molestiae',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 14,
                'key' => 'aboutus_sec4_text',
                'description' => 'Adipisci sit iste co',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 15,
                'key' => 'aboutus_sec1_number',
                'description' => '932',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 16,
                'key' => 'aboutus_sec2_number',
                'description' => '761',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 17,
                'key' => 'aboutus_sec3_number',
                'description' => '669',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 18,
                'key' => 'aboutus_sec4_number',
                'description' => '10',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:12:03',
            ],
            [
                'id' => 19,
                'key' => 'header_background',
                'description' => '',
                'created_at' => null,
                'updated_at' => '2023-09-15 00:49:22',
            ],
            [
                'id' => 20,
                'key' => 'social_icon',
                'description' => '{"title":"Linkedin","social_icon":"<i class=\"lab la-linkedin-in\"></i>","url":"https:\/\/t.me\/officialfortune7"}',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 21,
                'key' => 'about_background',
                'description' => 'uploads/about_background/l2fXaMW5JIkABaK0ATDYcC36Rdk7A2pPjYSGuS4d.png',
                'created_at' => null,
                'updated_at' => '2023-09-15 01:19:35',
            ],
            [
                'id' => 22,
                'key' => 'community_subtitle',
                'description' => 'Community Subtitle',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 23,
                'key' => 'community_title',
                'description' => 'Community Title',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 24,
                'key' => 'community_dec',
                'description' => 'Description of Community Section',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 25,
                'key' => 'community_icon',
                'description' => '{"title":"Linkedin","social_icon":"https://images.unsplash.com/photo-1694309984301-60e69e095ae7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1972&q=80","desc":"Descriptions"}',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 26,
                'key' => 'community_icon',
                'description' => '{"title":"Event","social_icon":"https://images.unsplash.com/photo-1694309984301-60e69e095ae7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1972&q=80","desc":"Descriptions"}',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 27,
                'key' => 'footer_title',
                'description' => 'About Title',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 28,
                'key' => 'footer_desc',
                'description' => 'Footer Description',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 29,
                'key' => 'event_menu',
                'description' => '{"text":"Event","social_icon":"Ashir","url":"/link"}',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 30,
                'key' => 'bottom_footer_text',
                'description' => 'Copyright © 2021  All Rights Reserved',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 31,
                'key' => 'social_icon',
                'description' => '{"title":"Ratione alias alias","social_icon":"Nihil unde sed quisq","url":"Aut quia aut nihil s"}',
                'created_at' => '2023-09-16 02:57:55',
                'updated_at' => '2023-09-16 02:57:55',
            ],
            [
                'id' => 32,
                'key' => 'social_icon',
                'description' => '{"title":"Ratione alias alias","social_icon":"Nihil unde sed quisq","url":"Aut quia aut nihil s"}',
                'created_at' => '2023-09-16 02:59:58',
                'updated_at' => '2023-09-16 02:59:58',
            ],
            [
                'id' => 36,
                'key' => 'currency',
                'description' => 'USD',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 37,
                'key' => 'currency_symbol',
                'description' => '$',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 38,
                'key' => 'email',
                'description' => 'contact@appsplorer.com',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 39,
                'key' => 'phone_number',
                'description' => '+1 000 000 0000',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 40,
                'key' => 'website_icon',
                'description' => '/storage/uploads/website/TXHptmLDxAe3Bh30Cg7J81YOkyyf12dam7vFlKeZ.png',
                'created_at' => null,
                'updated_at' => '2023-10-12 05:44:15',
            ],
        ]);
    }
}
