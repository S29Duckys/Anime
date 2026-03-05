<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\InfoAnime;

class AnimeController extends Controller
{
    public function show($slug)
    {
        return view('pages.anime', [
            "anime"       => InfoAnime::findByTitle($slug),
            "animeFolder" => $this->getAllEpisodes($slug),
        ]);
    }

    public function video(string $name, string $saison, string $slug)
    {
        $getAnimeInfo = $this->getEpisodeByName($name, $saison, $slug);

        return view('pages.video', [
            'animeInfo' => $getAnimeInfo,
            'anime'     => InfoAnime::findByTitle($name),
        ]);
    }

    public function stream(string $name, string $saison, string $slug)
    {
        $fullPath = public_path("storage/animes/{$name}/{$saison}/{$slug}.mp4");
        abort_unless(file_exists($fullPath), 404);

        $size    = filesize($fullPath);
        $start   = 0;
        $end     = $size - 1;
        $status  = 200;
        $headers = [
            'Content-Type'   => 'video/mp4',
            'Accept-Ranges'  => 'bytes',
            'Content-Length' => $size,
            'Cache-Control'  => 'no-cache, no-store',
        ];

        if (request()->hasHeader('Range')) {
            preg_match('/bytes=(\d+)-(\d*)/', request()->header('Range'), $m);
            $start  = (int) $m[1];
            $end    = isset($m[2]) && $m[2] !== '' ? (int) $m[2] : $size - 1;
            $headers['Content-Range']  = "bytes {$start}-{$end}/{$size}";
            $headers['Content-Length'] = $end - $start + 1;
            $status = 206;
        }

        return response()->stream(function () use ($fullPath, $start, $end) {
            $fp = fopen($fullPath, 'rb');
            fseek($fp, $start);
            $remaining = $end - $start + 1;
            while (!feof($fp) && $remaining > 0) {
                echo fread($fp, min(65536, $remaining));
                $remaining -= 65536;
                flush();
            }
            fclose($fp);
        }, $status, $headers);
    }

    public function getAllEpisodes(string $nameAnime)
    {
        $animePath   = 'animes/' . $nameAnime;
        $sousDossiers = Storage::disk('public')->directories($animePath);
        $allEpisodes = [];

        foreach ($sousDossiers as $season) {
            $seasonName    = basename($season);
            $episodes      = [];
            $episodesCount = 0;

            foreach (Storage::disk('public')->files($season) as $file) {
                $episodes[] = [
                    'file'          => pathinfo($file, PATHINFO_FILENAME),
                    'path'          => Storage::url($file),
                    'countEpisodes' => $episodesCount += 1,
                ];
            }

            $allEpisodes[$seasonName] = $episodes;
        }

        return [
            'nameAnime'   => $nameAnime,
            'counts'      => count($sousDossiers),
            'allEpisodes' => $allEpisodes,
        ];
    }

    public function getEpisodeByName(string $anime, string $saison, string $name)
    {
        $seasonPath     = 'animes/' . $anime . '/' . $saison;
        $currentEpisode = null;
        $episodes       = [];

        foreach (Storage::disk('public')->files($seasonPath) as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);

            if ($filename === $name) {
                $currentEpisode = [
                    'file'   => $filename,
                    'saison' => $saison,
                ];
            }

            $episodes[] = [
                'file'   => $filename,
                'saison' => $saison,
            ];
        }

        return [
            'currentEpisode' => $currentEpisode,
            'saison'         => $saison,
            'allEpisodes'    => $episodes,
        ];
    }
}