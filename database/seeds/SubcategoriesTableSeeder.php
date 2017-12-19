<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Category;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
            // following line retrieve all the user_ids from DB
            $categories = Category::all()->lists('id');
            foreach(range(1,50) as $index){
                $subcategories = Subcategory::create([
                    'name' => $faker->unique()->word,
                    'catid' => $faker->randomElement($categories),
                ]);
            }
    }
}
