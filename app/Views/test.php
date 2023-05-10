<?php
// date_default_timezone_set("Asia/Jakarta");
setlocale(LC_TIME, 'id_ID');
$date = date('Y-m-d');
// echo $date;
// print_r(date("d-M-Y", strtotime($date)));

// function convertDate($date)
// {
//     $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', '']
//     $separate = explode("-", $date);

// }

// $formatter = IntlDateFormatter::create(
//     'id_ID',
//     IntlDateFormatter::FULL,
//     IntlDateFormatter::FULL,
//     'Asia/Jakarta',
//     IntlDateFormatter::GREGORIAN
// );

// echo (date("d-M-Y", strtotime($formatter)));
// $newDate = date("d-M-Y", strtotime($date));

// echo strftime("%A, %e %B %Y", $newDate);

echo time();
// print_r(date("d-M-Y", strtotime($date)));


// $fmt = datefmt_create(
//     'id_ID',
//     IntlDateFormatter::FULL,
//     'Asia/Jakarta',
//     IntlDateFormatter::GREGORIAN,
//     'MM/dd/yyyy'
// );
// echo 'First Formatted output is ' . datefmt_format($fmt, 0);



// SELECT Project.project_name, Client.client_name, Project.project_start, Project.project_end, Project.project_status FROM tb_m_project as Project JOIN tb_m_client as Client ON Project.client_id = Client.client_id;
