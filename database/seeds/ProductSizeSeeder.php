<?php

use Illuminate\Database\Seeder;
use App\Model\Product;
use App\Model\Size;
use Illuminate\Support\Facades\DB;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_sizes')->insert($this->getDate());
    }

    private function getDate()
    {
        $products = Product::pluck('id_product');
        $sizes = Size::pluck('id_size');
        $data = [];

        for ($i = 0; $i < count($products); $i++) {
            $rand = rand(1, count($sizes));

            for ($k = 0; $k < $rand; $k++) {

                $data[] = [
                    'id_product' => $products[$i],
                    'id_size' => $sizes[$k],
                    'balance_product' => rand(0, 15),
                ];
            }
        }

        return $data;
    }
}
