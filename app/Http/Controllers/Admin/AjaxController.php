<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function getDivision(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Division::where('company_id', $id)->get();

            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        }
    }

    public function getPosition(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Position::where('division_id', $id)->get();

            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        }
    }

    public function userValidate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|unique:users',
                'email' => 'required|email:rfc|string|unique:users',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'min:6|required',
            ], [
                'required' => 'tidak boleh kosong',
                'min' => 'minimal :min karakter',
                'confirmed' => 'password harus sama dengan confirm password',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->errors(),
                ]);
            }
            $data = Division::where('company_id', 1)->get();

            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        }
    }

    public function profileValidate(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'card_id' => 'required|min:14|numeric',
                'kk' => 'required',
                'tmp_lahir' => 'required',
                'tgl_lahir' => 'required|date',
                'education' => 'required',
                'religion' => 'required',
                'marriage' => 'required',
                'id_addr' => 'required',
                'live_addr' => 'required',

            ], [
                'required' => 'tidak boleh kosong',
                'min' => 'minimal :min karakter',
                'numeric' => 'hanya boleh angka',
                'tgl_lahir.date' => 'Harus tanggal dengan format YYYY/MM/DD',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'data' => $validator->errors(),
                ]);
            }

            return response()->json([
                'success' => true,
                'data' => 'success',
            ]);
        }
    }
}
