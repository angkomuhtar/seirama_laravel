<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data = User::all();

    //     if ($request->ajax()) {
    //         return DataTables::of(User::query())->toJson();
    //     }

    //     return view('pages.dashboard.master.users', [
    //         'pageTitle' => 'Users',
    //         'tableData' => $data,
    //     ]);
    // }

    // public function create()
    // {
    //     return view('pages.dashboard.users.create', [
    //         'pageTitle' => 'Tambah User',
    //     ]);
    // }

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
        }
        return view('pages.dashboard.users.index', []);
    }
    public function store (Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'images' => 'required|file|mimes:jpg,jpeg,png,pdf',
            ], [
                'required' => 'tidak boleh kosong',
                'mimes' => 'Hanya mendukung file jpg,jpeg,png,pdf'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
            }
    
            $file = $request->file('images');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/pengumuman'), $fileName);
            $data = $request->except(['surat', '_token', 'tanggal']);
            $data = Pengumuman::create([
                'judul' => $request->judul,
                'file' =>$fileName,
            ]);
            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => $err,
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = Pengumuman::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul' => 'required',
            ], [
                'required' => 'tidak boleh kosong',
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
            }
    
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/pengumuman'), $fileName);
                $data = $request->except(['surat', '_token', 'tanggal']);
                $data = Pengumuman::find($id)->update([
                    'judul' => $request->judul,
                    'file' =>$fileName,
                ]);
                if ($data) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Data Kegiatan Berhasil Disimpan',
                    ]);
                }
            }else{
                $data = Pengumuman::find($id)->update([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,
                ]);
                if ($data) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Data Kegiatan Berhasil Disimpan',
                    ]);
                }
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
