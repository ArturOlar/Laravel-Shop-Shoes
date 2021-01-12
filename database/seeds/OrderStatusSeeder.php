<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert($this->statuses);
    }

    private $statuses = [
        ['name' => 'новый'],
        ['name' => 'в работе'],
        ['name' => 'отменен'],
        ['name' => 'выполнен'],
    ];
}
