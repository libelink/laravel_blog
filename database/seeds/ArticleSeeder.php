<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert(array(
            array(
                'id'=> 1,
                'title' => 'Mirabilis lapsus saepe visums canis est.',
                'content' => 'Altus caesium patienter examinares parma est.',
                'user_id'=> 1,
            ),
            array(
                'id' => 2,
                'title' => 'Est pius ventus, cesaris.',
                'content' => 'Vae, agripeta!',
                'user_id'=> 1,
            ),
        ));
    }
}
