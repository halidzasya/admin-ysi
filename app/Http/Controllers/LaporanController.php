<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Perawat;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use \PDF;


use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function perawat()
    {
        return view('laporan.perawat');
    }

    public function perawatPdf()
    {

        $datas = Perawat::all();
        $pdf = \PDF::loadView('laporan.perawat_pdf', compact('datas'));
        return $pdf->download('laporan_perawat_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function perawatExcel(Request $request)
    {
        $nama = 'laporan_perawat_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Laporan Data Buku', function ($sheet) use ($request) {

        $sheet->mergeCells('A1:H1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('LAPORAN DATA BUKU'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });

        $datas = Perawat::all();

       // $sheet->appendRow(array_keys($datas[0]));
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });

         $datasheet = array();
         $datasheet[0]  =   array("NO", "JUDUL", "ISBN", "PENGARANG",  "PENERBIT","TAHUN TERBIT","JUMLAH BUKU", "LOKASI");
         $i=1;

        foreach ($datas as $data) {

           // $sheet->appendrow($data);
          $datasheet[$i] = array($i,
                        $data['nama_perawat'],
                        $data['jeniskelamin'],
                        $data['agama'],
                        $data['nohp'],
                        $data['alamat'],
                        $data['domisili'],
                        $data['statuskerja']
                    );

          $i++;
        }

        $sheet->fromArray($datasheet);
    });

})->export('xls');

}



}
