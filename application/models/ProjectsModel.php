<?php

Class ProjectsModel extends CI_Model {

    public function getViewProjects() {
        $query = $this->db->query("SELECT * FROM project ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'proj_id' => $row->proj_id,
                'proj_title' => $row->proj_title,
                'proj_kind' => $row->proj_kind,
                'proj_description' => $row->proj_description
            ));
        }
        return $results;
    }

    function searchViewProjects($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('proj_id', 'proj_title', 'proj_kind', 'proj_description');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'proj_id';

        $query = $this->db->select('*')
                ->from('project')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('project');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //add
    function add_Projects($data) {

        $this->db->insert('project', $data);
        return;
    }

    //Delete
    function ProjectsDelete($proj_id) {
        $this->db->where('proj_id', $proj_id);
        $this->db->delete('project');
    }

    public function getEditProjects($proj_id) {
        $query = $this->db->query("SELECT * FROM project WHERE proj_id='" . $proj_id . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'proj_id' => $row->proj_id,
                'proj_title' => $row->proj_title,
                'proj_kind' => $row->proj_kind,
                'proj_description' => $row->proj_description
            ));
        }
        return $results;
    }

    //Update 
    public function EditProjects($proj_id, $data) {

        $this->db->where('proj_id', $proj_id);
        $this->db->update('project', $data);
    }
    
    
    public function getViewProjectsDetails($proj_id) {
        $query = $this->db->query("SELECT * FROM project WHERE proj_id='".$proj_id."' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'proj_id' => $row->proj_id,
                'proj_title' => $row->proj_title,
                'proj_kind' => $row->proj_kind,
                'proj_description' => $row->proj_description
            ));
        }
        return $results;
    }

    function searchViewProjectsDetails($proj_id,$sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('proj_id', 'proj_title', 'proj_kind', 'proj_description');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'proj_id';

        $query = $this->db->select('*')
                ->from('project')
                ->limit($limit, $offset)
                ->where('proj_id',$proj_id)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('project');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

}
