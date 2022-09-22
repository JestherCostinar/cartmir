<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class OrderItemController extends BaseController
{
    public function __construct()
    {
        $this->orderItemModel = new OrderItemModel();
        $this->orderModel = new OrderModel();
    }

    public function index() {
        $data = [
            'title' => 'Order Item',
            'order_items' => $this->orderItemModel->findAll()
        ];

        return view('Admin/Order/index', $data);
    }

    public function pendingOrder() {
        $data = [
            'title' => 'Order Item',
            'order_items' => $this->orderModel->select('order.order_id, order.order_amount, order.order_date, order.order_type, order.order_status, user.firstname, user.lastname')
                          ->where('order.order_status', 'Pending')
                          ->join('user', 'user.id = order.user_id')
                          ->findAll()
        ];

        return view('Admin/Order/pending', $data);
    }

    public function deliveredOrder()
    {
        $data = [
            'title' => 'Order Item',
            'order_items' => $this->orderModel->select('order.order_id, order.order_amount, order.order_date, order.order_type, order.order_status, user.firstname, user.lastname')
            ->where('order.order_status', 'Delivered')
            ->join('user', 'user.id = order.user_id')
            ->findAll()
        ];

        return view('Admin/Order/delivered', $data);
    }

    public function acceptedOrder()
    {
        $data = [
            'title' => 'Order Item',
            'order_items' => $this->orderModel->select('order.order_id, order.order_amount, order.order_date, order.order_type, order.order_status, user.firstname, user.lastname')
            ->where('order.order_status', 'Accepted')
            ->join('user', 'user.id = order.user_id')
            ->findAll()
        ];

        return view('Admin/Order/accepted', $data);
    }

    public function outForDelivery()
    {
        $data = [
            'title' => 'Order Item',
            'order_items' => $this->orderModel->select('order.order_id, order.order_amount, order.order_date, order.order_type, order.order_status, user.firstname, user.lastname')
            ->where('order.order_status', 'out_for_delivery')
            ->join('user', 'user.id = order.user_id')
            ->findAll()
        ];

        return view('Admin/Order/out_for_delivery', $data);
    }

    public function generateOrderReport()
    {
        $fileName = 'OrderReport-' . date('Y-m-d') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $orders = $this->orderItemModel->findAll();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Item Name');
        $sheet->setCellValue('B1', 'Item Amount');
        $sheet->setCellValue('C1', 'Quantity');
        $sheet->setCellValue('D1', 'Ordered Date');
        $rows = 2;
        foreach ($orders as $val) {
            $sheet->setCellValue('A' . $rows, $val['items_name']);
            $sheet->setCellValue('B' . $rows, $val['items_amount']);
            $sheet->setCellValue('C' . $rows, $val['items_qty']);
            $sheet->setCellValue('D' . $rows, $val['order_date']);
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($fileName));
        flush();
        readfile($fileName);
        exit;
    }
}
