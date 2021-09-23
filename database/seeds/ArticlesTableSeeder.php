<?php

use App\Author;
use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $allIdAuthor = [];

        for ($i= 0; $i < 10; $i++) {
            $newAuthor = new Author();
            $newAuthor->name = $faker->firstName();
            $newAuthor->surname = $faker->lastName();
            $newAuthor->image = $faker->imageUrl(640, 480, 'profile', true);;
            $newAuthor->work = $faker->word();
            $newAuthor->save();
            $allIdAuthor[] = $newAuthor->id;
        };

        for ($i= 0; $i < 50; $i++) {
            $newpost = new Article();
            $newpost->title = $faker->sentence(3, true);
            $newpost->text = $faker->paragraphs(2, true);
            $newpost->image = $faker->imageUrl(640, 480, 'animals', true);
            $randAuthorKey = array_rand($allIdAuthor, 1);
            $AuthorID = $allIdAuthor[$randAuthorKey];
            $newpost->author_id = $AuthorID;
            $newpost->save();

        };
    }
}