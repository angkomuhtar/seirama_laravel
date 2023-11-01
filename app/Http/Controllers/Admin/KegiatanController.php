<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Kegiatan;
use App\Models\JenisKerjasama;


class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kegiatan::with('kerjasama')->orderBy('created_at', 'desc');
            return DataTables::eloquent($data)->toJson();
          }
          return view('pages.dashboard.kegiatan.index', [
              'pageTitle' => 'Data Karyawan',
              'kerjasama' => JenisKerjasama::All()
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
            'nama'     => 'required',
            'kerjasama'     => 'required',
            'tempat'  => 'required',
            'waktu'  => 'required',
          ],[
              'required' => 'tidak boleh kosong',
              'date' => 'Harus tanggal dengan format YYYY/MM/DD'
          ]);
          if ($validator->fails()) {
            return response()->json([ 'success' => 'false', 'error' => $validator->errors()->toArray()], 422);
          }


          $data = Kegiatan::create([
            'judul' => $request->nama,
            'kerjasama_id' => $request->kerjasama,
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
                    'message' => 'Data Kegiatan Berhasil Disimpan'
                ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Kegiatan::destroy($id);
        if ($delete){
            return response()->json([
                'success' => true,
                'message' => 'Data divisi berhasil disimpan'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "error saat menghapus data"
            ]);
        }
    }   
}
