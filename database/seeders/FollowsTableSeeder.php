<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('follows')->insert([
         ]);

      Schema::create('follows', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('following_id'); // フォローする側のユーザーID
      $table->unsignedBigInteger('followed_id'); // フォローされる側のユーザーID
      $table->timestamps();
      });
    }
}
