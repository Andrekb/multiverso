<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'name' => 'Matriz',
            'address' => 'Av. Flores da Cunha, 1346 - Centro, Carazinho - RS, 99500-000',
            'phone' => '99999-9999',
            'lat' => '-28.285858',
            'long' => '-52.787905',
            'city_id' => 1
        ]);
        Store::create([
            'name' => 'Loja Flores',
            'address' => 'Av. Flores da Cunha, 91 - São Pedro, Carazinho - RS, 99500-000',
            'phone' => '99999-9999',
            'lat' => '-28.278744',
            'long' => '-52.779447',
            'city_id' => 1
        ]);
        Store::create([
            'name' => 'Loja Bento',
            'address' => 'Av. São Bento, 1517 - Floresta, Carazinho - RS, 99500-000',
            'phone' => '99999-9999',
            'lat' => '-28.290150',
            'long' => ' -52.811898',
            'city_id' => 1
        ]);
        Store::create([
            'name' => 'Loja Brasil PF',
            'address' => 'Av. Brasil Leste - Centro, Passo Fundo - RS, 99010-001',
            'phone' => '99999-9999',
            'lat' => '-28.258942',
            'long' => '-52.403807',
            'city_id' => 2
        ]);
        Store::create([
            'name' => 'Loja Sete ER',
            'address' => 'Av. Sete de Setembro, 424 - Centro, Erechim - RS, 99700-300',
            'phone' => '99999-9999',
            'lat' => '-27.638983',
            'long' => '-52.271716',
            'city_id' => 3
        ]);
        Store::create([
            'name' => 'Loja Pompeia SP',
            'address' => 'R. Caraíbas, 132 - Pompeia, São Paulo - SP, 05020-000',
            'phone' => '99999-9999',
            'lat' => '-23.529387',
            'long' => '-46.680330',
            'city_id' => 4
        ]);
        Store::create([
            'name' => 'Loja Ipanema RJ',
            'address' => 'R. Teixeira de Melo, 37 - Ipanema, Rio de Janeiro - RJ, 22410-0100',
            'phone' => '99999-9999',
            'lat' => '-22.985583',
            'long' => '-43.198747',
            'city_id' => 5
        ]);
        Store::create([
            'name' => 'Loja Manaus AM',
            'address' => 'Rua 10 de Julho, 406-538 - Centro, Manaus - AM, 69010-060',
            'phone' => '99999-9999',
            'lat' => '-3.129909',
            'long' => '-60.022964',
            'city_id' => 6
        ]);
    }
}
