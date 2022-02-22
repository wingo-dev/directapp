<?php

namespace App\Http\Controllers;

use App\Category;
use App\Directory;
use App\Group;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function adminSetting()
    {
        $admin = User::where('is_admin', 1)->get();

        return view('admin.setting', compact('admin'));
    }
    public function updateSetting(Request $request)
    {
        $data = $request->all();
        User::where('id', $data['user_id'])->update(['name' => $data['name'], 'email' => $data['email'],
            'password' => bcrypt($data['password'])]);
        return back();
    }
    public function addCustomer(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => 0,
            'password' => bcrypt($request->password),
        ]);
        return back();
    }
    public function viewSiteOwners(){
        $owners = User::where('is_admin',0)->get();
        return view('admin.view_owners', compact('owners'));
    }
    public function editOwner($id){
        $owner = User::where('id', $id)->get();
        return view('admin.edit_owner', compact('owner'));
    }
    public function updateOwner(Request $request){
        $data = $request->all();
        User::where('id', $data['user_id'])->update(['name' => $data['name'], 'email' => $data['email'], 'password' => bcrypt($data['password'])]);
        return redirect()->route('admin.view.siteowners');
    }
    public function ownerDelete($id){
        User::where('id', $id)->delete();
        return back();
    }
    
    public function viewCustomers()
    {
        $customers = User::where('is_admin',NULL)->get();
        return view('admin.view_customers', compact('customers'));
    }
    public function editCustomer($id)
    {
        $customer = User::where('id', $id)->get();
        return view('admin.edit_customer', compact('customer'));
    }

    public function updateCustomer(Request $request)
    {
        $data = $request->all();
        User::where('id', $data['user_id'])->update(['name' => $data['name'], 'email' => $data['email'], 'password' => bcrypt($data['password'])]);
        return redirect()->route('admin.view.customers');
    }
    public function customerDelete($id)
    {
        User::where('id', $id)->delete();
        return back();
    }
    // group
    public function viewCategory()
    {
        $groups = Group::all();
        return view('admin.category', compact('groups'));
    }
    public function addGroup(Request $request)
    {

        Group::create([
            'group_name' => $request->g_name,
        ]);
        return back();
    }
    public function deleteGroup($group_id)
    {
        Group::where('id', $group_id)->delete();
        return back();
    }
    // Category
    public function addCategory($group_id)
    {
        $ctgs = Category::where('group_id', $group_id)->get();
        return view('admin.add_category', compact('group_id', 'ctgs'));
    }
    public function storeCategory(Request $request)
    {
        $ctg = new Category();
        $ctg->ctg_name = $request->ctg_name;
        $ctg->group_id = $request->g_id;
        $ctg->save();
        return back();
    }
    public function deleteCategory($ctg_id)
    {
        Category::where('id', $ctg_id)->delete();
        return back();
    }
//    listings management
    public function viewListings()
    {
        $listings = Directory::join('categories', 'categories.id', 'directories.category_id')
            ->join('groups', 'groups.id', 'categories.group_id')->get(['categories.*', 'groups.*', 'directories.*']);
        $listings = $listings->groupBy('group_name');
        return view('admin.listings_management', compact('listings'));
    }
    public function editListing($id)
    {
        $groups = Group::all();
        $listing = Directory::where('id', $id)->get();
        return view('admin.admin_edit_listing', compact('groups', 'listing'));
    }
    public function updateListing(Request $request)
    {
        $data = $request->all();
        Directory::where('id', $data['directory_id'])->update(['name' => $data['name'], 'email' => $data['email'],
            'phone' => $data['phone'], 'address' => $data['mailing'], 'undergraduate_year' => $data['graduation'],
            'law_year' => $data['law'], 'bar_year' => $data['bar'], 'practice_area' => $data['areas'], 'category_id' => $data['category_name']]);
        return redirect()->route('admin.listings.management');
    }
    public function listingDelete($id)
    {
        Directory::where('id', $id)->delete();
        return back();
    }
    // pending listings
    public function viewPendingListings()
    {
        $listings = Directory::join('categories', 'categories.id', 'directories.category_id')
            ->join('groups', 'groups.id', 'categories.group_id')->where('status', 0)->get(['categories.*', 'groups.*', 'directories.*']);
        $listings = $listings->groupBy('group_name');
        return view('admin.pending_listings', compact('listings'));
    }
    public function approveListing($listing_id)
    {
        Directory::where('id', $listing_id)->update(['status' => 1]);
        return back();
    }
}   