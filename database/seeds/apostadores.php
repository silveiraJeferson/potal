<?php

use Illuminate\Database\Seeder;
use App\models_milionarios\Apostador;
use App\models_milionarios\ApostadorOrganizacao;
use Illuminate\Support\Facades\DB;
use App\models_milionarios\Organizacao;
use App\models_milionarios\Grupo;
use App\models_milionarios\ApostadorGrupo;

require_once 'vendor/autoload.php';

class apostadores extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach (range(1, 20) as $i) {
            $faker = \Faker\Factory::create();
            Organizacao::create([
                'nome' => $faker->jobTitle
            ]);
        }
         foreach (range(1, 20) as $i) {
            $faker = \Faker\Factory::create();
            Grupo::create([
                'nome' => $faker->word
            ]);
        }
        foreach (range(1, 200) as $i) {
            $faker = \Faker\Factory::create();
            $id = Apostador::create([
                        'nome' => $faker->name(),
                        'apelido' => $faker->word,
                    ]);
           
        }
        foreach (range(1, 200) as $i) {
            $faker = \Faker\Factory::create();     

            ApostadorOrganizacao::create([
                'apostador_id' => $i,
                'organizacao_id' => rand(1, 20)
            ]);
        }
       
        foreach (range(1, 500) as $i) {
            ApostadorGrupo::create([
                'apostador_id' => rand(1, 200),
                'grupo_id' => rand(1, 20)
            ]);
        }
    }

}
