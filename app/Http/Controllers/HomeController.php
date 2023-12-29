<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\JenisKerjasama;
use App\Models\Kegiatan;
use App\Models\Gallery;
use App\Models\Pengumuman;
use App\Models\Berita;
use App\Models\Slider;
use App\Models\Banner;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $brosur = JenisKerjasama::All();
        $kegiatan = Kegiatan::where('start', '<=', now()->format('Y-m-d'))->where('end', '>=', now()->format('Y-m-d'))->get();
        $gallery = Gallery::paginate(6);
        $news = Berita::paginate(6);
        $slider = Slider::orderBy('urut', 'asc')->get();
        $banner = Banner::orderBy('created_at')->first();

        // dd($kegiatan);
        return view('pages.user.index', [
            'pageTitle' => 'Analytic Dashboard',
            'brosur' => $brosur,
            'kegiatan' => $kegiatan,
            'gallery' =>$gallery,
            'news' => $news,
            'slider' => $slider,
            'banner'=> $banner
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
        $data = Pengumuman::paginate(9);
        return view('pages.user.pengumuman', [
            'data' => $data,
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
        $news = Berita::find($id);
        $related = Berita::where('id', '<>', $id)->paginate(3);
        $kegiatan = Kegiatan::where('start', '<=', now()->format('Y-m-d'))->where('end', '>=', now()->format('Y-m-d'))->get();

        // dd($kegiatan);
        return view('pages.user.berita', [
            'pageTitle' => 'Analytic Dashboard',
            'news' => $news,
            'related' => $related,
        ]);
    }

    public function downloadPengumuman($filename)
    {
        $file= public_path(). "/storage/pengumuman/".$filename;
        $headers = array('Content-Type: application/pdf');        
        if (file_exists($file)) {
            return Response::download($file, 'pengumuman.pdf', $headers);
        }else{
            abort(404);
        }

    }
}
