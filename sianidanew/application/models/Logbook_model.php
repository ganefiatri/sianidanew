<?php

class Logbook_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//    public function cek_model($id,$data){
//        $this->db->where('id', $id);
//        $this->db->update('rast', $data);
//    }

    public function get_all_bast(){
        $this->db->select('*');
        $this->db->from('penutupan');
        $this->db->join('logbook','penutupan.id_workbook = logbook.id');
        $this->db->where('case_type ="BAST PENUTUPAN INDIHOME"');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_listing() {
        $this->db->select('*');
        $this->db->from('logbook');
        $this->db->where('case_type = "PSB HALO"');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_starla() {
        $this->db->select('*');
        $this->db->from('logbook');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_rast($limit = null) {
        $logbook_db = $this->db;
        $logbook_db
                ->select('*')
                ->from('rast')
                ->order_by('date','DESC');

        // if ($limit != null) {
        //     $logbook_db
        //             ->limit($limit[0], $limit[1]);
        // }
        // $logbook_db
        //         ->where('c_t', 0)
        //         ->order_by('waktu', 'DESC');

        $x = $logbook_db->count_all_results('', false);
        $s = $logbook_db->get();


        return array($s, $x);
    }

    public function get_all_reaktivasi($limit = null) {
        $logbook_db = $this->db;
        $logbook_db
                ->select('*')
                ->from('reaktivasi_kartuhalo');

        if ($limit != null) {
            $logbook_db
                    ->limit($limit[0], $limit[1]);
        }
        $logbook_db
                ->where('c_t', 0)
                ->order_by('waktu', 'DESC');

        $x = $logbook_db->count_all_results('', false);
        $s = $logbook_db->get();


        return array($s, $x);
    }

    public function logbookbast() {
        $this->db->select('
          logbook.*, penutupan.id_workbook AS id, penutupan.jenis_modem, penutupan.serial_number, penutupan.merk_stb, penutupan.sn_stb, penutupan.remote, penutupan.kabel, penutupan.adaptor, 
      ');
      $this->db->join('penutupan', 'logbook.id = penutupan.id_workbook');
      $this->db->from('logbook');
      $query = $this->db->get();
      return $query->result();
    }



    public function json_logbooktelkom($case_type = null) {
        $curr_group = $this->ion_auth->get_users_groups()->row();
        $curr_user = $this->ion_auth->user()->row();

        $select = 'l.id,nama_plgn,case_type,status,date,author,full_name,date as waktu,internet_no,msisdn,kronologis,ndem_no,tiket_no,no_telp,indihome_alasan_tutup,jenis_product';
        if ($case_type != null) {
            if ($case_type == 'BAST PENUTUPAN INDIHOME')
                $select .= ',p.jenis_modem,p.serial_number,p.merk_stb,p.sn_stb';
        }
        $this->datatables->select($select)
                ->from('logbook l')
                ->join('users u', 'u.id = l.author');
        if ($case_type != null) {
            if ($case_type == 'BAST PENUTUPAN INDIHOME')
                $this->datatables->join('penutupan p', 'p.id_workbook = l.id');
        }
        $this->datatables->add_column('aksi', sprintf('<a class="btn btn-primary btn-xs" href="%s">View</a>
                                            <a class="btn btn-warning btn-xs" href="%s">Edit</a>
                                            <a class="details-control btn btn-success btn-xs">Preview</a>', site_url("logbook/detail/$1")
                                , site_url("logbook/edit/$1")), 'id')
                ->add_column('waktu', '$1', 'date("Y-m-d H:i:s",date)')
                ->where('tipe', 2);
        if ($case_type != null)
            $this->datatables->where('case_type', $case_type);
        if ($curr_group->id != 1) {
            $this->datatables->where('author', $curr_user->id);
        }

        //->add_column('act', '<a href="'.site_url('logbook/detail/').'$1" class="btn btn-default btn-xs">', 'id');
//        $this->datatables->add_column('konten', '<a class="btn btn-link" href="'.site_url('artikel').'/$3-$1"><i class="mdi mdi-marker-check"></i> $2</a>', 't_artikel_id,artikel_judul,timestamp');
        $return = $this->datatables->generate();

        //die($this->datatables->last_query());
        return $return;
    }

    public function json_logbooktelkomsel($arr = null) {
        $curr_group = $this->ion_auth->get_users_groups()->row();
        $curr_user = $this->ion_auth->user()->row();
        $this->datatables->select('l.id,msisdn,nama_plgn,revenue,kronologis,case_type,date,author,full_name,date as waktu')
                ->from('logbook l')
                ->join('users u', 'u.id = l.author')
                ->add_column('aksi', sprintf('<a class="btn btn-primary btn-xs" href="%s">View</a>
                                            <a class="btn btn-warning btn-xs" href="%s">Edit</a>
                                            <a class="details-control btn btn-success btn-xs">Preview</a>
                                            ', site_url("logbook/detail/$1")
                                , site_url("logbook/edit/$1")), 'id')
                //->add_column('revenue_col', '$1', 'number_format(revenue)')
                ->add_column('waktu', '$1', 'date("Y-m-d H:i:s",date)')
                ->where('tipe', 1);

        if ($arr != null) {
            if (array_key_exists('kategori', $arr)) {
                $this->datatables->where('case_type', 1);
            }
        }
        if ($curr_group->id != 1) {
            $this->datatables->where('author', $curr_user->id);
        }

        //->add_column('act', '<a href="'.site_url('logbook/detail/').'$1" class="btn btn-default btn-xs">', 'id');
//        $this->datatables->add_column('konten', '<a class="btn btn-link" href="'.site_url('artikel').'/$3-$1"><i class="mdi mdi-marker-check"></i> $2</a>', 't_artikel_id,artikel_judul,timestamp');
        $return = $this->datatables->generate();
        return $return;
    }

    public function json_logbooktelkom2() {
        $db = $this->db;
        $db->select('nama_plgn,case_type,status,date,author,full_name')
                ->from('logbook l')
                ->join('users u', 'u.id = l.author')
                ->where('tipe', 2);



        foreach ($db->get()->result() as $row) {
            $data[] = $row;
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('data' => $data)));
        //        $this->datatables->add_column('konten', '<a class="btn btn-link" href="'.site_url('artikel').'/$3-$1"><i class="mdi mdi-marker-check"></i> $2</a>', 't_artikel_id,artikel_judul,timestamp');

        return null;
    }

    public function json_logbooktelkomselpsb() {
        $curr_group = $this->ion_auth->get_users_groups()->row();
        $curr_user = $this->ion_auth->user()->row();

        $this->datatables->select('l.id,msisdn,nama_plgn,revenue,kronologis,case_type,date,author,full_name,date as waktu')
                ->from('logbook l')
                ->join('users u', 'u.id = l.author')
                ->add_column('aksi', sprintf('<a class="btn btn-primary btn-xs" href="%s">View</a>
                                            <a class="btn btn-warning btn-xs" href="%s">Edit</a>
                                            <a class="details-control btn btn-success btn-xs">Preview</a>
                                            ', site_url("logbook/detail/$1")
                                , site_url("logbook/edit/$1")), 'id')
                //->add_column('revenue_col', '$1', 'number_format(revenue)')
                ->add_column('waktu', '$1', 'date("Y-m-d H:i:s",date)')
                ->where('tipe', 1)
                ->where('case_type', 'PSB HALO');
        if ($curr_group->id != 1) {
            $this->datatables->where('author', $curr_user->id);
        }

        //->add_column('act', '<a href="'.site_url('logbook/detail/').'$1" class="btn btn-default btn-xs">', 'id');
//        $this->datatables->add_column('konten', '<a class="btn btn-link" href="'.site_url('artikel').'/$3-$1"><i class="mdi mdi-marker-check"></i> $2</a>', 't_artikel_id,artikel_judul,timestamp');
        $return = $this->datatables->generate();
        return $return;
    }

    public function get_all_logbook($tipe = null, $author = null, $contain = null, $limit = null, $status = null, $kategori = null, $sort = null) {
        if ($contain != null) {
            $contain2 = $contain;
            $contain = '"%' . $contain . '%"';
        }
        $logbook_db = $this->db;
        $logbook_db_count = $this->db;

        $logbook_db->select('*,FOUND_ROWS() AS num_results');
        if ($tipe != null) {
            $logbook_db->where('tipe', $tipe);
            //$logbook_db_count->where('tipe', $tipe);
        }

        if ($author != null) {
            $logbook_db->where('author', $author);
            $logbook_db_count->where('author', $author);
        }
        if ($contain != null) {
            $logbook_db
                    ->group_start()
                    ->like('internet_no', $contain2, FALSE)
                    ->or_like("msisdn", $contain2, FALSE)
                    ->or_like("nama_plgn", $contain2, FALSE)
                    ->group_end();
        };

        if ($status != null) {
            $logbook_db
                    ->where('status', $status, FALSE);
        }

        if ($tipe == 2) {
            if ($kategori != null) {
                $logbook_db
                        ->where('case_type', sprintf("'%s'", $kategori), FALSE);
            } else {
                $logbook_db
                        ->where('case_type !=', sprintf("'%s'", 'BAST PERANGKAT'), FALSE);
            }
        }


        if ($limit != null) {
            $logbook_db
                    ->limit($limit[0], $limit[1]);
        }

        if (isset($sort[0])) {
            $logbook_db->order_by($sort[0], $sort[1]);
        } else {
            $logbook_db->order_by('date', 'DESC');
        }

        $logbook_db
                ->where('c_t', 0);
        //      $x = $logbook_db->get('logbook');
//        var_dump($x->num_rows());
        $s = $logbook_db->get('logbook');

        //$logbook_db->last_query();
        if ($tipe != null) {
            $logbook_db_count->where('tipe', $tipe);
        }



        if ($contain != null) {
            $logbook_db_count
                    ->group_start()
                    ->like('internet_no', $contain2, FALSE)
                    ->or_like("msisdn", $contain2, FALSE)
                    ->or_like("nama_plgn", $contain2, FALSE)
                    ->group_end();
        };
        if ($tipe == 2) {
            if ($kategori != null) {
                $logbook_db
                        ->where('case_type', sprintf("'%s'", $kategori), FALSE);
            } else {
                $logbook_db
                        ->where('case_type !=', sprintf("'%s'", 'BAST PERANGKAT'), FALSE);
            }
        }

        if ($author != null) {
            $logbook_db_count->where('author', $author);
        }

        $logbook_db->where('c_t', 0);

        $x = $logbook_db_count->get('logbook');
//        echo $logbook_db->last_query();
        //$logbook_db_count->last_query();
        return array($s, $x->num_rows());
    }

    public function get_my_total_revenues($author, $stat = null) {
        $select = array(
            'sum(revenue) as Revenue'
        );
        $this->db
                ->select($select)
                ->from('logbook');

        if ($stat != null) {
            if (is_numeric($stat)) {
                $this->db->where('status', $stat);
            }


            switch ($stat) {
                case 'daily':
                    $this->db->where('date >', strtotime(date('Y-m-d 00:00:00', time())));
                    $this->db->where('date <', strtotime(date('Y-m-d 23:59:00', time())));
                    break;
                case 'monthly':
                    $this->db->where('date >', strtotime(date('Y-m-1 00:00:00', time())));
                    $this->db->where('date <', strtotime(date('Y-m-t 23:59:00', time())));
                    break;
                case 'year':
                    $this->db->where('date >', strtotime(date('Y-1-1 00:00:00', time())));
                    $this->db->where('date <', strtotime(date('Y-12-31 23:59:00', time())));
                    break;
                case 'total':
                    break;
            }
            /*
              if ($stat == 'daily') {
              //$this->db->where('date >=', $first_date);
              //$this->db->where('date <=', $second_date);
              $this->db->where('date >', strtotime(date('Y-m-d 00:00:00', time())));
              $this->db->where('date <', strtotime(date('Y-m-d 23:59:00', time())));
              } elseif ($stat = 'monthly') {
              $this->db->where('date >', strtotime(date('Y-m-1 00:00:00', time())));
              $this->db->where('date <', strtotime(date('Y-m-t 23:59:00', time())));
              } elseif ($stat = 'year') {
              $this->db->where('date >', strtotime(date('Y-1-1 00:00:00', time())));
              $this->db->where('date <', strtotime(date('Y-12-31 23:59:00', time())));
              }
             */
        }




        $s = $this->db
                        ->where('author', $author)
                        ->get()
                        ->row()
                ->Revenue;

        if ($s == null) {
            $s = 0;
        }

        return $s;
    }

}
