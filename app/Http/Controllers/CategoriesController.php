<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;

class CategoriesController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        $permissions = User::with('permissions')->where('id',auth()->user()->id)->get();
        // return $categories;
        return view('admin.categories.index',compact('categories','permissions'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $category = new Category;
        $category->name = $request['name'];
        $category->save();
        return $category;
    }
}
