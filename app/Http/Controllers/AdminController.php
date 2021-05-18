<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Group;
use App\Category;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addCustomer(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => 0,
            'password' => $request->password,
        ]);
        return back();
    }
    // group
    public function viewCategory(){
        $groups = Group::all();
        return view('admin.category', compact('groups'));
    }
    public function addGroup(Request $request){
        
        Group::create([
            'group_name' => $request->g_name
        ]);
        return back();
    }
    public function deleteGroup($group_id){
        Group::where('id', $group_id)->delete();
        return back();
    }
    // Category
    public function addCategory($group_id){
        $ctgs = Category::where('group_id', $group_id)->get();
        return view('admin.add_category', compact('group_id', 'ctgs'));
    }
    public function storeCategory(Request $request){
        $ctg = new Category();
        $ctg->ctg_name = $request->ctg_name;
        $ctg->group_id = $request->g_id;
        $ctg->save();
        return back();
    }
    public function deleteCategory($ctg_id){
        Category::where('id', $ctg_id)->delete();
        return back();
    }
    // pedding listings
    public function viewPendingListings(){
        return view('admin.pending_listings');
    }
}
