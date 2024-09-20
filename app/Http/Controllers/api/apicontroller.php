<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class apicontroller extends Controller
{
    public function register(Request $request)
    {

     try  {
    
     $validateuser = validator::make($request->all(),
     [
        'name'=> 'required',
        'email' => 'required|email|unique:users,email',
        'password'=>'required',
    ]);

    if($validateuser->fails()){
        return response()->json([
            'status'=>false,
            'message'=>'validation error',
            'errors'=> $validateuser->errors()
        ]);
        
    }


     $user= User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
    ]);

    return response()->json([
        'status'=>true,
        'message'=>'user created',
        'token'=> $user->createtoken("API TOKEN")->plaintexttoken
    ]);
} catch(Throwable $th){
    return response()->json([
        'status'=>false,
        'message'=>$th->getmessage(),
        
    ],500);

}

   }

public function  login(Request $request){
    try  {
    
        $validateuser = validator::make($request->all(),
        [
          
           'email' => 'required|email',
           'password'=>'required',
       ]);
   
       if($validateuser->fails()){
           return response()->json([
               'status'=>false,
               'message'=>'validation error',
               'errors'=> $validateuser->errors()
           ]);
           
       }
       if(!auth::attempt($request->only(['email','password']))){
        return response()->json([
            'status'=>false,
            'message'=> 'email & password does not match with our record'
        ]);
        
       }
   
       $user=User::where('email',$request->email)->first();
       return response()->json([
        'status'=>true,
        'message'=>'user login created',
        'token'=> $user->createtoken("API TOKEN")->plaintexttoken
    ]);
       
   } catch(Throwable $th){
       return response()->json([
           'status'=>false,
           'message'=>$th->getmessage(),
           
       ],500);
   
   }
   

}

}
