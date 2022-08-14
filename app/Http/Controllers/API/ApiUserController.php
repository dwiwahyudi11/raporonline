<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ApiUserController extends Controller
{
    public function login(Request $request){

        // dd($request->all());die();
        $users = DB::table('users')
                  ->join('model_has_roles','users.id', '=', 'model_has_roles.model_id')
                  ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')        
                  ->select('users.*','roles.name as role')
                  ->where('email',$request->email)
                  ->first();  
        //Users::where('email',$request->email)->first();
 
        if($users){
 
            if(password_verify($request->password, $users->password)){
                 return response()->json([
                     'success' => 1,
                     'massage' => 'Berhasil Memuat Data '.$users->name,
                     'users' => $users
                 ]);
             }
             return $this->error('Password Salah');
 
         }
         return $this->error('Email Tidak Terdaftar');
     }
 
     public function register(Request $request){
         //name, email, password
 
         $validasi = Validator::make($request->all(),[
             'name' => 'required',
             'email' => 'required|unique:users',
             'password' => 'required|min:6'
 
         ]);
 
         if($validasi->fails()){
             $val = $validasi->errors()->all();
             return $this->error($val[0]);
         }
 
         $users = Users::create(array_merge($request->all(),[
             'password' => bcrypt($request->password)
         ]));
         
         if($users){
             return response()->json([
                 'success' => 1,
                 'massage' => 'Register Berhasil',
                 'user' => $users
             ]);
         }
         return $this->error('Registrasi Gagal');   
     }
 
     public function error($pesan){
         return response()->json([
             'success' => 0,
             'massage' => $pesan
         ]);
     }
    
}
