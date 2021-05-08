<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\followSys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class followSystem extends Controller
{
    public function index(Request $request){
        
        
        $follow = new followSys;
        $follow->id_user = Auth::id();
        $follow->id_followed = $request->idfollow;
        $follow->save();
        return ['data'=>$follow];

    }
    public function unfollow(Request $request){
     //   dd((int)$request->author_id, Auth::id());
        $followed = $request->author_id;
        $user = Auth::id();
        $followedquery = DB::table('followSystems')
            ->where('id_followed','Like',$followed)
            ->where('id_user','Like',$user)
            ->delete();
        return $followedquery;
    }
}
