<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscirptionController extends Controller
{
    public function index(Request $request){

        $sub = new Subscription;
        $sub->Email = $request->submail;
        // dd($sub);
        $sub->save();
        return ['data'=>$sub];
    }
}
