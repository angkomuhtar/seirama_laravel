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
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' =>'required'
        ], [
            'required' => 'tidak boleh kosong',
            'date' => 'Harus tanggal dengan format YYYY/MM/DD',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }
        $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/kerjasama'), $fileName);
            $data = $request->except(['surat', '_token', 'tanggal']);
            $data = JenisKerjasama::find($id)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'image' =>'kerjasama/'.$fileName,
            ]);
            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }

    }

    public function show(string $id)
    {
        $data = JenisKerjasama::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = JenisKerjasama::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ], [
            'required' => 'tidak boleh kosong',
            'date' => 'Harus tanggal dengan format YYYY/MM/DD',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/kerjasama'), $fileName);
            $data = $request->except(['surat', '_token', 'tanggal']);
            $data = JenisKerjasama::find($id)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'image' =>'kerjasama/'.$fileName,
            ]);
            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }
        }else{
            $data = JenisKerjasama::find($id)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }
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
            'mou' => $data->mou,
            'no_mou' => $data->no_mou,
            'cakupan_kerjasama' => $data->cakupan_kerjasama,
            'sumber_dana' => $data->sumber_dana,
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
            return redirect()->back();
        } else {
            return response()->json([
                'success' => false,
                'message' => 'error saat menghapus data',
            ]);
        }
    }
}
