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

    function searchViewProjectsDetails($proj_id, $sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('proj_id', 'proj_title', 'proj_kind', 'proj_description');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'proj_id';

        $query = $this->db->select('*')
                ->from('project')
                ->limit($limit, $offset)
                ->where('proj_id', $proj_id)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('project');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewProject() {
        $query = $this->db->query("SELECT * FROM project order by proj_id desc");
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

    function searchViewProject() {
        //results

        $query = $this->db->select('*')
                ->from('project')
                ->order_by('proj_id', 'desc')
        ;
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('project');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewModel() {
        $query = $this->db->query("SELECT * FROM model order by mod_id desc");
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
                ->order_by('mod_id', 'desc')
        ;
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('model');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //add
    function add_ModelsToproject($data) {

        $this->db->insert('mod_proj', $data);
        return;
    }

    public function getViewProjectAssignments($proj_id) {
        $query = $this->db->query("SELECT * FROM mod_proj "
                . " LEFT JOIN model ON mod_proj.mod_id=model.mod_id"
                . " LEFT JOIN project ON mod_proj.proj_id=project.proj_id"
                . " WHERE project.proj_id='" . $proj_id . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'project.proj_id' => $row->proj_id,
                'proj_title' => $row->proj_title,
                'proj_kind' => $row->proj_kind,
                'proj_description' => $row->proj_description,
                'mod_name' => $row->mod_name,
                'mod_description' => $row->mod_description
            ));
        }
        return $results;
    }

    function searchViewProjectAssignments($proj_id, $sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('mod_proj.proj_id', 'proj_title', 'proj_kind');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'mod_proj.proj_id';

        $query = $this->db->select('*')
                ->from('mod_proj')
                ->join('model', 'mod_proj.mod_id=model.mod_id', 'left outer')
                ->join('project', 'mod_proj.proj_id=project.proj_id', 'left outer')
                ->limit($limit, $offset)
                ->where('mod_proj.proj_id', $proj_id)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('mod_proj');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewProjectAssignmentsDetails($mod_proj_id) {
        $query = $this->db->query("SELECT * FROM mod_proj "
                . " LEFT JOIN project on mod_proj.proj_id=project.proj_id"
                . " LEFT JOIN model ON mod_proj.mod_id = model.mod_id"
                . " LEFT JOIN model_complex_factor on model.mod_id=model_complex_factor.mod_id"
                . " LEFT JOIN complexity_factor on model_complex_factor.cf_id=complexity_factor.cf_id"
                . " LEFT join metric on complexity_factor.cf_id=metric.cf_id"
                . " LEFT JOIN metric_evsc on metric.metric_id=metric_evsc.metric_id"
                . " LEFT JOIN evaluation_scale on metric_evsc.evsc_id=evaluation_scale.evsc_id"
                . " WHERE mod_proj.mod_proj_id='" . $mod_proj_id . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'proj_id' => $row->proj_id,
                'proj_title' => $row->proj_title,
                'proj_kind' => $row->proj_kind,
                'proj_description' => $row->proj_description,
                'mod_id' => $row->mod_id,
                'mod_name' => $row->mod_name,
                'mod_description' => $row->mod_description,
                'cf_id' => $row->cf_id,
                'cf_name' => $row->cf_name,
                'cf_description' => $row->cf_description,
                'cf_reference' => $row->cf_reference,
                'cf_restriction' => $row->cf_restriction,
                'cf_category' => $row->cf_category,
                'cf_weight' => $row->cf_weight,
                'metric_id' => $row->metric_id,
                'metric_name' => $row->metric_name,
                'metric_description' => $row->metric_description,
                'metric_reference' => $row->metric_reference,
                'metric_restriction' => $row->metric_restriction,
                'metric_weight' => $row->metric_weight,
                'cf_name' => $row->cf_name,
                'evsc_id' => $row->evsc_id,
                'evsc_name' => $row->evsc_name,
                'evsc_description' => $row->evsc_description,
                'evsc_type' => $row->evsc_type,
                'evsc_number_of_choices' => $row->evsc_number_of_choices,
                'ep1_value' => $row->ep1_value,
                'ep1_descr' => $row->ep1_descr,
                'ep1_weight' => $row->ep1_weight,
                'ep2_value' => $row->ep2_value,
                'ep2_descr' => $row->ep2_descr,
                'ep2_weight' => $row->ep2_weight,
                'ep3_value' => $row->ep3_value,
                'ep3_descr' => $row->ep3_descr,
                'ep3_weight' => $row->ep3_weight,
                'ep4_value' => $row->ep4_value,
                'ep4_descr' => $row->ep4_descr,
                'ep4_weight' => $row->ep4_weight,
                'ep5_value' => $row->ep5_value,
                'ep5_descr' => $row->ep5_descr,
                'ep5_weight' => $row->ep5_weight,
                'ep6_value' => $row->ep6_value,
                'ep6_descr' => $row->ep6_descr,
                'ep6_weight' => $row->ep6_weight,
                'ep7_value' => $row->ep7_value,
                'ep7_descr' => $row->ep7_descr,
                'ep7_weight' => $row->ep7_weight,
                'ep8_value' => $row->ep8_value,
                'ep8_descr' => $row->ep8_descr,
                'ep8_weight' => $row->ep8_weight,
                'ep9_value' => $row->ep9_value,
                'ep9_descr' => $row->ep9_descr,
                'ep9_weight' => $row->ep9_weight,
                'ep10_value' => $row->ep10_value,
                'ep10_descr' => $row->ep10_descr,
                'ep10_weight' => $row->ep10_weight
            ));
        }
        return $results;
    }

    function searchViewProjectAssignmentsDetails($mod_proj_id) {

        $query = $this->db->select('*')
                ->from('mod_proj')
                ->join('project', 'mod_proj.proj_id=project.proj_id', 'left outer')
                ->join('model', 'mod_proj.mod_id = model.mod_id', 'left outer')
                ->join('model_complex_factor', 'model.mod_id=model_complex_factor.mod_id', 'left outer')
                ->join('complexity_factor', 'model_complex_factor.cf_id=complexity_factor.cf_id', 'left outer')
                ->join('metric', 'complexity_factor.cf_id=metric.cf_id', 'left outer')
                ->join('metric_evsc', 'metric.metric_id=metric_evsc.metric_id', 'left outer')
                ->join('evaluation_scale', 'metric_evsc.evsc_id=evaluation_scale.evsc_id', 'left outer')
                ->where('mod_proj.mod_proj_id', $mod_proj_id)
        ;

        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('mod_proj');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //Delete
    function ProjectAssignmentsDelete($mod_proj_id) {
        $this->db->where('mod_proj_id', $mod_proj_id);
        $this->db->delete('mod_proj');
    }

    public function getViewProjectAssignEdit($mod_proj_id) {
        $query = $this->db->query("SELECT * FROM mod_proj "
                . " LEFT JOIN project ON mod_proj.proj_id=project.proj_id"
                . " WHERE mod_proj.mod_proj_id='" . $mod_proj_id . "' "
        );
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'mod_proj_id' => $row->mod_proj_id,
                'proj_id' => $row->proj_id,
                'proj_title' => $row->proj_title,
                'proj_kind' => $row->proj_kind,
                'proj_description' => $row->proj_description
            ));
        }
        return $results;
    }

    function searchViewProjectAssignEdit($mod_proj_id) {
        //results

        $query = $this->db->select('*')
                ->from('mod_proj')
                ->join('project', 'mod_proj.proj_id=project.proj_id', 'left outer')
                ->where('mod_proj.mod_proj_id', $mod_proj_id)
        ;
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('mod_proj');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewModelAssignEdit($mod_proj_id) {
        $query = $this->db->query("SELECT * FROM mod_proj "
                . " LEFT JOIN project ON mod_proj.proj_id=project.proj_id"
                . " LEFT JOIN model ON mod_proj.mod_id=model.mod_id"
                . " WHERE mod_proj.mod_proj_id='" . $mod_proj_id . "' "
        );
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

    function searchViewModelAssignEdit($mod_proj_id) {
        //results

        $query = $this->db->select('*')
                ->from('mod_proj')
                ->join('model', 'mod_proj.mod_id=model.mod_id', 'left outer')
                ->where('mod_proj.mod_proj_id', $mod_proj_id)
        ;
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('mod_proj');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    public function getViewModelAssignEdit1() {
        $query = $this->db->query("SELECT * FROM model "
                //. " LEFT JOIN project ON mod_proj.proj_id=project.proj_id"
                //. " LEFT JOIN model ON mod_proj.mod_id=model.mod_id"
                //. " WHERE mod_proj.mod_proj_id='" . $mod_proj_id . "' "
        );
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

    function searchViewModelAssignEdit1() {
        //results

        $query = $this->db->select('*')
                ->from('model')
        //->join('model', 'mod_proj.mod_id=model.mod_id', 'left outer')
        //->where('mod_proj.mod_proj_id', $mod_proj_id)
        ;
        $ret['rows'] = $query->get()->result();
        //count query
        $query = $this->db->count_all('model');
        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //Update 
    public function EditModeltoProjects($mod_proj_id, $data) {

        $this->db->where('mod_proj_id', $mod_proj_id);
        $this->db->update('mod_proj', $data);
    }

}
