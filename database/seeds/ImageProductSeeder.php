<?php

use Illuminate\Database\Seeder;
use App\Model\Product;
use Illuminate\Support\Facades\DB;

class ImageProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image_products')->insert($this->getDate());
    }

    private $images = [
        [
            '0000201281802_02_ki.jpg',
            '0000201281802_03_ki.jpg',
            '0000201281802_04_ki.jpg',
            '0000201281802_05_ki.jpg',
            '0000201281802_06_ki.jpg',
        ],
        [
            '0000200854403_01_ts_1.webp',
            '0000200854403_02_ts_1.webp',
            '0000200854403_03_ts_1.jpg',
            '0000200854403_04_ts.jpg',
            '0000200854403_06_ts.webp',
            '0000200854403_07_ts_1.jpg',
        ],
        [
            '0000207349339.webp',
            '0000207349339_01_wj.jpg',
            '0000207349339_02_wj.jpg',
            '0000207349339_03_wj.jpg',
            '0000207349339_04_wj.webp',
            '0000207349339_05_wj.jpg',
            '0000207349339_06_wj.jpg',
        ],
    ];

    private function getDate()
    {
        $products = Product::all();

        $data = [];
        for ($i = 0; $i < count($products); $i++) {
            $randImg = rand(0, 2);

            for ($k = 0; $k < count($this->images[$randImg]); $k++) {

                $data[] = [
                    'id_product' => $products[$i]->id_product,
                    'image' => $this->images[$randImg][$k],
                ];
            }
        }
        return $data;
    }
}
