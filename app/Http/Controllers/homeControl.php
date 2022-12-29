<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class homeControl extends Controller
{
    function index()
    {
        return view("home");
    }

    function redirectFunct()
    {
        $typeuser=Auth::user()->usertype;
        $typeID=Auth::user()->id;

        if($typeuser =='1'){
            return view('admin.adminpage');
        }elseif($typeuser =='2'){
            $typeID=Auth::user()->id;

            $data = DB::table('projects')
            ->leftJoin('users as userStd', 'projects.stud', 'userStd.id')
            ->leftJoin('users as usersv', 'projects.sv', 'usersv.id')
            ->leftJoin('users as userex1', 'projects.ex1', 'userex1.id')
            ->leftJoin('users as userex2', 'projects.ex2', 'userex2.id')
            ->select('projects.*', 'userStd.name as student_name', 'usersv.name as sv_name', 'userex1.name as ex1_name', 'userex2.name as ex2_name')
            ->where('ex1',$typeID)
            ->orWhere('ex2', $typeID)
            ->get();
            return view('Examiner.examHome', compact("data"));
        }elseif($typeuser =='3'){
            $typeID=Auth::user()->id;

            $data = DB::table('projects')
                ->leftJoin('users as userStd', 'projects.stud', 'userStd.id')
                ->leftJoin('users as usersv', 'projects.sv', 'usersv.id')
                ->leftJoin('users as userex1', 'projects.ex1', 'userex1.id')
                ->leftJoin('users as userex2', 'projects.ex2', 'userex2.id')
                ->select('projects.*', 'userStd.name as student_name', 'usersv.name as sv_name', 'userex1.name as ex1_name', 'userex2.name as ex2_name')
                ->where('sv',$typeID)
                ->get();
            return view('supervisor.supervisorHome',compact("data"));
        }else{

            $data = DB::table('projects')
                ->leftJoin('users as userStd', 'projects.stud', 'userStd.id')
                ->leftJoin('users as usersv', 'projects.sv', 'usersv.id')
                ->leftJoin('users as userex1', 'projects.ex1', 'userex1.id')
                ->leftJoin('users as userex2', 'projects.ex2', 'userex2.id')
                ->select('projects.*', 'userStd.name as student_name', 'usersv.name as sv_name', 'userex1.name as ex1_name', 'userex2.name as ex2_name')
                ->where('stud',$typeID)
                ->get();
            return view('student.studentHome', compact("data"));
        }
    }
}