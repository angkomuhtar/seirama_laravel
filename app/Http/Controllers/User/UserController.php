<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisKerjasama;
use App\Models\Kegiatan;

class UserController extends Controller
{
    public function index ()
    {

      $brosur = JenisKerjasama::All();
      $kegiatan = Kegiatan::where('waktu', '>=', now()->format('Y-m-d'))->get();
      // dd($kegiatan);
      return view('pages.user.index', [
          'pageTitle' => 'Analytic Dashboard',
          'brosur' => $brosur,
          'kegiatan' =>$kegiatan
      ]);
    }
}
