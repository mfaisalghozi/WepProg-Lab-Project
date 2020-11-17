<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            $gender = $faker->randomElement(['male', 'female']);
            $data[$i] = [
               'name' => $faker->name,
               'email' => $faker->unique()->safeEmail,
               'email_verified_at' => now(),
               'password' => bcrypt('password'),
               'address' => $faker->address,
               'phoneNumber' => 123123123,
               'gender' => $gender, 
               'remember_token' => Str::random(10),
            ];
        }
        DB::table('users')->insert($data);
    
    }
}
