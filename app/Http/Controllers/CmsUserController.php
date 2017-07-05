<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CmsUser;
use App\ModPaciente;

class CmsUserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $paciente = ModPaciente::where('cedula','=',$request->get('cedula'))->first();
    //$usuario = CmsUser::where('email','=',$request->get('email'))->first();
    $response = false;
    //**
    // Revision de la cedula
    //  */
    if($paciente->cms_user_id == null){ // el paciente ya tiene una cuenta de usuario

      try {
        //-->crear nuevo
        $usuario = new CmsUser;
        $usuario->name = $request->get('SUnombre');
        $usuario->photo = null;
        $usuario->email = $request->get('SUemail');
        $usuario->password = bcrypt($request->get('SUPassword'));
        $usuario->id_cms_privileges = 3;
        $usuario->save();// si el usuario se guarda correctamente
        //-->actualizar id del paciente
        // Existe el paciente?
        if(count($paciente) > 0) {
          //si-->tomar paciente
        }else {
          //no-->crear nuevo
          $paciente = new ModPaciente;
          $paciente->cedula = $request->get('cedula');
          $paciente->nombre = $request->get('SUnombre');
          $paciente->email = $request->get('SUemail');
          $paciente->save();
        }
        $paciente->cms_user_id = $usuario->id;
        $paciente->save();
        $response = true;

      }
      catch(\Exception $e){
        // do task when error
        $error = $e->getMessage();
        if(strpos($error,'1062')){ // si es error 1062 duplicate constraint
          $response ="duplicate";
        }
      }
    }else {
      $response = "existe";
    }

    return response()->json([
      "response"=>$response
    ]);
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
  
}
