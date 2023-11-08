<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();

        if ($request->ajax()) {
            return DataTables::of(User::query())->toJson();
        }

        return view('pages.dashboard.master.users', [
            'pageTitle' => 'Users',
            'tableData' => $data,
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.users.create', [
            'pageTitle' => 'Tambah User',
        ]);
    }
}
