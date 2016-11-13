<?php

Class ComplexityFactorsModel extends CI_Model {

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

    function searchViewComplexityFactors($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('cf_id', 'cf_name','cf_description','cf_reference','cf_restriction','cf_category','cf_weight');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'cf_id';

        $query = $this->db->select('*')
                ->from('complexity_factor')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('complexity_factor');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //add
    function add_ComplexityFactors($data) {

        $this->db->insert('complexity_factor', $data);
        return;
    }

    //Delete
    function ComplexityFactorsDelete($cf_id) {
        $this->db->where('cf_id', $cf_id);
        $this->db->delete('complexity_factor');
    }

    public function getEditComplexityFactors($cf_id) {
        $query = $this->db->query("SELECT * FROM complexity_factor WHERE cf_id='" . $cf_id . "' ");
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

    //Update 
    public function EditComplexityFactors($cf_id, $data) {

        $this->db->where('cf_id', $cf_id);
        $this->db->update('complexity_factor', $data);
    }

    
    public function getViewComplexityFactorsDetails($cf_id) {
        $query = $this->db->query("SELECT * FROM complexity_factor WHERE cf_id='".$cf_id."' ");
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

    function searchViewComplexityFactorsDetails($cf_id,$sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('cf_id', 'cf_name','cf_description','cf_reference','cf_restriction','cf_category','cf_weight');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'cf_id';

        $query = $this->db->select('*')
                ->from('complexity_factor')
                ->limit($limit, $offset)
                ->where('cf_id',$cf_id)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('complexity_factor');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

}
