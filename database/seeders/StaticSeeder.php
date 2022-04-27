<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Room;
use App\Models\Seance;
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

        $seances = [
            [
                'name' => '08:00:00',
            ],
            [
                'name' => '08:30:00',
            ],
            [
                'name' => '09:00:00',
            ],
            [
                'name' => '09:30:00',
            ],
            [
                'name' => '10:00:00',
            ],
            [
                'name' => '10:30:00',
            ],
            [
                'name' => '11:00:00',
            ],
            [
                'name' => '11:30:00',
            ],
            [
                'name' => '12:00:00',
            ],
            [
                'name' => '12:30:00',
            ],
            [
                'name' => '14:00:00',
            ],
            [
                'name' => '14:30:00',
            ],
            [
                'name' => '15:00:00',
            ],
            [
                'name' => '15:30:00',
            ],
            [
                'name' => '16:00:00',
            ],
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

        foreach ($seances as $seance) {
            Seance::create([
                'name' => $seance['name']
            ]);
        }
    }
}
