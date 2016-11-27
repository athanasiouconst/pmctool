<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EvaluationScale extends CI_Controller {

    public function ViewEvaluationScale($sort_by = 'evsc_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('EvaluationScaleModel');
        //pass messages
        $data['gens'] = $this->EvaluationScaleModel->getViewEvaluationScale();
        $limit = 10;
        $results = $this->EvaluationScaleModel->searchViewEvaluationScale($sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("EvaluationScale/ViewEvaluationScale/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('evaluation_scale');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'evsc_name' => 'Title',
            'evsc_description' => 'Description'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctool/evaluationScale', $data);
    }

    public function ViewEvaluationScaleCreationForm() {
        //pass messages


        $this->load->view('pmctoolContent/pmctoolEvaluationScaleContent/pmctoolEvaluationScaleContentInsert');
    }

    public function CreateEvaluationScale() {

        $this->load->model('EvaluationScaleModel');
        $this->load->library('form_validation');
        $error = '';

        //pass messages
        $this->form_validation->set_rules('evsc_name', 'Evaluation Scale Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('evsc_description', 'Evaluation Scale Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('evsc_type', 'Evaluation Scale Type', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('ep1_value', 'Evaluation Scale Value', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('ep1_descr', 'Evaluation Scale Description', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('ep1_weight', 'Evaluation Scale Weight', 'trim|required|numeric|xss_clean');
        //$this->form_validation->set_rules('ep2_value', 'Evaluation Scale Value', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('ep2_descr', 'Evaluation Scale Description', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('ep2_weight', 'Evaluation Scale Weight', 'trim|required|numeric|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->view('pmctoolContent/pmctoolEvaluationScaleContent/pmctoolEvaluationScaleContentInsert', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {

                $evsc_name = stripslashes($_POST['evsc_name']);
                $evsc_description = stripslashes($_POST['evsc_description']);
                $evsc_type = stripslashes($_POST['evsc_type']);

                $evsc_number_of_choices = stripslashes($_POST['evsc_number_of_choices']);

                $ep1_value = stripslashes($_POST['ep1_value']);
                $ep1_descr = stripslashes($_POST['ep1_descr']);
                $ep1_weight = stripslashes($_POST['ep1_weight']);

                $ep2_value = stripslashes($_POST['ep2_value']);
                $ep2_descr = stripslashes($_POST['ep2_descr']);
                $ep2_weight = stripslashes($_POST['ep2_weight']);

                $ep3_value = stripslashes($_POST['ep3_value']);
                $ep3_descr = stripslashes($_POST['ep3_descr']);
                $ep3_weight = stripslashes($_POST['ep3_weight']);

                $ep4_value = stripslashes($_POST['ep4_value']);
                $ep4_descr = stripslashes($_POST['ep4_descr']);
                $ep4_weight = stripslashes($_POST['ep4_weight']);

                $ep5_value = stripslashes($_POST['ep5_value']);
                $ep5_descr = stripslashes($_POST['ep5_descr']);
                $ep5_weight = stripslashes($_POST['ep5_weight']);

                $ep6_value = stripslashes($_POST['ep6_value']);
                $ep6_descr = stripslashes($_POST['ep6_descr']);
                $ep6_weight = stripslashes($_POST['ep6_weight']);

                $ep7_value = stripslashes($_POST['ep7_value']);
                $ep7_descr = stripslashes($_POST['ep7_descr']);
                $ep7_weight = stripslashes($_POST['ep7_weight']);

                $ep8_value = stripslashes($_POST['ep8_value']);
                $ep8_descr = stripslashes($_POST['ep8_descr']);
                $ep8_weight = stripslashes($_POST['ep8_weight']);

                $ep9_value = stripslashes($_POST['ep9_value']);
                $ep9_descr = stripslashes($_POST['ep9_descr']);
                $ep9_weight = stripslashes($_POST['ep9_weight']);

                $ep10_value = stripslashes($_POST['ep10_value']);
                $ep10_descr = stripslashes($_POST['ep10_descr']);
                $ep10_weight = stripslashes($_POST['ep10_weight']);

                $data = array(
                    'evsc_id' => NULL,
                    'evsc_name' => $evsc_name,
                    'evsc_description' => $evsc_description,
                    'evsc_type' => $evsc_type,
                    'evsc_number_of_choices' => $evsc_number_of_choices,
                    'ep1_value' => $ep1_value,
                    'ep1_descr' => $ep1_descr,
                    'ep1_weight' => $ep1_weight,
                    'ep2_value' => $ep2_value,
                    'ep2_descr' => $ep2_descr,
                    'ep2_weight' => $ep2_weight,
                    'ep3_value' => $ep3_value,
                    'ep3_descr' => $ep3_descr,
                    'ep3_weight' => $ep3_weight,
                    'ep4_value' => $ep4_value,
                    'ep4_descr' => $ep4_descr,
                    'ep4_weight' => $ep4_weight,
                    'ep5_value' => $ep5_value,
                    'ep5_descr' => $ep5_descr,
                    'ep5_weight' => $ep5_weight,
                    'ep6_value' => $ep6_value,
                    'ep6_descr' => $ep6_descr,
                    'ep6_weight' => $ep6_weight,
                    'ep7_value' => $ep7_value,
                    'ep7_descr' => $ep7_descr,
                    'ep7_weight' => $ep7_weight,
                    'ep8_value' => $ep8_value,
                    'ep8_descr' => $ep8_descr,
                    'ep8_weight' => $ep8_weight,
                    'ep9_value' => $ep9_value,
                    'ep9_descr' => $ep9_descr,
                    'ep9_weight' => $ep9_weight,
                    'ep10_value' => $ep10_value,
                    'ep10_descr' => $ep10_descr,
                    'ep10_weight' => $ep10_weight
                );
                $this->EvaluationScaleModel->add_EvaluationScale($data);

                $this->session->set_flashdata('success_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                        . 'Your Evaluation Scale has successfully been <strong>Registered</strong>!!'
                        . '</div>');
                redirect('EvaluationScale/ViewEvaluationScale');
            }
        }
    }

    public function ViewEvaluationScaleDelete($evsc_id) {

        $this->load->model('EvaluationScaleModel');
        $this->EvaluationScaleModel->EvaluationScaleDelete($evsc_id);
        $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                . 'Your Evaluation Scale has successfully been <strong>Deleted</strong>!!'
                . '</div>');

        redirect('EvaluationScale/ViewEvaluationScale');
    }

    public function ViewEvaluationScaleEditForm($evsc_id, $sort_by = 'evsc_id', $sort_order = 'asc', $offset = 0) {

        $this->load->model('EvaluationScaleModel');
        $data['edit'] = $this->EvaluationScaleModel->getEditEvaluationScale($evsc_id);
        $this->load->view('pmctoolContent/pmctoolEvaluationScaleContent/pmctoolEvaluationScaleContentEdit', $data);
    }

    public function ViewEvaluationScaleDetails($evsc_id, $sort_by = 'evsc_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('EvaluationScaleModel');
        //pass messages
        $data['gens'] = $this->EvaluationScaleModel->getViewEvaluationScaleDetails($evsc_id);
        $limit = 1;
        $results = $this->EvaluationScaleModel->searchViewEvaluationScaleDetails($evsc_id, $sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("EvaluationScale/ViewEvaluationScaleDetails/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('evaluation_scale');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'evsc_name' => 'Title',
            'evsc_description' => 'Description',
            'evsc_type' => 'Type',
            'evsc_number_of_choices' => 'Number of Choices'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctoolContent/pmctoolEvaluationScaleContent/pmctoolEvaluationScaleContentDetails', $data);
    }

    public function ViewEvaluationScalePDF($evsc_id, $sort_by = 'evsc_id', $sort_order = 'asc', $offset = 0) {
        $this->load->model('EvaluationScaleModel');
        $data['gens'] = $this->EvaluationScaleModel->getViewEvaluationScaleDetails($evsc_id);
        $limit = 1;
        $results = $this->EvaluationScaleModel->searchViewEvaluationScaleDetails($evsc_id, $sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        $now = new DateTime();
        $data['today'] = $now->format('d-m-Y H:i:s');
        $this->load->view('pdf/EvaluationScale', $data);
    }

}
