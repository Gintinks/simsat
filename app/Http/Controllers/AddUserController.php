<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Log;
use Exception;

class AddUserController extends Controller
{

    //buat view semua user database
    public function index()
    {
        $user = User::orderBy('id')->get;
        return view('ini route', compact('users'));
    }

    //buat view halaman/form adduser
    public function halamanAddUser()
    {
        return view('ini route ke halaman form add user');
    }

    public function addUser(Request $request)
    {
        try
        {
            $employeeName = $request->get('name');
            $employeePassword = $request->get('password');
            $employeeEmail = $request->get('email');
            $employeePriviliges = $request->get('priviliges');

            User::create([
                'name'   =>  $employeeName,
                'password'          =>  $employeePassword,
                'email'          =>  $employeeEmail,
                'priviliges_id'          =>  $employeePriviliges
            ]);

            return response()->json([
                'employee_name'   =>  $employeeName,
                'password' =>  $employeePassword,
                'email'          =>  $employeeEmail,
                'priviliges_id'          =>  $employeePriviliges
            ]);
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }

    //masuk ke halaman form update
    public function halamanUpdate($id)
    {
        $user = User::findOrFail($id);
        return view('ini route ke halaman form add user', compact('user'));
    }

    //kirim value form update kesini
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'priviliges' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'priviliges_id' => $request->priviliges,
            'password' => $request->password,
        ]);

        if ($user) {
            return redirect()->route('input route disini')->withSuccess(['success' =>'Berhasil mengupdate user']);
        }else{
            return redirect()->route('input route disini')->withErrors(['errors' =>'Gagal mengupdate user']);
        }

    }

    //pas klik delete ini langsung di eksekusi
    public function destroy($id)
    {   
        try
        {
            // $user_sampah = Sampah::where('user_id', $id);
            // $user_sampah->delete();
            // $user = User::findOrFail($id);
            // $user->delete();
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }

}
   

