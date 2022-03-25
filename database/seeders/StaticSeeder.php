<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Room;
use Illuminate\Database\Seeder;

class StaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'name' => 'Терапевт',
            ],
            [
                'name' => 'Кардиолог'
            ]
        ];

        $rooms = [
            [
                'name' => '101',
            ],
            [
                'name' => '224'
            ]
        ];

        foreach ($posts as $post) {
            Post::create([
                'name' => $post['name']
            ]);
        }

        foreach ($rooms as $room) {
            Room::create([
                'name' => $room['name']
            ]);
        }
    }
}
