<?php

Class EvaluationScaleModel extends CI_Model {

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

    function searchViewEvaluationScale($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('evsc_id', 'evsc_name',
            'evsc_description', 'evsc_type',
            'evsc_number_of_choices');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'evsc_id';

        $query = $this->db->select('*')
                ->from('evaluation_scale')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('evaluation_scale');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //add
    function add_EvaluationScale($data) {

        $this->db->insert('evaluation_scale', $data);
        return;
    }

    //Delete
    function EvaluationScaleDelete($evsc_id) {
        $this->db->where('evsc_id', $evsc_id);
        $this->db->delete('evaluation_scale');
    }

    public function getEditEvaluationScale($evsc_id) {
        $query = $this->db->query("SELECT * FROM evaluation_scale WHERE evsc_id='" . $evsc_id . "' ");
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

    //Update 
    public function EditEvaluationScale($evsc_id, $data) {

        $this->db->where('evsc_id', $cf_id);
        $this->db->update('evaluation_scale', $data);
    }

    
    public function getViewEvaluationScaleDetails($evsc_id) {
        $query = $this->db->query("SELECT * FROM evaluation_scale WHERE evsc_id='".$evsc_id."' ");
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

    function searchViewEvaluationScaleDetails($evsc_id,$sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('evsc_id', 'evsc_name',
            'evsc_description', 'evsc_type',
            'evsc_number_of_choices');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'evsc_id';

        $query = $this->db->select('*')
                ->from('evaluation_scale')
                ->limit($limit, $offset)
                ->where('evsc_id',$evsc_id)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('evaluation_scale');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

}
