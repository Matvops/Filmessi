<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert(
            [
                [
                    'film_category_id' => 5,
                    'title' => 'Sob as Águas do Sena',
                    'description' => 'Um tubarão gigante aparece no rio Sena, em Paris. Para evitar a catástrofe, uma cientista vai ter que encarar as tragédias do próprio passado.',
                    'year' => 2024,
                    'translated' => true,
                    'active' => true,
                    'views' => 1,
                    'link' => 'https://www.netflix.com/watch/81210788?trackId=14183189&tctx=13%2C7%2Ceedfd5f6-cb2c-4137-a9fd-9034b11489b3-353435519%2CNES_A716FDDD1C2C71A101FB11FA357BFD-462E13A13B14D9-727170E4FC_p_1749505591835%2CNES_A716FDDD1C2C71A101FB11FA357BFD_p_1749505591835%2C%2C%2C%2C81210788%2CVideo%3A81210788%2CminiDpPlayButton',
                    'image_path' => 'storage/app/public/images/sob_as_aguas_do_sena.jpeg',
                    'created_at' => Carbon::now(),
                ],
                [
                    'film_category_id' => 2,
                    'title' => 'Meninas Malvadas 2',
                    'description' => 'Um grupo de garotas toma o controle de um colégio e transforma a vida de uma nova estudante em um pesadelo.',
                    'year' => 2011,
                    'translated' => true,
                    'active' => true,
                    'views' => 1,
                    'link' => 'https://www.netflix.com/watch/70154633?trackId=14183173&tctx=10%2C2%2Cf3e1159c-8ca5-4031-b871-0c8463500efa-353491670%2CNES_A716FDDD1C2C71A101FB11FA357BFD-89B8DA90405B0B-727170E4FC_p_1749505591835%2CNES_A716FDDD1C2C71A101FB11FA357BFD_p_1749505591835%2C%2C%2C%2C70154633%2CVideo%3A70154633%2CminiDpPlayButton',
                    'image_path' => 'storage/app/public/images/meninas_malvadas_dois.jpg',
                    'created_at' => Carbon::now(),
                ],
                [
                    'film_category_id' => 3,
                    'title' => 'Anjos da Noite: Guerras de Sangue',
                    'description' => 'Com a ajuda de seus aliados, a vampira híbrida Selene tenta por fim à guerra eterna entre vampiros e lobisomens, mesmo que isso signifique o sacrifício total.',
                    'year' => 2016,
                    'translated' => true,
                    'active' => true,
                    'views' => 1,
                    'link' => 'https://www.netflix.com/watch/80106735?trackId=251183836&tctx=1%2C27%2Cf3e1159c-8ca5-4031-b871-0c8463500efa-353680881%2CNES_DDE11A31E83F6579BAC9E3D4C6A78F-62381BC8ECABAA-E39D4116D4_p_1749506262521%2CNES_DDE11A31E83F6579BAC9E3D4C6A78F_p_1749506262521%2C%2C%2C%2C%2CVideo%3A80106735%2CdetailsPagePlayButton',
                    'image_path' => 'storage/app/public/images/anjos_da_noite_guerra_de_sangue.jpg',
                    'created_at' => Carbon::now(),
                ],
                [
                    'film_category_id' => 1,
                    'title' => 'Velozes e Furiosos 10',
                    'description' => 'Dom Toretto e sua família precisam lidar com o adversário mais letal que já enfrentaram. Alimentada pela vingança, uma ameaça terrível emerge das sombras do passado para destruir o mundo de Dom e todos que ele ama.',
                    'year' => 2023,
                    'translated' => true,
                    'active' => true,
                    'views' => 1,
                    'link' => 'https://www.netflix.com/watch/81649988?trackId=251183836&tctx=1%2C6%2Cf3e1159c-8ca5-4031-b871-0c8463500efa-353910315%2CNES_47BDFE3FB8A706B0802F1D75D4A138-397F1F47794F47-961D568A1D_p_1749506515775%2CNES_47BDFE3FB8A706B0802F1D75D4A138_p_1749506515775%2C%2C%2C%2C%2CVideo%3A81649988%2CdetailsPagePlayButton',
                    'image_path' => 'storage/app/public/images/velozes_e_furiosos_dez.jpg',
                    'created_at' => Carbon::now(),
                ],
                [
                    'film_category_id' => 4,
                    'title' => 'Onde Está Segunda?',
                    'description' => 'Para combater o problema da superpopulação, o número de filhos que um casal pode ter é rigidamente controlado pelo governo. Para seu desespero, um homem tem sete filhas gêmeas.',
                    'year' => 2017,
                    'translated' => true,
                    'active' => true,
                    'views' => 1,
                    'link' => 'https://www.netflix.com/watch/80146805?trackId=251103755&tctx=9%2C8%2Cf3e1159c-8ca5-4031-b871-0c8463500efa-353911390%2CNES_47BDFE3FB8A706B0802F1D75D4A138-DADF949C6A0061-961D568A1D_p_1749506515775%2CNES_47BDFE3FB8A706B0802F1D75D4A138_p_1749506515775%2C%2C%2C%2C%2CVideo%3A80146805%2CdetailsPagePlayButton',
                    'image_path' => 'storage/app/public/images/onde_esta_segunda.jpg',
                    'created_at' => Carbon::now(),
                ],
            ]
        );
    }
}
