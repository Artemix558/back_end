<?php

namespace Database\Seeders;

use App\Models\Dem_input;
use App\Models\Objet;
use Illuminate\Database\Seeder;

class InputTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Objet::insert([
            ['nom' => 'canape','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['nom' => 'chaise','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['nom' => 'table','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['nom' => 'armoire','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['nom' => 'banc','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
        ]);
        // meuble,lit,chaises,canape,table,fragile,armoire des habits(grands,moyen,petit),cuisine, micro-ondes
        //  daffaires de demenagements...proposition
    }
}
