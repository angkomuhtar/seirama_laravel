<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        $roles = Auth::guard('web')->user()->roles ?? null;
        if ($roles == 'admin' || $roles == 'superadmin') {
            return redirect()->route('dashboard');
        } elseif ($roles == 'users') {
            return redirect()->route('account');
        }

        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->getLastAttempted();
            // dd($user);
            if ($user->status != 'Y') {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                return back()->withErrors([
                    'email' => 'Username is disabled',
                ])->onlyInput('email', 'password');
            }

            if ($user->roles == 'admin' || $user->roles == 'superadmin') {
                $request->session()->regenerate();

                return redirect()->route('dashboard')
                    ->withSuccess('You have successfully logged in!');
            } elseif ($user->roles == 'users') {
                $request->session()->regenerate();

                return redirect()->route('account')
                    ->withSuccess('You have successfully logged in!');
            } else {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Your Roles not Permission',
                ])->onlyInput('email', 'password');
            }
        } else {
            return back()->withErrors([
                'email' => 'Username not found in crendential',
            ])->onlyInput('email', 'password');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }

    public function register()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('dashboard');
        }

        return view('pages.auth.register');
    }

    public function store(Request $request)
    {

        // return $request->step;
        if ($request->step == 1) {
            $request->validate([
                'email' => 'required|unique:users|email',
                'username' => 'required|unique:users',
                'password' => 'required|confirmed|min:8',
            ], [
                'required' => 'tidak boleh kosong',
                'unique' => ':attribute sudah digunakan',
                'confirmed' => 'field password dan konfirmasi password tidak sesuai',
                'min' => 'minimal :min karakter',
            ]);
        } else {
            $request->validate([
                'nama' => 'required',
                'ktp' => 'required|numeric',
                'telp' => 'required',
            ], [
                'required' => 'tidak boleh kosong',
                'numeric' => ':attribute harus numerik',
                'min' => 'minimal :min karakter',
            ]);
        }

        DB::beginTransaction();
        try {
            $users = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'email_verified_at' => now(),
                'password' => bcrypt($request->password),
                'roles' => 'users',
            ]);

            // return $users;
            $profile = Profile::create(
                [
                    'nama' => $request->nama,
                    'ktp' => $request->ktp,
                    'telp' => $request->telp,
                    'isASN' => $request->isASN,
                    'jenkel' => $request->jenkel,
                    'telp' => $request->telp,
                    'user_id' => $users->id,
                ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'type' => 'err',
                'data' => $th,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => 'Data Created',
        ]);

        // $field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // $credentials =[
        //     $field =>$request->email,
        //     'password' =>$request->password
        // ];

        // if(Auth::guard('web')->attempt($credentials))
        // {
        //     $user = Auth::guard('web')->getLastAttempted();
        //     // dd($user);
        //     if ($user->roles == 'admin' || $user->roles == 'superadmin') {
        //         $request->session()->regenerate();
        //         return redirect()->route('dashboard')
        //             ->withSuccess('You have successfully logged in!');
        //     }elseif ($user->roles == 'user') {
        //         $request->session()->regenerate();
        //         return redirect()->route('account')
        //             ->withSuccess('You have successfully logged in!');
        //     }else {
        //         Auth::guard('web')->logout();
        //         $request->session()->invalidate();
        //         $request->session()->regenerateToken();
        //         return back()->withErrors([
        //             'email' => 'Your Roles not Permission',
        //         ])->onlyInput('email', 'password');
        //     }
        // }else {
        //     return back()->withErrors([
        //         'email' => 'Username not found in crendential',
        //     ])->onlyInput('email', 'password');
        // }
    }
}
