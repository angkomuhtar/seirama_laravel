<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKerjasama;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KerjasamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JenisKerjasama::orderBy('created_at', 'desc');

            return DataTables::eloquent($data)->toJson();
        }

        return view('pages.dashboard.kerjasama.index', [
            'pageTitle' => 'Data Karyawan',
            'kerjasama' => JenisKerjasama::All(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'kerjasama_id' => 'required',
            'tempat' => 'required',
            'waktu' => 'required',
        ], [
            'required' => 'tidak boleh kosong',
            'date' => 'Harus tanggal dengan format YYYY/MM/DD',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }

        $data = Kegiatan::create([
            'judul' => $request->judul,
            'kerjasama_id' => $request->kerjasama_id,
            'pelaksana' => $request->pelaksana,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'pengajar' => $request->pengajar,
            'instansi' => $request->instansi,
            'sarana' => $request->sarana,
            'peserta' => $request->peserta,
        ]);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Data Kegiatan Berhasil Disimpan',
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Kegiatan::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kegiatan::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'kerjasama_id' => 'required',
            'tempat' => 'required',
            'waktu' => 'required',
        ], [
            'required' => 'tidak boleh kosong',
            'date' => 'Harus tanggal dengan format YYYY/MM/DD',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }

        $data = Kegiatan::find($id)->update([
            'judul' => $request->judul,
            'kerjasama_id' => $request->kerjasama_id,
            'pelaksana' => $request->pelaksana,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'pengajar' => $request->pengajar,
            'instansi' => $request->instansi,
            'sarana' => $request->sarana,
            'peserta' => $request->peserta,
        ]);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Data Kegiatan Berhasil Diupdate',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Kegiatan::destroy($id);
        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Data divisi berhasil disimpan',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'error saat menghapus data',
            ]);
        }
    }
}
