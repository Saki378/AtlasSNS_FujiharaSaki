<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'email' => '1111@mail',
            'password' => '1111'
        ],
            ['username' => 'Atlas二郎',
            'email' => '2222@mail',
            'password' => '2222'
        ],
            ['username' => 'Atlas三郎',
            'email' => '3333@mail',
            'password' => '3333'
        ],
            ['username' => 'Atlas四郎',
            'email' => '4444@mail',
            'password' => '4444'
        ],
            ['username' => 'Atlas五郎',
            'email' => '5555@mail',
            'password' => '5555'
            ]
        ]);
    }
}
