<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbarangmasuk;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Laporan extends BaseController
{
    public function index()
    {
        return view('laporan/index');
    }

    public function cetak_barang_masuk()
    {
        return view('laporan/viewbarangmasuk');
    }

    public function cetak_barang_masuk_periode()
    {
        $tombolCetak = $this->request->getPost('btnCetak');
        $tombolExport = $this->request->getPost('btnExport');
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');


        $modelBarangMasuk = new Modelbarangmasuk();

        $dataLaporan = $modelBarangMasuk->laporanPerPeriode($tglawal, $tglakhir);

        if(isset($tombolCetak)){
            $data = [
                'datalaporan'=>$dataLaporan,
                'tglawal'=>$tglawal,
                'tglakhir'=>$tglakhir,
            ];
    
            return view('laporan/cetaklapooranbarangmasuk',$data);
        }

        if (isset($tombolExport)){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1',"Data Barang Masuk");
            $sheet->mergeCells('A1:D1');
            $sheet->getStyle('A1')->getFont()->setBold(true);
            //mengatur style excel
            $styleColumn =[
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                
            ];

            $borderArray =[
                'borders' => [
                    'top' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                    'left' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                    'right' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ];

            $sheet->setCellValue('A3',"No");
            $sheet->setCellValue('B3',"No. Faktur");
            $sheet->setCellValue('C3',"Tanggal");
            $sheet->setCellValue('D3',"Total Harga");

            $sheet->getStyle("A3")->applyFromArray($styleColumn);
            $sheet->getStyle("B3")->applyFromArray($styleColumn);
            $sheet->getStyle("C3")->applyFromArray($styleColumn);
            $sheet->getStyle("D3")->applyFromArray($styleColumn);

            $sheet->getStyle("A3")->applyFromArray($borderArray);
            $sheet->getStyle("B3")->applyFromArray($borderArray);
            $sheet->getStyle("C3")->applyFromArray($borderArray);
            $sheet->getStyle("D3")->applyFromArray($borderArray);


            $no =1;
            $numRow =4;

            foreach ($dataLaporan->getResultArray() as $row):
                $sheet->setCellValue('A'.$numRow,$no);
                $sheet->setCellValue('B'.$numRow,$row['faktur']);
                $sheet->setCellValue('C'.$numRow,$row['tglfaktur']);
                $sheet->setCellValue('D'.$numRow,$row['totalharga']);

                $sheet->getStyle('A'. $numRow)->applyFromArray($styleColumn);

                $sheet->getStyle('A'. $numRow)->applyFromArray($borderArray);
                $sheet->getStyle('B'. $numRow)->applyFromArray($borderArray);
                $sheet->getStyle('C'. $numRow)->applyFromArray($borderArray);
                $sheet->getStyle('D'. $numRow)->applyFromArray($borderArray);


                $no++;
                $numRow++;
            endforeach;

            $sheet->getDefaultRowDimension()->setRowHeight(-1);
            //mengatur landscape/potrait
            $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            //mengatur nama file 
            $sheet->setTitle('Laporan Barang Masuk');

            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            // header('Cache-Control: max-age=0');

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=BarangMasuk.xlsx');
            header('Cache-Control: max-age=0');


            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }
    
   
    }

    public function tampiGrafikBarangMasuk()
    {
        $bulan = $this->request->getPost('bulan');

        $db = \Config\Database::connect();
        //SELECT tglfaktur AS tgk, totalharga FROM barangmasuk WHERE DATE_FORMAT(tglformat,'%Y-%m') = '2021-11' ORDER BY tglfaktur ASC;
        $query = $db->query("SELECT tglfaktur AS tgl, totalharga FROM barangmasuk WHERE DATE_FORMAT(tglfaktur,'%Y-%m') = '$bulan' ORDER BY tglfaktur ASC")->getResult();
        // $query = $db->query("SELECT tglfaktur AS tgl, totalharga FROM barangmasuk WHERE DATE_FORMAT(tglformat, '%Y-%m') = '$bulan' ORDER BY tgl ASC")->getResult();


        $data = [
            'grafik'=>$query
        ];

        $json = [
            'data'=> view('laporan/grafikbarangmasuk',$data)
        ];
        echo json_encode($json);
    }
}