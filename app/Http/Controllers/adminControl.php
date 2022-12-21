<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminControl extends Controller
{
    //User
    function user()
    {
        $data = user::all();
        return view('admin.users', compact("data"));
    }

    function deleteUser($id)
    {
        $value = User::find($id);
        $value->delete();
        return redirect()->back();
    }
    function showUser($id)
    {
        $data = User::find($id);
        return view('admin.adminupdate', ['display' => $data]);
    }
    function updateUser(Request $req)
    {
        $data = User::find($req->id);

        $data->name = $req->name;
        $data->email = $req->email;
        $data->usertype = $req->usertype;

        $data->save();
        return redirect('/users');
    }

    function create_project(){
        $sup  = user::select('id', 'name')
                    ->where('usertype','=','3')
                    ->get();
        $exam1  = user::select('id', 'name')
                    ->where('usertype','=','2')
                    ->get();
        $exam2  = user::select('id', 'name')
                    ->where('usertype','=','2')
                    ->get();
        $stud  = user::select('id', 'name')
                    ->where('usertype','=','0')
                    ->get();
    return view('admin.adminproject', compact("sup","exam1","exam2","stud"));//,"exam1","exam2","stud")
    }

    //function dropDownShow(Request $request){
    //    $dat  = user::pluck('name', 'id');
    //    return view('admin.adminprojectupdate', compact("dat"));
//}

    //project

    function register_project(Request $x){
        $project = new project;

        $project->id = $x->id;
        $project->title = $x->title;
        $project->start_date = $x->start_date;
        $project->end_date = $x->end_date;
        $project->duration = $x->duration;
        $project->progress = $x->progress;
        $project->status = $x->status;
        $project->stud = $x->student;
        $project->sv = $x->Supervisor;
        $project->ex1 = $x->Examiner1;
        $project->ex2 = $x->Examiner2;
        $project->save();
        return redirect('/listproject');
    }

    function projectList(){
        $data = DB::table('projects')
            ->join('users as userStd', 'projects.stud', '=', 'userStd.id','left outer')
            ->select('projects.*','userStd.name')
            ->get();

        return view('admin.adminprojectlist',array ('data' => $data ));;
    }

    function deleteProject($id){
        $value=project::find($id);
        //find where is the id
        $value->delete();
        //DB::delete('delete from students where stud_id=?',[$id]);
        return redirect()->back();
    }
    function showProject($id){
        $data=project::find($id);
        return view('admin.adminprojectupdate',['display'=>$data]);
    }
    function updateProject (Request $req){
        $data=project::find($req->id);

        $data->title = $req->title;
        $data->start_date = $req->start_date;
        $data->end_date = $req->end_date;
        $data->duration = $req->duration;
        $data->progress = $req->progress;
        $data->status = $req->status;

        $data->save();
        return redirect('/listproject');
    }
    
}