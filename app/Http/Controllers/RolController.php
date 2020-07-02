<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Rol;

class RolController extends Controller
{
    public function getAll(){
        $rol = Rol::all();
        return $rol;
    }

    public function add(Request $request){
        $rol = Rol::create($request->all());
        return $rol;
    }

    public function get($id){
        $rol = Rol::find($id);
        return $rol;
    }

    public function edit($id, Request $request){
        $rol =$this->get($id);
        $rol->fill($request->all())->save();
        return $rol;
    }

    public function delete($id){
        $rol = $this->get($id);
        $rol->delete();
        return $rol;
    }

    public function getNameRol(){
        $datos = DB::select('
          select "rol".rol
          from public."rol"');
        return $datos;
    }
}
