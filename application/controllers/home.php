<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            //view the home page
            $this->load->view('home', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('home',$data);
        }
    }

}
