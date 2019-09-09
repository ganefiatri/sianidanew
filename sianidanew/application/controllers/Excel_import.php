<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller{

  public function __construct(){

    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('excel_import_model');
    $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

  }

  function index(){
    $this->load->view('excel/excel_import');
  }

  public function upload(){
    $fileName = $this->input->post('file', TRUE);
    $config['upload_path'] = './assets/'; //buat folder dengan nama assets di root folder
    $config['file_name'] = $fileName;
    $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
    $config['max_size'] = 10000;
     
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('file')) {
      $error = array('error' => $this->upload->display_errors());
      $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
      redirect('excel_import'); 
     } else {
      $media = $this->upload->data();
      $inputFileName = 'assets/'.$media['file_name'];
     
    try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
         
        for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                                             
            //Sesuaikan sama nama kolom tabel di database                                
             $data = array(
              "name1" => $rowData[0][0],
              "name3" => $rowData[0][1],
              "jenis_grapari" => $rowData[0][2],
              "kategori_grapari" => $rowData[0][3],
              "area" => $rowData[0][4],
              "regional" => $rowData[0][5],
              "type_grapari" => $rowData[0][6],
              "jam_operasional" => $rowData[0][7],
              "alamat_lengkap" => $rowData[0][8],
              "longtitude" => $rowData[0][9],
              "latitude" => $rowData[0][10],
              "class" => $rowData[0][11],
              "kelurahan" => $rowData[0][12],
              "kecamatan" => $rowData[0][13],
              "provinsi" => $rowData[0][14],
              "kodepos" => $rowData[0][15],
              "kota" => $rowData[0][16],
              "persedian_mygrapari" => $rowData[0][17],
              "interaksi_mygrapari" => $rowData[0][18],
              "case" => $rowData[0][19],
              "dealer"=> $rowData[0][20],
              "visit" => $rowData[0][21],
              "respon_sms" => $rowData[0][22],
              "respon_web" => $rowData[0][23],
              "ces"=> $rowData[0][24],
              "tnps"=> $rowData[0][25],
              "online_booking" => $rowData[0][26],
              "ces_class" => $rowData[0][27],
              "tnps_class" => $rowData[0][28],
              "sampling"=> $rowData[0][29]
            );
             
            //sesuaikan nama dengan nama tabel
            $this->db->insert("import_excel",$data);
                 
        }
        $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
        redirect('excel_import');
}}

  function grapari(){
    $grapari = $this->excel_import_model->selectgrapariown();
    $data['grapariall'] = $grapari;
    $this->load->view('excel/tabelgrapari.php', $data);
  }

  function graparimitra(){
    $grapari = $this->excel_import_model->selectgraparimitra();
    $data['graparimitraall'] = $grapari;
    $this->load->view('excel/tabelgraparimitra.php', $data);
  }

  function grapariloop(){
    $grapari = $this->excel_import_model->selectgrapariloop();
    $data['grapariloopall'] = $grapari;
    $this->load->view('excel/tabelgrapariloop.php', $data);
  }

  function graparigtg(){
    $grapari = $this->excel_import_model->selectgraparigtg();
    $data['graparigtgall'] = $grapari;
    $this->load->view('excel/tabelgraparigtg.php', $data);
  }


  function fetch(){

    $data = $this->excel_import_model->select();

    $output = '

    <h3 align="center">Total Data - '.$data->num_rows().'</h3>

    <table class="table table-striped table-bordered">

     <tr>
        <th>Name1</th>
        <th>Name3</th>
        <th>Jenis Grapari</th>
        <th>Kategori Grapari</th>
        <th>Area</th>
        <th>Regional</th>
        <th>Type Grapari</th>
        <th>Jam Operasional</th>
        <th>Alamat Lengkap</th>
        <th>Longtitude</th>
        <th>Latitude</th>
        <th>Class</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Provinsi</th>
        <th>Kode Pos</th>
        <th>Kota / Kabupaten</th>
        <th>Ketersedian Mygrapari</th>
        <th>Interaksi Mygrapari Agustus</th>
     </tr>

    ';

    foreach($data->result() as $row){

      $output .= '

      <tr>

      <td>'.$row->name1.'</td>
      <td>'.$row->name3.'</td>
      <td>'.$row->jenis_grapari.'</td>
      <td>'.$row->kategori_grapari.'</td>
      <td>'.$row->area.'</td>
      <td>'.$row->regional.'</td>
      <td>'.$row->type_grapari.'</td>
      <td>'.$row->jam_operasional.'</td>
      <td>'.$row->alamat_lengkap.'</td>
      <td>'.$row->longtitude.'</td>
      <td>'.$row->latitude.'</td>
      <td>'.$row->class.'</td>
      <td>'.$row->kelurahan.'</td>
      <td>'.$row->kecamatan.'</td>
      <td>'.$row->provinsi.'</td>
      <td>'.$row->kodepos.'</td>
      <td>'.$row->kota.'</td>
      <td>'.$row->persedian_mygrapari.'</td>
      <td>'.$row->interaksi_mygrapari.'</td>

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

           $name1 = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
           $name3 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
           $jenis_grapari = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
           $kategori_grapari = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
           $area = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
           $regional = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
           $type_grapari = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
           $jam_operasional = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
           $alamat_lengkap = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
           $longtitude = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
           $latitude = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
           $class = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
           $kelurahan = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
           $kecamatan = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
           $provinsi = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
           $kodepos = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
           $kota = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
           $persedian_mygrapari = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
           $interaksi_mygrapari = $worksheet->getCellByColumnAndRow(18, $row)->getValue();

           $data[] = array(

            'name1'  => $name1,
            'name3'  => $name3,
            'jenis_grapari'  => $jenis_grapari,
            'kategori_grapari'  => $kategori_grapari,
            'area'  => $area,
            'regional'  => $regional,
            'type_grapari'  => $type_grapari,
            'jenis_grapari'  => $jenis_grapari,
            'jam_operasional'  => $jam_operasional,
            'alamat_lengkap'  => $alamat_lengkap,
            'longtitude'  => $longtitude,
            'latitude'  => $latitude,
            'class'  => $class,
            'kelurahan'  => $kelurahan,
            'kecamatan'  => $kecamatan,
            'provinsi'  => $provinsi,
            'kodepos'  => $kodepos,
            'kota'  => $kota,
            'persedian_mygrapari'  => $persedian_mygrapari,
            'interaksi_mygrapari'  => $interaksi_mygrapari
           );

        }

      }

      $this->excel_import_model->insert($data);

      echo 'Data Imported successfully';

    }

  }


}

?>