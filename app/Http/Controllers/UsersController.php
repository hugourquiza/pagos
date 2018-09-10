<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        return view('users',
                ['users'=>\App\User::all()]
        );
    }
    
    public function new_form() {
        return view('user_form',['edit'=>false]);
    }
    
    public function edit_form($id) {
        return view('user_form',['edit'=>true,'user'=>\App\User::findOrFail($id)]);
    }
    public function create_user(Request $r) {
        $u=new \App\User();
        
        if($u->validate($r->all())) {
            $u->name=$r->name;
            $u->email=$r->email;
            $u->age=$r->age;
            
            $u->save();
            
            return $this->index();
        } else {
            return $this->new_form();
        }
    }
    
    public function delete_user($id) {
    
    }
    
    public function update_user($id,Request $r){
        
    }
}
