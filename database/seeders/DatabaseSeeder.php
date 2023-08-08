<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        
        $this->call(BookSeeder::class);

        $this->call(WriterSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(ActorSeeder::class);
    }
}
