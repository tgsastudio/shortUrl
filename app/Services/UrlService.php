<?php

namespace App\Services;

use App\Repositories\ShortUrlRepo;

/**
 * Class UrlService
 * @package App\Services
 */
class UrlService
{
    private $repo;
    private const BASE_URL = 'http://laravel.test/';

    public function __construct(ShortUrlRepo $shortUrlRepo)
    {
        $this->repo = $shortUrlRepo;
    }

    public function create($url): string
    {
        // todo: exception handler
        // throw new \Exception('eeeeee');

        // find if exists
        $exists = $this->repo->findByOrigin($url);
        if ($exists) {
            return $this->genUrl($exists->short_string);
        }

        // create
        $shortString = uniqid();
        $data = [
            'origin_url' => $url,
            'short_string' => $shortString,
        ];

        $this->repo->create($data);

        return $this->genUrl($shortString);
    }

    /**
     * @param $shortString
     * @return string
     * @throws \Exception
     */
    public function findByShort($shortString): string
    {
        $exists = $this->repo->findByShort($shortString);

        if (!$exists) {
            throw new \Exception('not found');
        }

        return $exists->origin_url;
    }

    public function getAll($perPage, $currentPage)
    {
        $data = $this->repo->listByPage($perPage, $currentPage);

        return $data;
    }

    private function genUrl($shortString)
    {
        return self::BASE_URL . $shortString;
    }

}
