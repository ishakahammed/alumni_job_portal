<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth');

    } //func

    public function index()
    {
        $users = User::all();
        $key = 0;
        $cnt = count($users);

        return view('stackholders.list')->withKey($key)->withUsers($users)->withCnt($cnt);
    }//index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.profile', compact('user'));
    } //func

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);

        if($user->role == 1 || auth()->id() != $user->id) abort(403);
        return view('profile.profile_update', compact('user')); 
    } //edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd(request()->all());

        $user = User::findOrFail($id);

        $user->father_name = $request->input('father_name');
        $user->mother_name = $request->input('mother_name');
        $user->skills = $request->input('skills');
        $user->cell = $request->input('cell');

        //student
        $user->student_id = $request->input('student_id');
        $user->batch = $request->input('batch');
        $user->admission_date = $request->input('admission_date');
        $user->graduate_date = $request->input('graduate_date');        
        
        //company
        $user->company_name = $request->input('company_name');
        $user->company_address = $request->input('company_address');
        $user->job_join_date = $request->input('job_join_date');
        $user->job_end_date = $request->input('job_end_date');
        $user->position = $request->input('position');

        
        //work with image


        if($request->hasFile('img')){
            //dd('hello');
            $user->img = $request->img->store('public/images');
        }

        if($request->hasFile('cv')){
            //dd('hello');
            $user->cv = $request->cv->store('public/cvs');
        }
        

        $user->save();
        Session::flash('success', 'Your profile information is successfully updated.');

        return view('profile.profile', compact('user'));

    } //func

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        //dd($user->role);
        if($user->role != 1){
            abort(403);
        } ///if

        $user = User::find($id);
        $user->delete();

        Session::flash('Successfully deleted one user');
    } //admin
}
