<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert(array(
            array(
                'id'=> 1,
                'comment' => 'Altus caesium patienter examinares parma est.',
                'article_id'=> 1,
                'user_id'=> 1,
            ),
            array(
                'id'=> 2,
                'comment' => 'Vae, agripeta!',
                'article_id'=> 2,
                'user_id'=> 1,
            ),
        ));
    }
}
