<?php


namespace App\Controller;

use App\Model\MovieManager;

class MovieController
{
    public function index()
    {
        $movieManager = new MovieManager();
        $movies = $movieManager->selectAll();
        return json_encode($movies['movies']);
    }

    public function show($id)
    {
        $movieManager = new MovieManager();
        $movie = $movieManager->selectOneById($id);
        return json_encode($movie['movie']);
    }
}
