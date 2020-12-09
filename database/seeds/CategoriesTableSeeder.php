<?php
use Carbon\Carbon;
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->toDateTimeString();
        Category::insert([
            [
                'id'=> 1,
                'name' => 'Bain',
                'slug' => 'bain',
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [
                'id'=> 2,
                'name' => 'Nuit',
                'slug' => 'nuit',
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [
                'id'=> 3,
                'name' => 'Soins',
                'slug' => 'soins',
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [
                'id'=> 4,
                'name' => 'Divers',
                'slug' => 'divers',
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [
                'id'=> 5,
                'name' => 'Cuisine',
                'slug' => 'cuisine',
                'created_at' => $date, 
                'updated_at' => $date
            ],
            [
                'id'=> 6,
                'name' => 'Accessoires_poussette',
                'slug' => 'poussette',
                'created_at' => $date, 
                'updated_at' => $date
            ]
        ]);
    }
}
