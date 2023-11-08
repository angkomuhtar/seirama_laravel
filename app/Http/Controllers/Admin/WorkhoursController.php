<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Shift;
use App\Models\WorkHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class WorkhoursController extends Controller
{
    public function index(Request $request)
    {
        $shift = Shift::All();
        if ($request->ajax()) {
            $data = WorkHours::with('shift')->select('work_hours.*');

            return DataTables::eloquent($data)->toJson();
        }

        return view('pages.dashboard.absensi.workhours', [
            'pageTitle' => 'Users',
            'shift' => $shift,
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'shift' => 'required',
            'start' => 'required',
            'end' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }
        $data = WorkHours::create([
            'shift_id' => $request->shift,
            'start' => $request->start,
            'end' => $request->end,
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
        ]);

    }

    public function destroy($id)
    {
        $delete = WorkHours::destroy($id);
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
        $data = Division::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $update = Division::find($id);
        $update->division = $request->division;
        if ($update->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Data Divisi Berhasil Update',
                'data' => $update,
            ]);
        }
    }
}
