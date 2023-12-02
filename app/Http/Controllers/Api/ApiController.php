<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiPostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //Get Menus
    function getMenus()
    {
        $menus = Category::all();
        return response()->json(['success' => true,'data' => $menus]);
    }

    //Get Posts
    function getPosts()
    {
        $posts = Post::all();
        // return response()->json(['success' => true, 'data' => $posts]);
        return ApiPostResource::collection($posts);

        //Get Post By ID
        function getPostById($id)
        {
            $post =Post::find($id);
            return new ApiPostResource($post);
        }
    }
}
