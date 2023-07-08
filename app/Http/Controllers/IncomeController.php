<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Http\Resources\IncomeResource;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    private $income;

    public function __construct(Income $income)
    {
        $this->income = $income;
    }

    public function store(IncomeRequest $request){
        $income = $this->income->create($request->all());

        $resource = new IncomeResource($income);

        return $resource->response()->setStatusCode(201);
    }
}
