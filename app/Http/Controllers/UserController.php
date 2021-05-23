<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Category;
use App\Directory;
use Auth;
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
        $dir->user_id = Auth::user()->id;
        $dir->save();
        return back()->with('success', 'Thank You for your submission. Your submission is now going through the approval process.');
    }
//    management listings
    public function viewListings(){
        $listings = Directory::join('categories', 'categories.id', 'directories.category_id')
            ->join('groups', 'groups.id', 'categories.group_id')->where('directories.user_id', Auth::user()->id)->get(['categories.*', 'groups.*','directories.*']);
        $listings = $listings->groupBy('group_name');
//        dd($listings);
        return view('customer.listings', compact('listings'));
    }
    public function viewEdit($id){
        $groups = Group::all();
        $listing = Directory::where('id', $id)->get();
        return view('customer.edit_listing', compact('groups', 'listing'));
    }
    public function updateListing(Request $request){
        $data = $request->all();
        Directory::where('id', $data['directory_id'])->update(['name'=>$data['name'], 'email'=>$data['email'],
            'phone'=>$data['phone'], 'address'=>$data['mailing'], 'undergraduate_year'=>$data['graduation'],
            'law_year'=>$data['law'], 'bar_year'=>$data['bar'], 'practice_area'=>$data['areas'], 'category_id'=>$data['category_name']]);
        return redirect()->route('view.listings');
    }
    public function deleteListings($id){
        Directory::where('id', $id)->delete();
        return back();
    }
//    pending listings
    public function pendingListings(){
        $pendings = Directory::where('user_id', Auth::user()->id)
            ->where('status', 0)->get();
        return view('customer.pending', compact('pendings'));
    }
}
