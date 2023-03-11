<?php

namespace App\Http\Controllers;

use App\helpers\NewsApiHelper;
use App\Http\Resources\UserResource;

class NewsDataSourceController extends Controller
{
    use NewsApiHelper;

    public function getNews(){
        $data_source = auth()->user()->data_source_api;
            $data = $this->news_api($data_source);
            $subset = array_map(function ($item) {
                return collect($item)
                    ->only(['source', 'author', 'publishedAt','title'])
                    ->all();
            },$data->articles);
            return response()->json([
                "news"=>$subset
            ],200);
    }
}
