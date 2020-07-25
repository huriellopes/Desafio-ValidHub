<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert([
            [
                'tipo' => 'PF',
                'documento' => 'Pessoa Física'
            ],
            [
                'tipo' => 'PJ',
                'documento' => 'Pessoa Jurídica'
            ]
    ]);
    }
}
