<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<15;$i++){
            $data[$i] = [
                'name' => $faker->name,
                'description' => $faker->text($maxNbChars = 100),
                'price' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'image_url' => $faker->imageUrl($width = 640, $height = 480),
            ];
        }
        DB::table('pizzas')->insert($data);
    }    
}
