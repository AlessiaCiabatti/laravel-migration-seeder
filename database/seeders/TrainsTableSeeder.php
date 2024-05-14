<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;


class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [

            [
                "reference" => 'Trenitalia',
                // "slug" => 'trenitalia',
                "departure_station" => 'Firenze',
                "arrival_station" => 'Milano',
                "km_to_travel" => 123,
                "departure_time" => '08:45:00',
                "train_code" => 'abc123',
                "number_carriages" => 7
            ],
            [
                "reference" => 'Trenitalia',
                // "slug" => 'trenitalia2',
                "departure_station" => 'Firenze',
                "arrival_station" => 'Milano',
                "km_to_travel" => 123,
                "departure_time" => '08:45:00',
                "train_code" => 'abc123',
                "number_carriages" => 7
            ],
            [
                "reference" => 'Trenitalia3',
                // "slug" => 'trenitalia3',
                "departure_station" => 'Firenze',
                "arrival_station" => 'Milano',
                "km_to_travel" => 123,
                "departure_time" => '08:45:00',
                "train_code" => 'abc123',
                "number_carriages" => 7
            ]

        ];

        foreach($data as $item){

        //qui inserisco la logica per popolare la tabella
        // creo una nuova istanza di train
        $new_train = new Train();
        $new_train ->reference = $item['reference'];
        $new_train ->slug = $this->generateSlug($new_train->reference);
        $new_train ->departure_station = $item['departure_station'];
        $new_train ->arrival_station = $item['arrival_station'];
        $new_train ->km_to_travel =  $item['km_to_travel'];
        $new_train ->departure_time =  $item['departure_time'];
        $new_train ->train_code = $item['train_code'];
        $new_train ->number_carriages = $item['number_carriages'];

        // effettuo l'insert nel db
        $new_train->save();
        // dump($new_train);



        //         //qui inserisco la logica per popolare la tabella
        // // creo una nuova istanza di train
        // $new_train = new Train();
        // $new_train ->reference = 'Trenitalia';
        // $new_train ->slug = 'trenitalia';
        // $new_train ->departure_station = 'Firenze';
        // $new_train ->arrival_station = 'Milano';
        // $new_train ->km_to_travel = 123;
        // $new_train ->departure_time = '08:45:00';
        // $new_train ->train_code = 'abc123';
        // $new_train ->number_carriages = 7;

        // // effettuo l'insert nel db
        // $new_train->save();
        // // dump($new_train);
        }

    }

    private function generateSlug($string){
        /*

        1. ricevo la stringa da 'sluggare'
        2. genero lo slug
        3. faccio una query per vedere se lo slug è già presente nel db
        4. se non è presente restiuisco lo slug
        5. se è presente ne genero un altro con un valore incrementale e ad ogni generazione verifico che non sia presente
        6. una volta trovato lo slug non presente lo restituisco

        */

        // 2
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        // 3
        $exist = Train::where('slug', $slug)->first();
        $c = 1;

        while($exist){
            $slug = $original_slug. '-' . $c;
            $exist = Train::where('slug', $slug)->first();
            $c++;
        }

        // 5
        return $slug;
    }
}
