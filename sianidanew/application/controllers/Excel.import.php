<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller{

  public function __construct(){

    parent::__construct();

    $this->load->model('excel_import_model');

    $this->load->library('excel');

  }

  function index(){

    $this->load->view('excel/excel_import.php');

  }

  function fetch(){

    $data = $this->excel_import_model->select();

    $output = '

    <h3 align="center">Total Data - '.$data->num_rows().'</h3>

    <table class="table table-striped table-bordered">

     <tr>

      <th>Name</th>

      <th>Email</th>

     </tr>

    ';

    foreach($data->result() as $row){

      $output .= '

      <tr>

      <td>'.$row->name.'</td>

      <td>'.$row->email.'</td>

      </tr>

      ';

    }

    $output .= '</table>';

    echo $output;

  }

 

  function import(){

    if(isset($_FILES["file"]["name"])){

      $path = $_FILES["file"]["tmp_name"];

      $object = PHPExcel_IOFactory::load($path);

      foreach($object->getWorksheetIterator() as $worksheet){

        $highestRow = $worksheet->getHighestRow();

        $highestColumn = $worksheet->getHighestColumn();

        for($row=2; $row<=$highestRow; $row++){

           $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

           $email = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

           $data[] = array(

            'name'  => $name,

            'email'   => $email

           );

        }

      }

      $this->excel_import_model->insert($data);

      echo 'Data Imported successfully';

    }

  }

}

?>