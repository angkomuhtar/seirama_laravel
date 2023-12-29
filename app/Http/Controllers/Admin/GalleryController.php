<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\JenisKerjasama;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class GalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::orderBy('created_at', 'desc');
            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.gallery.index', [
            'pageTitle' => 'Data Karyawan',
            'kerjasama' => JenisKerjasama::All(),
        ]);
    }
    public function store (Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'tanggal' => 'required|date',
                'images' => 'required|file|mimes:jpg,jpeg,png,mp4,avi,mov,wmv,flv',
            ], [
                'required' => 'tidak boleh kosong',
                'date' => 'Harus tanggal dengan format YYYY/MM/DD',
                'mimes' => 'Hanya mendukung file jpg,jpeg,png,mp4,avi,mov,wmv,flv'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
            }
    
            $file = $request->file('images');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/gallery'), $fileName);
            $data = $request->except(['surat', '_token', 'tanggal']);
            $data = Gallery::create([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'images' =>'gallery/'.$fileName,
            ]);
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

    public function edit(string $id)
    {
        $data = Gallery::find($id);

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
                'tanggal' => 'required|date'
            ], [
                'required' => 'tidak boleh kosong',
                'date' => 'Harus tanggal dengan format YYYY/MM/DD',
                'mimes' => 'Hanya mendukung file jpg,jpeg,png,mp4,avi,mov,wmv,flv'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
            }
    
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/gallery'), $fileName);
                $data = $request->except(['surat', '_token', 'tanggal']);
                $data = Gallery::find($id)->update([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,
                    'images' =>'gallery/'.$fileName,
                ]);
                if ($data) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Data Kegiatan Berhasil Disimpan',
                    ]);
                }
            }else{
                $data = Gallery::find($id)->update([
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
        $delete = Gallery::destroy($id);
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



    public function index_slider(Request $request)
    {
        if ($request->ajax()) {
            $data = Slider::orderBy('urut', 'asc');
            return DataTables::eloquent($data)->toJson();
        }
        return view('pages.dashboard.slider.index', [
            'pageTitle' => 'Data Karyawan',
            'kerjasama' => JenisKerjasama::All(),
            'banner' => Banner::orderBy('created_at', 'desc')->first(),
        ]);
    }

    public function store_slider (Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'urut' => 'required',
                'images' => 'required|file|mimes:jpg,jpeg,png,mp4,avi,mov,wmv,flv',
            ], [
                'required' => 'tidak boleh kosong',
                'date' => 'Harus tanggal dengan format YYYY/MM/DD',
                'mimes' => 'Hanya mendukung file jpg,jpeg,png,mp4,avi,mov,wmv,flv'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
            }
    
            $file = $request->file('images');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/slider'), $fileName);
            $data = $request->except(['images', '_token']);
            $data = Slider::create([
                'urut' => $request->urut,
                'file' =>'slider/'.$fileName,
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

    public function edit_slider(string $id)
    {
        $data = Slider::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    public function update_slider(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'urut' => 'required',
            ], [
                'required' => 'tidak boleh kosong',
                'date' => 'Harus tanggal dengan format YYYY/MM/DD',
                'mimes' => 'Hanya mendukung file jpg,jpeg,png,mp4,avi,mov,wmv,flv'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
            }
    
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/gallery'), $fileName);
                $data = $request->except(['images', '_token']);
                $data = Slider::find($id)->update([
                    'urut' => $request->urut,
                    'file' =>'slider/'.$fileName,
                ]);
                if ($data) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Data Kegiatan Berhasil Disimpan',
                    ]);
                }
            }else{
                $data = Slider::find($id)->update([
                    'urut' => $request->judul,
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

    public function destroy_slider(string $id)
    {
        $delete = Slider::destroy($id);
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

    public function update_banner(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'subtitle' => 'required',
                'second_title' => 'required',
                'desc' => 'required',
            ], [
                'required' => 'tidak boleh kosong',
                'date' => 'Harus tanggal dengan format YYYY/MM/DD',
                'mimes' => 'Hanya mendukung file jpg,jpeg,png,mp4,avi,mov,wmv,flv'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
            }
    
            $data = Banner::find($id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'second_title' => $request->second_title,
                'desc' => $request->desc,
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

    
}
