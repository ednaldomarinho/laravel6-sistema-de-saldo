<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MoneyValidationFormRequest;

class BalanceController extends Controller
{
    public function index()
    {
        $name = auth()->user()->name;
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;
        return view('admin.balance.index',compact('amount', 'name'));   
    }

    public function deposit()
    {
        return view('admin.balance.deposit');   
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);
        if($response['success']):
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        endif;
        return redirect()
            ->back()
            ->with('error', $response['message']);
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');  
    }

    public function withdrawStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);
        if($response['success']):
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        endif;
        return redirect()
            ->back()
            ->with('error', $response['message']);
    }
}
