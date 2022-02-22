<?php

namespace App\Http\Controllers;

use App\Directory;
use App\Group;
use App\Category;
use Session;
use Illuminate\Http\Request;
class FrontController extends Controller
{
    //
    public function index()
    {
        $temp = Group::join('categories', 'categories.group_id', '=', 'groups.id')->get();
        $dirs = $temp->groupBy('group_name');
        return view('welcome', compact('dirs'));
    }
    public function submission()
    {
        $groups = Group::all();
        return view('submission', compact('groups'));
    }
    public function addListing(Request $request){
        $admin_email = User::where('is_admin', 1)->get();
        // dd($admin_email[0]->email);
        $request->validate([
            // 'profile_image' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->hasfile('profile_image')) {
            $file_name = Str::random(5) . '.' . $request->file('profile_image')->extension();
            $request->file('profile_image')->move(public_path() . '/profile_image/', $file_name);
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
        // $dir->user_id = Auth::user()->id;
        $dir->save();
        if (!User::where('email', '=', $request->email)->exists()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        $details = [
            'title' => 'gatecitybardirectory.org',
            'email' => $request->email,
            'body' => 'This is a notification email from a submission.',
        ];
        $admin_email = trim($admin_email[0]->email);
        \Mail::to($admin_email)->send(new \App\Mail\NotificationEmail($details));
        // dd("Email is Sent.");
        return back()->with('success', 'Thank You for your submission. Your submission is now going through the approval process.');

    }
    public function getCategory(Request $request){
        $categories = Category::where('group_id', $request->group_id)->get();
        return response()->json($categories);
    }
    public function Listings($ctg_id)
    {
        $group_name = Group::join('categories', 'categories.group_id', '=', 'groups.id')->where('categories.id', $ctg_id)->get();
        $listings = Directory::where('category_id', $ctg_id)->where('status', 1)->get();
        return view('listing_detail', compact('listings', 'group_name'));
    }
    public function close()
    {
        session()->flush();
        return redirect()->route('login');
    }
}   