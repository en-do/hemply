<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerpeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('terpenes')->insert([
            [
                'title' => 'Каріофілен',
                'flavor' => 'перцевий',
                'intro' => 'Пряний перцевий терпен, який може мати протизапальну дію.',
                'slug' => 'caryophyllene',
                'active' => 1
            ],
            [
                'title' => 'Гумулен',
                'flavor' => 'хмільний',
                'intro' => 'Tрав\'яний аромат. Може мати протизапальну дію',
                'slug' => 'humulene',
                'active' => 1
            ],
            [
                'title' => 'Лімонен',
                'flavor' => 'цитрусовий',
                'intro' => 'Вважається, що терпен із цитрусовим запахом знімає тривогу та стрес',
                'slug' => 'limonene',
                'active' => 1
            ],
            [
                'title' => 'Ліналоол',
                'flavor' => 'квітковий',
                'intro' => 'Квітковий терпен, який також міститься в лаванді і, як вважають, сприяє розслабленню.',
                'slug' => 'linalool',
                'active' => 1
            ],
            [
                'title' => 'Мірцен',
                'flavor' => 'трав\'яний',
                'intro' => 'Найпоширеніший терпен, що міститься в канабісі, має землистий запах',
                'slug' => 'myrcene',
                'active' => 1
            ],
            [
                'title' => 'Оцімен',
                'flavor' => 'м\'ятний',
                'intro' => 'Солодкий, квітковий терпен, який зазвичай використовується в парфумах.',
                'slug' => 'ocimene',
                'active' => 1
            ],
            [
                'title' => 'Пінен',
                'flavor' => 'сосновий',
                'intro' => 'Терпен із запахом сосни, який також міститься в розмарині та багатьох інших травах.',
                'slug' => 'pinene',
                'active' => 1
            ],
            [
                'title' => 'Терпінолен',
                'flavor' => 'фруктовий',
                'intro' => 'Рослинний, квітковий терпен, який також міститься в яблуках, бузку та мускатному горіху',
                'slug' => 'terpinolene',
                'active' => 1
            ]
        ]);
    }
}
