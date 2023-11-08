<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        // return Auth::guard('web')->user();
        if ($request->ajax()) {
            $data = Kegiatan::with('kerjasama')->orderBy('created_at', 'desc');

            return DataTables::eloquent($data)->toJson();
        }

        return view('pages.user.dashboard.index');
    }

    public function kegiatan(Request $request)
    {
        // return Auth::guard('web')->user();
        if ($request->ajax()) {
            $data = Kegiatan::with('kerjasama')->orderBy('created_at', 'desc');

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

        Peserta::create([
            'user_id' => $user_id,
            'kegiatan_id' => $id,
        ]);

    }
}
