<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Position::with('division', 'company');

            return DataTables::eloquent($data)->toJson();
        }
        $division = Division::all();

        return view('pages.dashboard.absensi.attendance', [
            'division' => $division,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'division' => 'required',
            'position' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }
        $data = Position::create([
            'company_id' => $request->company,
            'division_id' => $request->division,
            'position' => $request->position,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
        ]);

    }

    public function destroy($id)
    {
        $delete = Position::destroy($id);
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

    public function edit($id)
    {
        $data = Position::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'division' => 'required',
            'position' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }
        $update = Position::find($id);
        $update->division_id = $request->division;
        $update->position = $request->position;
        if ($update->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Update',
                'data' => $update,
            ]);
        }
    }
}
