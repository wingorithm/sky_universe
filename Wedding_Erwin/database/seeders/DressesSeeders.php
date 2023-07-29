<?php

namespace Database\Seeders;

use App\Models\Dress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DressesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $bajucowo = ['https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/Vintage-1.png', 
        'https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/Vintage-2.png', 
        'https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/Vintage.png', 
        'https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/Romantic-1.png', 
        'https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/Romantic-2.png', 
        'https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/Romantic.png', 
        'https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/FANTASY-1.png', 
        'https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/FANTASY-2.png', 
        'https://raw.githubusercontent.com/wingorithm/sky_universe/main/resource/FANTASY.png',];
        $model = ['vintage', 'romantic', 'fantasy'];
        $location = ['Bandung', 'Jakarta', 'Surabaya'];
        $con = 0;
        for ($i=0; $i < 3; $i++) { 
           for ($j=0; $j < 3; $j++) { 
                Dress::create([
                   'suitName' => $model[$i] . '- wedding suit ' . $j,
                   'picture' => $bajucowo[$con],
                   'harga' => 'Rp '. (300100 * ($j +1)),
                   'store' => $model[$i] . 'Wedding Boutique ' . $location[$i],
                   'location' => $location[$i],
                    ]);
                $con = $con + 1;
            }
        }
    }
}
