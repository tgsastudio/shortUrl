<?php

namespace App\Repositories;

use App\Models\ShortUrl;
use Illuminate\Support\Facades\Cache;

class ShortUrlRepo
{
    private $model;

    public function __construct(ShortUrl $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        $this->model->create($data);
    }

    public function findByOrigin($origin)
    {
        return $this->model->whereOriginUrl($origin)->first();
    }

    public function findByShort($short)
    {
        return Cache::remember('S-' . $short, 5, function() use($short) {
            return $this->model->whereShortString($short)->first();
        });
    }

    public function qq()
    {
        echo 'qqqqq';
    }

    public function listByPage(int $perPage = 15, int $currentPage = 1)
    {
        return $this->model->paginate($perPage, ['id', 'short_string', 'origin_url'], 3, $currentPage);
    }
}
