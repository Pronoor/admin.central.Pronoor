<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                [
                    'key' => 'HEADER_LOGO',
                    'type' => 'image',
                    'description' => 'Header logo image',
                    'value' => '',
                ],
                [
                    'key' => 'FOOTER_END_TEXT',
                    'type' => 'text',
                    'description' => 'Footer text',
                    'value' => '&copy; 2023 Pronoor Technologies USA',
                ]
            ]
        );
    }
}
