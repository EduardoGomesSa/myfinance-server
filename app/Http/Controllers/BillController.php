<?php

namespace App\Http\Controllers;

use App\Http\Resources\BillResource;
use App\Models\Bill;
use Illuminate\Http\Request;

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
}
