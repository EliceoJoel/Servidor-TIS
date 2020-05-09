<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    public function getAll(){
        $permission = Permission::all();
        return $permission;
    }

    public function add(Request $request){
        $permission = Permission::create($request->all());
        return $permission;
    }

    public function get($id){
        $permission = Permission::find($id);
        return $permission;
    }

    public function edit($id, Request $request){
        $permission =$this->get($id);
        $permission->fill($request->all())->save();
        return $permission;
    }

    public function delete($id){
        $permission = $this->get($id);
        $permission->delete();
        return $permission;
    }
}
