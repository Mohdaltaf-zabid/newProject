<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class examControl extends Controller
{
    function projectListExam()
    {
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

        //dd($data);

        return view('Examiner.examList', array('data' => $data));
    }
}
