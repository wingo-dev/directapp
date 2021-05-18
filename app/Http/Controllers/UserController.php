<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Category;
use App\Directory;
use Illuminate\Support\Str;
class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    // ajax call for category from group id.
    public function getCategory(Request $request){
        $categories = Category::where('group_id', $request->group_id)->get();
        return response()->json($categories);
    }
    // adding listing from user
    public function addListing(Request $request){
        $request->validate([
            // 'profile_image' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]); 
        if($request->hasfile('profile_image'))
        {
            $file_name = Str::random(5).'.'.$request->file('profile_image')->extension();
            $request->file('profile_image')->move(public_path().'/profile_image/', $file_name);
        }
        $dir = new Directory();
        $dir->name = $request->name;
        $dir->p_img = $file_name;
        $dir->email = $request->email;
        $dir->phone = $request->phone;
        $dir->address = $request->mailing;
        $dir->undergraduate_year = $request->graduation;
        $dir->law_year = $request->law;
        $dir->bar_year = $request->bar;
        $dir->practice_area = $request->areas;
        $dir->category_id = $request->category_name;

        $dir->save();

        return back()->with('success', 'Successfully you added one list.');
    }

}
