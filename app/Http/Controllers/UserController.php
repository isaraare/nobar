<?php

namespace App\Http\Controllers;

use App\position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//getPath
    private function getPath($path = '')
    {
        return storage_path('app/' . $path);
    }


    public function index()
    {
//        $User = User::query()->get();

        $User = User::with('position')->get();
//        dd($User);
        return view('user.index', ['User' => $User]);   //return หน้าแรก


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = position::query()->get();
        // dd($data);

        return view('user.create', ['data' => $data]);   //return หน้าเพิ่ม
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//    dd($request->all());

//        dd($staff_all);
        $request->validate(
            [
                'email' => 'required|unique:users',
                'name' => 'required',
                'username' => 'required',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            ],
            [
                'email.required' => 'กรุณากรอกอีเมล',
                'email.unique' => 'อีเมลนี้ถูกใช้งานไปเเล้ว',
                'username.required' => 'กรุณากรอกชื่อผู้ใช้งาน',
                'name.required' => 'กรุณากรอกชื่อ',
                'password.required_with' => 'กรุณากรอกรหัสผ่าน',
                'password.same' => 'รหัสผ่านไม่ตรงกัน',
                'password.min' => 'รหัสผ่านอย่างน้อย6ตัว',

            ]
        );


        $file = $request->file('file_name');
        if ($file) {
            $path = $this->uploadFile($file, 'pre-user/', uniqid(Carbon::now()->format("YmdHis") . '_'), $file->getClientOriginalExtension());
        }

        $name = $request->get('name');
        $email = $request->get('email');
        $username = $request->get('username');
        $password = $request->get('password');
//        $type_user = $request->get('type_user');

        $staff_all = $request->get('staff_all') ? true : false;
        $staff_order = $request->has('staff_order') ? true : false;
        $staff_vieworder = $request->get('staff_vieworder') ? true : false;
        $staff_updateorder = $request->get('staff_updateorder') ? true : false;
        $staff_deleteorder = $request->get('staff_deleteorder') ? true : false;
        $cashier_all = $request->get('cashier_all') ? true : false;
        $cashier_checkbill = $request->get('cashier_checkbill') ? true : false;
        $cashier_viewbill = $request->get('cashier_viewbill') ? true : false;
        $cashier_report = $request->get('cashier_report') ? true : false;
        $cashier_deletereport = $request->get('cashier_deletereport') ? true : false;
        $manage_all = $request->get('manage_all') ? true : false;
        $manage_viewmenu = $request->get('manage_viewmenu') ? true : false;
        $manage_addmenu = $request->get('manage_addmenu') ? true : false;
        $manage_updatemenu = $request->get('manage_updatemenu') ? true : false;
        $manage_deletemenu = $request->get('manage_deletemenu') ? true : false;
        $manage_booktable = $request->get('manage_booktable') ? true : false;
        $manage_viewbooktable = $request->get('manage_viewbooktable') ? true : false;
        $manage_updatebooktable = $request->get('manage_updatebooktable') ? true : false;
        $manage_deletebooktable = $request->get('manage_deletebooktable') ? true : false;
        $admin_user = $request->get('admin_user') ? true : false;

        $user_positions_id = $request->get('user_positions_id');


        $data = new User();
        $data->name = $name;
        $data->email = $email;
        $data->username = $username;
        $data->password = Hash::make($password);
        $data->file_name = $file->getClientOriginalName();
        $data->file_path = $path->name;
//        $data->type_user = $type_user;
        $data->user_positions_id = $user_positions_id;

        $data->staff_all = $staff_all;
        $data->staff_order = $staff_order;;
        $data->staff_vieworder = $staff_vieworder;
        $data->staff_updateorder = $staff_updateorder;
        $data->staff_deleteorder = $staff_deleteorder;
        $data->cashier_all = $cashier_all;
        $data->cashier_checkbill = $cashier_checkbill;
        $data->cashier_viewbill = $cashier_viewbill;
        $data->cashier_report = $cashier_report;
        $data->cashier_deletereport = $cashier_deletereport;
        $data->manage_all = $manage_all;
        $data->manage_viewmenu = $manage_viewmenu;
        $data->manage_addmenu = $manage_addmenu;
        $data->manage_updatemenu = $manage_updatemenu;
        $data->manage_deletemenu = $manage_deletemenu;
        $data->manage_booktable = $manage_booktable;
        $data->manage_viewbooktable = $manage_viewbooktable;
        $data->manage_updatebooktable = $manage_updatebooktable;
        $data->manage_deletebooktable = $manage_deletebooktable;
        $data->admin_user = $admin_user;

        $data->save();

        return redirect()->action('UserController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //       dd($id);
        $data = User::with('position')
            ->where('id', $id)
            ->get();
//        dd($data->toArray());

        $position = position::query()->get();

        return view('user.update', ['data' => $data[0],'position'=>$position]);   //return หน้าแรก
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
//        $user = User::find($id);
        $request->validate(
            [
//            'email' => 'required|unique:users'.$user->id,
                'email' => 'required|email|unique:users,email,' . $id,
                'name' => 'required',
                'username' => 'required',
            ],
            [
                'email.required' => 'กรุณากรอกอีเมล',
                'email.unique' => 'อีเมลนี้ถูกใช้งานไปเเล้ว',
                'username.required' => 'กรุณากรอกชื่อผู้ใช้งาน',
                'name.required' => 'กรุณากรอกชื่อ',
            ]
        );


        $name = $request->get('name');
        $email = $request->get('email');
        $username = $request->get('username');
//      $password= $request->get('password');
//      $file_name= $request->get('file_name');
//      $file_path= $request->get('file_path');
        $user_positions_id = $request->get('user_positions_id');

        $data = User::find($id);
        $data->name = $name;
        $data->email = $email;
        $data->username = $username;
//      $data->password = $password;
//      $data->file_name = $file_name;
//      $data->file_path = $file_path;
        $data->user_positions_id = $user_positions_id;
        $data->save();

        return redirect()->action('UserController@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::destroy($id);
        //return redirect()->action('UserController@index');
        return redirect()->back()->with('alert', 'ลบข้อมูลสำเร็จ');
    }


    //อัพรูป
    private function uploadFile($file, $prefix = '', $name = null, $extension = null)
    {
        if ($extension == null) {
            $extension = $file->getClientOriginalExtension();
        }
        if ($name == null) {
            $name = uniqid() . (($extension != '') ? '.' . $extension : '');
        } else if ($extension != '' && strpos($name, '.') === false) {
            $name .= '.' . $extension;
        }

        $filePath = $prefix . ((substr($prefix, -strlen($prefix)) === '/' || $prefix == '') ? '' : '/');

        $res = $file->move($this->getPath() . '/' . $filePath, $name);

        return (object)['status' => ($res) ? true : false, 'path' => $filePath . $name, 'name' => $name];
    }


}
