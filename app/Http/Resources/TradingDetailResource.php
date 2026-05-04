<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TradingDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "id_trading" => $this->id_trading,
            "id_type_product" => $this->id_type_product,
            "trading" =>$this->whenloaded("trading"),
            "type_product" =>$this->whenloaded("type_product"),
            "weight_product" =>$this->weight_product,
            "price_product" =>$this->price_product,
            "total_price_product" =>$this->total_price_product,
            "total_bag_sale_product" =>$this->total_bag_sale_product,
            "created_at" => $this->created_at->format('y-m-d'),
        ];
    }
}
