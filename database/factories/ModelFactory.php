<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Brand::class, function ($faker){
  return [
    'name' => $faker->unique()->name,
    'profile' => $faker->address,
  ];
});

$factory->define(App\Category::class, function ($faker){
  return [
    'name' => $faker->unique()->word,
  ];
});

$factory->define(App\Subcategory::class, function ($faker){
  return [
    'name' => $faker->unique()->word,
    'catid' => $faker->randomElement(),
    // 'catid' => factory(App\Category::class)->create()->id,
    // 'catid' => $faker->randomElement(Category::lists('id')->toArray()),
    // 'catid' => function () {
    //     return factory(App\Category::class)->create()->id;
    // }
  ];
});
