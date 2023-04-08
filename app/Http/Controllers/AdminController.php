<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\Heading;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index',);
    }

    public function login()
    {
        return view('admin.sign-in');
    }

    public function login_check(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(url('dashboard'));
        } else {
            Session::flash('message', 'wrong Credentials');
            return redirect(url('dashboard/sign-in'));
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(URL::previous());
    }
    public function flight_update(Request $request, $flighttype, $flightkey)
    {

        if ($flighttype == 'heading') {
            $update = Heading::find($flightkey);
        }
        //  elseif ($flighttype == 'content') {
        //     $update = Content::find($flightkey);
        // } elseif ($flighttype == 'text') {
        //     $update = Text::find($flightkey);
        // } elseif ($flighttype == 'image') {
        //     $update = Image::find($flightkey);
        // }

        $update->data = $request->input('data');
        $update->save();
        return $request->input('data') . ' Updated';
    }
}
