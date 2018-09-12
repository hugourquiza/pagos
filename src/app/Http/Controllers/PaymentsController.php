<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Carbon;

class PaymentsController extends Controller
{
    public function index() {
        
        return view('payments',['payments'=>Auth::user()->payments()->get()]
        );
    }
    
    public function new_form() {
        return view('payment_form');
    }
    
    public function create_payment(Request $r) {
        $now=Carbon::now('America/Buenos_Aires');
                
        $this->validate($r,[
            'date_paid'=>'required|date|after_or_equal:'.$now->toDateString(),
            'amount'=>'required|numeric|min:1',
        ]);
        
        $p=new \App\Payment();
        $p->user_id=Auth::user()->id;
        $p->date_paid=$r->input('date_paid');
        $p->amount=$r->input('amount');
        
        $p->save();
        
        return $this->index();
        
    }
}
