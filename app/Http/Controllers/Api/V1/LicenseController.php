<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\License;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class LicenseController extends Controller
{
    public function validateToken(Request $request){
      
        $validator = Validator::make($request->all(), [
            'key_token' => 'required|string'
        ]);

        if ($validator->fails()) {
            $arrayError = $validator->errors()->all();
            return response()->json(['status'=>'failed','message' => $arrayError]);
        }else{

            $license = License::where('key_token',$request->all())->first();
       
            if($license){
                 if($license->beuse == $license->count){
                     $message = 'this token is dispire';
                     return response()->json(['status'=>'failed','message' => $message]);
                 }
                 $license->update(['count'=> $license->count+1 ]);
                 if($license){
                     $message = 'token is valide';
                     return response()->json(['status'=>'success','message' => $message]);
                 }else{
                     $message = 'this token is invalid';
                     return response()->json(['status'=>'failed','message' => $message]);
                 }
            }else{
             $message = 'this token is invalid';
             return response()->json(['status'=>'failed','message' => $message]);

        }
       
      
           
       }
        
    }
}
