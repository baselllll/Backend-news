<?php

namespace App\Http\Resources;


class NewsResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "source" => $this->source->name,
            "author" => $this->author,
            "publishedAt" => $this->publishedAt,
            "title" => $this->title,
        ];
    }
}
