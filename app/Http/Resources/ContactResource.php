<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            "name_contact" => $this->name_contact,
            "number_contact" => $this->number_contact,
            "addres_contact" => $this->addres_contact,
            "number_account_contact" => $this->number_account_contact,
            "id_securitas" => $this->id_securitas,
            "securitas" => $this->whenLoaded('securitas'),
        ];
    }
}
