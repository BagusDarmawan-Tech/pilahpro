<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleProductDetailResource extends JsonResource
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
            "id_purchase_order" => $this->id_purchase_order,
            "id_type_product" => $this->id_type_product,
            "id_sale_product" => $this->id_sale_product,
            "purchase_order" =>$this->whenloaded("purchase_order"),
            "type_product" =>$this->whenloaded("type_product"),
            "sale_product" =>$this->whenloaded("sale_product"),
            "weight_product" =>$this->weight_product,
            "price_product" =>$this->price_product,
            "total_price_product" =>$this->total_price_product,
            "total_bag_sale_product" =>$this->total_bag_sale_product,
            "created_at" => $this->created_at->format('y-m-d'),
        ];
    }
}
