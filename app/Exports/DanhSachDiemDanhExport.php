<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use App\Http\Services\StudentAttendanceServices;

class DanhSachDiemDanhExport
{
    protected $studentAttendanceServices;

    public function __construct()
    {
        $this->studentAttendanceServices = new StudentAttendanceServices();
    }

    public function export($monHocKyId)
    {
        // Lấy dữ liệu từ service
        $danhSachDiemDanh = $this->studentAttendanceServices->getDanhSachDiemDanh($monHocKyId);

        // Khởi tạo file Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Thêm tiêu đề cho các cột
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'Mã sinh viên');
        $sheet->setCellValue('C1', 'Họ và tên');
        $sheet->setCellValue('D1', 'Môn học');
        $sheet->setCellValue('E1', 'Tên lớp');
        $sheet->setCellValue('F1', 'Ngày điểm danh');
        $sheet->setCellValue('G1', 'Ca');
        $sheet->setCellValue('H1', 'Tiết');
        $sheet->setCellValue('I1', 'Số tiết đi muộn');
        $sheet->setCellValue('J1', 'Ghi chú');

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

        // Áp dụng định dạng cho hàng tiêu đề
        $sheet->getStyle('A1:J1')->applyFromArray($headerStyle);
        $sheet->getRowDimension('1')->setRowHeight(30);

        // Điền dữ liệu từ service vào Excel. 
        $row = 2;
        foreach ($danhSachDiemDanh as $index => $item) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $item->MaSV);
            $sheet->setCellValue('C' . $row, $item->HoDem . ' ' . $item->Ten);
            $sheet->setCellValue('D' . $row, $item->TenMon);
            $sheet->setCellValue('E' . $row, $item->TenLop);
            $sheet->setCellValue('F' . $row, $item->NgayDiemDanh);
            $sheet->setCellValue('G' . $row, $item->Ca);
            $sheet->setCellValue('H' . $row, $item->TietBD . ' - ' . $item->TietKT);
            $sheet->setCellValue('I' . $row, $item->SoTietDiMuon);
            $sheet->setCellValue('J' . $row, $item->GhiChu);

            // Định dạng cho các dòng dữ liệu
            $sheet->getStyle('A' . $row . ':J' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

            // Căn giữa dữ liệu trong các cột
            $sheet->getStyle('A' . $row . ':J' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $row++;
        }

        //Đặt kích thước cột tự động
        foreach (range('A', 'J') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Tạo và lưu file excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'danhsachdiemdanh.xlsx';
        $writer->save($fileName);

        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}