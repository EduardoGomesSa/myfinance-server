<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncomeResource extends JsonResource
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
            'title'=>$this->title,
            'value'=>$this->value,
            'created'=>$this->created_at,
            'remained'=>$this->restExpense($this->expenses, $this->value),
            'expenses'=>ExpenseResource::collection($this->expenses)
        ];
    }

    private function restExpense($expenses, $value){
        $expenseRest = $value;

        foreach($this->expenses as $expense){
            $expenseRest -= $expense->value;
        }

        return $expenseRest;
    }
}
