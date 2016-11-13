<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ComplexityFactors extends CI_Controller {

    public function ViewComplexityFactors($sort_by = 'cf_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('ComplexityFactorsModel');
        //pass messages
        $data['gens'] = $this->ComplexityFactorsModel->getViewComplexityFactors();
        $limit = 10;
        $results = $this->ComplexityFactorsModel->searchViewComplexityFactors($sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("ComplexityFactors/ViewComplexityFactors/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('complexity_factor');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'cf_name' => 'Title',
            //'cf_description' => 'Description',
            //'cf_reference' => 'Reference',
            //'cf_restriction' => 'Restriction',
            'cf_category' => 'Category'
                //,'cf_weight' => 'Weight'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctool/complexityFactors', $data);
    }

    public function ViewComplexityFactorsCreationForm() {
        $this->load->view('pmctoolContent/pmctoolComplexityFactorsContent/pmctoolComplexityFactorsContentInsert');
    }

    public function CreateComplexityFactors() {

        $this->load->model('ComplexityFactorsModel');
        $this->load->library('form_validation');
        $error = '';


        $this->form_validation->set_rules('cf_name', 'Complexity Factor Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_description', 'Complexity Factor Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_reference', 'Complexity Factor Reference', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_restriction', 'Complexity Factor Restriction', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_category', 'Complexity Factor Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_weight', 'Complexity Factor Weight', 'trim|required|numeric|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->view('pmctoolContent/pmctoolComplexityFactorsContent/pmctoolComplexityFactorsContentInsert', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {

                $cf_name = stripslashes($_POST['cf_name']);
                $cf_description = stripslashes($_POST['cf_description']);
                $cf_reference = stripslashes($_POST['cf_reference']);
                $cf_restriction = stripslashes($_POST['cf_restriction']);
                $cf_category = stripslashes($_POST['cf_category']);
                $cf_weight = stripslashes($_POST['cf_weight']);
                $data = array(
                    'cf_id' => NULL,
                    'cf_name' => $cf_name,
                    'cf_description' => $cf_description,
                    'cf_reference' => $cf_reference,
                    'cf_restriction' => $cf_restriction,
                    'cf_category' => $cf_category,
                    'cf_weight' => $cf_weight
                );
                $this->ComplexityFactorsModel->add_ComplexityFactors($data);

                $this->session->set_flashdata('success_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                        . 'Your Complexity Factor has successfully been <strong>Registered</strong>!!'
                        . '</div>');
                redirect('ComplexityFactors/ViewComplexityFactors');
            }
        }
    }

    public function ViewComplexityFactorsDelete($cf_id) {

        $this->load->model('ComplexityFactorsModel');
        $this->ComplexityFactorsModel->ComplexityFactorsDelete($cf_id);
        $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                . 'Your Complexity Factor has successfully been <strong>Deleted</strong>!!'
                . '</div>');

        redirect('ComplexityFactors/ViewComplexityFactors');
    }

    public function ViewComplexityFactorsEditForm($cf_id, $sort_by = 'cf_id', $sort_order = 'asc', $offset = 0) {

        $this->load->model('ComplexityFactorsModel');
        $data['edit'] = $this->ComplexityFactorsModel->getEditComplexityFactors($cf_id);
        $this->load->view('pmctoolContent/pmctoolComplexityFactorsContent/pmctoolComplexityFactorsContentEdit', $data);
    }

    public function ViewComplexityFactorsEditSubmitForm() {

        $this->load->model('ComplexityFactorsModel');
        $this->load->library('form_validation');
        $error = '';

        $cf_id = stripslashes($_POST['cf_id']);
        $cf_name = stripslashes($_POST['cf_name']);
        $cf_description = stripslashes($_POST['cf_description']);
        $cf_reference = stripslashes($_POST['cf_reference']);
        $cf_restriction = stripslashes($_POST['cf_restriction']);
        $cf_category = stripslashes($_POST['cf_category']);
        $cf_weight = stripslashes($_POST['cf_weight']);

        $this->form_validation->set_rules('cf_name', 'Complexity Factor Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_description', 'Complexity Factor Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_reference', 'Complexity Factor Reference', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_restriction', 'Complexity Factor Restriction', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_category', 'Complexity Factor Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cf_weight', 'Complexity Factor Weight', 'trim|required|numeric|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                    . 'Your Complexity Factor has not been successfully <strong>Edited</strong>!!'
                    . '</div>');
            $data['edit'] = null;
            $this->load->view('pmctoolContent/pmctoolComplexityFactorsContent/pmctoolComplexityFactorsContentEdit', $data);
        } else {

            $cf_id = stripslashes($_POST['cf_id']);
            $cf_name = stripslashes($_POST['cf_name']);
            $cf_description = stripslashes($_POST['cf_description']);
            $cf_reference = stripslashes($_POST['cf_reference']);
            $cf_restriction = stripslashes($_POST['cf_restriction']);
            $cf_category = stripslashes($_POST['cf_category']);
            $cf_weight = stripslashes($_POST['cf_weight']);

            $data = array(
                'cf_id' => $cf_id,
                'cf_name' => $cf_name,
                'cf_description' => $cf_description,
                'cf_reference' => $cf_reference,
                'cf_restriction' => $cf_restriction,
                'cf_category' => $cf_category,
                'cf_weight' => $cf_weight
            );
            $this->ComplexityFactorsModel->EditComplexityFactors($cf_id, $data);
            $this->session->set_flashdata('edit_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                    . 'Your Complexity Factor has been successfully <strong>Edited</strong>!!'
                    . '</div>');

            redirect('ComplexityFactors/ViewComplexityFactors');
        }
    }

    public function ViewComplexityFactorsDetails($cf_id,$sort_by = 'cf_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('ComplexityFactorsModel');
        //pass messages
        $data['gens'] = $this->ComplexityFactorsModel->getViewComplexityFactorsDetails($cf_id);
        $limit = 1;
        $results = $this->ComplexityFactorsModel->searchViewComplexityFactorsDetails($cf_id,$sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("ComplexityFactors/ViewComplexityFactorsDetails/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('complexity_factor');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'cf_name' => 'Title',
            'cf_description' => 'Description',
            'cf_reference' => 'Reference',
            'cf_restriction' => 'Restriction',
            'cf_category' => 'Category',
            'cf_weight' => 'Weight'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctoolContent/pmctoolComplexityFactorsContent/pmctoolComplexityFactorsContentDetails', $data);
    }

}
