<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControl;
use App\Http\Controllers\adminControl;
use App\Http\Controllers\supervisorControl;
use App\Http\Controllers\examControl;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//user
Route::get('/', [homeControl::class,"index"]);
Route::get('/redirect', [homeControl::class,"redirectFunct"]);
Route::get('/users', [adminControl::class,"user"]);
Route::get('delUser/{id}', [adminControl::class,'deleteUser']);
Route::get('updUser/{id}', [adminControl::class,'showUser']);
Route::post('editUser', [adminControl::class,'updateUser']);

//project
Route::get('/createProject', [adminControl::class,'create_project'] );
    //return view('admin.adminproject');
//});
Route::post('/addProject', [adminControl::class,'register_project'] );
Route::get('/listproject', [adminControl::class,'projectList']);
Route::get('upd/{id}', [adminControl::class,'showProject']);
Route::post('edit', [adminControl::class,'updateProject']);
Route::get('del/{id}', [adminControl::class,'deleteProject']);


Route::get('/supervisorList', [supervisorControl::class,'projectListSV']);
Route::get('updSV/{id}', [supervisorControl::class,'showProjectSV']);
Route::post('editProjectSV', [supervisorControl::class,'updateProjectSV']);

Route::get('/examList', [examControl::class,'projectListExam']);





//build in
Route::get("/home", [homeControl::class, "index"]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
