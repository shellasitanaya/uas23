<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserAdminController extends Controller
{
    public function login(Request $request)
    {
        Log::info($request->all());

        $userAdmin = UserAdmin::where('username', $request->username)->first();
        if (Hash::check($request->password, $userAdmin->password)) {
            session([
                'isLogin' => true, 
                'username' => $request->username

            ]);
            return redirect()->route('adminn');
        }
        return redirect()->route('viewLogin');
    }

    public function logout (){
        session()->flush();
        return redirect()->back();

    }

    public function getAdmin()
    {
        if (!session('isLogin')) {
            // route sesuai name di web.php
            return redirect()->route('viewLogin');
        }
        $allUser = UserAdmin::all();
        return view('admin', compact('allUser'));
    }

    //  CRUD
    public function createAdmin(Request $request)
    {
        // $request->(name di form)
        UserAdmin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), 
            'nama_admin' => $request->nama_admin,
            'status_aktif' => $request->status_aktif,
        ]);
        return redirect()->back();
    }

    public function updateAdmin(Request $request)
    {
        $user = UserAdmin::findOrFail($request->id);

        $user->username = $request->username;
        $user->status_aktif = $request->status_aktif;
        $user->nama_admin = $request->nama_admin;
        $user->password = Hash::make($request->password);
        $user->save();

        // redirect sesuai nama di web.php
        // return redirect()->route('adminn');
        return redirect()->back();

    }

    public function deleteAdmin(Request $request){
        $user = UserAdmin::findOrFail($request->id);
        $user->delete();
        return redirect()->back();
    }

  
}
