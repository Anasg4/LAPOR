<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;

class AdminController extends Controller
{
    public function index(){
        $reports = Report::all();
        return view('admin.dashboard')->with('reports', $reports);
    }

    public function showLoginForm(){
        return view('admin.login');
    }

    public function show($id){
        $report = Report::find($id);

        return view('admin.detail')->with('report', $report);
    }

    public function update(Request $request, $id)
    {
        $report = Report::find($id);

        $report->report_status = $request['report_status'];

        $report->save();
        if($request['report_status'] == 2){
            $user = User::find($report['user_id']);

            $user->points += 100;

            $user->save();
        }
    }

    public function destroy($id){
        $report = Report::find($id);

        $report->delete();
    }
}
