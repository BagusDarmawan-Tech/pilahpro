<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
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
            "id_sale_product" => $this->id_sale_product,
            "id_purchase_order" => $this->id_purchase_order,
            "trading" =>$this->whenloaded("trading"),
            "sale" =>$this->whenloaded("sale"),
            "purchase" =>$this->whenloaded("purchase"),
            "name_expense" =>$this->name_expense,
            "note_expense" =>$this->note_expense,
            "price_expense" =>$this->price_expense,
            "created_at" => $this->created_at->format('y-m-d'),
        ];
    }
}
