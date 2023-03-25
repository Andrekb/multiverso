<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'name' => 'Carazinho',
            'uf' => 'RS',
            'cep' => '99500-000',
            'region' => 'Sul',
            'manager' => 'Gerente 1'
        ]);
        City::create([
            'name' => 'Passo Fundo',
            'uf' => 'RS',
            'cep' => '99001-970',
            'region' => 'Sul',
            'manager' => 'Gerente 2'
        ]);
        City::create([
            'name' => 'Erechim',
            'uf' => 'RS',
            'cep' => '99700-000',
            'region' => 'Sul',
            'manager' => 'Gerente 3'
        ]);
        City::create([
            'name' => 'São Paulo',
            'uf' => 'SP',
            'cep' => '01000-000',
            'region' => 'Centro-Oeste',
            'manager' => 'Gerente 4'
        ]);
        City::create([
            'name' => 'Rio de Janeiro',
            'uf' => 'RJ',
            'cep' => '20000-000',
            'region' => 'Centro-Oeste',
            'manager' => 'Gerente 5'
        ]);
        City::create([
            'name' => 'Manaus',
            'uf' => 'AM',
            'cep' => '69000-000',
            'region' => 'Norte',
            'manager' => 'Gerente 6'
        ]);
    }
}
