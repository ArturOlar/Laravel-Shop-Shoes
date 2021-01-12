<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class GenderCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gender_categories')->insert($this->genderCategory);
    }

    private $genderCategory = [
        ['name' => 'для него'],
        ['name' => 'для нее'],
        ['name' => 'для мальчика'],
        ['name' => 'для девочки'],
        ['name' => 'унисекс'],
    ];
}
