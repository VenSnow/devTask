<?php


use App\Models\Genre;
use App\Models\Movie;
use Tests\TestCase;

class ApiGenreControllerTest extends TestCase
{
    public function test_show_all_genres()
    {
        Genre::factory()->times(10)->create();
        $response = $this->getJson('api/genres');
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                [
                    'id',
                    'title',
                ]
            ]
        ]);
    }

    public function test_show_all_movies_by_genre()
    {
        $genres = Genre::factory()->times(10)->create();
        Movie::factory(50)->create()->each(function ($movie) use ($genres) {
            $movie->genres()->attach($genres->random(rand(2, 4)));
        });
        $response = $this->getJson('api/genres/1');
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                [
                    'id',
                    'title',
                    'poster',
                    'is_published',
                    'pivot' => [
                        'genre_id',
                    ],
                ],
            ]
        ]);
    }
}
