<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert($this->brands);
    }

    private $brands = [
        ['name' => 'ZARA'],
        ['name' => 'Adidas'],
        ['name' => 'Puma'],
        ['name' => 'Nike'],
        ['name' => 'H&M'],
        ['name' => 'CAT'],
        ['name' => 'Reebok'],
    ];
}
