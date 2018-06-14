<?php

namespace App\Http\Controllers;

use App\foodCategory;
use App\Menus;
use Illuminate\Http\Request;

class MenuController extends Controller
{


    public function index()
    {
        $foodCategory = foodCategory::query()
//            ->select('foodcategory_Name','foodcategoryid')
//            ->limit(5)
//            ->orderBy('foodcategoryid' ,'DESC')
//            ->where('foodcategoryid',1)
            ->get();
        //dd($foodCategory);
        // dd($category);
        //ความสัมพัน
        $query = Menus::with('foodCategory')->get();
//        return view('layouts.addmenu',['data' => $query]);

        return view('menu.index', ['data' => $query  , 'foodCategory' => $foodCategory]);
    }




    public function create()
    {    //หน้าที่จะเพิ่มข้อมูล
        $foodCategory =  foodCategory::query()->get();
         //dd($foodCategory);
        return view('menu.create',['foodCategory' => $foodCategory]);   //return หน้าเพิ่ม
    }





    public function store(Request $request)
    {
        $menu = $request->get('menu');
        $price = $request->get('price');
        $foodcategoryid = $request->get('foodcategoryid');
        $data = new Menus();
        $data->menu = $menu;
        $data->price = $price;
        $data->foodcategoryid = $foodcategoryid;
//      $data->created_at = $created_at;
//      $data->updated_at = $updated_at;
        $data->save();

        return redirect()->action('MenuController@index');
    }




    public function show($id)
    {

        $query = Menus::find($id);
        $category = foodCategory::query()->get();
        return view('menu.update', ['data' => $query,'category' => $category]);
    }




    public function edit($id)
    {
        //
    }




    public function update(Request $request, $id)
    {
        //d($request->all());
        $menu = $request->get('menu');
        $price = $request->get('price');
        $foodcategoryid = $request->get('foodcategoryid');

        $data = Menus::find($id);
        $data->menu = $menu;
        $data->price = $price;
        $data->foodcategoryid = $foodcategoryid;
        $data->save();

        return redirect()->action('MenuController@index');
    }



    public function destroy($id)
    {
        Menus::destroy($id);
        //dd($id);
        return redirect()->action('MenuController@index');
    }
}
