<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\LoginCheck;
use App\Http\Middleware\SubAdminAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;// remove login check middleware from globally to locally for other middleware should work properly eg. admin and sub admin middle ware otherwise it will conflict
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\ProfileController;

Route::middleware([LoginCheck::class])->group(function () {
 
    Route::get('/', [UserController::class, 'index']);
    Route::get("/feed", [ViewsController::class, "index"])->name('feed');
    Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');
    Route::post('/addpost', [PostController::class, 'addpost'])->name('post.add');
    Route::post('/addjobpost', [PostController::class, 'addjobpost'])->name('post.addjob');
    Route::post('/like', [PostController::class, 'likepost'])->name('post.like');
    Route::get('/post/report/{id}', [PostController::class, 'report_post'])->name('post.report');

    Route::group(['prefix' => "/comments"], function(){ 
        Route::post('/add', [PostController::class, 'add_comment'])->name('comments.add');
        Route::delete('/delete/{id}', [PostController::class, 'delete_comment'])->name('comments.delete');
    });

    Route::group(['prefix' => "/notification"], function(){ 
        Route::get('/read/{id}', [NotificationsController::class, 'mark_read'])->name('notification.read');
        Route::get('/delete/{id}', [NotificationsController::class, 'delete'])->name('notification.delete');
        Route::get('/check-new', [NotificationsController::class, 'checkNew'])->name('notification.checkNew');
    });

    // common navigation views
    Route::get("/friends", [ViewsController::class, "friends"])->name('friends');
    Route::get("/messages", [ViewsController::class, "messages"])->name('messages');
    Route::get("/notifications", [ViewsController::class, "notifications"])->name('notifications');
    Route::get("/settings", [ViewsController::class, "view_settings"])->name('settings');
    Route::get("/results", [ProfileController::class, 'view_search'])->name('search.results');

    // grouped routes [ the url should start with /profile]
    Route::group(['prefix' => '/profile'], function () {
        Route::get("/edit", [ProfileController::class, 'view_edit'])->name('profile.edit');
        Route::post("/edit", [ProfileController::class, 'save_changes'])->name('profile.savechanges');
        Route::post("/togglevisibility", [ProfileController::class, 'toggleVisibility'])->name('profile.visibility');
        Route::get("/{user_token}", [ProfileController::class, "view_page"]);
        Route::get('/search', [ProfileController::class, 'view_search'])->name('profile.search');
        Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
     
    });

    // friend routes [grouped]
    Route::group(['prefix' => '/friends'], function () {
        Route::get('/accept/{token}/{id}', [FriendsController::class, 'accept_friend'])->name('friend.accept');
        Route::get('/reject/{token}/{id}', [FriendsController::class, 'reject_request'])->name('friend.reject');
        Route::get('/send-request/{token}', [FriendsController::class, 'send_request'])->name('friend.request');
        Route::get('/remove/{token}', [FriendsController::class, 'remove_friend'])->name('friend.remove');
    });

    
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/forgot', [UserController::class, 'forgot'])->name('forgot');

// TODO: add middleware to reset password. Currently this route is vulnerable to url exploition
Route::get('/reset-password/{email}/{token}', [UserController::class, 'reset_pass'])->name('Reset_Password');

// Ajax request sent using this route
Route::post("/register", [UserController::class, 'saveUser'])->name('auth.register');

// Ajax request sent using this route
Route::post("/login", [UserController::class, 'loginUser'])->name('auth.login');
Route::post("/forgot", [UserController::class, 'forgotPassword'])->name('auth.forgot');
Route::post("/resset-password", [UserController::class, 'update_password'])->name('auth.reset');

//__________________________admin start________________________
//_______________________super admin________________________
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('super.admin.logout');
    Route::get('/admin/admin_team', [AdminController::class, 'admin_team'])->name('Team');
    Route::get('/admin/dashboard', [AdminController::class, 'super_admin_dashboard'])->name('sup.admin.dashboard');
    Route::get('/admin', [AdminController::class, 'admin_login']);
    Route::get('/admin/teamadd', [AdminController::class, 'teamadd'])->name('teamadd');
    Route::get('/admin/usermanagement', [AdminController::class, 'usermanagement'])->name('usermanagement');
    Route::get('/admin/usermanagementview', [AdminController::class, 'usermanagementview'])->name('usermanagement.view');
    Route::get('/admin/viewcontent', [AdminController::class, 'viewcontent'])->name('viewcontent');
    Route::get('/admin/ban', [AdminController::class, 'userban'])->name('userban');
    Route::get('/admin/support', [AdminController::class, 'support'])->name('support');
    Route::get('/admin/viewsupport', [AdminController::class, 'viewsupport'])->name('viewsupport');
    Route::get('/admin/cpassword', [AdminController::class, 'changepassword'])->name('changepass');
});
Route::post("/admin/login", [AdminController::class, 'loginUser'])->name('admin.login');


//----------sub Admin--------------
Route::middleware([SubAdminAuth::class])->group(function () {
    Route::get('/subadmin', [AdminController::class, 'sub_admin_login']);
    Route::get('/subadmin/dashboard', [AdminController::class, 'sub_admin_dashboard'])->name('sub.admin.dashboard');
    Route::get('/subadmin/userverification', [AdminController::class, 'sub_admin_verification'])->name('subadmin.verification');
    Route::get('/subadmin/userverification_view/{id}', [AdminController::class, 'sub_admin_verification_view'])->name('subadmin.verification_view');
    
    Route::get('/subadmin/userverification_view/approve/{id}', [AdminController::class, 'sub_admin_verification_view_approve'])->name('subadmin.verification_view_approve');
    Route::get('/subadmin/userverification_view/reject/{id}', [AdminController::class, 'sub_admin_verification_view_reject'])->name('subadmin.verification_view_reject');

    Route::get('/subadmin/team', [AdminController::class, 'subadmin_team'])->name('subadmin.team');
    Route::get('/subadmin/teamadd', [AdminController::class, 'subadmin_teamadd'])->name('subadmin.teamadd');
    Route::get('/subadmin/usermanagement', [AdminController::class, 'subadmin_usermanagement'])->name('subadmin.usermanagement');
    Route::get('/subadmin/content', [AdminController::class, 'subadmin_content'])->name('subadmin.content');
    Route::get('/subadmin/profilesearch', [AdminController::class, 'subadmin_profilesearch'])->name('subadmin.profilesearch');
    Route::get('/subadmin/profileview', [AdminController::class, 'subadmin_profileview'])->name('subadmin.profileview');
    Route::get('/subadmin/communication', [AdminController::class, 'subadmin_communication'])->name('subadmin.communication');
    Route::get('/subadmin/usersupport', [AdminController::class, 'subadmin_usersupport'])->name('subadmin.usersupport');
    Route::get('/subadmin/view', [AdminController::class, 'subadmin_usersupport_view'])->name('subadmin.usersupport.view');
    Route::get('/subadmin/changepassword', [AdminController::class, 'subadmin_changepassword'])->name('subadmin.changepassword');
    Route::get('/subadmin/logout', [AdminController::class, 'subadmin_logout'])->name('sub.admin.logout');
});
Route::post("/subadmin/login", [AdminController::class, 'subloginUser'])->name('subadmin.login');
Route::post('/save-support-query', [PostController::class, 'saveSupportQuery'])->name('user.support');