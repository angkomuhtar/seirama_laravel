<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\JenisKerjasama;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brosur = JenisKerjasama::All();
        $kegiatan = Kegiatan::where('start', '<=', now()->format('Y-m-d'))->where('end', '>=', now()->format('Y-m-d'))->get();

        // dd($kegiatan);
        return view('pages.user.index', [
            'pageTitle' => 'Analytic Dashboard',
            'brosur' => $brosur,
            'kegiatan' => $kegiatan,
        ]);
    }

    public function kalender_kegiatan(Request $request, $date)
    {

        try {
            if ($request->ajax()) {
                $brosur = JenisKerjasama::All();
                $kegiatan = Kegiatan::where('start', '<=', $date)->where('end', '>=', $date)->with('kerjasama')->get();

                return ResponseHelper::jsonSuccess('success get data', $kegiatan);
            }
        } catch (\Exception $err) {
            return ResponseHelper::jsonError($err->getMessage(), 500);
        }

    }

    public function pengumuman()
    {
        $brosur = JenisKerjasama::All();
        $kegiatan = Kegiatan::where('start', '<=', now()->format('Y-m-d'))->where('end', '>=', now()->format('Y-m-d'))->get();

        // dd($kegiatan);
        return view('pages.user.pengumuman', [
            'pageTitle' => 'Analytic Dashboard',
            'brosur' => $brosur,
            'kegiatan' => $kegiatan,
        ]);
    }

    public function detail_pengumuman($id)
    {
        $brosur = JenisKerjasama::All();
        $kegiatan = Kegiatan::where('start', '<=', now()->format('Y-m-d'))->where('end', '>=', now()->format('Y-m-d'))->get();

        // dd($kegiatan);
        return view('pages.user.pengumuman', [
            'pageTitle' => 'Analytic Dashboard',
            'brosur' => $brosur,
            'kegiatan' => $kegiatan,
        ]);
    }

    public function detail_berita($id)
    {
        $brosur = JenisKerjasama::All();
        $kegiatan = Kegiatan::where('start', '<=', now()->format('Y-m-d'))->where('end', '>=', now()->format('Y-m-d'))->get();

        // dd($kegiatan);
        return view('pages.user.berita', [
            'pageTitle' => 'Analytic Dashboard',
            'brosur' => $brosur,
            'kegiatan' => $kegiatan,
        ]);
    }

    public function download($filename)
    {
        $path = storage_path('app/files/'.$filename); // Adjust the file path as needed
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ];

        return response()->download($path, $filename, $headers);
    }
}
