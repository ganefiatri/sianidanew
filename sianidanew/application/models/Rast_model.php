<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rast_model extends CI_Model
{
    private $_table = "rast";

    public $id;
    // public $author;
    public $nofastel;
    public $namaplgn;
    public $alamat;
    public $rekomendasi;
    public $date;
    public $permasalahan;
    public $kesimpulan;
    // public $adjustmentval;
    // public $adjustmentdate;

    // public function rules()
    // {
    //     return [
    //         ['field' => 'name',
    //         'label' => 'Name',
    //         'rules' => 'required'],

    //         ['field' => 'price',
    //         'label' => 'Price',
    //         'rules' => 'numeric'],
            
    //         ['field' => 'description',
    //         'label' => 'Description',
    //         'rules' => 'required']
    //     ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->nofastel = $post["nofastel"];
        $this->alamat = $post["alamat"];
        $this->rekomendasi = $post["rekomendasi"];
        // $this->date = $post["date"];
        $this->permasalahan = $post["permasalahan"];
        $this->kesimpulan = $post["kesimpulan"];
        // $this->adjustmentval = $post["adjustmentval"];
        // $this->adjustmentdate = $post["adjustmentdate"];
        // $this->author = $post["author"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->nofastel = $post["nofastel"];
        $this->alamat = $post["alamat"];
        $this->rekomendasi = $post["rekomendasi"];
        // $this->date = $post["date"];
        $this->permasalahan = $post["permasalahan"];
        $this->kesimpulan = $post["kesimpulan"];
        // $this->adjustmentval = $post["adjustmentval"];
        // $this->adjustmentdate = $post["adjustmentdate"];
        // $this->author = $post["author"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}