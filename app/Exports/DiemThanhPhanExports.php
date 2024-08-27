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
        // Lấy dữ liệu từ services
        $diemThanhPhan = $this->componentPointsServices->getDataDiemThanhPhan($monHocKyId);

        // Khởi tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề cho các cột
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'Mã sinh viên');
        $sheet->setCellValue('C1', 'Họ và tên');
        $sheet->setCellValue('D1', 'DiemTX1');
        $sheet->setCellValue('E1', 'DiemTX2');
        $sheet->setCellValue('F1', 'DiemDK1');
        $sheet->setCellValue('G1', 'DiemDK2');
        $sheet->setCellValue('H1', 'Điểm thi');
        $sheet->setCellValue('I1', 'Điểm TBCHP');
        $sheet->setCellValue('J1', 'Ghi chú');

        // Định dạng tiêu đề các cột
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

        // Điền dữ liệu từ services vào Excel
        $row = 2;
        foreach ($diemThanhPhan as $index => $item) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $item->MaSV);
            $sheet->setCellValue('C' . $row, $item->HoDem . ' ' . $item->Ten);
            $sheet->setCellValue('D' . $row, $item->DiemTX1);
            $sheet->setCellValue('E' . $row, $item->DiemTX2);
            $sheet->setCellValue('F' . $row, $item->DiemDK1);
            $sheet->setCellValue('G' . $row, $item->DiemDK2);
            $sheet->setCellValue('H' . $row, $item->DiemThi);
            $sheet->setCellValue('I' . $row, $item->DiemTB);  // Tổng điểm
            $sheet->setCellValue('J' . $row, $item->GhiChu);  // Ghi chú

            // Định dạng cho các dòng dữ liệu
            $sheet->getStyle('A' . $row . ':J' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            // Căn giữa dữ liệu
            $sheet->getStyle('A' . $row . ':J' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $row++;
        }

        // Đặt kích thước cột tự động
        foreach (range('A', 'J') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Tạo và lưu file Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'diemThanhPhan.xlsx';
        $writer->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}