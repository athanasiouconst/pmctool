<?php

Class ModelsModel extends CI_Model {

    public function getViewModels() {
        $query = $this->db->query("SELECT * FROM model ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'mod_id' => $row->mod_id,
                'mod_name' => $row->mod_name,
                'mod_description' => $row->mod_description
            ));
        }
        return $results;
    }

    function searchViewModels($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('mod_id', 'mod_name','mod_description');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'mod_id';

        $query = $this->db->select('*')
                ->from('model')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('model');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewModel() {
        $query = $this->db->query("SELECT * FROM model ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'mod_id' => $row->mod_id,
                'mod_name' => $row->mod_name,
                'mod_description' => $row->mod_description
            ));
        }
        return $results;
    }

    function searchViewModel() {
        //results
        
        $query = $this->db->select('*')
                ->from('model')
                ;
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('model');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewComplexityFactor() {
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

    function searchViewComplexityFactor() {
        
        $query = $this->db->select('*')
                ->from('complexity_factor')
                ;
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('complexity_factor');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //add
    function add_Models($data) {

        $this->db->insert('model', $data);
        return;
    }

    //Delete
    function ModelsDelete($mod_id) {
        $this->db->where('mod_id', $mod_id);
        $this->db->delete('model');
    }

    public function getEditModels($mod_id) {
        $query = $this->db->query("SELECT * FROM model WHERE mod_id='" . $mod_id . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'mod_id' => $row->mod_id,
                'mod_name' => $row->mod_name,
                'mod_description' => $row->mod_description
            ));
        }
        return $results;
    }

    //Update 
    public function EditModels($mod_id, $data) {

        $this->db->where('mod_id', $mod_id);
        $this->db->update('model', $data);
    }


    public function getViewModelsDetails($mod_id) {
        $query = $this->db->query("SELECT * FROM model WHERE mod_id='".$mod_id."' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'mod_id' => $row->mod_id,
                'mod_name' => $row->mod_name,
                'mod_description' => $row->mod_description
            ));
        }
        return $results;
    }

    function searchViewModelsDetails($mod_id,$sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('mod_id', 'mod_name','mod_description');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'mod_id';

        $query = $this->db->select('*')
                ->from('model')
                ->limit($limit, $offset)
                ->where('mod_id',$mod_id)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('model');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }
    
    //add
    function add_ComplexityToModels($data) {

        $this->db->insert('model_complex_factor', $data);
        return;
    }
    
    public function getViewModelsAssignments($mod_id) {
        $query = $this->db->query("SELECT * FROM model ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'mod_id' => $row->mod_id,
                'mod_name' => $row->mod_name,
                'mod_description' => $row->mod_description
            ));
        }
        return $results;
    }

    function searchViewModelsAssignments($mod_id,$sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('mod_id', 'mod_name','mod_description');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'mod_id';

        $query = $this->db->select('*')
                ->from('model')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('model');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

}
