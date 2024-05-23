<?php
use Carbon\Carbon;
use Carbon\CarbonInterval;
include('../../config/config.php');
require('../../../carbon/autoload.php');


if(isset($_GET['doanhthu'])){
    if(isset($_GET['thoigian'])){
        $thoigian= $_GET['thoigian'];
    }else {
        $thoigian = 'Không';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }
    if($thoigian=='7ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    }else if($thoigian=='28ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
    }else if($thoigian=='90ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
    }else if($thoigian=='365ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    $sql = "SELECT * FROM tbl_thongke WHERE ngaydat  BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC ";
    $query = mysqli_query($mysqli,$sql);
    while($val = mysqli_fetch_array($query)){
        $chart_data[] = [
            'date' => $val['ngaydat'],
            'price' => $val['tien'],
            'soluong' => $val['soluong']
        ];
    }
    echo json_encode($chart_data);
}

if(isset($_GET['doanhso'])){
    if(isset($_GET['thoigian'])){
        $thoigian= $_GET['thoigian'];
    }else {
        $thoigian = 'Không';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }
    if($thoigian=='7ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    }else if($thoigian=='28ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
    }else if($thoigian=='90ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
    }else if($thoigian=='365ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    $sql = "SELECT * FROM tbl_thongke WHERE ngaydat  BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC ";
    $query = mysqli_query($mysqli,$sql);
    while($val = mysqli_fetch_array($query)){
        $chart_data[] = [
            'date' => $val['ngaydat'],
            'quantity' => $val['soluong'],
        ];
    }
    echo json_encode($chart_data);
}

?>