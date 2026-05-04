<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseTripResource extends JsonResource
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
            "note_purchase_trip" => $this->note_purchase_trip,
            "id_purchase_order" => $this->id_purchase_order,
            "purchase_order" =>$this->whenloaded("purchase_order"),
            "price_per_kg" =>$this->price_per_kg,
            "weight_gross" =>$this->weight_gross,
            "total_paid" =>$this->total_paid,
            "total_bag_purchase_product" =>$this->total_bag_purchase_product,
            'date_purchase_trip' => $this->date_purchase_trip?->format('Y-m-d'),
            "location_trip" =>$this->location_trip,
            "created_at" => $this->created_at->format('y-m-d'),
        ];
    }
}
