<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Peserta;
use App\Models\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $profile = Auth::guard('web')->user();
        $join = Peserta::where('user_id', $profile->id)->count();
        $kegiatan_terakhir = Peserta::where('user_id', $profile->id)->orderBy('created_at', 'desc')->first();
 
        if ($request->ajax()) {
            $data = Kegiatan::with('kerjasama')->orderBy('created_at', 'desc');

            return DataTables::eloquent($data)->toJson();
        }

        return view('pages.user.dashboard.index',['user' => $profile, 'kegiatan'=>$join, 'kegiatan_terakhir'=>$kegiatan_terakhir]);
    }

    public function kegiatan(Request $request)
    {
        // return Auth::guard('web')->user();
        if ($request->ajax()) {
            $data = Kegiatan::with('kerjasama')->whereHas('peserta', function($q){
                return $q->where('user_id', '=', Auth::guard('web')->user()->id);
            })->orderBy('created_at', 'desc');

            // dd($data);
            return DataTables::eloquent($data)->toJson();
        }

        return view('pages.user.dashboard.kegiatan');
    }

    public function kegiatan_details($id)
    {
        // return Auth::guard('web')->user();
        $user_id = Auth::guard('web')->user()->id;
        $join = Peserta::where('user_id', $user_id)->where('kegiatan_id', $id)->count();
        $data = Kegiatan::where('id', $id)->with('kerjasama', 'peserta')->orderBy('created_at', 'desc')->first();

        // return $join;
        return view('pages.user.dashboard.kegiatan_details', ['kegiatan' => $data, 'is_join' => $join]);
    }

    public function join_kegiatan($id)
    {
        $user_id = Auth::guard('web')->user()->id;
        $join = Peserta::create([
            'user_id' => $user_id,
            'kegiatan_id' => $id,
        ]);

        if ($join) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
            ]);
        }

    }

    public function profile(Request $request)
    {
        $profile = Auth::guard('web')->user();
        $agama = Options::where('type', 'agama')->get();
        $nikah = Options::where('type', 'sts_nikah')->get();
        $golongan = Options::where('type', 'golongan')->get();
        $jabatan = Options::where('type', 'golongan_jabatan')->get();
        $eselon = Options::where('type', 'unit_eselon')->get();
        $pendidikan = Options::where('type', 'pendidikan')->get();

        return view('pages.user.dashboard.profile', [
            'profile' => $profile->profile, 
            'user' => $profile, 
            'agama'=>$agama , 
            'nikah'=> $nikah,
            'golongan'=> $golongan,
            'jabatan'=> $jabatan,
            'eselon'=> $eselon,
            'pendidikan'=> $pendidikan,

        ]);
    }

    public function update_biodata (Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'ktp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'jenkel' => 'required',
            'status_pernikahan' => 'required',
            'agama' => 'required',
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
}
