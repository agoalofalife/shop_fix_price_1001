<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');
        DB::table('drinks')->insert([
            'title'=>$faker->word(),
            'mark'=>$faker->company(),
            'count'=>$faker->randomDigit(),
            'volume'=>'0.5',
            'description'=>$faker->realText($maxNbChars = 300, $indexSize = 2),
            'status'=>'1',
            'color_tara'=>$faker->safeColorName(),
            'gases'=>$faker->boolean(),
            'recommend'=>$faker->boolean(),
            'created_at'=>dateTimeThisCentury($max = 'now'),
            'updated_at'=>dateTimeThisCentury($max = 'now'),

        ]);
    }
}
