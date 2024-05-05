<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title'=> 'Minha task de exemplo',
            'description'=> 'teste',
            'due_time'=> '2024-05-04 22:36:01',
            'user_id'=> 1,
            'category_id'=> 1
        ]);
    }
}
