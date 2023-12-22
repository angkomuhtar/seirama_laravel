<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('profile', 'asn_data', 'user_data')->where('roles', 'users')->orderBy('created_at', 'desc')->get();
            // return DataTables::of($data)->toJson();
            return DataTables::of($data)
            ->addColumn('avatar_url', function ($row) {
                return $row->avatar_url;
            })
            ->make(true);
            // return response()->json($data, 200);
        }
        return view('pages.dashboard.users.index', []);
    }


    // admin
    public function admin(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('profile', 'asn_data', 'user_data')->where('roles', 'admin')->orderBy('created_at', 'desc')->get();
            // return DataTables::of($data)->toJson();
            return DataTables::of($data)
            ->addColumn('avatar_url', function ($row) {
                return $row->avatar_url;
            })
            ->make(true);
        }
        return view('pages.dashboard.admin.index', []);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'username' => 'required|unique:users',
            'telp' => 'required',
            'password' => 'required|min:8',
            'nama' => 'required',
        ], [
            'required' => 'tidak boleh kosong',
            'unique' => 'tidak tersedia',
            'email' => 'harus format email (example@email.com) '
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }

        DB::beginTransaction();
        try {
            $users = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'email_verified_at' => now(),
                'password' => bcrypt($request->password),
                'roles' => 'admin',
            ]);

            // return $users;
            $profile = Profile::create(
                [
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'ktp' => '0000',
                    'user_id' => $users->id,
                ]);
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan',
            ]);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'type' => 'err',
                'data' => $err,
            ]);
        }
    }

    // public function edit(string $id)
    // {
    //     $data = Pengumuman::find($id);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data Divisi Berhasil Disimpan',
    //         'data' => $data,
    //     ]);
    // }

    public function update(Request $request, string $id)
    {
        try {
            $data = User::find($id)->update(['password'=> bcrypt('password')]);
            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Kegiatan Berhasil Disimpan',
                ]);
            }
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => $err,
            ]);
        }
    }

    public function destroy(Request $request, string $id)
    {
        $delete = User::find($id)->update(['status'=> $request->status]);
        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Data disabled',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'error saat menghapus data',
                'ERR' => ''
            ]);
        }
    }
}
