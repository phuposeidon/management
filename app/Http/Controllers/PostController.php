<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function listCategory() {
        $allCategory = Category::all();
        return view('admin.management.posts.listCate', ['allCategory' => $allCategory]);
    }

    public function addCategory(Request $request) {
        $category = new Category;
        $category->name = $request->category;
        $category->save();
        if($category->save()){
			echo true;
		}else{
			echo false;
		}
    }

    public function listPost($id) {
        $allPosts = Post::where('categoryId',$id)->orderBy('createdAt', 'desc')->get();
        return view('admin.management.posts.listPost', ['allPosts' => $allPosts]);
    }

    public function getAdd() {
        $allCategory = Category::all();
        return view('admin.management.posts.add',['allCategory' => $allCategory]);
    }

    public function postAdd(Request $request) {
        //dd($request->all());
        $post = new Post;
        $post->userId = $request->userId;
        $post->name = $request->name;
        $post->content = $request->content;
        $post->categoryId = $request->categoryId;
        if($request->avatar) {
			$destinationPath = 'img/post/';
			$file = $request->avatar;
			$file_extension = $file->getClientOriginalExtension(); //Get file original name
			$file_name =  "post_".str_random(4). "." . $file_extension;
			$file->move($destinationPath , $file_name); 
			$post->avatar = $file_name;
		}
		else {
			$post->avatar = 'img/post/user-default.png';
		}
        $post->save();
        return redirect()->back();
    }

}
