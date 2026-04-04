<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseOrderResource extends JsonResource
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
            "id_contact_supplier" => $this->id_contact_supplier,
            "contact" =>$this->whenloaded("contact"),
            "name_purchase_order" =>$this->name_purchase_order,
            "status" =>$this->status,
            "date_purchase_order" => $this->date_purchase_order->format('y-m-d'),
            "notes_purchase_orders" =>$this->notes_purchase_orders,
            "created_at" => $this->created_at->format('y-m-d'),
        ];

    }
}
