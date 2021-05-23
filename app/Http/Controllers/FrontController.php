<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Category;
use App\Directory;
class FrontController extends Controller
{
    //
    public function index(){
        $temp = Group::join('categories','categories.group_id', '=', 'groups.id')->get();
        $dirs = $temp->groupBy('group_name');
        return view('welcome', compact('dirs'));
    }
    public function Listings($ctg_id){
        $group_name = Group::join('categories','categories.group_id', '=', 'groups.id')->where('categories.id', $ctg_id)->get();
        $listings = Directory::where('category_id', $ctg_id)->where('status', 1)->get();
        return view('listing_detail', compact('listings', 'group_name'));
    }
}
