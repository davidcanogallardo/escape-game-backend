<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Level;
use Carbon\Carbon;

class LevelsSeeder extends Seeder
{
    public function run(){
        DB::table('levels')->insert([
            'name' => '1-1',
            'difficulty'=> 'easy',
            'nChallenge'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('levels')->insert([
            'name' => '1-2',
            'difficulty'=> 'easy',
            'nChallenge'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('levels')->insert([
            'name' => '2-1',
            'difficulty'=> 'medium',
            'nChallenge'=> 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('levels')->insert([
            'name' => '2-2',
            'difficulty'=> 'medium',
            'nChallenge'=> 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('levels')->insert([
            'name' => '3-1',
            'difficulty'=> 'hard',
            'nChallenge'=> 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
