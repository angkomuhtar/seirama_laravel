<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisKerjasama;
use App\Models\Kegiatan;
use App\Models\Berita;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Berita::orderBy('created_at', 'desc');
            return DataTables::eloquent($data)->toJson();
        }

        return view('pages.dashboard.berita.index', [
            'pageTitle' => 'Data Karyawan',
            'kerjasama' => JenisKerjasama::All(),
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.berita.create', [
            'pageTitle' => 'Data Karyawan',
            'kerjasama' => JenisKerjasama::All(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'content' => 'required',
            'desc' => 'required',
            'image' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ], [
            'required' => 'tidak boleh kosong',
            'mimes' => 'hanya boleh gambar',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/berita'), $fileName);
            $data = $request->except(['image', '_token']);
            // dd($data);
            $insert = Berita::create(array_merge($data, ['image'=> 'berita/'.$fileName]));
            
            if ($insert) {
                # code...
                $request->session()->flash('success', 'Berita berhasil disimpan');
                return back()
                ->withInput();
            }
        }else{
            return back()
            ->withInput();
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
        $data = Berita::find($id);

        return view('pages.dashboard.berita.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'content' => 'required',
                'desc' => 'required',
                'image' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            ], [
                'required' => 'tidak boleh kosong',
                'mimes' => 'hanya boleh gambar',
            ]);
    
            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/berita'), $fileName);
            $data = $request->except(['image', '_token']);
            $insert = Berita::find($id)->update(array_merge($data, ['image'=> 'berita/'.$fileName]));
            
            if ($insert) {
                # code...
                $request->session()->flash('success', 'Berita berhasil disimpan');
                return back()
                ->withInput();
            }
        }else{
            $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'content' => 'required',
                'desc' => 'required',
            ], [
                'required' => 'tidak boleh kosong',
            ]);
    
            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }
            $data = $request->except(['image', '_token']);
            $insert = Berita::find($id)->update($data);
            if ($insert) {
                $request->session()->flash('success', 'Berita berhasil disimpan');
                return back()
                ->withInput();
            }
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Berita::destroy($id);
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
