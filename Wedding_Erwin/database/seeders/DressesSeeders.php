<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DressesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $bajucowo = ['', '', '', '', '', '', '', '', '',];
        $model = ['vintage', 'romantic', 'fantasy'];
        $location = ['Bandung', 'Jakarta', 'Surabaya'];
        $con = 0;
        for ($i=0; $i < 3; $i++) { 
           for ($j=0; $j < 3; $j++) { 
                 Post::create([
                   'suitName' => $model[$i] . '- wedding suit ' . $j,
                   'picture' => $bajucowo[$con],
                   'harga' => 'Rp '. (300100 * $j),
                   'store' => $model[$i] . 'Wedding Boutique ' . $location[$i],
                   'location' => $location[$i],
               ]);
               $con+=1;
            }
        }
    }
}
