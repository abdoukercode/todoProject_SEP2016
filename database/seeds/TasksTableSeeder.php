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
        DB::table('tasks')->insert(
         
          [
            'title' => 'finish lorem test',
            'body' => 'this is a test',
            'owner_id'=> 2,
            'completed'=>false
          ]);
    }   
}
 