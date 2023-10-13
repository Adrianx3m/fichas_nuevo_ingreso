<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postSignup(Request $request)
    {
         $this->validate($request,[
             'name' => 'name|required',
             'email'=> 'email|required|unique:users',
             'password'=>'required|min:8' 
 
         ]);
 
 
         $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request-> input('email'),
            'password'=> Crypt::encrypt($request-> input('password'))
 
         ])->assignRole("aspirante");
 
         $user->save();
         return $user;
 
     }
     public function getAllUsers(){
       $usuarios = User::get();
       $datos = array();

       foreach($usuarios as $row){
        $id = $row->id;
        $usua = $row->name;
       $corr = $row->email;
      
       
       $datos[] = array(
        'id'=>$id,
        'usuario'=>$usua,
        'correo'=>$corr
       );
       }

        $query = "SELECT users.id, users.name as usuario, users.email as correo FROM users WHERE id >= 2";
        $data = DB::select($query);
       return json_encode($data);
     }

     public function updatePassword(Request $request, $program){
        $usuarios = User::find($program);
      
        $usuarios->password = bcrypt($request->password);
       
        $usuarios->update();
        return $usuarios;
     }
}
