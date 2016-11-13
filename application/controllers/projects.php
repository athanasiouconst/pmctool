<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function ViewProjects($sort_by = 'proj_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('ProjectsModel');
        //pass messages
        $data['gens'] = $this->ProjectsModel->getViewProjects();
        $limit = 10;
        $results = $this->ProjectsModel->searchViewProjects($sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("Projects/ViewProjects/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('project');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'proj_title' => 'Title',
            //'proj_kind' => 'Kind',
            'proj_description' => 'Description'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctool/projects', $data);
    }

    public function ViewProjectsCreationForm() {
        $this->load->view('pmctoolContent/pmctoolProjectContent/pmctoolProjectContentInsert');
    }

    public function CreateProjects() {

        $this->load->model('ProjectsModel');
        $this->load->library('form_validation');
        $error = '';


        $this->form_validation->set_rules('proj_title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('proj_kind', 'Kind', 'trim|required|xss_clean');
        $this->form_validation->set_rules('proj_description', 'Description', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->view('pmctoolContent/pmctoolProjectContent/pmctoolProjectContentInsert', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {

                $proj_title = stripslashes($_POST['proj_title']);
                $proj_kind = stripslashes($_POST['proj_kind']);
                $proj_description = stripslashes($_POST['proj_description']);
                $data = array(
                    'proj_id' => NULL,
                    'proj_title' => $proj_title, 'proj_kind' => $proj_kind, 'proj_description' => $proj_description
                );
                $this->ProjectsModel->add_Projects($data);

                $this->session->set_flashdata('success_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                        . 'Your Project has successfully been <strong>Registered</strong>!!'
                        . '</div>');
                redirect('Projects/ViewProjects');
            }
        }
    }

    public function ViewProjectsDelete($proj_id) {

        $this->load->model('ProjectsModel');
        $this->ProjectsModel->ProjectsDelete($proj_id);
        $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                . 'Your Project has successfully been <strong>Deleted</strong>!!'
                . '</div>');

        redirect('Projects/ViewProjects');
    }

    public function ViewProjectsEditForm($proj_id, $sort_by = 'proj_id', $sort_order = 'asc', $offset = 0) {

        $this->load->model('ProjectsModel');
        $data['edit'] = $this->ProjectsModel->getEditProjects($proj_id);
        $this->load->view('pmctoolContent/pmctoolProjectContent/pmctoolProjectContentEdit', $data);
    }

    public function ViewProjectsEditSubmitForm() {

        $this->load->model('ProjectsModel');
        $this->load->library('form_validation');
        $error = '';

        $proj_id = stripslashes($_POST['proj_id']);
        $proj_title = stripslashes($_POST['proj_title']);
        $proj_kind = stripslashes($_POST['proj_kind']);
        $proj_description = stripslashes($_POST['proj_description']);

        $this->form_validation->set_rules('proj_title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('proj_kind', 'Kind', 'trim|required|xss_clean');
        $this->form_validation->set_rules('proj_description', 'Description', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                    . 'Your Project has not been successfully <strong>Edited</strong>!!'
                    . '</div>');
            $data['edit'] = null;
            $this->load->view('pmctoolContent/pmctoolProjectContent/pmctoolProjectContentEdit', $data);
        } else {

            $proj_id = stripslashes($_POST['proj_id']);
            $proj_title = stripslashes($_POST['proj_title']);
            $proj_kind = stripslashes($_POST['proj_kind']);
            $proj_description = stripslashes($_POST['proj_description']);

            $data = array(
                'proj_id' => $proj_id,
                'proj_title' => $proj_title,
                'proj_kind' => $proj_kind,
                'proj_description' => $proj_description
            );
            $this->ProjectsModel->EditProjects($proj_id, $data);
            $this->session->set_flashdata('edit_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                    . 'Your Project has been successfully <strong>Edited</strong>!!'
                    . '</div>');

            redirect('Projects/ViewProjects');
        }
    }

    public function ViewProjectsDetails($proj_id,$sort_by = 'proj_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('ProjectsModel');
        //pass messages
        $data['gens'] = $this->ProjectsModel->getViewProjectsDetails($proj_id);
        $limit = 1;
        $results = $this->ProjectsModel->searchViewProjectsDetails($proj_id,$sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("Projects/ViewProjectsDetails/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('project');
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'proj_title' => 'Title',
            'proj_kind' => 'Kind',
            'proj_description' => 'Description'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctoolContent/pmctoolProjectContent/pmctoolProjectContentDetails', $data);
    }
}
