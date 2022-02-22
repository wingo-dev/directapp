<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('staffsetting');
    }
    public function updateStaffSetting(Request $request){
        $data = $request->all();
        User::where('id', $data['user_id'])->update(['name' => $data['name'], 'email' => $data['email'],
            'password' => bcrypt($data['password'])]);
        return back()->with('success', 'Successfully Updated.');
    }
    public function adminHome()
    {
        return view('adminHome');
    }
}