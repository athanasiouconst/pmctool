<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Metrics extends CI_Controller {

    public function ViewMetrics($sort_by = 'metric_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('MetricsModel');
        //pass messages
        $data['gens'] = $this->MetricsModel->getViewMetrics();
        $limit = 10;
        $results = $this->MetricsModel->searchViewMetrics($sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("Metrics/ViewMetrics/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('metric');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'metric_name' => 'Title',
            //'metric_description' => 'Description',
            //'metric_reference' => 'Reference',
            //'metric_restriction' => 'Restriction',
            //'metric_weight' => 'Metric Weight',
            'cf_name' => 'Complecity Factor'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctool/metrics', $data);
    }

    public function ViewMetricsCreationForm() {
        //pass messages
        $this->load->model('MetricsModel');
        $data['gComplexityFactors'] = $this->MetricsModel->getViewComplexityFactors();

        $resultsComplexityFactors = $this->MetricsModel->searchViewComplexityFactors();
        $data['genCF'] = $resultsComplexityFactors['rows'];
        $data['num_result'] = $resultsComplexityFactors['num_rows'];

        $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentInsert', $data);
    }

    public function CreateMetrics() {

        $this->load->model('MetricsModel');
        $this->load->library('form_validation');
        $error = '';

//pass messages
        $this->load->model('MetricsModel');
        $data['gComplexityFactors'] = $this->MetricsModel->getViewComplexityFactors();

        $resultsComplexityFactors = $this->MetricsModel->searchViewComplexityFactors();
        $data['genCF'] = $resultsComplexityFactors['rows'];
        $data['num_result'] = $resultsComplexityFactors['num_rows'];

        $this->form_validation->set_rules('metric_name', 'Metric Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('metric_description', 'Metric Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('metric_reference', 'Metric Reference', 'trim|required|xss_clean');
        $this->form_validation->set_rules('metric_restriction', 'Metric Restriction', 'trim|required|xss_clean');
        $this->form_validation->set_rules('metric_weight', 'Metric Weight', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cf_id', 'Complexity Factor', 'trim|required|callback_Select_ComplexityFactor|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentInsert', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {

                $metric_name = stripslashes($_POST['metric_name']);
                $metric_description = stripslashes($_POST['metric_description']);
                $metric_reference = stripslashes($_POST['metric_reference']);
                $metric_restriction = stripslashes($_POST['metric_restriction']);
                $metric_weight = stripslashes($_POST['metric_weight']);
                $cf_id = stripslashes($_POST['cf_id']);

                $data = array(
                    'metric_id' => NULL,
                    'metric_name' => $metric_name,
                    'metric_description' => $metric_description,
                    'metric_reference' => $metric_reference,
                    'metric_restriction' => $metric_restriction,
                    'metric_weight' => $metric_weight,
                    'cf_id' => $cf_id
                );
                $this->MetricsModel->add_Metrics($data);

                $this->session->set_flashdata('success_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                        . 'Your Metric has successfully been <strong>Registered</strong>!!'
                        . '</div>');
                redirect('Metrics/ViewMetrics');
            }
        }
    }

    function Select_ComplexityFactor($cf_id) {

        if ($cf_id == "-1") {
            $this->form_validation->set_message('Select_ComplexityFactor', 'You have to select a Complexity Factor for your metric');
            return false;
        } else {
            return true;
        }
    }

    public function ViewMetricsDelete($metric_id) {

        $this->load->model('MetricsModel');
        $this->MetricsModel->MetricsDelete($metric_id);
        $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                . 'Your Metric has successfully been <strong>Deleted</strong>!!'
                . '</div>');

        redirect('Metrics/ViewMetrics');
    }

    public function ViewMetricsEditForm($metric_id, $sort_by = 'metric_id', $sort_order = 'asc', $offset = 0) {

        $this->load->model('MetricsModel');
        $data['edit'] = $this->MetricsModel->getEditMetrics($metric_id);

        $data['gComplexityFactors'] = $this->MetricsModel->getViewComplexityFactors();

        $resultsComplexityFactors = $this->MetricsModel->searchViewComplexityFactors();
        $data['genCF'] = $resultsComplexityFactors['rows'];
        $data['num_result'] = $resultsComplexityFactors['num_rows'];

        $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentEdit', $data);
    }

    public function ViewMetricsEditSubmitForm() {

        $this->load->model('MetricsModel');
        $this->load->library('form_validation');
        $error = '';

        $data['gComplexityFactors'] = $this->MetricsModel->getViewComplexityFactors();

        $resultsComplexityFactors = $this->MetricsModel->searchViewComplexityFactors();
        $data['genCF'] = $resultsComplexityFactors['rows'];
        $data['num_result'] = $resultsComplexityFactors['num_rows'];

        $metric_id = stripslashes($_POST['metric_id']);
        $metric_name = stripslashes($_POST['metric_name']);
        $metric_description = stripslashes($_POST['metric_description']);
        $metric_reference = stripslashes($_POST['metric_reference']);
        $metric_restriction = stripslashes($_POST['metric_restriction']);
        $metric_weight = stripslashes($_POST['metric_weight']);
        $cf_id = stripslashes($_POST['cf_id']);

        $this->form_validation->set_rules('metric_name', 'Metric Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('metric_description', 'Metric Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('metric_reference', 'Metric Reference', 'trim|required|xss_clean');
        $this->form_validation->set_rules('metric_restriction', 'Metric Restriction', 'trim|required|xss_clean');
        $this->form_validation->set_rules('metric_weight', 'Metric Weight', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cf_id', 'Complexity Factor', 'trim|required|callback_Select_ComplexityFactor|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                    . 'Your Metric has not been successfully <strong>Edited</strong>!!'
                    . '</div>');
            $data['edit'] = null;

            $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentEdit', $data);
        } else {

            $metric_id = stripslashes($_POST['metric_id']);
            $metric_name = stripslashes($_POST['metric_name']);
            $metric_description = stripslashes($_POST['metric_description']);
            $metric_reference = stripslashes($_POST['metric_reference']);
            $metric_restriction = stripslashes($_POST['metric_restriction']);
            $metric_weight = stripslashes($_POST['metric_weight']);
            $cf_id = stripslashes($_POST['cf_id']);

            $data = array(
                'metric_id' => $metric_id,
                'metric_name' => $metric_name,
                'metric_description' => $metric_description,
                'metric_reference' => $metric_reference,
                'metric_restriction' => $metric_restriction,
                'metric_weight' => $metric_weight,
                'cf_id' => $cf_id
            );
            $this->MetricsModel->EditMetrics($metric_id, $data);
            $this->session->set_flashdata('edit_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                    . 'Your Metric has been successfully <strong>Edited</strong>!!'
                    . '</div>');

            redirect('Metrics/ViewMetrics');
        }
    }

    public function ViewMetricsAssignScaleCreationForm() {
        //pass messages
        $this->load->model('MetricsModel');
        $data['gEvaluationScale'] = $this->MetricsModel->getViewEvaluationScale();
        $data['gMetric'] = $this->MetricsModel->getViewMetric();

        $resultsEvaluationScale = $this->MetricsModel->searchViewEvaluationScale();
        $resultsMetric = $this->MetricsModel->searchViewMetric();

        $data['genEvaluationScale'] = $resultsEvaluationScale['rows'];
        $data['genMetric'] = $resultsMetric['rows'];

        $data['num_result'] = $resultsEvaluationScale['num_rows'];
        $data['num_result'] = $resultsMetric['num_rows'];

        $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentAssignScale', $data);
    }

    public function CreateMetricsAssignEvaluationScale() {

        $this->load->model('MetricsModel');
        $this->load->library('form_validation');
        $error = '';

//pass messages
        $data['gEvaluationScale'] = $this->MetricsModel->getViewEvaluationScale();
        $data['gMetric'] = $this->MetricsModel->getViewMetric();

        $resultsEvaluationScale = $this->MetricsModel->searchViewEvaluationScale();
        $resultsMetric = $this->MetricsModel->searchViewMetric();

        $data['genEvaluationScale'] = $resultsEvaluationScale['rows'];
        $data['genMetric'] = $resultsMetric['rows'];

        $data['num_result'] = $resultsEvaluationScale['num_rows'];
        $data['num_result'] = $resultsMetric['num_rows'];

        $this->form_validation->set_rules('metric_id', 'Metric', 'trim|required|callback_Select_Metric|xss_clean');
        $this->form_validation->set_rules('evsc_id', 'Evaluation Scale', 'trim|required|callback_Select_EvaluationScale|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $data['gEvaluationScale'] = $this->MetricsModel->getViewEvaluationScale();
            $data['gMetric'] = $this->MetricsModel->getViewMetric();

            $resultsEvaluationScale = $this->MetricsModel->searchViewEvaluationScale();
            $resultsMetric = $this->MetricsModel->searchViewMetric();

            $data['genEvaluationScale'] = $resultsEvaluationScale['rows'];
            $data['genMetric'] = $resultsMetric['rows'];

            $data['num_result'] = $resultsEvaluationScale['num_rows'];
            $data['num_result'] = $resultsMetric['num_rows'];
            $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentAssignScale', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {


                $metric_id = stripslashes($_POST['metric_id']);
                $evsc_id = stripslashes($_POST['evsc_id']);

                $data = array(
                    'metric_evsc_id' => NULL,
                    'metric_id' => $metric_id,
                    'evsc_id' => $evsc_id
                );
                $this->MetricsModel->add_MetricsEvaluationScale($data);

                $this->session->set_flashdata('success_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                        . 'Your Assignment has successfully been <strong>Registered</strong>!!'
                        . '</div>');
                redirect('Metrics/ViewMetrics');
            }
        }
    }

    function Select_Metric($metric_id) {

        if ($metric_id == "-1") {
            $this->form_validation->set_message('Select_Metric', 'You have to select a Metric');
            return false;
        } else {
            return true;
        }
    }

    function Select_EvaluationScale($evsc_id) {

        if ($evsc_id == "-1") {
            $this->form_validation->set_message('Select_EvaluationScale', 'You have to select an Evaluation Scale for your metric');
            return false;
        } else {
            return true;
        }
    }

    public function ViewMetricsDetails($metric_id, $sort_by = 'metric_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('MetricsModel');
        //pass messages
        $data['gens'] = $this->MetricsModel->getViewMetricsDetails($metric_id);
        $limit = 1;
        $results = $this->MetricsModel->searchViewMetricsDetails($metric_id, $sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("Metrics/ViewMetricsDetails/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('metric');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'metric_name' => 'Title',
            'metric_description' => 'Description',
            'metric_reference' => 'Reference',
            'metric_restriction' => 'Restriction',
            'metric_weight' => 'Metric Weight',
            'cf_name' => 'Complecity Factor'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentDetails', $data);
    }

    public function ViewMetricsAssignments($metric_id, $sort_by = 'metric_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('MetricsModel');
        //pass messages
        $data['gens'] = $this->MetricsModel->getViewMetricsAssignments($metric_id);
        $limit = 10;
        $results = $this->MetricsModel->searchViewMetricsAssignments($metric_id, $sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("Metrics/ViewMetricsAssignments/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('metric_evsc');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'metric_name' => 'Title',
            //'metric_description' => 'Description',
            //'metric_reference' => 'Reference',
            //'metric_restriction' => 'Restriction',
            //'metric_weight' => 'Metric Weight',
            'cf_name' => 'Complecity Factor',
            'evsc_name' => 'Evaluation Scale Name',
            'evsc_type' => 'Evaluation Scale Type'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctool_assignments/metrics', $data);
    }

    public function ViewMetricsAssignmentsDetails($metric_evsc_id, $sort_by = 'metric_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('MetricsModel');
        //pass messages
        $data['gens'] = $this->MetricsModel->getViewMetricsAssignmentsDetails($metric_evsc_id);
        $limit = 1;
        $results = $this->MetricsModel->searchViewMetricsAssignmentsDetails($metric_evsc_id, $sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        //pagination
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = site_url("Metrics/ViewMetricsAssignmentsDetails/$sort_by/$sort_order");
        $config['total_rows'] = $data['num_result'];
        $config['per_page'] = $limit;
        $config['first_link'] = '&laquo; First ';
        $config['next_link'] = '&gt; Next ';
        $config['prev_link'] = 'Previous &lt; ';
        $config['last_link'] = 'Last &raquo;';
        $config['total_rows'] = $this->db->count_all('metric_evsc');
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['fields'] = array(
            'metric_name' => 'Title',
            'metric_description' => 'Description',
            'metric_reference' => 'Reference',
            'metric_restriction' => 'Restriction',
            'metric_weight' => 'Metric Weight',
            'cf_name' => 'Complexity Factor',
            'evsc_name' => 'Evaluation Scale Name',
            'evsc_description' => 'Evaluation Scale Description',
            'evsc_type' => 'Evaluation Scale Type'
        );
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsAssignmentsContentDetails', $data);
    }

    public function ViewMetricsAssignmentsEditForm($metric_evsc_id, $sort_by = 'metric_id', $sort_order = 'asc', $offset = 0) {

        $this->load->model('MetricsModel');

        $data['gEvaluationScale'] = $this->MetricsModel->getViewEvaluationScaleAssignmentsEdit($metric_evsc_id);
        $data['gEvaluationScaleAll'] = $this->MetricsModel->getViewEvaluationScale();
        $data['gMetric'] = $this->MetricsModel->getViewMetricAssignmentsEdit($metric_evsc_id);

        $resultsEvaluationScale = $this->MetricsModel->searchViewEvaluationScaleAssignmentsEdit($metric_evsc_id);
        $resultsEvaluationScaleAll = $this->MetricsModel->searchViewEvaluationScale();
        $resultsMetric = $this->MetricsModel->searchViewMetricAssignmentsEdit($metric_evsc_id);

        $data['genEvaluationScale'] = $resultsEvaluationScale['rows'];
        $data['genEvaluationScaleAll'] = $resultsEvaluationScaleAll['rows'];
        $data['genMetric'] = $resultsMetric['rows'];

        $data['num_result'] = $resultsEvaluationScale['num_rows'];
        $data['num_result'] = $resultsEvaluationScaleAll['num_rows'];
        $data['num_result'] = $resultsMetric['num_rows'];

        $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentAssignScaleEdit', $data);
    }

    public function ViewMetricsAssignEvaluationScaleEditSubmitForm($metric_evsc_id) {

        $this->load->model('MetricsModel');
        $this->load->library('form_validation');
        $error = '';

        $data['gEvaluationScale'] = $this->MetricsModel->getViewEvaluationScaleAssignmentsEdit($metric_evsc_id);
        $data['gEvaluationScaleAll'] = $this->MetricsModel->getViewEvaluationScale();
        $data['gMetric'] = $this->MetricsModel->getViewMetricAssignmentsEdit($metric_evsc_id);

        $resultsEvaluationScale = $this->MetricsModel->searchViewEvaluationScaleAssignmentsEdit($metric_evsc_id);
        $resultsEvaluationScaleAll = $this->MetricsModel->searchViewEvaluationScale();
        $resultsMetric = $this->MetricsModel->searchViewMetricAssignmentsEdit($metric_evsc_id);

        $data['genEvaluationScale'] = $resultsEvaluationScale['rows'];
        $data['genEvaluationScaleAll'] = $resultsEvaluationScaleAll['rows'];
        $data['genMetric'] = $resultsMetric['rows'];

        $data['num_result'] = $resultsEvaluationScale['num_rows'];
        $data['num_result'] = $resultsEvaluationScaleAll['num_rows'];
        $data['num_result'] = $resultsMetric['num_rows'];

        $this->form_validation->set_rules('metric_id', 'Metric', 'trim|required|callback_Select_MetricEdit|xss_clean');
        $this->form_validation->set_rules('evsc_id', 'Evaluation Scale', 'trim|required|callback_Select_EvaluationScaleEdit|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = $error;
            $this->load->view('pmctoolContent/pmctoolMetricsContent/pmctoolMetricsContentAssignScaleEdit', $data);
        } else {
            if ($this->form_validation->run() == TRUE) {


                $metric_evsc_id = stripslashes($_POST['metric_evsc_id']);
                $metric_id = stripslashes($_POST['metric_id']);
                $evsc_id = stripslashes($_POST['evsc_id']);

                $data = array(
                    'metric_evsc_id' => $metric_evsc_id,
                    'metric_id' => $metric_id,
                    'evsc_id' => $evsc_id
                );
                $this->MetricsModel->EditAssignmentMetrics($metric_evsc_id, $data);

                $this->session->set_flashdata('success_msg', '<div class="alert alert-success" style="font-size:24px; font:bold;">'
                        . 'Your Assignment has successfully been <strong>Registered</strong>!!'
                        . '</div>');
                redirect('Metrics/ViewMetrics');
            }
        }
    }

    function Select_MetricEdit($metric_id) {

        if ($metric_id == "-1") {
            $this->form_validation->set_message('Select_MetricEdit', 'You have to select a Metric');
            return false;
        } else {
            return true;
        }
    }

    function Select_EvaluationScaleEdit($evsc_id) {

        if ($evsc_id == "-1") {
            $this->form_validation->set_message('Select_EvaluationScaleEdit', 'You have to select an Evaluation Scale for your metric');
            return false;
        } else {
            return true;
        }
    }

    public function ViewMetricsAssignmentsDelete($metric_evsc_id) {

        $this->load->model('MetricsModel');
        $this->MetricsModel->MetricsAssignmentsDelete($metric_evsc_id);
        $this->session->set_flashdata('delete_msg', '<div class="alert alert-danger" style="font-size:24px; font:bold;">'
                . 'Your Scale Assignment to Metric has successfully been <strong>Deleted</strong>!!'
                . '</div>');

        redirect('Metrics/ViewMetrics');
    }

    public function ViewMetricsPDF($metric_id, $sort_by = 'metric_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('MetricsModel');
        //pass messages
        $data['gens'] = $this->MetricsModel->getViewMetricsDetails($metric_id);
        $limit = 1;
        $results = $this->MetricsModel->searchViewMetricsDetails($metric_id, $sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        $now = new DateTime();
        $data['today'] = $now->format('d-m-Y H:i:s');
        $this->load->view('pdf/Metrics', $data);
    }

    public function ViewMetricsAssignmentsDetailsPDF($metric_evsc_id, $sort_by = 'metric_id', $sort_order = 'desc', $offset = 0) {
        $this->load->model('MetricsModel');
        //pass messages
        $data['gens'] = $this->MetricsModel->getViewMetricsAssignmentsDetails($metric_evsc_id);
        $limit = 1;
        $results = $this->MetricsModel->searchViewMetricsAssignmentsDetails($metric_evsc_id, $sort_by, $sort_order, $limit, $offset);
        $data['gen'] = $results['rows'];
        $data['num_result'] = $results['num_rows'];
        $now = new DateTime();
        $data['today'] = $now->format('d-m-Y H:i:s');        
        $this->load->view('pdf/MetricsAssignments', $data);
    }
}
