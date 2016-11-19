<?php

Class MetricsModel extends CI_Model {

    public function getViewMetrics() {
        $query = $this->db->query("SELECT * FROM metric "
                . " LEFT JOIN complexity_factor ON metric.cf_id=complexity_factor.cf_id");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'metric_id' => $row->metric_id,
                'metric_name' => $row->metric_name,
                'metric_description' => $row->metric_description,
                'metric_reference' => $row->metric_reference,
                'metric_restriction' => $row->metric_restriction,
                'metric_weight' => $row->metric_weight,
                'cf_id' => $row->cf_id,
                'cf_name' => $row->cf_name
            ));
        }
        return $results;
    }

    function searchViewMetrics($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('metric_id', 'metric_name',
            'metric_description', 'metric_reference',
            'metric_restriction', 'metric_weight', 'cf_id', 'cf_name');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'metric_id';

        $query = $this->db->select('*')
                ->from('metric')
                ->join('complexity_factor', 'metric.cf_id = complexity_factor.cf_id', 'left outer')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('metric');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewComplexityFactors() {
        $query = $this->db->query("SELECT * FROM complexity_factor ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'cf_id' => $row->cf_id,
                'cf_name' => $row->cf_name,
                'cf_description' => $row->cf_description,
                'cf_reference' => $row->cf_reference,
                'cf_restriction' => $row->cf_restriction,
                'cf_category' => $row->cf_category,
                'cf_weight' => $row->cf_weight
            ));
        }
        return $results;
    }

    function searchViewComplexityFactors() {
        //results

        $query = $this->db->select('*')
                ->from('complexity_factor');
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('complexity_factor');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

//add
    function add_Metrics($data) {

        $this->db->insert('metric', $data);
        return;
    }

    //Delete
    function MetricsDelete($metric_id) {
        $this->db->where('metric_id', $metric_id);
        $this->db->delete('metric');
    }

    public function getEditMetrics($metric_id) {
        $query = $this->db->query("SELECT * FROM metric "
                . " LEFT JOIN complexity_factor ON metric.cf_id=complexity_factor.cf_id"
                . " WHERE metric_id='" . $metric_id . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'metric_id' => $row->metric_id,
                'metric_name' => $row->metric_name,
                'metric_description' => $row->metric_description,
                'metric_reference' => $row->metric_reference,
                'metric_restriction' => $row->metric_restriction,
                'metric_weight' => $row->metric_weight,
                'cf_id' => $row->cf_id,
                'cf_name' => $row->cf_name
            ));
        }
        return $results;
    }

    //Update 
    public function EditMetrics($metric_id, $data) {

        $this->db->where('metric_id', $metric_id);
        $this->db->update('metric', $data);
    }

    public function getViewEvaluationScale() {
        $query = $this->db->query("SELECT * FROM evaluation_scale ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'evsc_id' => $row->evsc_id,
                'evsc_name' => $row->evsc_name,
                'evsc_description' => $row->evsc_description,
                'evsc_type' => $row->evsc_type,
                'evsc_number_of_choices' => $row->evsc_number_of_choices
            ));
        }
        return $results;
    }

    function searchViewEvaluationScale() {
        //results

        $query = $this->db->select('*')
                ->from('evaluation_scale');
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('evaluation_scale');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    function searchViewMetric() {
        //results

        $query = $this->db->select('*')
                ->from('metric')
                ->order_by('metric_id', 'desc');
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('metric');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewMetric() {
        $query = $this->db->query("SELECT * FROM metric ORDER BY metric_id DESC");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'metric_id' => $row->metric_id,
                'metric_name' => $row->metric_name,
                'metric_description' => $row->metric_description,
                'metric_reference' => $row->metric_reference,
                'metric_restriction' => $row->metric_restriction,
                'metric_weight' => $row->metric_weight,
                'cf_id' => $row->cf_id
            ));
        }
        return $results;
    }

    //add
    function add_MetricsEvaluationScale($data) {

        $this->db->insert('metric_evsc', $data);
        return;
    }

    public function getViewMetricsAssignments($metric_id) {
        $query = $this->db->query("SELECT * FROM metric_evsc "
                . " LEFT JOIN evaluation_scale ON metric_evsc.evsc_id=evaluation_scale.evsc_id"
                . " LEFT JOIN metric ON metric_evsc.metric_id=metric.metric_id"
                . " LEFT JOIN complexity_factor ON metric.cf_id=complexity_factor.cf_id"
                . " WHERE metric_evsc.metric_id = '" . $metric_id . "'"
                //. " group by metric_evsc.metric_id = '".$metric_id."'"
                . "");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'metric_id' => $row->metric_id,
                'metric_name' => $row->metric_name,
                'metric_description' => $row->metric_description,
                'metric_reference' => $row->metric_reference,
                'metric_restriction' => $row->metric_restriction,
                'metric_weight' => $row->metric_weight,
                'cf_id' => $row->cf_id,
                'cf_name' => $row->cf_name,
                'evsc_name' => $row->evsc_name,
                'evsc_description' => $row->evsc_description,
                'evsc_type' => $row->evsc_type
            ));
        }
        return $results;
    }

    function searchViewMetricsAssignments($metric_id, $sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('metric_evsc.metric_id', 'metric_name',
            'metric_description', 'metric_reference',
            'metric_restriction', 'metric_weight', 'cf_id', 'cf_name',
            'evsc_name', 'evsc_description', 'evsc_type');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'metric_evsc.metric_id';

        $query = $this->db->select('*')
                ->from('metric_evsc')
                ->join('evaluation_scale', 'metric_evsc.evsc_id=evaluation_scale.evsc_id', 'left outer')
                ->join('metric', 'metric_evsc.metric_id = metric.metric_id', 'left outer')
                ->join('complexity_factor', 'metric.cf_id = complexity_factor.cf_id', 'left outer')
                ->limit($limit, $offset)
                ->where('metric_evsc.metric_id', $metric_id)
                //->group_by('metric_evsc.metric_id')
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('metric_evsc');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewMetricsAssignmentsDetails($metric_evsc_id) {
        $query = $this->db->query("SELECT * FROM metric_evsc "
                . " LEFT JOIN evaluation_scale ON metric_evsc.evsc_id=evaluation_scale.evsc_id"
                . " LEFT JOIN metric ON metric_evsc.metric_id=metric.metric_id"
                . " LEFT JOIN complexity_factor ON metric.cf_id=complexity_factor.cf_id"
                . " WHERE metric_evsc.metric_evsc_id = '" . $metric_evsc_id . "'"
                //. " group by metric_evsc.metric_id = '".$metric_id."'"
                . "");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'metric_id' => $row->metric_id,
                'metric_name' => $row->metric_name,
                'metric_description' => $row->metric_description,
                'metric_reference' => $row->metric_reference,
                'metric_restriction' => $row->metric_restriction,
                'metric_weight' => $row->metric_weight,
                'cf_id' => $row->cf_id,
                'cf_name' => $row->cf_name,
                'evsc_name' => $row->evsc_name,
                'evsc_description' => $row->evsc_description,
                'evsc_type' => $row->evsc_type
            ));
        }
        return $results;
    }

    function searchViewMetricsAssignmentsDetails($metric_evsc_id, $sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('metric_evsc.metric_id', 'metric_name',
            'metric_description', 'metric_reference',
            'metric_restriction', 'metric_weight', 'cf_id', 'cf_name',
            'evsc_name', 'evsc_description', 'evsc_type');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'metric_evsc.metric_id';

        $query = $this->db->select('*')
                ->from('metric_evsc')
                ->join('evaluation_scale', 'metric_evsc.evsc_id=evaluation_scale.evsc_id', 'left outer')
                ->join('metric', 'metric_evsc.metric_id = metric.metric_id', 'left outer')
                ->join('complexity_factor', 'metric.cf_id = complexity_factor.cf_id', 'left outer')
                ->limit($limit, $offset)
                ->where('metric_evsc.metric_evsc_id', $metric_evsc_id)
                //->group_by('metric_evsc.metric_id')
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('metric_evsc');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewMetricsDetails($metric_id) {
        $query = $this->db->query("SELECT * FROM metric "
                . " LEFT JOIN complexity_factor ON metric.cf_id=complexity_factor.cf_id"
                . " WHERE metric_id='" . $metric_id . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'metric_id' => $row->metric_id,
                'metric_name' => $row->metric_name,
                'metric_description' => $row->metric_description,
                'metric_reference' => $row->metric_reference,
                'metric_restriction' => $row->metric_restriction,
                'metric_weight' => $row->metric_weight,
                'cf_id' => $row->cf_id,
                'cf_name' => $row->cf_name
            ));
        }
        return $results;
    }

    function searchViewMetricsDetails($metric_id, $sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('metric_id', 'metric_name',
            'metric_description', 'metric_reference',
            'metric_restriction', 'metric_weight', 'cf_id', 'cf_name');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'metric_id';

        $query = $this->db->select('*')
                ->from('metric')
                ->join('complexity_factor', 'metric.cf_id = complexity_factor.cf_id', 'left outer')
                ->limit($limit, $offset)
                ->where('metric_id', $metric_id)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('metric');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewEvaluationScaleAssignmentsEdit($metric_evsc_id) {
        $query = $this->db->query("SELECT * FROM metric_evsc "
                . " LEFT JOIN evaluation_scale on metric_evsc.evsc_id=evaluation_scale.evsc_id"
                . " WHERE metric_evsc.metric_evsc_id = '" . $metric_evsc_id . "'"
                . "");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'evsc_id' => $row->evsc_id,
                'evsc_name' => $row->evsc_name,
                'evsc_description' => $row->evsc_description,
                'evsc_type' => $row->evsc_type,
                'evsc_number_of_choices' => $row->evsc_number_of_choices
            ));
        }
        return $results;
    }

    function searchViewEvaluationScaleAssignmentsEdit($metric_evsc_id) {
        //results

        $query = $this->db->select('*')
                ->from('metric_evsc')
                ->join('evaluation_scale', 'metric_evsc.evsc_id=evaluation_scale.evsc_id', 'left outer')
                ->where('metric_evsc.metric_evsc_id', $metric_evsc_id)
                ;
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('metric_evsc');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewMetricAssignmentsEdit($metric_evsc_id) {
        $query = $this->db->query("SELECT * FROM metric_evsc "
                . " LEFT JOIN metric on metric_evsc.metric_id=metric.metric_id"
                . " LEFT JOIN complexity_factor on metric.cf_id=complexity_factor.cf_id"
                . " WHERE metric_evsc.metric_evsc_id = '" . $metric_evsc_id . "'"
                . " ORDER BY metric_evsc.metric_id DESC");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'metric_evsc_id' => $row->metric_evsc_id,
                'metric_id' => $row->metric_id,
                'metric_name' => $row->metric_name,
                'metric_description' => $row->metric_description,
                'metric_reference' => $row->metric_reference,
                'metric_restriction' => $row->metric_restriction,
                'metric_weight' => $row->metric_weight,
                'cf_id' => $row->cf_id
            ));
        }
        return $results;
    }

    function searchViewMetricAssignmentsEdit($metric_evsc_id) {
        //results

        $query = $this->db->select('*')
                ->from('metric_evsc')
                ->join('metric', 'metric_evsc.metric_id=metric.metric_id', 'left outer')
                ->join('complexity_factor', 'metric.cf_id=complexity_factor.cf_id', 'left outer')
                ->where('metric_evsc.metric_evsc_id', $metric_evsc_id)
                ->order_by('metric_evsc.metric_id', 'desc');
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('metric_evsc');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //Update 
    public function EditAssignmentMetrics($metric_evsc_id, $data) {

        $this->db->where('metric_evsc_id', $metric_evsc_id);
        $this->db->update('metric_evsc', $data);
    }

    //Delete
    function MetricsAssignmentsDelete($metric_evsc_id) {
        $this->db->where('metric_evsc_id', $metric_evsc_id);
        $this->db->delete('metric_evsc');
    }
}
