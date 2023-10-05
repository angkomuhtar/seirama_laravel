<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClockLocation;
use App\Models\Clock;
use App\Models\WorkHours;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ResponseHelper;


class ClockController extends Controller
{
    public function index(){
        try {
            $clock = Clock::where('user_id', Auth::user()->id)->get();
            return ResponseHelper::jsonSuccess('success get data', $clock);
        } catch (\Throwable $err) {
            return ResponseHelper::jsonError('internal Error', 500);
        }
    }

    public function home(Request $request){
        try {
            $absen = Clock::whereBetween('date', ['2023-09-26', '2023-10-25']);
            $hadir = $absen->where('status', 'H')->count();
            $rekap = [
                'hadir'=>$hadir,
                'alpa'=> 0,
                'izin' => 1 
            ];
            
            $work_hours = WorkHours::whereColumn('start', '>', 'end')->get();
            $wh_id = $work_hours->pluck('id')->toArray();
            $today = Clock::where(function($query) use($request) {
                $query->where('user_id',Auth::user()->id)
                ->where('date', date('Y-m-d'));
            })
            ->orWhere(function($query) use($request, $wh_id) {
                $query->where('user_id',Auth::user()->id)
                ->where('date', date('Y-m-d', strtotime('-1 day')))
                ->whereNull('clock_out')
                ->whereIn('work_hours_id', $wh_id);
            })
            ->get();
            $data = collect(['rekap'=>$rekap, 'today'=>$today]);
            return ResponseHelper::jsonSuccess('success get data', $data);
        } catch (\Throwable $err) {
            return ResponseHelper::jsonError('internal Error', 500);
        }
    }

    public function today(Request $request){
        try {
            $work_hours = WorkHours::whereColumn('start', '>', 'end')->get();
            $wh_id = $work_hours->pluck('id')->toArray();
            $today = Clock::where(function($query) use($request) {
                $query->where('user_id',Auth::user()->id)
                ->where('date', date('Y-m-d'));
            })
            ->orWhere(function($query) use($request, $wh_id) {
                $query->where('user_id',Auth::user()->id)
                ->where('date', date('Y-m-d', strtotime('-1 day')))
                ->whereNull('clock_out')
                ->whereIn('work_hours_id', $wh_id);
            })
            ->first();
            return ResponseHelper::jsonSuccess('success get data', $today);
        } catch (\Throwable $err) {
            return ResponseHelper::jsonError('internal Error', 500);
        }
    }

    public function location(){
        try {
            $location = ClockLocation::All();
            return ResponseHelper::jsonSuccess('success get location', $location);
        } catch (\Throwable $err) {
            return ResponseHelper::jsonError('internal Error', 500);
        }
    }

    public function clock(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'shift'     => 'required',
                'date'  => 'required',
                'time' => 'required',
                'location' => 'required'
            ]);
            if ($validator->fails()) {
                return ResponseHelper::jsonError($validator->errors(), 422);
            }

            if ($request->type == 'IN') {
                $insert = Clock::insert([
                    'user_id'=> Auth::user()->id,
                    'clock_location_id'=> $request->location,
                    'date' => $request->date,
                    'clock_in'=>$request->time,
                    'work_hours_id'=> $request->shift,
                    'status' => 'H'
                ]);
                if ($insert) {
                    return ResponseHelper::jsonSuccess('Berhasil Absen Masuk', $insert);
                }
            }elseif ($request->type == 'OUT') {
                $clock = Clock::where('user_id', Auth::user()->id)->where->get();
                return ResponseHelper::jsonSuccess('Berhasil Absen Masuk', $clock);
            }
        } catch (\Throwable $err) {
            return ResponseHelper::jsonError('internal Error', 500);
        }
    }

    public function shift(){
        try {
            $work_hours = WorkHours::where('shift_id', Auth::user()->employee->shift_id)->get();
            return ResponseHelper::jsonSuccess('success get location', $work_hours);
        } catch (\Throwable $err) {
            return ResponseHelper::jsonError('internal Error', 500);
        }
    }




    
}