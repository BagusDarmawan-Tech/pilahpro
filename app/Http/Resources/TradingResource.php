<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TradingResource extends JsonResource
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
            "name_trading" =>$this->name_trading,
            "grand_total" =>$this->grand_total,
            'trading_date' => $this->trading_date
                ? $this->trading_date->format('Y-m-d')
                : null,

            "created_at" => $this->created_at
                ? $this->created_at->format('Y-m-d')
                : null,
                    ];
    }
}
