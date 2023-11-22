<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Peserta;
use App\Models\Options;
use App\Models\Propinsi;
use App\Models\Profile;
use App\Models\AsnData;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        $user = Auth::guard('web')->user();

        if(!$user->profile->tgl_lahir || (!$user->asn_data && $user->profile->isASN == 'Y') || (!$user->user_data && $user->profile->isASN != 'Y')){
            return response()->json([
                'success' => false,
                'status' => 'validate',
                'message' => 'data belum lengkap'
            ]);
        }

        $join = Peserta::create([
            'user_id' => $user->id,
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
        $user = Auth::guard('web')->user();
        $agama = Options::where('type', 'agama')->get();
        $nikah = Options::where('type', 'sts_nikah')->get();
        $golongan = Options::where('type', 'golongan')->get();
        $jabatan = Options::where('type', 'golongan_jabatan')->get();
        $eselon = Options::where('type', 'unit_eselon')->get();
        $pendidikan = Options::where('type', 'pendidikan')->get();
        $propinsi = Propinsi::All();

        return view('pages.user.dashboard.profile', [
            'profile' => $user->profile, 
            'asn_data' => $user->asn_data, 
            'user_data' => $user->user_data, 
            'user' => $user, 
            'agama'=>$agama , 
            'nikah'=> $nikah,
            'golongan'=> $golongan,
            'jabatan'=> $jabatan,
            'eselon'=> $eselon,
            'pendidikan'=> $pendidikan,
            'propinsi'=> $propinsi,

        ]);
    }

    public function update_profile (Request $request){
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
        ],[
            'required'=> 'Data Harus diisi'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }
        $user_id = Auth::guard('web')->user()->id;
        $data = Profile::where('user_id', $user_id)->first();

        if ($data) {
            $update = Profile::where('user_id', $user_id)->update([
                'nama' => $request->nama,
                'ktp' => $request->ktp,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'jenkel' => $request->jenkel,
                'status_pernikahan' => $request->status_pernikahan,
                'agama' => $request->agama,
            ]);
            if ($update) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => 'user tidak di temukan',
            ]);
        }

        
        
    }

    public function update_asn_data (Request $request){
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'npwp' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'gol_jabatan' => 'required',
            // 'nama_jabatan' => 'required',
            'education' => 'required',
            'unit_kerja' => 'required',
            'unit_eselon' => 'required',
            'unit_address' => 'required',
            'telp' => 'required',
            'propinsi' => 'required',
            'kabupaten' => 'required'
        ],[
            'required' => 'data harus diisi'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }
        $user_id = Auth::guard('web')->user()->id;
        $data = AsnData::where('user_id', $user_id)->first();

        if ($data) {
            $update = AsnData::where('user_id', $user_id)->update($request->except(['email', '_token', 'user_id']));
            if ($update) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }
        }else{
            // return $data;
            $insert = AsnData::create($request->all());
            if ($insert) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }
        }

        
        
    }

    public function update_user_data (Request $request){
        $validator = Validator::make($request->all(), [
            'pendidikan' => 'required',
            'jenis_usaha' => 'required',
            'nama_kt' => 'required',
            'jabatan' => 'required',
            'propinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required'
        ],[
            'required' => 'data harus diisi'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }
        $user_id = Auth::guard('web')->user()->id;
        $data = UserData::where('user_id', $user_id)->first();

        if ($data) {
            $update = UserData::where('user_id', $user_id)->update($request->except(['email', '_token', 'user_id']));
            if ($update) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }
        }else{
            // return $data;
            $insert = UserData::create($request->all());
            if ($insert) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                ]);
            }
        }

        
        
    }
}
