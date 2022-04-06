<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;


class ApiController extends Controller
{
    public function getAllUsuario() 
    {
        $user = Usuario::get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 200);
    }
  
      public function createUsuario(Request $request) 
      {
        $user = new Usuario;
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->img = $request->img;
        $user->save();
    
        return response()->json([
            "message" => "usuario salvo com sucesso!"
        ], 201);
      }
  
      public function getUsuario($id) 
      {
        if (Usuario::where('id', $id)->exists()) 
        {
            $user = Usuario::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        }
        else 
        {
            return response()->json([
              "message" => "Usuario não Encontrado!"
            ], 404);
        }
      }
  
      public function updateUsuario(Request $request, $id) 
      {
        if (Usuario::where('id', $id)->exists()) {
            $user = Usuario::find($id);
            $user->nome = is_null($request->nome) ? $user->nome : $request->nome;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->password = is_null($request->password) ? $user->password : $request->password;
            $user->phone = is_null($request->phone) ? $user->phone : $request->phone;
            $user->img = is_null($request->img) ? $user->img : $request->img;
            $user->save();
    
            return response()->json([
                "message" => "Atualizado com sucesso!"
            ], 200);
            } else {
            return response()->json([
                "message" => "Usuario não encontrado!"
            ], 404);
            
        }
      }
  
      public function deleteUsuario ($id) 
      {
        if(Usuario::where('id', $id)->exists()) {
            $user = Usuario::find($id);
            $user->delete();
    
            return response()->json([
              "message" => "Registro deletado!"
            ], 202);
          } else {
            return response()->json([
              "message" => "Usuario não encontrado!"
            ], 404);
          }
      }
}
