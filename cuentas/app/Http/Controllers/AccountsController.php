<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /* $data=Account::select(["accounts.*",
         "users.name as nombre"])->join("users","users.id","=","accounts.user_id")
         ->get();*/

         $data=Account::with(["user"])
         ->where("user_id",Auth::user()->id)
         ->get();

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
            "name"=>"required|string|min:2",
            "amount"=>"required|numeric",
            "status"=>"required",
            "user_id"=>"required"
        ]);
        $validate['user_id']=Auth::user()->id;
        $data = Account::create($validate);
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
        $data = Account::find($id);
        if($data){
            return response()->json([
                "status"=>"ok", 
                "message"=>"Cuenta encontrada",
                "data"=>$data   
                
            ]);
           
        } return response()->json([
                "status"=>"error", 
                "message"=>"Cuenta no encontrada"
            ],400);    }

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
            "name"=>"required|string|min:2",
            "amount"=>"required|numeric",
            "status"=>"required",
            "user_id"=>"required"
        ]);
        $data = Account::findOrFail($id);
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
        $data = Account::find($id);
        if($data){
            $data->delete();
           
        } return response()->json([
                "status"=>"ok", 
                "message"=>"Cuenta eliminada exitosamente"
            ]);
    }
    public function changeStatus(Request $request)
    {
        $data = Account::find($request->id);
        if($data){
            $data->status = $request->status;
            $data->save();          
        } 
        return response()->json ([
                "status"=>"ok",
                "message"=>"Estado de la cuenta actualizado exitosamente",
                "data"=>$data
            ]);
    }
}
