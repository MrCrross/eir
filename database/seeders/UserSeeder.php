<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use App\Models\Worker;
use App\Models\WorkerSeance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'last_name' => 'Администратор',
                'first_name' => 'Администратор',
                'father_name' => 'Администратор',
                'name' => 'admin',
                'password' => Hash::make('admin'),
                'email' => 'admin@admin.com',
                'phone' => '+7(999)999-99-99',
                'role' => 1
            ],
            [
                'last_name' => 'Александрова',
                'first_name' => 'Юлия',
                'father_name' => 'Дмитриевна',
                'name' => 'АлександроваЮД',
                'password' => Hash::make('doctor'),
                'email' => 'alekseevaOlga@admin.com',
                'phone' => '+7(964)659-29-99',
                'role' => 2
            ],
            [
                'last_name' => 'Санёк',
                'first_name' => 'Юрий',
                'father_name' => 'Олегович',
                'name' => 'СанёкЮО',
                'password' => Hash::make('client'),
                'email' => 'sanekUO@admin.com',
                'phone' => '+7(964)699-99-99',
                'role' => 3
            ]
        ];

        $clients = [
            [
                'birthday' => '2000-05-03',
                'user_id' => 3
            ],
        ];

        $workers = [
            [
                'post_id' => 1,
                'user_id' => 2,
                'room_id'=>1
            ],
        ];

        $worker_seances = [
            [
                'worker_id' => 1,
                'seance_id' => 1
            ],
            [
                'worker_id' => 1,
                'seance_id' => 2
            ],
            [
                'worker_id' => 1,
                'seance_id' => 3
            ],
            [
                'worker_id' => 1,
                'seance_id' => 4
            ],
            [
                'worker_id' => 1,
                'seance_id' => 5
            ],
            [
                'worker_id' => 1,
                'seance_id' => 6
            ],
            [
                'worker_id' => 1,
                'seance_id' => 7
            ],
            [
                'worker_id' => 1,
                'seance_id' => 8
            ],
            [
                'worker_id' => 1,
                'seance_id' => 9
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'last_name' => $user['last_name'],
                'first_name' => $user['first_name'],
                'father_name' => $user['father_name'],
                'name' => $user['name'],
                'password' => $user['password'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'role' => $user['role'],
            ]);
        }

        foreach ($clients as $client) {
            Client::create([
                'birthday' => $client['birthday'],
                'user_id' => $client['user_id'],
            ]);
        }

        foreach ($workers as $worker) {
            Worker::create([
                'post_id' => $worker['post_id'],
                'user_id' => $worker['user_id'],
                'room_id' => $worker['room_id'],
            ]);
        }

        foreach ($worker_seances as $worker_seance) {
            WorkerSeance::create([
                'worker_id' => $worker_seance['worker_id'],
                'seance_id' => $worker_seance['seance_id'],
            ]);
        }
    }
}
