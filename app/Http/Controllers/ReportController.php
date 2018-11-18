<?php

namespace App\Http\Controllers;

use App\User;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userData = Auth::user();

        return view('report.create')->with('userData', $userData);
    }

    public function createPlain()
    {
        $userData = Auth::user();

        return view('report.create-plain')->with('userData', $userData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->image);
        $filename = explode('.', $request->image->getClientOriginalName());
        $fileExt = end($filename);
        $id = $this->generateId();
        
        $path = Storage::putFileAs(
            '/public/evidences', $request->file('image'), $request->user()->id.'-'.$id.'.'.$fileExt
        );

        $report = new Report;
        $report->id = $this->generateId();
        $report->number = $request['number'];
        $report->violation = $request['violation'];
        $report->description = $request['description'];
        $report->location = $request['location'];
        $report->image = $path;

        $user = User::find(Auth::id());
        $user->reports()->save($report);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report_status = ['Belum diverifikasi', 'Terverifikasi', 'Selesai'];

        $report = Report::find($id);
        $user = User::find($report->user_id);

        $report->created = strftime("%d %b %Y - %H:%M %p",strtotime($report->created_at));
        $report->username = $user->name;
        $report->status = $report_status[$report->report_status];

        /* 
        *replace public with /storage  
        *because incompatibility of storage link
        */
        $path = str_replace('public','/storage', $report->image);
        $report->path = $path;

        return json_encode($report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generateId(){
        $char = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
        $id = "";
        for($i=0;$i<6;$i++){
            $id = $id.$char[rand(0, 15)];
        }

        return $id;
    }
}
