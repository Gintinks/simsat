<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tps;
use App\Models\Sampah;

class AdminRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $findAllTps = Tps::select('*')->where('id', '!=', 0)->get();
        return view('auth.register');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewUser()
    {
        $showAllUser = User::where('priviliges_id', '!=' , 1)->orderBy('id', 'ASC')->get();
        return response()->json($showAllUser);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $registerData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'tps' => 'required|numeric',
            'role' => 'required|max:255',
        ]);

        $registerData['password'] = bcrypt($registerData['password']);

        if ($registerData['role'] == 'tps') {
            $registerData['role'] = 3;
        }
        if ($registerData['role'] == 'managemenDlh') {
            $registerData['role'] = 2;
            $registerData['tps'] = 0;
        }

        $saveData = User::create([
            'name' => $registerData['name'],
            'email' => $registerData['email'],
            'password' => $registerData['password'],
            'tps_id' => $registerData['tps'],
            'priviliges_id' => $registerData['role'],
        ]);
        return view('auth.register');

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
    public function update(Request $request)
    {
        $updateData = $request->input();

        $updateData['password'] = bcrypt($updateData['password']);

        $saveUpdateData = User::where('id', '=', $updateData['id'])->update([
            'name' => $updateData['name'],
            'email' => $updateData['email'],
            'password' => $updateData['password'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $user_sampah = Sampah::where('user_id', $request->id);
        $user_sampah->delete();
        User::destroy($request->id);
        // $deleteUser->delete(); 
        // return;
    }
}
