<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bill = Bill::all();
        return response()->json($bill);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = $request->get('user_id');
        $personnel_id = $request->get('personnel_id');
        $total_ticket = $request->get('total_ticket');
        $total_drink = $request->get('total_drink');
        $total_popcorn = $request->get('total_popcorn');
        $total_combo = $request->get('total_combo');
        $discount_code = $request->get('discount_code');
        $additional_fee = $request->get('additional_fee');
        $total_money = $request->get('total_money');
        $payment_time = $request->get('payment_time');
        $status = $request->get('status');

        $data = [
            'user_code' => $userId,
            'personnal_id' => $personnel_id,
            'total_ticket' => $total_ticket,
            'total_drink' => $total_drink,
            'total_popcorn'=>$total_popcorn,
            'total_combo' => $total_combo,
            'discount_code' => $discount_code,
             'additional_fee' => $additional_fee,
             'total_money' => $total_money,
             'payment_time'=>$payment_time,
             'status' => $status,
        ];

        $newBill = Bill::create($data);
        return response()->json($newBill,["message" =>  "create successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bill = Bill::find($id);
        return response()->json($bill);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bill = Bill::find($id);
        return response()->json($bill);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bill = Bill::find($id);
        $bill->user_code = is_null($request->user_code) ? $bill->user_code : $request->user_code;
        $bill->personnel_id = is_null($request->personnel_id) ? $bill->personnel_id : $request->personnel_id;
        $bill->total_ticket = is_null($request->total_ticket) ? $bill->total_ticket : $request->total_ticket;
        $bill->total_drink = is_null($request->total_drink) ? $bill->total : $request->total_drink;
        $bill->total_popcorn = is_null($request->total_popcorn) ? $bill->total_popcorn : $request->total_popcorn;
        $bill->total_combo = is_null($request->total_combo) ? $bill->total_combo : $request->total_combo;
        $bill->discount_code = is_null($request->discount_code) ? $bill->discount_code : $request->discount_code;
        $bill->additional_fee = is_null($request->additional_fee) ? $bill->additional_fee : $request->additional_fee;
        $bill->total_money = is_null($request->total_money) ? $bill->total_money : $request->total_money;
        $bill->payment_time = is_null($request->payment_time) ? $bill->payment_time : $request->payment_time;
        $bill->status = is_null($request->status) ? $bill->status : $request->status;

        $bill->save();

        return response()->json([
            "message" => "update bill successfully !"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return response()->json([
            "message" => "delete successfully"
        ]);
    }
}
