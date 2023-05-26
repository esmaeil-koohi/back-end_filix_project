<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{


    public function createNewComment(Request $request)
    {


        if($request->privilege < 1){
            return response()->json(['message' => "وارد کردن  امتیاز الزامی می باشد."],500);
        }

        Comment::create([
            'movie_item_id' => $request->movie_item_id,
            'user_id' => auth()->user()->id,
            'privilege' => $request->privilege,
            'comment' => $request->comment,
            'hidden_comment' => $request->hidden_comment,
        ]);

        return response()->json(['message' => "با موفقیت ارسال شد"]);
    }
}
