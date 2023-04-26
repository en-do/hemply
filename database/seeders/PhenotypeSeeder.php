<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhenotypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phenotypes')->insert([
            [
                'name' => 'Гібрид',
                'slug' => 'hybrid',
            ],
            [
                'name' => 'Індіка',
                'slug' => 'indica',
            ],
            [
                'name' => 'Сатів',
                'slug' => 'sativa',
            ],
            [
                'name' => 'Рудераліс',
                'slug' => 'ruderalis',
            ]
        ]);
    }
}
