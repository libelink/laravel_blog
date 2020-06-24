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
                'title' => 'Mirabilis lapsus saepe visums canis est.',
                'content' => 'Altus caesium patienter examinares parma est.',
            ),
            array(
                'title' => 'Est pius ventus, cesaris.',
                'content' => 'Vae, agripeta!',
            ),
        ));
    }
}
