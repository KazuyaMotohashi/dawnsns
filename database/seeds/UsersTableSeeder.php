<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  DB::table('users')->insert([
            [
                'username' => '初期 太郎',
                'mail' => 'syoki_tarou@mail.com',
                'password' => Hash::make('syokitarou11'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '初めまして、私は初期太郎である。',
                'created_at' => '2021-3-1 18:35:48',
                'updated_at' => '2021-3-1 18:35:48',
            ],
            [
                'username' => '初期 次郎',
                'mail' => 'syoki_zirou@mail.com',
                'password' => Hash::make('syokizirou11'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '初めまして、私は初期次郎である。',
                'created_at' => '2021-3-1 18:35:48',
                'updated_at' => '2021-3-1 18:35:48',
            ],
            [
                'username' => '初期 三太郎',
                'mail' => 'syoki_santarou@mail.com',
                'password' => Hash::make('syokisatarou11'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '初めまして、私は初期三太郎である。',
                'created_at' => '2021-3-1 18:35:48',
                'updated_at' => '2021-3-1 18:35:48',
            ],
        ]);
    }
}
