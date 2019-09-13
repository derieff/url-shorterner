<?php

namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Alert;
use Carbon\Carbon;
use Validator;
use DB;
use Response;

class ViewController extends Controller
{
    public function form_shorterner(Request $request){
    	// Alert::success('Selamat Datang');
    	return view('contents.form-shorterner');
    }
}
