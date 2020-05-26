<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("insert into produtos (nome, valor, descricao, categoria, quantidade) values (?, ?, ?, ?, ?)", array("Arroz do Branco 1Kg", 1.89, "Arroz branco, gostoso em qualquer momento", "Essecial", 50));

        DB::table('produtos')->insert([
            'nome' => 'Cesta de Natal',
            'valor' => 55.80,
            'descricao' => 'Azeite, arroz, feijão, peru, vinho e uva passa',
            'categoria' => 'Datas Comemorativas',
            'quantidade' => 20
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Café Iguaçu',
            'valor' => 10.89,
            'descricao' => 'Café Amargo, feito de grãos separados',
            'categoria' => 'Café da manhã',
            'quantidade' => 110
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Vinho Tinto Chileno',
            'valor' => 114.90,
            'descricao' => 'Vinho de qualidade, sabor e tradição',
            'categoria' => 'Alcoolicos',
            'quantidade' => 2
        ]);
    }
}
