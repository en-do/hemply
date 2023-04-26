<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CannabinoidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cannabinoids')->insert([
            [
                'title' => 'THC',
                'slug' => 'thc',
                'active' => 1
            ],
            [
                'title' => 'THCV',
                'slug' => 'thcv',
                'active' => 1
            ],
            [
                'title' => 'CBC',
                'slug' => 'cbc',
                'active' => 1
            ],
            [
                'title' => 'CBD',
                'slug' => 'cbd',
                'active' => 1
            ],
            [
                'title' => 'CBG',
                'slug' => 'cbg',
                'active' => 1
            ],
        ]);
    }
}
