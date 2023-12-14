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

    public function index(){
        return IncomeResource::collection(
            $this->income->all()->sortDesc()
        );
    }

    public function store(IncomeRequest $request){
        $income = $this->income->create($request->all());

        $resource = new IncomeResource($income);

        return $resource->response()->setStatusCode(201);
    }

    public function update(IncomeRequest $request, $id){
        $income = $this->income->find($id);

        if($income){
            $incomeUpdated = $income->update($request->all());

            if($incomeUpdated){
                return response(['message'=>"income updated with success"], 200);
            }

            return response(['error'=>'error while attempting to update'], 401);
        }

        return response(['error'=>'income not found'], 401);
    }

    public function destroy($id){
        $income = $this->income->find($id);

        if($income){
            $income->delete();

            return response(['message'=>'income deleted with sucess'], 200);
        }

        return response(['error'=>'income not found'], 404);
    }
}
