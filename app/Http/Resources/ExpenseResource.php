<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'value'=>$this->value,
            'income_id'=>$this->income_id,
            'bill_id'=>$this->bill_id,
            'created_at' => $this->created_at,
        ];
    }
}
