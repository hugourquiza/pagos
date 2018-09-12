<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

class UsersController extends Controller
{
    public function index() {
        $users=[];
        $favorites=Auth::user()->favorites()->pluck('other_user_id')->toArray();
        
        foreach(\App\User::all() as $u) {
            if(in_array($u->id,$favorites))
                $u->favorite=true;
            else
                $u->favorite=false;
            $users[]=$u;
        }
        return view('users',
                ['users'=>$users]
        );
    }
    
    public function new_form() {
        return view('user_form',['edit'=>false]);
    }
    
    public function edit_form($id) {
        $u=\App\User::with('favorites.other_user')->findOrFail($id);
        
        return view('user_form',[
            'edit'=>true,
            'user'=>$u,
        ]);
    }
    public function create_user(Request $r) {
        
        $this->validate($r,[
            'name'=>'required',
            'email'=>'required|unique:users,email|email',
            'age'=>'required|numeric|min:18',
            'password'=>'confirmed|required|min:5'
        ]);
        
        //if($v->fails())
        //    return redirect()->back()->withInput()->withErrors($v->errors()->toArray());
        
        $u=new \App\User();
        $u->name=$r->input('name');
        $u->email=$r->input('email');
        $u->age=$r->input('age');
        $u->password=bcrypt($r->input('password'));
        $u->save();
            
        return $this->index();
        
    }
    
    public function delete_user($id) {
        \App\User::findOrFail($id)->delete();
        
        return response()->json(['status'=>'ok']);
    }
    
    public function update_user($id,Request $r){
        
        $this->validate($r,[
            'name'=>'required',
            'email' => 'unique:users,email,'.$id.'|email',
            'age'=>'required|numeric|min:18',
            'password'=>'confirmed'
            
        ]);
        $u=\App\User::findOrFail($id);
        
        $u->name=$r->input('name');
        $u->email=$r->input('email');
        $u->age=$r->input('age');
        $u->password=bcrypt($r->input('password'));
        $u->save();
            
        return $this->index();
    }
    
    public function favorite_toogle(Request $r) {
        if($r->json('action')=='add') {
            $f=new \App\Favorites();
            $f->user_id=Auth::user()->id;
            $f->other_user_id=$r->json('user_id');
            
            $f->save();
        } else {
            \App\Favorites::where('user_id',Auth::user()->id)
                    ->where('other_user_id',$r->json('user_id'))->delete();
                    
        }
        
        return response()->json(
                ['status'=>'ok','other_user_id'=>$r->json('user_id')]
        );
    }
}
