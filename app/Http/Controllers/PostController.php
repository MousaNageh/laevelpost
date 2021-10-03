<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Ui\Presets\React;

class PostController extends Controller
{
    public function index(){
        // dd(auth()->user()->post()->select("post")->get());

        Mail::to(auth()->user())->send(new PostLiked(Auth::user(),Post::all()->first()));
        return view("posts.index")->with("posts",Post::orderBy("created_at","desc")->with(["user","like"])->paginate(20));
    }
    public function store(Request $request){
        $this->validate($request,[
            "post"=>"required|string"
        ]);
        //we add added user_id in $fillable inside Post Model
        // Post::create([
        //     "post"=>$request->post,
        //     "user_id"=>Auth::user()->id //auth()->id , auth()->user()->id
        // ]);

        //we do not need added user_id in a $fillable  inside Post Model
        // auth()->user()->post()->create([
        //     "post"=>$request->post
        // ]);
        $request->user()->post()->create([
            "post"=>$request->post
        ]);
        return back();
    }
    public function like(Post $post){
        if (!$post->likedBy(auth()->user()->id)){
            $post->like()->create([
                "user_id"=>auth()->user()->id
            ]);
            return back();
        }
        return Response(null,409);

    }
    public function unlike(Request $request,Post $post){
        if ($post->likedBy(auth()->user()->id)){
            // $post->like()->where("user_id",auth()->user()->id)->first()->delete();
            $request->user()->like()->where("post_id",$post->id)->delete();
            return back();
        }
        return Response(null,409);

    }
    public function destory(Request $request,Post $post){
        //  if ($post->ownedBy($request->user()->id)){
        //     $post->delete();
        //     return back();
        //  }
        //  return Response(null,401);
        $this->authorize("delete",$post);
        $post->delete();
    }

}