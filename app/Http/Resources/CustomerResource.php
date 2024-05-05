<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $order = $this->orders->isNotEmpty();
        return [
            'id' => $this->id,
            'siren' => $this->siren,
            'siret' => $this->siret,
            'legalName' => $this->legal_name,
            'creationDate' => $this->whenNotNull($this->creation_date),
            'canDelete' => !$order,
        ];
    }
}
