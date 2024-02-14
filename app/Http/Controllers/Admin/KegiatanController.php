<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKerjasama;
use App\Models\Kegiatan;
use App\Models\Peserta;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kegiatan::with('kerjasama', 'sertifikat')->orderBy('created_at', 'asc')->get();
            // return DataTables::eloquent($data)->toJson();\
            return DataTables::of($data)
            ->addColumn('total_peserta', function ($row) {
                return $row->total_peserta;
            })
            ->make(true);
        }

        return view('pages.dashboard.kegiatan.index', [
            'pageTitle' => 'Data Karyawan',
            'kerjasama' => JenisKerjasama::All(),
        ]);
    }

    public function akan_datang(Request $request)
    {
        if ($request->ajax()) {
            $data = Kegiatan::with('kerjasama', 'sertifikat')->where('start', '>', Carbon::now()->format('Y-m-d'))->orderBy('created_at', 'asc')->get();
            // return DataTables::eloquent($data)->toJson();\
            return DataTables::of($data)
            ->addColumn('total_peserta', function ($row) {
                return $row->total_peserta;
            })
            ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'kerjasama_id' => 'required',
            'tempat' => 'required',
            'start' => 'required',
            'end' => 'required',
            'type_peserta' => 'required',
        ], [
            'required' => 'tidak boleh kosong',
            'date' => 'Harus tanggal dengan format YYYY/MM/DD',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }

        $data = Kegiatan::create([
            'judul' => $request->judul,
            'kerjasama_id' => $request->kerjasama_id,
            'pelaksana' => $request->pelaksana,
            'start' => $request->start,
            'end' => $request->end,
            'tempat' => $request->tempat,
            'pengajar' => $request->pengajar,
            'instansi' => $request->instansi,
            'sarana' => $request->sarana,
            'peserta' => $request->peserta,
            'type_peserta' => $request->type_peserta,
        ]);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Data Kegiatan Berhasil Disimpan',
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Kegiatan::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kegiatan::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi Berhasil Disimpan',
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'kerjasama_id' => 'required',
            'tempat' => 'required',
            'start' => 'required',
            'end' => 'required',
            'type_peserta' => 'required',
        ], [
            'required' => 'tidak boleh kosong',
            'date' => 'Harus tanggal dengan format YYYY/MM/DD',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 'false', 'error' => $validator->errors()->toArray()], 422);
        }

        $data = Kegiatan::find($id)->update([
            'judul' => $request->judul,
            'kerjasama_id' => $request->kerjasama_id,
            'pelaksana' => $request->pelaksana,
            'start' => $request->start,
            'end' => $request->end,
            'tempat' => $request->tempat,
            'pengajar' => $request->pengajar,
            'instansi' => $request->instansi,
            'sarana' => $request->sarana,
            'peserta' => $request->peserta,
            'type_peserta' => $request->type_peserta,
        ]);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Data Kegiatan Berhasil Diupdate',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Kegiatan::destroy($id);
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

    public function peserta(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Peserta::where('kegiatan_id', $id)->with('kegiatan', 'user', 'user.profile', 'user.asn_data', 'user.user_data')->orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
            // ->addColumn('total_peserta', function ($row) {
            //     // Access and return the value of the desired attribute
            //     return $row->total_peserta;
            // })
            ->make(true);
        }

        return view('pages.dashboard.kegiatan.peserta', [
            'pageTitle' => 'Data Karyawan',
            'id' => $id,
        ]);
    }

    public function sertifikat(Request $request, $id)
    {
        $cert = Sertifikat::where('kegiatan_id', $id) ->first();
        $pdf = Pdf::loadView('pages.user.dashboard.sertifikat', ['name' => 'Muhammad Fachri', "data" => $cert  ])->setPaper('letter', 'landscape');
        return $pdf->stream('sertifikat.pdf');
    }

    public function sertifikatAdd(Request $request, $id)
    {
        return view('pages.dashboard.kegiatan.addsertifikat', ['id' => $id]);
    }

    public function sertifikatEdit(Request $request, $id)
    {
        $cert = Sertifikat::where('kegiatan_id', $id) ->first();
        return view('pages.dashboard.kegiatan.editsertifikat', ['id' => $id, 'data'=>$cert]);
    }

    public function sertifikatUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'top' => 'required|numeric',
            'left' => 'required|numeric',
            'right' => 'required|numeric',
        ], [
            'required' => 'tidak boleh kosong',
            'mimes' => 'hanya boleh gambar',
            'numeric' => 'hanya boleh angka',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/cert'), $fileName);
            $data = $request->except(['image', '_token']);
            $update = Sertifikat::where('kegiatan_id', $id)->update(array_merge($data, ['file'=> $fileName]));
            if ($update) {
                $request->session()->flash('success', 'Berita berhasil disimpan');
                return back()
                ->withInput();
            }
        }else{
            $data = $request->except(['image', '_token']);
            $update = Sertifikat::where('kegiatan_id', $id)->update(array_merge($data));
            if ($update) {
                $request->session()->flash('success', 'Berita berhasil disimpan');
                return back()
                ->withInput();
            }
        }
    }

    public function sertifikatStore(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'top' => 'required|numeric',
            'left' => 'required|numeric',
            'right' => 'required|numeric',
            'image' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ], [
            'required' => 'tidak boleh kosong',
            'mimes' => 'hanya boleh gambar',
            'numeric' => 'hanya boleh angka',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/cert'), $fileName);
            $data = $request->except(['image', '_token']);
            $insert = Sertifikat::create(array_merge($data, ['file'=> $fileName, 'kegiatan_id'=> $id]));
            if ($insert) {
                $request->session()->flash('success', 'Berita berhasil disimpan');
                return back()
                ->withInput();
            }
        }else{
            return back()
            ->withInput();
        }
    }

    public function export(Request $request)
    {

        $HeaderStyle = [
            'font' => [
                'bold' => true,
                'size' => 14
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $SubStyle = [
            'font' => [
                'bold' => true,
                'size' => 14
            ]
        ];

        if ($request->type == 'date') {
            $validator = Validator::make($request->all(), [
                'start' => 'required',
                'end' => 'required',
            ], [
                'required' => 'tidak boleh kosong',
            ]);
    
            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }
        }
        $data = '';

        if ($request->type == 'date') {
            $data = Kegiatan::where('start', '>=', $request->start)->where('end', '<=', $request->end)->OrderBy('kerjasama_id', 'asc')->get();
        }else{
            $data=Kegiatan::whereMonth('start', date('m'))->OrderBy('kerjasama_id', 'asc')->get();
        }

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        //header
        $activeWorksheet->setCellValue('B2', 'REALISASI PELAKSANAAN KEGIATAN KERJASAMA');
        $activeWorksheet->setCellValue('B3', 'BALAI BESAR PELATIHAN PERTANIAN (BBPP) BATANGKALUKU');
        $activeWorksheet->setCellValue('B4', 'TAHUN 2023');
        $activeWorksheet->getStyle('B2:B4')->applyFromArray($HeaderStyle);
        $activeWorksheet->mergeCells('B2:I2');
        $activeWorksheet->mergeCells('B3:I3');
        $activeWorksheet->mergeCells('B4:I4');
        

        $num = 5;
        $urut = 1;
        $type = '';
        $start = 0;

        foreach ($data as $key => $value) {
            if ($value->kerjasama_id != $type) {
                $type = $value->kerjasama_id;
                $num++;
                $activeWorksheet->setCellValue('B'.$num, 'BENTUK KERJASAMA '.strtoupper($value->kerjasama->nama));
                $activeWorksheet->mergeCells('B'.$num.':I'.$num);
                $activeWorksheet->getStyle('B'.$num)->applyFromArray($SubStyle);
                $num++;
                $num++;
                $activeWorksheet->setCellValue('B'.$num, 'No.');
                $activeWorksheet->setCellValue('C'.$num, 'Nama Kegiatan');
                $activeWorksheet->setCellValue('D'.$num, 'No. Surat / MoU');
                $activeWorksheet->setCellValue('E'.$num, 'Mitra Kerjasama');
                $activeWorksheet->setCellValue('F'.$num, 'Waktu Pelaksanaan');
                $activeWorksheet->setCellValue('G'.$num, 'Sasaran Kerjasama');
                $activeWorksheet->setCellValue('H'.$num, 'Cakupan Kerjasama');
                $activeWorksheet->setCellValue('I'.$num, 'Sumber Pembiayaan ');
                $activeWorksheet->getRowDimension($num)->setRowHeight(40, 'pt');
                foreach(range('B','I') as $columnID) {
                    $activeWorksheet->getColumnDimension($columnID)
                        ->setAutoSize(true);
                }

                $activeWorksheet->getStyle('B'.$num.':I'.$num)->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12
                    ],
                    'fill' =>[
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF92d050']
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ]);
                $num++;
                $start =$num;
                $urut = 1;
            }

            // table
            $activeWorksheet->setCellValue('B'.$num, $urut++);
                $activeWorksheet->setCellValue('C'.$num, $value->judul);
                $activeWorksheet->setCellValue('D'.$num, '-');
                $activeWorksheet->setCellValue('E'.$num, $value->instansi);
                $activeWorksheet->setCellValue('F'.$num, date('d M Y', strtotime($value->start)) . ' - '.date('d M Y', strtotime($value->end)));
                $activeWorksheet->setCellValue('G'.$num, $value->peserta.' Peserta');
                $activeWorksheet->setCellValue('H'.$num, '-');
                $activeWorksheet->setCellValue('I'.$num, '-');
                $activeWorksheet->getStyle('B'.$start.':I'.$num)->applyFromArray([
                    'font' => [
                        'size' => 12
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ]
                ]);
            $num++;
        };

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Kegiatan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}