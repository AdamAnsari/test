<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

use App\student;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $students = student::all();
        return view('users.index', compact('students'));
    }

    public function csv_export() {
        return Excel::download(new CsvExport, 'sample.csv');
    }

    public function csv_import() {
        // return Excel::download(new CsvExport, 'sample.csv');
        Excel::import(new CsvImport, request()->file('file'));
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $student = new student;

        $this->validate($request, [
            'name'=>'required',
            'birthday'=>'required',
            'gender'=>'required',
            'state'=>'required',
            'city'=>'required',
            'education'=>'required',
            'year'=>'required',
            'profile'=>'required',
            'skills'=>'required',
            'profession'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
        ]);

        $student->name = $request->name;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->state = $request->state;
        $student->city = $request->city;
        $student->education = $request->education;
        $student->year = $request->year;
        $student->skills = $request->skills;
        $student->profession = $request->profession;
        $student->company = $request->company;
        $student->job_started = $request->job_started;
        $student->business_name = $request->business_name;
        $student->location = $request->location;
        $student->email = $request->email;
        $student->mobile = $request->mobile;

        // Profile Picture
        if($request->hasFile('profile'))
        {
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('upload/profile_picture/', $filename);
            $student->profile = $filename;
        } else {
            return $request;
            $student->profile = '';
        }

        // Cerificate Multiple files
        if($request->hasFile('certificate'))
        {
            $certificate_arr = $request->file('certificate');

            $arr_len = count($certificate_arr);

            for($i=0; $i<$arr_len; $i++) {
                $certificate_size = $certificate_arr[$i]->getSize();
                $certificate_ext = $certificate_arr[$i]->getClientOriginalExtension();

                $new_certificate_name = rand(123456, 999999) . '.' . $certificate_ext;

                $destination_path = public_path('/upload/certificate');
                $certificate_arr[$i]->move($destination_path, $new_certificate_name);

                $student->certificate = $new_certificate_name;
            }
        } 

        $student->save();

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $item = student::find($id);
        return view('users.edit', compact('item'));
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
        $student = student::find($id);

        $this->validate($request, [
            'name'=>'required',
            'birthday'=>'required',
            'gender'=>'required',
            'state'=>'required',
            'city'=>'required',
            'education'=>'required',
            'year'=>'required',
            'profile'=>'required',
            'skills'=>'required',
            'profession'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
        ]);

        $student->name = $request->name;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->state = $request->state;
        $student->city = $request->city;
        $student->education = $request->education;
        $student->year = $request->year;
        $student->profile = $request->profile;
        $student->skills = $request->skills;
        $student->certificate = $request->certificate;
        $student->profession = $request->profession;
        $student->company = $request->company;
        $student->job_started = $request->job_started;
        $student->business_name = $request->business_name;
        $student->location = $request->location;
        $student->email = $request->email;
        $student->mobile = $request->mobile;

        $student->save();
        return redirect('/users');
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
        $item = student::find($id);
        $item->delete();
        
        return redirect('/users');
    }
}
