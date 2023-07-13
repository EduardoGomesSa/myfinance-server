<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExpenseResource;
use App\Models\Expense;

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
}
