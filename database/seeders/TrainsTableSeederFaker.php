<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Train;
// importiamo il faker
use Faker\Generator as Faker;


class TrainsTableSeederFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  passo una nuova istanza del faker come parametro del metodo run
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            // istanza
            $new_train = new Train();
            $new_train ->reference = $faker->words(3, true);
            $new_train ->slug = $this->generateSlug($new_train->reference);
            $new_train ->departure_station = $faker->city();
            $new_train ->arrival_station = $faker->city();
            $new_train ->km_to_travel = $faker->numberBetween(1, 200);;
            $new_train ->departure_time = $faker->time();
            $new_train ->in_time = $faker->boolean();
            $new_train ->train_code = $faker->bothify('?????-#####');
            $new_train ->number_carriages = $faker->numberBetween(1, 11);
            $new_train ->aviable_train = $faker->boolean();
            // dump($new_train);
            $new_train->save();
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
