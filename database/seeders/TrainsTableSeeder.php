<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //qui inserisco la logica per popolare la tabella
        // creo una nuova istanza di train
        $new_train = new Train();
        $new_train ->reference = 'Trenitalia';
        $new_train ->slug = 'trenitalia';
        $new_train ->departure_station = 'Firenze';
        $new_train ->arrival_station = 'Milano';
        $new_train ->km_to_travel = 123;
        $new_train ->departure_time = 08.45;
        $new_train ->train_code = 'abc123';
        $new_train ->number_carriages = 7;

        // effettuo l'insert nel db
        $new_train->save();
        // dump($new_train);

    }
}
