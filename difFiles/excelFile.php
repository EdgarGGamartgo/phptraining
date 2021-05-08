<?php
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachement;filename="excelFile.xlsx"');

    $file = './../files/users.json';
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    $xlsxContent = array();
    $headersXl = array();

    foreach($users as $user => $value) {
        $valuesXl = [];
        foreach($value as $key => $val) {
            echo $key . ": " . $val . "<br>";
            $headersXl = array_push($headersXl, $key);
            $valuesXl = array_push($valuesXl, $val);
        }
        if (empty($xlsxContent)) {
            $xlsxContent = array_push($xlsxContent, $headersXl);
        } else {
            $xlsxContent = array_push($xlsxContent, $valuesXl);
        }
    }

    $spreadsheet = new Spreadsheet();
    $spreadsheet->getActiveSheet()->fromArray($xlsxContent);
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    die;
?>