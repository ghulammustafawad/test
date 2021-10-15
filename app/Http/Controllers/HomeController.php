<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    /**********    Get All Category     *********/


    public function getAllCategory()
    {

        $categories = Category::where('parentID', null)->get();


        return view('category', compact('categories'));
    }

    /**********    Get All Category     *********/

    public function getAllSubCategory()
    {

        $categories = Category::where('parentID', '!=', null)->whereHas('category')->get();


        return view('sub_category', compact('categories'));
    }

    /**********    Create  Category     *********/

    public function createCatgory(Request $request)
    {


        $request->validate([
            'name' => 'required|max:255',

        ]);



        $category = new Category($request->all());

        if ($request->exists('image')) {
            $file = $request->image;
            $path = $file->move('uploads/image', Str::random(10) . $file->getClientOriginalName());
            $category->image = $path;
        }
        $category->save();


        return redirect()->route('categories');
    }


    /**********    Create Sub  Category     *********/

    public function createSubCatgory(Request $request)
    {



        $request->validate([
            'name' => 'required|max:255',
            'parentID' => 'required',

        ]);



        $category = new Category($request->all());

        if ($request->exists('image')) {
            $file = $request->image;
            $path = $file->move('uploads/image', Str::random(10) . $file->getClientOriginalName());
            $category->image = $path;
        }
        $category->save();


        return redirect()->route('sub_categories');
    }


    /**********    Delete Category     *********/


    public function DelCategory($id)
    {

        $cat = Category::find($id);


        $cat->delete();


        return redirect()->back();
    }
}
