<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review_status')->insert($this->statuses);
    }

    private $statuses = [
        ['name' => 'новый'],
        ['name' => 'опубликованный'],
        ['name' => 'отмененный'],
    ];
}
