<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleProductResource extends JsonResource
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
            "id_contact_buyer" => $this->id_contact_buyer,
            "buyer" =>$this->whenloaded("buyer"),
            "name_sale_product" =>$this->name_sale_product,
            "grand_total" =>$this->grand_total,
            'date_sale_product' => $this->date_sale_product
                ? \Carbon\Carbon::parse($this->date_sale_product)->format('Y-m-d')
                : null,
            "created_at" => $this->created_at->format('y-m-d'),
        ];
    }
}
