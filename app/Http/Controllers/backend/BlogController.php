<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    function create(){
        return view('backend.blog.create');
    }
    function index(){
         $posts = Blog::where('user',Auth::user()->name)->get();
        return view('backend.blog.index',compact('posts'));
    }
    private function BlogPost($blog,$request){
      $blog->title = $request->title;
      $blog->detail = $request->detail;
      $blog->user = Auth::user()->name;
      $blog->save();
    }
    function store(Request $request){


        //validation
           $request->validate(
              [
                'title' => 'required|max:50',
                'detail' => 'required|min:5|max:500'
              ],
              [
                'title.required' => 'title daw',
                'title.max' => 'ár kot '
              ]
           );
      //end validation

      //db insert
      $blog = new Blog();
      $this->BlogPost($blog,$request);
      return back()->with('success','Post insert successfully');
    }
    function edit($id){
        $post = Blog::findOrFail($id);
        return view('backend.blog.edit',compact('post'));
    }
    function update(Request $request,$id){
        //validation
        $request->validate(
            [
              'title' => 'required|max:50',
              'detail' => 'required|min:5|max:500'
            ],
            [
              'title.required' => 'title daw',
              'title.max' => 'ár kot '
            ]
         );
    //end validation
         $post = Blog::find($id);
         $this->BlogPost($post,$request);
         return redirect()->route('post.all')->with('success','post succesfully updated');
    }
    function destroy($id){
        $post= Blog::find($id);
        $post->delete();
        return back();
    }
}
