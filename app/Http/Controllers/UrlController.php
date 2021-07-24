<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlCreateRequest;
use App\Services\UrlService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UrlController extends Controller
{
    private UrlService $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function create(UrlCreateRequest $request): JsonResponse
    {
        $short = $this->urlService->create($request->validated()['url']);

        return response()->json(['status' => true, 'data' => $short], 200);
    }

    public function getOriginUrl(Request $request): JsonResponse
    {
        $data = $this->urlService->findByShort($request->short);
        return response()->json(['status' => true, 'data' => $data], 200);
    }

    public function getAll(): JsonResponse
    {
        $perPage = 15;
        $page = 1;
        $data = $this->urlService->getAll($perPage, $page);

        return response()->json(['status' => true, 'data' => $data], 200);
    }

    public function redirect($any)
    {
        $origin_url = $this->urlService->findByShort($any);

        Redirect()->to($origin_url)->send();
    }
}
