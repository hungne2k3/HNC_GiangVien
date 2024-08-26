<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use App\Http\Services\ComponentPointsServices;

class DiemThanhPhanExports
{
    protected $componentPointsServices;

    public function __construct()
    {
        $this->componentPointsServices = new ComponentPointsServices();
    }

    public function export($monHocKyId)
    {
        // lấy dữ liệu từ services
        $diemThanhPhan = $this->componentPointsServices->getDataDiemThanhPhan($monHocKyId);

        // khởi tạo file excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề cho các cột
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'Mã sinh viên');
        $sheet->setCellValue('C1', 'Tên môn học');
        $sheet->setCellValue('D1', 'Họ và tên');
        $sheet->setCellValue('E1', 'DiemTX1');
        $sheet->setCellValue('F1', 'DiemDK1');
        $sheet->setCellValue('G1', 'DiemTX2');
        $sheet->setCellValue('H1', 'DiemDK2');
        $sheet->setCellValue('I1', 'DiemTB');

        // định dạng tiêu đề các cột
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF4CAF50'] // Màu xanh lá cho tiêu đề
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:J1')->applyFromArray($headerStyle);
        $sheet->getRowDimension('1')->setRowHeight(30);

        // điền dữ liệu từ services vao Excel
        $row = 2;
        foreach ($diemThanhPhan as $index => $item) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $item->MaSV);
            $sheet->setCellValue('C' . $row, $item->TenMon);
            $sheet->setCellValue('D' . $row, $item->HoDem . ' ' . $item->Ten);
            $sheet->setCellValue('E' . $row, $item->DiemTX1);
            $sheet->setCellValue('F' . $row, $item->DiemDK1);
            $sheet->setCellValue('G' . $row, $item->DiemTX2);
            $sheet->setCellValue('H' . $row, $item->DiemDK2);
            $sheet->setCellValue('I' . $row, $item->DiemTB);

            // Định dạng cho các dòng dữ liệu
            $sheet->getStyle('A' . $row . ':J' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            // căn giữa dữ liệu và các cột
            $sheet->getStyle('A' . $row . ':J' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $row++;
        }

        // đặt kích thước cột tự động
        foreach (range('A', 'J') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // tạo và lưu file excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'diemThanhPhan.xlsx';
        $writer->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}