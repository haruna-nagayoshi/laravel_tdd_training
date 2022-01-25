<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
