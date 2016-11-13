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
}
