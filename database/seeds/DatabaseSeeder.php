<?php

use Illuminate\Database\Seeder;
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
        $tables = [
            'post_tag',
            'tags',
            'posts',
            'users',
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach ( $tables as $table ) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        factory(App\User::class, 1)->create();
        factory(App\Tag::class, 3)->create();
        factory(App\Post::class, 5)->create();
        DB::table('post_tag')->insert([ 'post_id' => 1, 'tag_id' => 1 ]);
        DB::table('post_tag')->insert([ 'post_id' => 1, 'tag_id' => 2 ]);
        DB::table('post_tag')->insert([ 'post_id' => 1, 'tag_id' => 3 ]);
        DB::table('post_tag')->insert([ 'post_id' => 2, 'tag_id' => 1 ]);
    }
}
