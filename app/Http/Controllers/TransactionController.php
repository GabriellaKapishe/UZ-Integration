<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function create(Request $request)
    {
    
        $AUTH_USER =env('AUTH_USER');
        $AUTH_PASS =env('AUTH_PASS');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
        $is_not_authenticated = (
            !$has_supplied_credentials ||
            $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
            $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
        );
        if ($is_not_authenticated) {
            return response()->json([
                "code" => 401,
                "message" => 'You do not have permission to access this resource',
                "data" => []
            ]);
            exit;
        }
        $validator=$this->createValidation($request->all());
        if($validator->fails())
        {
            return response()->json([
                "code"=>400,
                "message"=>'Bad Request',
                "data"=>$validator->errors()->toArray()
            ]);
        }
        try{

            $transaction=new Transaction();
            $transaction->product_type=$request->product_type;
            $transaction->reg_number=$request->reg_number;
            $transaction->amount=$request->amount;
            $transaction->terminal_id=$request->terminal_id;
            $transaction->student_name=$request->student_name;
            $transaction->acquirer_remote_reference=$request->acquirer_remote_reference;
            $transaction->status=$request->status;
            $transaction->payment_channel=$request->payment_channel;
            $transaction->currency=$request->currency;
            $transaction->imei=$request->imei;
            $transaction->pan=$request->pan;
            $transaction->code=$request->code;
            $transaction->description=$request->description;
            $transaction->branch=$request->branch;
            $transaction->teller=$request->teller;
            $transaction->save();
            return response()->json([
              "code"=>200,
              "message"=>"Transaction record successfully saved",
              "data"=>$transaction

            ]);
        }
        catch(Exception  $exception)
        {
            return response()->json([
                "code"=>422,
                "message"=>$exception->getMessage(),
                "data"=>[]
            ]);
        }

     
    }

    protected function createValidation(Array $data)
    {
        return Validator::make($data,[
          'product_type'=>'required',
          'terminal_id'=>'required',
          'reg_number'=>'required',
          'amount'=>'required',   
          'student_name'=>'required',
          'acquirer_remote_reference'=>'required|unique:bank_transactions',
          'status'=>'required',
          'payment_channel'=>'required',
          'currency'=>'required',
          'imei'=>'required',
          'pan'=>'required',
          'code'=>'required',
          'description'=>'required',
          'branch'=>'required',
          'teller'=>'required',
        ]);
    }
}
