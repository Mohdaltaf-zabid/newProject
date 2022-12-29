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

    function create_project()
    {
        $sup = user::select('id', 'name')
            ->where('usertype', '=', '3')
            ->get();
        $exam1 = user::select('id', 'name')
            ->where('usertype', '=', '2')
            ->get();
        $exam2 = user::select('id', 'name')
            ->where('usertype', '=', '2')
            ->get();
        $stud = user::select('id', 'name')
            ->where('usertype', '=', '0')
            ->get();
        return view('admin.adminproject', compact("sup", "exam1", "exam2", "stud")); //,"exam1","exam2","stud")
    }

    //function dropDownShow(Request $request){
    //    $dat  = user::pluck('name', 'id');
    //    return view('admin.adminprojectupdate', compact("dat"));
//}

    //project

    function register_project(Request $x)
    {
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

    function projectList()
    {
        $data = DB::table('projects')
            ->leftJoin('users as userStd', 'projects.stud', 'userStd.id')
            ->leftJoin('users as usersv', 'projects.sv', 'usersv.id')
            ->leftJoin('users as userex1', 'projects.ex1', 'userex1.id')
            ->leftJoin('users as userex2', 'projects.ex2', 'userex2.id')
            ->select('projects.*', 'userStd.name as student_name', 'usersv.name as sv_name', 'userex1.name as ex1_name', 'userex2.name as ex2_name')
            ->get();

        //dd($data);

        return view('admin.adminprojectlist', array('data' => $data));
        ;
    }

    function deleteProject($id)
    {
        $value = project::find($id);
        //find where is the id
        $value->delete();
        //DB::delete('delete from students where stud_id=?',[$id]);
        return redirect()->back();
    }
    function showProject($id)
    {
        $display = project::find($id);
        $sup = user::select('id', 'name')
            ->where('usertype', '=', '3')
            ->get();
        $exam1 = user::select('id', 'name')
            ->where('usertype', '=', '2')
            ->get();
        $exam2 = user::select('id', 'name')
            ->where('usertype', '=', '2')
            ->get();
        $stud = user::select('id', 'name')
            ->where('usertype', '=', '0')
            ->get();

        //dd($display);
        return view('admin.adminprojectupdate', compact("display","sup","exam1","exam2","stud"));
    }
    function updateProject(Request $req)
    {
        $data = project::find($req->id);

        $data->title = $req->title;
        $data->start_date = $req->start_date;
        $data->end_date = $req->end_date;
        $data->duration = $req->duration;
        $data->progress = $req->progress;
        $data->status = $req->status;
        $data->stud = $req->student;
        $data->sv = $req->Supervisor;
        $data->ex1 = $req->Examiner1;
        $data->ex2 = $req->Examiner2;

        $data->save();
        return redirect('/listproject');
    }

}