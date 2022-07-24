<?php


use App\Models\Genre;
use App\Models\Movie;
use Tests\TestCase;

class ApiMovieControllerTest extends TestCase
{
    public function test_show_all_movies()
    {
        $genres = Genre::factory()->times(10)->create();
        Movie::factory(50)->create()->each(function ($movie) use ($genres) {
            $movie->genres()->attach($genres->random(rand(2, 4)));
        });
        $response = $this->getJson('api/movies');
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                [
                    'title',
                    'poster',
                    'is_published',
                    'genres' => [
                        [
                            'id',
                            'title',

                        ]
                    ],
                ],
            ]
        ]);
    }

    public function test_show_one_movie()
    {
        $genres = Genre::factory()->times(10)->create();
        Movie::factory(50)->create()->each(function ($movie) use ($genres) {
            $movie->genres()->attach($genres->random(rand(2, 4)));
        });
        $firstId = Movie::latest()->first();
        $url = 'api/movies/' . $firstId->id;
        $response = $this->getJson($url);
        $response->assertJsonStructure([
            'id',
            'title',
            'is_published',
            'poster',
            'genres' => [
                [
                    'id',
                    'title',
                ]
            ]
        ]);
    }

}
