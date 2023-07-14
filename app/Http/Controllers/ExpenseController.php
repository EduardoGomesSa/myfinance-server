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

    public function update($id, ExpenseRequest $request){
        $expenseExist = $this->expense->find($id);

        if($expenseExist){
            $expenseExist->update($request->all());

            return response(['message'=>'expense updated with success'])->setStatusCode(200);
        }

        return response(['message'=>'expense not fount'])->setStatusCode(404);
    }

    public function destroy($id){
        $expenseExist = $this->expense->find($id);

        if($expenseExist){
            $expenseExist->delete();

            return response(['message'=>'expense deleted with success'])->setStatusCode(200);
        }

        return response(['message'=>'expense not fount'])->setStatusCode(404);
    }
}
