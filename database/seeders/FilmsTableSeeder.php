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
                    'translated' => false,
                    'active' => true,
                    'views' => 1,
                    'link' => 'https://www.netflix.com/title/81210788',
                    'image_path' => 'storage/images/sob_as_aguas_do_sena.jpeg',
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
                    'link' => 'https://www.netflix.com/title/70154633',
                    'image_path' => 'storage/images/meninas_malvadas_dois.jpg',
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
                    'link' => 'https://www.netflix.com/title/80106735',
                    'image_path' => 'storage/images/anjos_da_noite_guerra_de_sangue.jpg',
                    'created_at' => Carbon::now(),
                ],
                [
                    'film_category_id' => 1,
                    'title' => 'Velozes e Furiosos 10',
                    'description' => 'Dom Toretto e sua família precisam lidar com o adversário mais letal que já enfrentaram. Alimentada pela vingança, uma ameaça terrível emerge das sombras do passado para destruir o mundo de Dom e todos que ele ama.',
                    'year' => 2023,
                    'translated' => false,
                    'active' => true,
                    'views' => 1,
                    'link' => 'https://www.netflix.com/title/81649988',
                    'image_path' => 'storage/images/velozes_e_furiosos_dez.jpg',
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
                    'link' => 'https://www.netflix.com/title/80146805',
                    'image_path' => 'storage/images/onde_esta_segunda.jpg',
                    'created_at' => Carbon::now(),
                ],
                [
                    'film_category_id' => 2,
                    'title' => 'Todo Mundo em Pânico 3',
                    'description' => 'Depois de a repórter de jornal Cindy assistir acidentalmente uma estranha fita de vídeo que faz com que o espectador morra dentro de uma semana, ela descobre que a fita é apenas um dos muitos acontecimentos estranhos recentes.',
                    'year' => 2003,
                    'translated' => true,
                    'active' => true,
                    'views' => 10,
                    'link' => 'https://www.netflix.com/title/60031248',
                    'image_path' => 'storage/images/todo_mundo_em_panico_3.webp',
                    'created_at' => Carbon::now(),
                ],
                [
                    'film_category_id' => 1,
                    'title' => 'Resgate 2',
                    'description' => 'Depois de escapar da morte por um triz, o mercenário Tyler Rake encara mais uma missão perigosa: resgatar a família de um criminoso implacável.',
                    'year' => 2023,
                    'translated' => false,
                    'active' => true,
                    'views' => 1,
                    'link' => 'https://www.netflix.com/title/81098494',
                    'image_path' => 'storage/images/resgate.jpg',
                    'created_at' => Carbon::now(),
                ],
                [
                    'film_category_id' => 3,
                    'title' => 'O Hobbit: Uma Jornada Inesperada',
                    'description' => 'Como a maioria dos hobbits, Bilbo Bolseiro leva uma vida tranquila até o dia em que recebe uma missão do mago Gandalf. Acompanhado por um grupo de anões, ele parte numa jornada até a Montanha Solitária para libertar o Reino de Erebor do dragão Smaug.',
                    'year' => 2012,
                    'translated' => true,
                    'active' => true,
                    'views' => 20,
                    'link' => 'https://www.primevideo.com/-/pt/detail/Hobbit-Uma-Jornada-Inesperada/0RZDRRR46MYHPSQE8MNH0HQKZ8',
                    'image_path' => 'storage/images/hobbit.jpg',
                    'created_at' => Carbon::now(),
                ],
            ]
        );
    }
}
