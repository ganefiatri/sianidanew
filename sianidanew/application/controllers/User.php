<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Auth_model');
            $this->load->model('User_model');
            $this->load->model('Logbook_model');
            $this->load->library('session');
            $this->load->database();
            $this->load->helper('form');
            $this->load->library('pagination');
        }

    public function auth() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $query = $this->db->get_where('user', array('username' => $username, 'password' => $password));
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $userdata = array(
                'username' => $row->username,
                'role' => $row->role,
            );
            $this->session->set_userdata($userdata);

            header("Refresh:1; url=" . site_url());
        }
    }

    public function login() {
        if ($this->ion_auth->logged_in()) {
            //sudah login, redirect ke halaman welcome
            redirect(site_url(), 'refresh'); //tapi mungkin perlu menggunakan load->view untuk menambahkan link logout di index
        }

        if (isset($_POST['submit'])) {

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            //$this->ion_auth_model->identity_column = "username";
            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'))) {
                //jika login sukses, redirect ke halaman admin

                $pesan = $this->ion_auth->messages();

                redirect(site_url(), 'refresh');
            } else {
                redirect(site_url('user/login?msg=' . $this->ion_auth->errors()));
            }
        } else {
            //user tidak login, tampilkan halaman login
            $data['template_footer'] = $data['template_header'] = $data['template_body'] = FALSE;
            $data['v'] = 'login/login_form';
            $this->load->view('init', $data);
        }
    }

    public function upost() {

        $post_fields = array('id', 'username', 'password', 'password2', 'email', 'full_name');
        foreach ($post_fields as $post_field) {
            if (!empty($this->input->post($post_field))) {
                ${$post_field} = $this->input->post($post_field);
            } else {
                ${$post_field} = NULL;
            }
        }

        $group = array($this->input->post('group'));

        if ($id == NULL) {
            $additional_data = array(
                'full_name' => $full_name,
            );
            if ($password != NULL AND $password2 != NULL AND $password === $password2) {
                if (!$this->ion_auth->username_check($username)) {
                    if (!$this->ion_auth->email_check($email)) {
                        $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                        redirect(site_url('user/ulist'));
                    } else {
                        echo 'Email already exist or Invalid!';
                    }
                } else {
                    echo 'Username already exist or Invalid!';
                }

                die;
            } else {
                echo "Password don't match or Incorrect !";
            }
        }//if post
        elseif ($id != NULL) {

            $data = array(
                'username' => $username,
                'full_name' => $full_name,
                'email' => $email,
            );

            if ($password != NULL AND $password2 != NULL AND $password === $password2) {
                $data['password'] = $password;
            }

            $this->ion_auth->update($id, $data);
            $msg = '?msg=User+updated';
            redirect(site_url('user/uedit/' . $id . $msg));
        }//elseif update
    }

    public function uedit() {

        if ($this->uri->segment(3, 0) != null AND $this->ion_auth->user($this->uri->segment(3, 0))->row() != null) {
            $data['userdata'] = $this->ion_auth->user($this->uri->segment(3, 0))->row();
            $data['v'] = 'user/user_form';
            $this->load->view('init', $data);
        }
    }

    public function gedit() {

        if ($this->uri->segment(3, 0) != null AND $this->ion_auth->groups($this->uri->segment(3, 0))->row() != null) {
            $data['groupdata'] = $this->ion_auth->group($this->uri->segment(3, 0))->row();
            $data['v'] = 'user/group_form';
            $this->load->view('init', $data);
        }
    }

    public function unew() {

        $data['userdata'] = NULL;
        $data['v'] = 'user/user_form';
        $this->load->view('init', $data);
    }

    public function ulist() {
        $data['userdata'] = $this->ion_auth->user()->row();
        $data['users'] = $this->ion_auth->users()->result();
        $data['v'] = 'user/list';
        $this->load->view('init', $data);
    }

    public function gList() {
        $data['groups'] = $this->ion_auth->groups()->result();
        $data['v'] = 'user/listgroup';
        $this->load->view('init', $data);
    }

    public function logout() {
        $this->ion_auth->logout();
        $this->session->sess_destroy();
        redirect(site_url('user/login?stat=2'));
    }

}
