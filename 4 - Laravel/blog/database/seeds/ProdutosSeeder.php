<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => Str::random(2),
            'email' => Str::random(2).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => "Ralf Raymer Will",
            'email' => 'ralfraymer@gmail.com',
            'password' => Hash::make('password'),
        ]);


        DB::insert("insert into produtos (descricao, quantidade, categoria) values(?,?,?)", array("Geladeira", 2, "Cozinha"));
    }
}
