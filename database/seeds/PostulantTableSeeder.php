<?php

use Illuminate\Database\Seeder;

class PostulantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('postulants')->insert([
            'id' => 2016,
            'names' => 'jose maria',
            'first_surname' => 'aguilar',
            'second_surname' => 'chambi',
            'direction' => 'villa jerusalen',
            'email' => 'josmariaguilar@gmail.com',
            'phone' => 79368354,
            'ci' => 9999999,
            'auxiliary' => 'en_duda'
        ]);

        DB::table('postulants')->insert([
            'id' => 2017,
            'names' => 'marcos',
            'first_surname' => 'saa',
            'second_surname' => 'saavedra',
            'direction' => 'norte',
            'email' => 'marquitos@gmail.com',
            'phone' => 72983721,
            'ci' => 8888888,
            'auxiliary' => 'en_duda'
        ]);

        DB::table('postulants')->insert([
            'id' => 2018,
            'names' => 'elisoe joel',
            'first_surname' => 'miranda',
            'second_surname' => 'campos',
            'direction' => 'muy lejos',
            'email' => 'eliceo@gmail.com',
            'phone' => 72377821,
            'ci' => 7777777,
            'auxiliary' => 'en_duda'
        ]);

        DB::table('postulants')->insert([
            'id' => 2019,
            'names' => 'mariano',
            'first_surname' => 'oviedo',
            'second_surname' => 'balderrama',
            'direction' => 'lanza esq ecuador',
            'email' => 'mariano@gmail.com',
            'phone' => 72373362,
            'ci' => 6666666,
            'auxiliary' => 'en_duda'
        ]);

        DB::table('postulants')->insert([
            'id' => 2020,
            'names' => '}eticia',
            'first_surname' => 'blanco',
            'second_surname' => 'coca',
            'direction' => 'umss',
            'email' => 'leti@gmail.com',
            'phone' => 67634472,
            'ci' => 5555555,
            'auxiliary' => 'en_duda'
        ]);
    }
}
