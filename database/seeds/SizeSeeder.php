<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert($this->sizes);
    }

    private $sizes = [
        ['size' => '35'],
        ['size' => '36'],
        ['size' => '37'],
        ['size' => '38'],
        ['size' => '39'],
        ['size' => '40'],
        ['size' => '41'],
        ['size' => '42'],
        ['size' => '43'],
        ['size' => '44'],
        ['size' => '45'],
        ['size' => '46'],
    ];
}
