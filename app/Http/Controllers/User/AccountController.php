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
use App\Models\Sertifikat;
use App\Models\JenisKerjasama;
use App\Models\UserKerjasama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class AccountController extends Controller
{


    public function index(Request $request)
    {
        $user = Auth::guard('web')->user();
        $type_peserta = $user->profile->isASN == 'Y' ? 'ASN' : 'Non-ASN';
        $join = Peserta::where('user_id', $user->id)->count();
        $kegiatan_terakhir = Peserta::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
 
        if ($request->ajax()) {
            $data = Kegiatan::with('kerjasama')->where('end', '>=', date('Y-m-d'))->where('type_peserta', $type_peserta)->orderBy('created_at', 'desc');
            return DataTables::eloquent($data)->toJson();
        }

        return view('pages.user.dashboard.index',['user' => $user, 'kegiatan'=>$join, 'kegiatan_terakhir'=>$kegiatan_terakhir]);
    }

    public function kegiatan(Request $request)
    {
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
        $user_id = Auth::guard('web')->user()->id;
        $join = Peserta::where('user_id', $user_id)->where('kegiatan_id', $id)->count();
        $data = Kegiatan::where('id', $id)->with('kerjasama', 'peserta')->orderBy('created_at', 'desc')->first();
        return view('pages.user.dashboard.kegiatan_details', ['kegiatan' => $data, 'is_join' => $join]);
    }

    public function join_kegiatan($id)
    {
        $user = Auth::guard('web')->user();
        $type_peserta = $user->profile->isASN == 'Y' ? 'ASN' : 'Non-ASN';

        if(!$user->profile->tgl_lahir || (!$user->asn_data && $user->profile->isASN == 'Y') || (!$user->user_data && $user->profile->isASN != 'Y')){
            return response()->json([
                'success' => false,
                'status' => 'validate',
                'message' => 'data belum lengkap'
            ]);
        }
        $kegiatan = Kegiatan::where('id',$id)->where('end', '>=', date('Y-m-d')->where('type_peserta', $type_peserta))->first();

        if ($kegiatan == null ) {
            return response()->json([
                'success' => false,
                'status' => 'expire',
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

    public function sertifikat (Request $request, $id)
    {
        // return view('pages.user.dashboard.sertifikat');

        $user = Auth::guard('web')->user()->profile->nama;
        $data = Sertifikat::where('kegiatan_id', $id)->first();
        $pdf = Pdf::loadView('pages.user.dashboard.sertifikat', ['name' => $user, 'data'=>$data ])->setPaper('letter', 'landscape');
        return $pdf->stream('invoice.pdf');
    }

    public function kerjasama_index(Request $request)
    {
        if ($request->ajax()) {
            $data = UserKerjasama::with('jenis_kerjasama')->where('user_id',  Auth::guard('web')->user()->id)->orderBy('created_at', 'desc');
            // dd($data);
            return DataTables::eloquent($data)->toJson();
        }

        return view('pages.user.dashboard.kerjasama');
    }
    
    public function kerjasama_create(Request $request)
    {
        $kerjasama= JenisKerjasama::all();
        return view('pages.user.dashboard.kerjasama_create',[
            'kerjasama' => $kerjasama
        ]);
    }

    public function kerjasama_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'instansi' => 'required',
            'user_id' => 'required',
            'kerjasama_id' => 'required',
            'nm_kegiatan' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'cp' => 'required',
            'surat' => 'required|file|mimes:jpeg,png,pdf,docx,doc|max:2048',
        ],[
            'required'=> 'Data Harus diisi',
            'mimes'=> 'Hanya Mendukung File : jpeg,png,pdf,docx,doc',
            'file'=> 'Data Harus diisi',
            'surat.max' => 'File Maximum 2 MB'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        };

        $tanggal =  explode(' to ', $request->tanggal);
        $file = $request->file('surat');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('surat_kerjasama'), $fileName);
        $data = $request->except(['surat', '_token', 'tanggal']);
        $insert = UserKerjasama::create(array_merge($data, ['surat'=> $fileName, 'start'=> $tanggal[0], 'end'=> $tanggal[1] ?? $tanggal[0]]));
        return response()->json(['success' => 'true', 'message' => 'data tersimpan', 200]);

    }
}
