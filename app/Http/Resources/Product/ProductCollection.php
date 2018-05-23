<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'newPrice' => round((1-$this->discount/100) * $this->price),
            'ratingd' => round($this->reviews->avg('star'), 2) == 0 ? 'No Rating Yet' : round($this->reviews->avg('star'), 2),
            'discount' => $this->discount,            
            'href' => [
                'link' => route('products.show', $this->id)
            ]
        ];
    }
}
