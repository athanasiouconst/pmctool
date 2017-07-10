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
            $data['role'] = $this->Usermodel->getRole($username);

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
            $data['role'] = $this->Usermodel->getRole($username);

            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');

            $this->load->view('home', $data);
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

    public function ViewUsers($sort_by = 'users_id', $sort_order = 'desc', $offset = 0) {

        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            //pass messages
            $data['gens'] = $this->Usermodel->getViewUsers();
            $limit = 10;
            $results = $this->Usermodel->searchViewUsers($sort_by, $sort_order, $limit, $offset);
            $data['gen'] = $results['rows'];
            $data['num_result'] = $results['num_rows'];
            //pagination
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = site_url("User/ViewUsers/$sort_by/$sort_order");
            $config['total_rows'] = $data['num_result'];
            $config['per_page'] = $limit;
            $config['first_link'] = '&laquo; First ';
            $config['next_link'] = '&gt; Next ';
            $config['prev_link'] = 'Previous &lt; ';
            $config['last_link'] = 'Last &raquo;';
            $config['total_rows'] = $this->db->count_all('users');
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['fields'] = array(
                'first_name' => 'Name',
                'last_name' => 'Last Name',
                'username' => 'Username',
                'email' => 'Email',
                'user_group_name' => 'User Group'
            );
            $data['sort_by'] = $sort_by;
            $data['sort_order'] = $sort_order;
            $this->load->view('User/Admin/users', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    public function ViewUsersCreationForm() {
        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            $data['gGroup'] = $this->Usermodel->getViewGroup();
            $resultsGroup = $this->Usermodel->searchViewGroup();

            $data['genGroup'] = $resultsGroup['rows'];
            $data['num_result'] = $resultsGroup['num_rows'];

            //view the home page
            $this->load->view('User/Admin/userInsert', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    public function CreateUser() {
        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            $this->load->library('form_validation');
            $error = '';


            $this->form_validation->set_rules('first_name', 'User Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'User LastName', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|xss_clean');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('choosenWord', 'Recover Password Phrase', 'trim|required|xss_clean');
            $this->form_validation->set_rules('user_group_id', 'Group', 'trim|required|callback_Select_Group|xss_clean');



            if ($this->form_validation->run() == FALSE) {
                $data['error'] = $error;

                $data['gGroup'] = $this->Usermodel->getViewGroup();
                $resultsGroup = $this->Usermodel->searchViewGroup();
                $data['genGroup'] = $resultsGroup['rows'];
                $data['num_result'] = $resultsGroup['num_rows'];
                $this->load->view('User/Admin/userInsert', $data);
            } else {
                if ($this->form_validation->run() == TRUE) {

                    $first_name = stripslashes($_POST['first_name']);
                    $last_name = stripslashes($_POST['last_name']);
                    $email = stripslashes($_POST['email']);
                    $username = stripslashes($_POST['username']);
                    $password = stripslashes($_POST['password']);
                    $user_group_id = stripslashes($_POST['user_group_id']);
                    $choosenWord = stripslashes($_POST['choosenWord']);
                    $data = array(
                        'users_id' => NULL,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'username' => $username,
                        'password' => $password,
                        'user_group_id' => $user_group_id,
                        'choosenWord' => $choosenWord
                    );
                    $this->Usermodel->add_User($data);

                    $this->session->set_flashdata('success_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                            . 'The User has successfully been <strong>Registered</strong>!!'
                            . '</div>');
                    redirect('User/ViewUsers');
                }
            }
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    function Select_Group($user_group_id) {

        if ($user_group_id == "-1") {
            $this->form_validation->set_message('Select_Group', 'You have to select a Group');
            return false;
        } else {
            return true;
        }
    }

    public function ViewUsersDelete($users_id) {
        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            //view the home page
            $this->Usermodel->UsersDelete($users_id);
            $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                    . 'The User has successfully been <strong>Deleted</strong>!!'
                    . '</div>');

            redirect('User/ViewUsers');
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    public function ViewUsersDetails($users_id, $sort_by = 'users_id', $sort_order = 'desc', $offset = 0) {

        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            //pass messages
            $data['gens'] = $this->Usermodel->getViewUsersDetails($users_id);
            $limit = 10;
            $results = $this->Usermodel->searchViewUsersDetails($users_id, $sort_by, $sort_order, $limit, $offset);
            $data['gen'] = $results['rows'];
            $data['num_result'] = $results['num_rows'];
            //pagination
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = site_url("User/ViewUsersDetails/$sort_by/$sort_order");
            $config['total_rows'] = $data['num_result'];
            $config['per_page'] = $limit;
            $config['first_link'] = '&laquo; First ';
            $config['next_link'] = '&gt; Next ';
            $config['prev_link'] = 'Previous &lt; ';
            $config['last_link'] = 'Last &raquo;';
            $config['total_rows'] = $this->db->count_all('users');
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['fields'] = array(
                'first_name' => 'Name',
                'last_name' => 'Last Name',
                'username' => 'Username',
                'password' => 'Password',
                'email' => 'Email',
                'user_group_name' => 'User Group',
                'sendEmail' => 'Send Activation Email',
                'registerDate' => 'Register Date',
                'lastvisitDate' => 'Last Visit',
                'activation' => 'User Activation',
                'lastResetTime' => 'Last PasswordReset Time',
                'resetCount' => 'Reset Counter',
                'choosenWord' => 'Recover Password Phrase'
            );
            $data['sort_by'] = $sort_by;
            $data['sort_order'] = $sort_order;
            $this->load->view('User/Admin/usersDetails', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    public function ViewUsersPDF($users_id, $sort_by = 'users_id', $sort_order = 'desc', $offset = 0) {

        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            //pass messages
            $data['gens'] = $this->Usermodel->getViewUsersDetails($users_id);
            $limit = 10;
            $results = $this->Usermodel->searchViewUsersDetails($users_id, $sort_by, $sort_order, $limit, $offset);
            $data['gen'] = $results['rows'];
            $data['num_result'] = $results['num_rows'];
            //pagination
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = site_url("User/ViewUsersDetails/$sort_by/$sort_order");
            $config['total_rows'] = $data['num_result'];
            $config['per_page'] = $limit;
            $config['first_link'] = '&laquo; First ';
            $config['next_link'] = '&gt; Next ';
            $config['prev_link'] = 'Previous &lt; ';
            $config['last_link'] = 'Last &raquo;';
            $config['total_rows'] = $this->db->count_all('users');
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['fields'] = array(
                'first_name' => 'Name',
                'last_name' => 'Last Name',
                'username' => 'Username',
                'password' => 'Password',
                'email' => 'Email',
                'user_group_name' => 'User Group',
                'sendEmail' => 'Send Activation Email',
                'registerDate' => 'Register Date',
                'lastvisitDate' => 'Last Visit',
                'activation' => 'User Activation',
                'lastResetTime' => 'Last Password Reset Time',
                'resetCount' => 'Reset Counter'
            );
            $data['sort_by'] = $sort_by;
            $data['sort_order'] = $sort_order;
            $now = new DateTime();
            $data['today'] = $now->format('d-m-Y H:i:s');
            $this->load->view('pdf/PDFusersDetails', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    public function ViewUsersEditForm($users_id, $sort_by = 'users_id', $sort_order = 'asc', $offset = 0) {

        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $resultsRole = $this->Usermodel->getRole($username);
            $data['role'] = $resultsRole;
            //view the home page
            $limit = 1;
            $data['gens'] = $this->Usermodel->getViewUsersDetails($users_id);
            $results = $this->Usermodel->searchViewUsersDetails($users_id, $sort_by, $sort_order, $limit, $offset);
            $data['gen'] = $results['rows'];
            $data['num_result'] = $results['num_rows'];

            $data['gensGroup'] = $this->Usermodel->getViewUsersDetails($users_id);
            $results = $this->Usermodel->searchViewUsersDetails($users_id, $sort_by, $sort_order, $limit, $offset);
            $data['genGroup'] = $results['rows'];
            $data['num_result'] = $results['num_rows'];

            $data['edit'] = $this->Usermodel->getEditUsers($users_id);

            $this->load->view('User/Admin/UsersEdit', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    public function EditUser() {

        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            $this->load->library('form_validation');
            $error = '';


            $this->form_validation->set_rules('first_name', 'User Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'User LastName', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|xss_clean');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('choosenWord', 'Recover Password Phrase', 'trim|required|xss_clean');
            $this->form_validation->set_rules('user_group_id', 'Group', 'trim|required|callback_Select_GroupEdit|xss_clean');


            $error = '';

            $users_id = stripslashes($_POST['users_id']);
            $first_name = stripslashes($_POST['first_name']);
            $last_name = stripslashes($_POST['last_name']);
            $email = stripslashes($_POST['email']);
            $username = stripslashes($_POST['username']);
            $password = stripslashes($_POST['password']);
            $user_group_id = stripslashes($_POST['user_group_id']);
            $choosenWord = stripslashes($_POST['choosenWord']);

            if ($this->form_validation->run() == FALSE) {
                $data['error'] = $error;
                $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                        . 'The User has not been successfully <strong>Edited</strong>!!'
                        . '</div>');
                $data['edit'] = null;
                $this->load->view('User/Admin/UsersEdit', $data);
            } else {

                $users_id = stripslashes($_POST['users_id']);
                $first_name = stripslashes($_POST['first_name']);
                $last_name = stripslashes($_POST['last_name']);
                $email = stripslashes($_POST['email']);
                $username = stripslashes($_POST['username']);
                $password = stripslashes($_POST['password']);
                $user_group_id = stripslashes($_POST['user_group_id']);
                $choosenWord = stripslashes($_POST['choosenWord']);

                $data = array(
                    'users_id' => $users_id,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'username' => $username,
                    'password' => $password,
                    'user_group_id' => $user_group_id,
                    'choosenWord' => $choosenWord
                );
                $this->Usermodel->EditUsers($users_id, $data);
                $this->session->set_flashdata('edit_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                        . 'The User has been successfully <strong>Edited</strong>!!'
                        . '</div>');

                redirect('User/ViewUsers');
            }
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/home', $data);
        }
    }

    function Select_GroupEdit($user_group_id) {

        if ($user_group_id == "-1") {
            $this->form_validation->set_message('Select_GroupEdit', 'You have to select a Group');
            return false;
        } else {
            return true;
        }
    }

    public function recovery() {
        if ($this->session->userdata('userIsLoggedIn')) {
            $this->load->model('Usermodel');

            //authentication of user
            $data['is_authenticated'] = $this->session->userdata('userIsLoggedIn');
            //user information
            $username = $this->session->userdata('username');
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->Usermodel->getRole($username);

            //view the home page
            $this->load->view('User/login/success', $data);
        } else {
            //if not authentication the go to Login Page
            $data['is_authenticated'] = FALSE;
            $this->load->view('User/login/recovery', $data);
        }
    }

    public function RecoveryPassword() {
        $this->load->library('form_validation');
        $error = '';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('choosenWord', 'Recover Password Phrase', 'trim|required|xss_clean');

        $error = '';

        $email = stripslashes($_POST['email']);
        $username = stripslashes($_POST['username']);
        $choosenWord = stripslashes($_POST['choosenWord']);

        if ($this->form_validation->run() == FALSE) {
            $data['is_authenticated'] = FALSE;
            $data['error'] = $error;
            $data['error'] = '<h2>Your Credentials are false! <br>Please try again! </h2>';
            $this->session->set_flashdata('success_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                    . 'You cannot <strong>Reset</strong> your Account. The credentials are wrong!!'
                    . '</div>');
            $data['edit'] = null;
            $this->load->view('User/login/recovery', $data);
        } else {
            $data['is_authenticated'] = FALSE;

            $new_password = $this->input->post('new_password');
            $email = stripslashes($_POST['email']);
            $username = stripslashes($_POST['username']);
            $choosenWord = stripslashes($_POST['choosenWord']);
        }
    }

}
