<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        // ランダム
        DB::table('tasks')->insert([
            'title' => str_shuffle('abcde1234567890'),
            'executed' => false,
        ]);

        // 静的
        DB::table('tasks')->insert([
            'title' => 'テストタスク',
            'executed' => false,
        ]);
        DB::table('tasks')->insert([
            'title' => '終了したタスク',
            'executed' => true,
        ]);
    }
}
