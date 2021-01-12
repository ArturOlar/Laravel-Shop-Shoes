<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->categories);
    }

    private $categories = [
        ['name' => 'кроссовки'],
        ['name' => 'ботинки'],
        ['name' => 'кеды'],
        ['name' => 'туфли'],
        ['name' => 'сапоги'],
        ['name' => 'тапочки'],
    ];
}
