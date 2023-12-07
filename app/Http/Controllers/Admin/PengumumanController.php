<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\JenisKerjasama;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengumuman::orderBy('created_at', 'desc');
            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.pengumuman.index', []);
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

    public function destroy(string $id)
    {
        $delete = Pengumuman::destroy($id);
        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'error saat menghapus data',
            ]);
        }
    }

}
