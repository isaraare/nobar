<?php

namespace App\Http\Controllers;

use App\Menus;
use App\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query = Menus::with('foodCategory')->get();

        $Orders = Orders::with('Menus')->get();
        //dd($query);


        return view('order.index',  ['data' => $query ,'orders' => $Orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)   //add
    {
        $id_menus= $request->get('id_menus');
        $amount = $request->get('amount');
        $staff = 1;
        $table = 1;

        $data = new Orders();
        $data->id_menus = $id_menus;
        $data->amount = $amount;
        $data->staff = $staff;
        $data->table = $table;

        $data->save();

        return redirect()->action('OrderController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Orders::find($id);
        $query->delete();
        //dd($query);
        return redirect()->action('OrderController@index');
    }

    public  function  get_data_menu(){
        $menus= Menus::with('foodCategory')->get();

        $orders = Orders::with('Menus')->get();
        //dd($query);

        return response()->json([
            'menus' => $menus->toArray(),
            'orders' => $orders->toArray()
        ]);

    }

    public  function  get_data_order($id){
        $menus= Menus::with('foodCategory')
            ->where('id',$id)
            ->get();


        return response()->json([
            'menus' => $menus->toArray(),

        ]);

    }


}
