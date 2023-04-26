<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EffectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('effects')->insert([
            [
                'title' => 'Збуджений',
                'slug' => 'aroused',
                'active' => 1
            ],
            [
                'title' => 'Творчий',
                'slug' => 'creative',
                'active' => 1
            ],
            [
                'title' => 'Eнергійний',
                'slug' => 'energetic',
                'active' => 1
            ],
            [
                'title' => 'Eйфоричний',
                'slug' => 'euphoric',
                'active' => 1
            ],
            [
                'title' => 'Зосереджений',
                'slug' => 'focused',
                'active' => 1
            ],
            [
                'title' => 'Хихикаючи',
                'slug' => 'giggly',
                'active' => 1
            ],
            [
                'title' => 'Щасливий',
                'slug' => 'happy',
                'active' => 1
            ],
            [
                'title' => 'Голодний',
                'slug' => 'hungry',
                'active' => 1
            ],
            [
                'title' => 'Розслаблюючий',
                'slug' => 'relaxed',
                'active' => 1
            ],
            [
                'title' => 'Соннливий',
                'slug' => 'sleepy',
                'active' => 1
            ],
            [
                'title' => 'Балакучий',
                'slug' => 'talkative',
                'active' => 1
            ],
            [
                'title' => 'Поколючий',
                'slug' => 'tingly',
                'active' => 1
            ],
            [
                'title' => 'Піднятий',
                'slug' => 'uplifted',
                'active' => 1
            ],
        ]);
    }
}
