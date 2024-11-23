<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = [
            [
                'name' => 'Web Design'
            ],
            [
                'name' => 'HTML'
            ],
            [
                'name' => 'Freebies'
            ],
            [
                'name' => 'JavaScript'
            ],
            [
                'name' => 'CSS'
            ],
            [
                'name' => 'Tutorials'
            ],
            [
                'name' => 'MySql'
            ],
            [
                'name' => 'Mongo DB'
            ],

        ];
        foreach ($date as $record) {
            Tag::create($record);
        }
    }
}
