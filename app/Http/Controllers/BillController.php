<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use App\Http\Resources\BillResource;
use App\Models\Bill;

class BillController extends Controller
{
    protected $bill;

    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    public function index(){
        return BillResource::collection(
            $this->bill->all()
        );
    }

    public function store(BillRequest $request){
        $billExist = $this->bill->where('name', $request->name)->first();

        if($billExist==null){
            $bill = $this->bill->create($request->all());

            if($bill){
                $resource = new BillResource($bill);

                return $resource->response()->setStatusCode(201);
            }

            return response(['error'=>'bill wasn´t created'])->setStatusCode(401);
        }

        $resource = new BillResource($billExist);

                return $resource->response()->setStatusCode(200);
    }

    public function update($id, BillRequest $request){
        $billExist = $this->bill->find($id);

        if($billExist){
            $billExist->update($request->all());

            return response(['message'=>'bill updated with success'])->setStatusCode(201);
        }

        return response(['error'=>'bill not found'])->setStatusCode(404);
    }

    public function destroy($id){
        $billExist = $this->bill->find($id);

        if($billExist){
            $billExist->delete();

            return response(['message'=>'bill deleted with success'])->setStatusCode(200);
        }

        return response(['error'=>'bill not found'])->setStatusCode(404);
    }
}
