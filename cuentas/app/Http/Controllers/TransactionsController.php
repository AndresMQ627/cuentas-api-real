<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Transaction::with(["category","account"])->get();
        return response()->json([
            "status"=>"ok", 
            "data"=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            "amount"=>"required|numeric",
            "type"=>"required|string",
            "description"=>"required|string",
            "user_id"=>"required",
            "category_id"=>"required",
            "account_id"=>"required",
        ]);
        $data = Transaction::create($validate);
        return response()->json([
            "status"=>"ok", 
            "message"=>"Cuenta creada exitosamente",
            "data"=>$data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Transaction::find($id);
        if($data){
            return response()->json([
                "status"=>"ok", 
                "message"=>"Cuenta encontrada",
                "data"=>$data   
                
            ]);
           
        } return response()->json([
                "status"=>"error", 
                "message"=>"Cuenta no encontrada"
            ],400);      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate=$request->validate([
            "amount"=>"required|numeric",
            "type"=>"required|string",
            "description"=>"required|string",
            "user_id"=>"required",
            "category_id"=>"required",
            "account_id"=>"required",
        ]);
        $data = Transaction::findOrFail($id);
        $data->update($validate);
        //$data = Account::create($validate);
        return response()->json([
            "status"=>"ok", 
            "message"=>"Cuenta actualizado exitosamente",
            "data"=>$data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transaction::find($id);
        if($data){
            $data->delete();
           
        } return response()->json([
                "status"=>"ok", 
                "message"=>"Cuenta eliminada exitosamente"
            ]);
    }
}
