<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class supervisorControl extends Controller
{
    //function projectListSV()
    //{
    //    $typeID=Auth::user()->id;

    //    $data = DB::table('projects')
    //        ->leftJoin('users as userStd', 'projects.stud', 'userStd.id')
    //        ->leftJoin('users as usersv', 'projects.sv', 'usersv.id')
    //        ->leftJoin('users as userex1', 'projects.ex1', 'userex1.id')
    //        ->leftJoin('users as userex2', 'projects.ex2', 'userex2.id')
    //        ->select('projects.*', 'userStd.name as student_name', 'usersv.name as sv_name', 'userex1.name as ex1_name', 'userex2.name as ex2_name')
    //        ->where('sv',$typeID)
    //        ->get();

    //    dd($data);

    //    return view('supervisor.supervisorList', array('data' => $data));
    //}

    function showProjectSV($id)
    {
        $display = project::find($id);
        $sup = User::select('id', 'name')
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
        return view('supervisor.supervisorprojectupdate', compact("display","sup","exam1","exam2","stud"));
    }

    function updateProjectSV(Request $req)
    {
        $data = project::find($req->id);

        $data->title = $req->title;
        $data->start_date = $req->start_date;
        $data->end_date = $req->end_date;
        $data->duration = $req->duration;
        $data->progress = $req->progress;
        //$data->stud = $req->student;
        //$data->sv = $req->Supervisor;
        //$data->ex1 = $req->Examiner1;
        //$data->ex2 = $req->Examiner2;

        $data->save();
        return redirect('/redirect');
    }
}
