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
            'title' => 'Where can I get some??',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy ',
            'owner_id'=> 2,
            'completed'=>false,
            'assign_to'=>'todoAdmin',
            'status'=> 'in-progress'
          ]);
    }   
}
 