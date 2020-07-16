<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        DB::table('articles')->delete();
        DB::table('users')->delete();

        $this->call(UserSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
