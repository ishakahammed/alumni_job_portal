<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alert;
class AlertController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } //construct

    public function index()
    {
        $alerts = auth()->user()->alerts;

        $reversed = $alerts->reverse();
        $reversed->all();

        //dd($reversed);

        return view('alert.alerts_all')->withAlerts($reversed);

    }//func

	public function destroy(Alert $alert)
    {
        
        $alert->delete();

        return redirect('/alerts');
    } //func

}//class
