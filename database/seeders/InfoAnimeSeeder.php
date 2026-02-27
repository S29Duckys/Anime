<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoAnimeSeeder extends Seeder
{
    public function run(): void
    {
        $animes = [
            [
                'slug'           => 'drcl-midnight-children',
                'title'          => '#DRCL midnight children',
                'original_title' => '#DRCL midnight children',
                'image_url'      => 'https://raw.githubusercontent.com/Anime-Sama/IMG/img/contenu/drcl-midnight-children0.jpg',
                'sinopsis'       => 'Dans un pays lointain de l\'Est, il existe une créature qu\'on ne remarque pas mais qui est pourtant bien là... Le Comte Dracula !',
                'genre'          => 'Drame, Fantastique, Surnaturel',
                'release_date'   => null,
                'description'    => null,
            ],
            [
                'slug'           => 'tis-time-for-torture-princess',
                'title'          => '\'Tis Time for "Torture," Princess',
                'original_title' => '\'Tis Time for "Torture," Princess',
                'image_url'      => 'https://raw.githubusercontent.com/Anime-Sama/IMG/img/contenu/tis-time-for-torture-princess.jpg',
                'sinopsis'       => 'Hime-sama, princesse de l\'armée royale, et son épée sacré Ex, ont été capturées par l\'armée du Roi démon; Afin de connaître tous les secrets détenus par cette dernière, le bourreau de l\'armée du Roi démon décide de la "torturer".',
                'genre'          => 'Comédie, Fantasy, Démons, Gastronomie, Torture',
                'release_date'   => null,
                'description'    => null,
            ],
            [
                'slug'           => '100-jours-avant-ta-mort',
                'title'          => '100 Jours Avant Ta Mort',
                'original_title' => '100 Jours Avant Ta Mort',
                'image_url'      => 'https://raw.githubusercontent.com/Anime-Sama/IMG/img/contenu/100-jours-avant-ta-mort0.jpg',
                'sinopsis'       => 'Taro a enfin pu avouer à son amie d\'enfance Umi qu\'il l\'aime depuis toujours ! Mais à cet instant, s\'affiche le nombre 100 devant la jeune fille... Car Taro a un pouvoir spécial : celui de visualiser un compte à rebours sur tous les êtres vivants qui ont moins de 100 jours à vivre ! Ensemble, le couple va faire face au destin et tenter d\'arrêter le décompte fatidique...',
                'genre'          => 'Comédie, Drame, Romance, School Life, Slice of Life, Shôjo',
                'release_date'   => null,
                'description'    => null,
            ],
            [
                'slug'           => '100-meters',
                'title'          => '100 Meters',
                'original_title' => '100 Meters',
                'image_url'      => 'https://raw.githubusercontent.com/Anime-Sama/IMG/img/contenu/100-meters.jpg',
                'sinopsis'       => 'Je m\'appelle Togashi. Je suis né avec un don pour la rapidité...',
                'genre'          => 'Action, Drame, Athlétisme, Sport',
                'release_date'   => null,
                'description'    => null,
            ],
        ];

        foreach ($animes as $anime) {
            DB::table('info_anime')->updateOrInsert(
                ['slug' => $anime['slug']], // clé pour éviter les doublons
                array_merge($anime, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}