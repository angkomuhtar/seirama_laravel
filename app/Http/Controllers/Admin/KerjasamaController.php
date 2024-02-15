<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKerjasama;
use App\Models\UserKerjasama;
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

    public function show(string $id)
    {
        $data = Kegiatan::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = Kegiatan::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

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

    public function pengajuan(Request $request)
    {
        if ($request->ajax()) {
            $data = UserKerjasama::with('user', 'user.profile', 'jenis_kerjasama')->orderBy('created_at', 'desc');
            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.kerjasama.pengajuan', [
            'pageTitle' => 'Data Karyawan',
            'kerjasama' => JenisKerjasama::All(),
        ]);
    }

    public function details($id)
    {
        return view('pages.dashboard.kerjasama.pengajuan_details', [
            'pageTitle' => 'Data Karyawan',
            'data' => UserKerjasama::find($id),
        ]);
    }

    public function pengajuan_accept(Request $request, $id)
    {
        $data = UserKerjasama::find($id);
        $kegiatan = Kegiatan::create([
            'judul' => $data->nm_kegiatan,
            'kerjasama_id' => $data->kerjasama_id,
            'pelaksana' => '-',
            'start' => $data->start,
            'end' => $data->end,
            'tempat' => $data->lokasi,
            'pengajar' => $data->pengajar,
            'instansi' => $data->instansi,
        ]);
        if ($data->update(['status'=> 'accept', 'id_kegiatan' => $kegiatan->id])) {
            return response()->json([
                'success' => true,
                'message' => 'Data divisi berhasil disimpan',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'error saat megupdate data',
            ]);
        }
    }

    public function pengajuan_reject(Request $request, $id)
    {
        $data = UserKerjasama::find($id)->update(['status'=> 'reject']);
        
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Data divisi berhasil disimpan',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'error saat megupdate data',
            ]);
        }
    }

    public function pengajuan_destroy(string $id)
    {
        $delete = UserKerjasama::destroy($id);
        if ($delete) {
            return response()->json([
                'success' => true,
                'message' => 'Data Kerjasama Terhapus',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'error saat menghapus data',
            ]);
        }
    }

    public function pengajuan_update(Request $request, string $id)
    {
        $fileName= '';
        if ($request->hasFile('mou')) {
            $file = $request->file('mou');
            $fileName ='mou_'. uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/mou'), $fileName);
        }
        $delete = UserKerjasama::find($id)->update([
            'mou' => $fileName,
            'cakupan_kerjasama' => $request->cakupan ?? '',
            'sumber_dana' => $request->sumber_dana ?? '',
            'no_mou' => $request->no_mou ?? '',
        ]);
        if ($delete) {
            return redirect()->route('pengajuan');
        } else {
            return response()->json([
                'success' => false,
                'message' => 'error saat menghapus data',
            ]);
        }
    }
}
