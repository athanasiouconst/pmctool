<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
            $data['role'] =  $this->Usermodel->getRole($username);
            
            //view the home page
            $this->load->view('User/login/success', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }


//        $password = "costas1234";
//        $this->load->library('encrypt');
//        $encode = $this->encrypt->encode($password);
//        $decode = $this->encrypt->decode($encode);
//
//        $salt = "sometext";
//        $escapedPW = "userpass";
//        $saltedPW = $escapedPW . $salt;
//        $hashedPW = hash('sha256', $saltedPW);
//
//        $data['encode'] = $encode;
//        $data['decode'] = $decode;
//        $ci = get_instance();
//        $ci->load->library('email');
//        $config['protocol'] = "smtp";
//        $config['smtp_host'] = "ssl://smtp.gmail.com";
//        $config['smtp_port'] = "465";
//        $config['smtp_user'] = "csiouath@gmail.com";
//        $config['smtp_pass'] = "d19m10y1984$#@!";
//        $config['charset'] = "utf-8";
//        $config['mailtype'] = "html";
//        $config['newline'] = "\r\n";
//
//        $ci->email->initialize($config);
//
//        $ci->email->from('csiouath@gmail.com', 'Blabla');
//        $list = array('csiouath@gmail.com');
//        $ci->email->to($list);
//        $this->email->reply_to('csiouath@gmail', 'Explendid Videos');
//        $ci->email->subject('This is an email test');
//        $ci->email->message('It is working. Great!');
//        $ci->email->send();
//        $this->load->view('User/login/home', $data);
//        $this->load->library('encrypt');
//        $key = "1234";
//
//        // Encoding message
//        echo $encrypt_value = $this->encrypt->encode($key);
//
//        $encrypt_key = $encrypt_value;
//
//        echo "<br>";
//        // Decode message
//        echo $decrypt_value = $this->encrypt->decode($encrypt_key);
    }

    public function Verify() {
        //call model
        $this->load->model('Usermodel');
        //call library valdiation 
        $this->load->library('form_validation');
        //form validation to login page
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data['is_authenticated'] = FALSE;
            //pass the error to the page
            $data['error'] = '<h2>Your Credentials are false! <br>Please try again! </h2>';
            $this->load->view('User/login/home', $data);
        } else {
            if ($this->Usermodel->Login($this->input->post('username'), $this->input->post('password'))) {

                //set session data
                $this->session->set_userdata('userIsLoggedIn', 'true');
                $this->session->set_userdata('username', $this->input->post('username'));

                //redirect to user home page
                redirect('User/success', 'refresh');
            } else {
                $data['error'] = '<h2>Your Credentials are false! <br>Please try again! </h2>';
                $data['is_authenticated'] = FALSE;
                $this->load->view('User/login/home', $data);
            }
        }
    }

    public function success() {
        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');
            
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] =  $this->Usermodel->getRole($username);
            
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            
            $this->load->view('Home', $data);
        } else {
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    public function Logout() {

        if ($this->session->userdata('userIsLoggedIn')) {
            $this->session->unset_userdata('userIsLoggedIn');
            $this->session->unset_userdata('username');
            redirect('Home', 'refresh');
        }
    }

    public function admin() {
        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');
            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $data['uid'] = $this->session->userdata('uid');
            //pass username to home page
            $data['username'] = $this->session->userdata('username');
            //view the home page
            $this->load->view('User/Admin/admin', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

}
