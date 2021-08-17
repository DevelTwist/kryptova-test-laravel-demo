<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class LoginController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'date_of_birth' => 'required',
            'address' => 'required|string',
            'role' => 'required|string',
            'profile_thumbnail' => 'nullable|mimes:jpeg,png'
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        if ($request->hasFile('profile_thumbnail')) {

            if ($request->file('profile_thumbnail')->isValid()) {
                $extension = $request->profile_thumbnail->extension();
                $filename = $user->id;
                $filename = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $filename);
                $filename = strtolower($filename);

                $request->profile_thumbnail->storeAs('/public/thumbnail/', $filename.".".$extension);
                $url = Storage::url("/thumbnail". $filename.".".$extension);
   
                $user->profile_thumbnail = $url;
                $user->save();
            }

            return $user;
        }
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($login)) {
            $user = Auth::user();
            return $user;
        } else {
            return response(['message' => 'Invalid Login'], 401);
        }
    }

    public function getLoginView()
    {
        return view('auth/login');
    }
}
