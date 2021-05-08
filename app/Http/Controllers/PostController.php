<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\post;
use App\Models\User;
use App\Models\Subscription;
use App\Models\followSys;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $posts = post::all();
        $users = User::all();
        return view('welcome',["posts"=> $posts]);
    }

    public function Create(){
        if(Auth::check()){
            return view('pages.createArticle');
        }
        return redirect('/login');
    }
    public function store(Request $request){
        $datas = Subscription::all();
        $request->validate([
           'title'=>'required',
           'article'=>'required',
           'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $newImagename = uniqid().'-'.str_replace(" ","-",$request->title).'.'.$request->image->extension();
        $request->image->move(public_path('Blog_images'), $newImagename);
       
        $post = new post();
        $post->Title = $request->title;
        $post->article = $request->article;
        $post->user_id = Auth::id();
        $post->img_path = $newImagename;
        $post->save();


        $details = [
            'title' => $request->title,
            'body' => $request->article,
            'id' => $post->id
        ];
        foreach($datas as $data){
            \Mail::to($data['Email'])->send(new \App\Mail\Subscription($details));
        }
        return redirect('/');
    }

    public function Articles(){
        if(!(Auth::check())){
            return redirect('/');
        }

        $articles = post::where('user_id', Auth::id())->get();
        return view('pages.myarticles',["posts" => $articles]);
    }

    public function read(Request $request){
        
        $article = post::where('id', $request->id)->get();
        $user = Auth::id();
        $followed = $article[0]->user_id;

        $ifFollowed = DB::table('followSystems')
                        ->where('id_followed','Like',$followed)
                        ->where('id_user','Like',$user)
                        ->count();
        
        //dd($user, $followed);
        
        
        $author = User::where('id', $article[0]->user_id)->get();
        $latest = post::orderBy('created_at','desc')->limit(3)->get();
        return view('pages.article',["post" => $article, "name" => $author, "latests" => $latest, "ifFollowed"=>$ifFollowed]);
    }
}
