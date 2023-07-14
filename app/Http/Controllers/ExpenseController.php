<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    private $expense;

    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
    }

    public function index(){
        return ExpenseResource::collection(
            $this->expense->all()
        );
    }

    public function store(ExpenseRequest $request){
        $expense = $this->expense->create($request->all());

        if($expense){
            $resource = new ExpenseResource($expense);

            return $resource->response()->setStatusCode(201);
        }

        return response(['error'=>'expense wasn´t created'])->setStatusCode(401);
    }
}
