<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EnvironmentStock extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           "environment" => $this->environment,
           "floor_id"=>$this->floor_id,
           "elements"=>$this->elements,
        ];
    }
}
