<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userpost;
use Illuminate\Http\Request;

class ProfileController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function view_page($any, $id) {   // $any is nothing but the variable to allow app use the any routing

        // getting all the user data from users table
        $user = User::where("remember_token", "=", $id)->first();

        // getting all the images posted by the user from the user_posts table and also filtering the non image posts
        $postedImages = Userpost::select('attachment')->where('posted_by', '=', $user->student_id)->where('attachment', '!=', null)->get()->toArray();

        // getting all the posts of the user to display it in the profile page

        $posts = Userpost::with('getUser')->with("getLikedUser")->where('posted_by', '!=', session()->get('user_id'))->where('visibility', '!=', '0')->orderBy('created_at', 'desc')->get()->toArray();
        // echo "<pre>";
        // print_r($posts);
        // die;

        // generating an array for the images only
        $imgArr = [];

        foreach ($postedImages as $img) {

            // if multi post found then the below if-else block will run and prepare the array
            if(strpos($img['attachment'], "||") != false){
                foreach (explode("||", $img['attachment']) as $item) {
                    array_push($imgArr, $item);
                }
            }
            else{   
                array_push($imgArr, $img['attachment']);
            }
        }

        $data = compact("user", "imgArr", "posts");
        return view('profiles')->with($data);
    }

    public function view_settings($any, $id) {   // $any is nothing but the variable to allow app use the any routing
        return view('settings');
    }

    public function view_search(Request $request) {
        // TODO: uncomment this lines
        $search = $request->search;
        $user = User::where("name", "LIKE", "%$search%")->get()->toArray();
        // $data = compact("user");
        // return view("[add a view]")->with($data); 

        echo "Searching for: " . $request->search;
        echo "<h1>Result:</h1>";
        echo "<br>";
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }

    public function view_edit() {
        $user = User::where("student_id", '=', session()->get('user_id'))->first();
        return view('profile_edit')->with(compact('user'));
    }

    public function save_changes(Request $request) {
        // creating an array to update
        $updateArr = $request->all();

        // fetching the pre existing user's data
        // EXPLANATION: if user has uploaded certificates previously then it should be apended otherwise the files will be replaced!
        $user = User::find(session()->get('user_id'))->toArray();

        // Check if the key exists in the array before removing it and remove it if it is existing
        if (array_key_exists('_token', $updateArr)) {
            // Removing the _token from the associative array as it is not necessary in case of updating
            unset($updateArr['_token']);
        }
        if (array_key_exists('cover_picture', $updateArr)) {
            // Removing the cover_picture from the associative array as it's name will be generated by the system and only the name will be stored!
            unset($updateArr['cover_picture']);
        }
        if (array_key_exists('profile_picture', $updateArr)) {
            // Removing the profile_picture from the associative array as it's name will be generated by the system and only the name will be stored!
            unset($updateArr['profile_picture']);
        }
        if (array_key_exists('verification_document', $updateArr)) {
            // Removing the verification_document from the associative array as it's name will be generated by the system and only the name will be stored!
            unset($updateArr['verification_document']);
        }
        if (array_key_exists('resume', $updateArr)) {
            // Removing the resume from the associative array as it's name will be generated by the system and only the name will be stored!
            unset($updateArr['resume']);
        }
        if (array_key_exists('certificates', $updateArr)) {
            // Removing the certificates from the associative array as it's name will be generated by the system and only the name will be stored!
            unset($updateArr['certificates']);
        }

        // cover photo update handling
        $file = $request->file('cover_picture');
        if (isset($file)) {
            $filename = session()->get('user_id') . "/profile/cover" . '.' . $request->file('cover_picture')->getClientOriginalExtension();
            $request->file('cover_picture')->storeAs('/', $filename, 'public');
            $updateArr['cover_picture'] = $filename;
        }

        // profile photo update handling
        $file = $request->file('profile_picture');
        if (isset($file)) {
            $filename = session()->get('user_id') . "/profile/avatar" . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $request->file('profile_picture')->storeAs('/', $filename, 'public');
            $updateArr['profile_picture'] = $filename;
        }

        // verification document update handling
        $file = $request->file('verification_document');
        if (isset($file)) {

            // generating filename
            $filename = session()->get('user_id') . "/verification_document/verify_doc" . '.' . $request->file('verification_document')->getClientOriginalExtension();
            $request->file('verification_document')->storeAs('/', $filename, 'public');
            $updateArr['verification_document'] = $filename;
        }

        // resume update handling
        $file = $request->file('resume');
        if (isset($file)) {

            // generating filename
            $filename = session()->get('user_id') . "/resume/resume" . '.' . $request->file('resume')->getClientOriginalExtension();
            $request->file('resume')->storeAs('/', $filename, 'public');
            $updateArr['resume'] = $filename;
        }


        // certificates update handling [multiple file input supported]
        $file = $request->file('certificates');
        if (isset($file)) {
            $file_arr = [];
            foreach ($request->file('certificates') as $index => $file) {

                // generating array for filename
                $file_to_store = session()->get('user_id') . "/certificates/" . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                array_push($file_arr, $file_to_store);

                // uploading individual certificates
                $file->storeAs('/', $file_to_store, 'public');
            }

            // generating filename
            $filename = implode("||", $file_arr);

            // if user has already uploaded any certificates then the new files should be appended at the end
            // FORMAT: prefile.ext + || + newfiles.....
            if ($user['certificates']) {
                $filename = $user['certificates'] . "||" . $filename;
            }
            $updateArr['certificates'] = $filename;
        }

        // temp code to verify
        // echo "<pre>";
        // print_r($updateArr);
        // echo "</pre>";

        // this code below automatically updates the user data according to the form that is submitted
        $result = User::find(session()->get('user_id'))->update($updateArr);

        // preparating json response
        // TODO: uncomment this lines
        // if ($result) {
            // return response()->json(['success' => true, 'message' => 'Profile Updated Successfully'], 200);
        // }
        // else {
        //     return response()->json(['success' => false, 'message' => 'Failed to update profile'], 422);
        // }

        return redirect(route('profile.edit'));
    }

    public function toggleVisibility(Request $request)
    {
        $studentId =  session()->get('user_id');
        $visibility = $request->input('profile_visibility');


        $user = User::where('student_id', $studentId)->first();

        if ($user) {
            $user->profile_visibility = $visibility;
            $user->save();
            return response()->json(['success' => true,'message' => 'Privacy Update']);//thi sis shobhan
        } else {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);//this is altab
        }
    }
}
