<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['guest']],function(){
    Route::get('/', function () {
        return view('login');
    })->name('loginPage');
    Route::post('/' ,function(Request $request) {
        $credentials = $request->only('name', 'password');
        if (\Auth::attempt($credentials)) {
            return redirect()->route('list');
        }
        return back();
    })->name('login');
});

Route::group(['prefix' => 'blog','middleware' => ['auth:web','inertia']],function(){

    Route::get('/logout', function () {
        \Auth::logout();
        return redirect()->route('loginPage');
    });

   Route::get('/',function (){
        $blogs = \App\Models\Blogs::orderBy('created_at','desc')->get();
       return inertia('List',compact('blogs'));
   })->name('list');
   Route::get('/Create',function (){
        return inertia('Create');
    })->name('create');
   Route::post('/Create',function(Request $request){
       try {
           \App\Models\Blogs::Create([
               'title' => $request->title,
               'content' => $request->content
           ]);
           $blogs = \App\Models\Blogs::orderBy('created_at','desc')->get();
           return inertia('List',compact('blogs'));
       } catch (\Exception $exception) {
           abort(404);
       }
   });
   Route::get('/Read/{blog}',function (\App\Models\Blogs $blog){
       return inertia('Read',compact('blog'));
   })->name('read');
   Route::post('/Update',function (Request $request){
        $blog = \App\Models\Blogs::findorfail($request->id);
        $blog->update([
           'title' => $request->title,
           'content' => $request->content
        ]);
        return Redirect::route('read',['blog' => $blog->id]);
    })->name('update');
   Route::delete('/Delete/{blog}',function(\App\Models\Blogs $blog){
        $blog->delete();
        return Redirect::route('list');
   });
});


