<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $vendors = $this->vendors->map(function ($item) {return $item->id;})->toArray();

        return [
            'id' => $this->id,
            'customer' => new CustomerResource($this->customer),
            'offer' => new OfferResource($this->offer),
            //'vendors' => $this->whenNotNull(VendorResource::collection($this->vendors)),
            'vendors' => $this->whenNotNull($vendors),
            'licenseCount' => $this->whenNotNull($this->license_count),
            'description' => $this->whenNotNull($this->description),
            'creationDate' => $this->whenNotNull($this->creation_date),
        ];
    }
}
