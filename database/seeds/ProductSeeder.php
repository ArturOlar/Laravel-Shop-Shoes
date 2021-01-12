<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\Category;
use App\Model\Brand;
use App\Model\GenderCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert($this->getDate());
    }

    private function getDate()
    {
        $faker = Faker\Factory::create('ru_RU');
        $categories = Category::all();
        $brands = Brand::all();
        $genders = GenderCategory::all();

        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $randCat = rand(0, count($categories) - 1);
            $randBrand = rand(0, count($brands) - 1);
            $randGender = rand(0, count($genders) - 1);

            $data[] = [
                'name' => $categories[$randCat]->name . " " . $brands[$randBrand]->name,
                'desc' => $faker->realText(rand(100, 500)),
                'price' => round(rand(500, 2000) / 5) * 5,
                'discount' => rand(0, 15),
                'id_gender' => $genders[$randGender]->id_gender,
                'id_category' => $categories[$randCat]->id_category,
                'id_brand' => $brands[$randBrand]->id_brand,
            ];
        }

        return $data;
    }
}
