<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Userpost;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function addpost(Request $request) {
        $createArr = $request->all();

        if (array_key_exists('_token', $createArr)) {
            // Removing the resume from the associative array as it is not necessary in case of creating new post
            unset($createArr['_token']);
        }
        if (array_key_exists('post_image', $createArr)) {
            // Removing the posted image from the associative array as it is not necessary in case of creating new post, the value of this key will be the filename which is system generated
            unset($createArr['post_image']);
        }

        // adding the file upload functionality only if any image is posted
        if (array_key_exists('post_image', $request->all())) {
            $file_arr = [];

            // Saving post automatically
            foreach ($request->file('post_image') as $index => $file) {

                $file_to_store = session()->get('user_id') . "/uploads/" . time() . '_' . $index . '.' . $file->getClientOriginalExtension();

                // storing individual post item
                $file->storeAs('/', $file_to_store, 'public');

                array_push($file_arr, $file_to_store);
            }

            $filename = implode("||", $file_arr);
            echo $filename;
            // adding the filename into the create array
            $createArr['attachment'] = $filename;
        }

        $createArr['posted_by'] = session()->get('user_id');

        // TODO: save the filename into database and the file into the desired folder
        Userpost::create($createArr);
        return redirect(route('feed'));
    }

    public function likepost(Request $request) {

        // fetching data from the like table if data not exists then like the post otherwise unlike the post
        $like = Like::where('post_id', '=', $request->input('post_id'))->where('liked_by', '=', session()->get('user_id'))->get()->toArray();

        // if the above query is null that means user is trying to like a post otherwise user want to unlike the post
        if (count($like) == 0) {
            // incrementing like count in user_posts table
            $post = Userpost::find($request->input('post_id'));
            $post->likes += 1;
            $post->save();

            // saving the liked user into the likes table to prevent user from liking the post again.
            Like::create([
                'post_id' => $request->input('post_id'),
                'liked_by' => session()->get('user_id')
            ]);
        }
        else {

            // decrementing the like count
            $post = Userpost::find($request->input('post_id'));
            $post->likes -= 1;
            $post->save();

            // removing the liked data in the liked table
            $id = $request->input('like_id');
            if(isset($id)){
                $likedPost = Like::find($id);
                $likedPost->delete();
            }
        }

        return redirect(route('feed'));
    }

}
