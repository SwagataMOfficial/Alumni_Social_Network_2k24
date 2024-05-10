<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Userpost;
use Illuminate\Http\Request;
use App\Models\Support;

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

        Userpost::create($createArr);
        return redirect()->back();
    }

    public function addjobpost(Request $request) {
        $createArr = $request->all();

        if (array_key_exists('_token', $createArr)) {
            // Removing the resume from the associative array as it is not necessary in case of creating new post
            unset($createArr['_token']);
        }

        $createArr['posted_by'] = session()->get('user_id');

        Userpost::create($createArr);
        return redirect()->back();
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
        return redirect()->back();
    }

    public function add_comment(Request $request) {
        $post = Userpost::find($request->input('post_id'));
        $post->comment_count += 1;
        $post->save();
        Comment::create([
            'post_id' => $request->input('post_id'),
            'posted_by' => session()->get("user_id"),
            'comment' => $request->input('comment'),
        ]);
        return redirect()->back();
    }
    public function delete_comment($id) {
        $comment = Comment::find($id);
        $post = Userpost::find($comment->post_id);
        $post->comment_count -= 1;
        $res1 = $post->save();
        $res2 = $comment->delete();
        return redirect()->back();
    }

    public function report_post(Userpost $id){
        $id->reported_at = now();
        if($id->save()){
            return response()->json(['success' => true, 'message' => 'Content reported successfully'], 200);
        }
        else{
            return response()->json(['success' => false, 'message' => 'Failed to report the content'], 422);
        }

    }
    //for user suppor query to submit in supports database
    public function saveSupportQuery(Request $request)
    {
        $query = $request->input('query');
        $studentId = $request->input('student_id');

        // Save the query to the database
        Support::create([
            'student_id' => $studentId,
            'query' => $query
        ]);

        return response()->json(['message' => 'Query submitted successfully!']);
    }

    public function delete_post(Userpost $id){
        $res = $id->delete();
        if($res){
            return response()->json(['success' => true, 'message' => 'Your post has been deleted successfully!'], 200);
        }
        else{
            return response()->json(['success' => false, 'message' => 'Failed to delete the post'], 422);
        }
    }
}
