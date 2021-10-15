<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{


    /**********    Get All Category     *********/


    public function getAllCategory()
    {

        $categories = Category::where('parentID', null)->get();


        return  response()->json([
            "success" => true,
            "message" => "Category Fetch",
            "categories" => $categories
        ]);
    }

    /**********    Get All Category     *********/

    public function getAllSubCategory()
    {

        $categories = Category::where('parentID', '!=', null)->whereHas('category')->get();


        return  response()->json([
            "success" => true,
            "message" => "Sub Category Fetch",
            "categories" => $categories
        ]);
    }

    /**********    Create  Category     *********/

    public function createCatgory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',

        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors());
        }

        $category=new Category($request->all());

        if ($request->exists('image')) {
		    $file = $request->image;
		    $path = $file->move('uploads/image', Str::random(10) . $file->getClientOriginalName());
		    $category->image=$path;


	    }
        $category->save();


        return  response()->json([
            "success" => true,
            "message" => "Category Fetch",
            "category" => $category
        ]);
    }


      /**********    Create Sub  Category     *********/

      public function createSubCatgory(Request $request)
      {

          $validator = Validator::make($request->all(), [
              'name' => 'required|max:255',
              'parentID' => 'required',


          ]);

          if ($validator->fails()) {

              return response()->json($validator->errors());
          }

          $category=new Category($request->all());

          if ($request->exists('image')) {
              $file = $request->image;
              $path = $file->move('uploads/image', Str::random(10) . $file->getClientOriginalName());
              $category->image=$path;


          }
          $category->save();


          return  response()->json([
              "success" => true,
              "message" => "Category Fetch",
              "category" => $category
          ]);
      }


      public function delCategory($id)
      {

          $cat = Category::find($id);


          $cat->delete();


          return  response()->json([
            "success" => true,
            "message" => "Category Delete Successfully",
        ]);
      }


}
