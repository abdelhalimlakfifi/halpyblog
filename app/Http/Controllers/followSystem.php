<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\followSys;
use Illuminate\Support\Facades\Auth;

class followSystem extends Controller
{
    public function index(Request $request){
        
        $follow = new followSys;
        $follow->id_user = Auth::id();
        $follow->id_followed = $request->idfollow;
        $follow->save();
        return ['data'=>$follow];

    }
}
