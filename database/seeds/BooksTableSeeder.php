<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ja_JP');
        $bookTitle = ["PHP基礎", "Laravel入門", "Railsチュートリアル", "Java研修", "Vue.js入門"];
        
        for ($i = 0; $i < 10; $i++) {
            Book::create([
                'user_id'    => 1,
                'item_name'  => $bookTitle[mt_rand(0, count($bookTitle)-1)],
                'item_number'=> $faker->numberBetween(1,999),
                'item_amount'=> $faker->numberBetween(100,5000),
                'published'  => $faker->dateTime('now'),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
        }
    }
}
