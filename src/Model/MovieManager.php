<?php


namespace App\Model;

class MovieManager extends AbstractApiManager
{
    const ENDPOINT = 'movies';

    public function __construct()
    {
        parent::__construct(self::ENDPOINT);
    }
}
