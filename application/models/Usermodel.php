<?php

Class Usermodel extends CI_Model {
    #Authenticates the administrator account

    public function Login($username, $password) {
        $result = $this->db->query("SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'");
        return $result->num_rows() == 1;
    }

    public function GetId($username) {
        $query = $this->db->query("SELECT users_id FROM users WHERE username='" . $username . "'");
        return $query->row()->id;
    }

    public function getRole($username) {
        $query = $this->db->query("SELECT user_group_id  FROM users WHERE username='" . $username . "' ");
        return $query->row()->user_group_id;
    }

    public function getViewUsers() {
        $query = $this->db->query("SELECT * FROM users "
                . " LEFT JOIN user_groups ON users.user_group_id=user_groups.user_group_id "
                );
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'users_id' => $row->users_id,
                'first_name' => $row->first_name,
                'last_name' => $row->last_name,
                'username' => $row->username,
                'email' => $row->email,
                'user_group_id' => $row->user_group_id,
                'user_group_name'=>$row->user_group_name,
                'choosenWord'=>$row->choosenWord
            ));
        }
        return $results;
    }

    function searchViewUsers($sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('users_id', 'first_name', 'last_name', 'username', 'email', 'user_group_name','choosenWord');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'users_id';

        $query = $this->db->select('*')
                ->from('users')
                ->join('user_groups', 'users.user_group_id=user_groups.user_group_id', 'left outer')
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('users');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }
    
    public function getViewGroup() {
        $query = $this->db->query("SELECT * FROM user_groups ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'user_group_id' => $row->user_group_id,
                'user_group_name' => $row->user_group_name,
                'user_group_description' => $row->user_group_description
            ));
        }
        return $results;
    }

    function searchViewGroup( ) {
        //results

        $query = $this->db->select('*')
                ->from('user_groups')
                ;

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('user_groups');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }

    //add
    function add_User($data) {

        $this->db->insert('users', $data);
        return;
    }

    //Delete
    function UsersDelete($users_id) {
        $this->db->where('users_id', $users_id);
        $this->db->delete('users');
    }
    
    public function getViewUsersDetails($users_id) {
        $query = $this->db->query("SELECT * FROM users "
                . " LEFT JOIN user_groups ON users.user_group_id=user_groups.user_group_id" . ""
                . " WHERE users_id='" . $users_id . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'users_id' => $row->users_id,
                'first_name' => $row->first_name,
                'last_name' => $row->last_name,
                'username' => $row->username,
                'password' => $row->password,
                'email' => $row->email,
                'sendEmail' => $row->sendEmail,
                'registerDate' => $row->registerDate,
                'lastvisitDate' => $row->lastvisitDate,
                'activation' => $row->activation,
                'lastResetTime' => $row->lastResetTime,
                'resetCount' => $row->resetCount,
                'user_group_id' => $row->user_group_id,
                'user_group_name'=>$row->user_group_name,
                'choosenWord'=>$row->choosenWord
                
            ));
        }
        return $results;
    }

    function searchViewUsersDetails($users_id,$sort_by, $sort_order, $limit, $offset) {
        //results
        $sort_order == ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_colums = array('users_id', 'first_name', 'last_name', 'username', 'email','user_group_id', 'user_group_name','choosenWord');
        $sort_by = (in_array($sort_by, $sort_colums)) ? $sort_by : 'users_id';

        $query = $this->db->select('*')
                ->from('users')
                ->join('user_groups', 'users.user_group_id=user_groups.user_group_id', 'left outer')
                ->where('users_id', $users_id)
                ->limit($limit, $offset)
                ->order_by($sort_by, $sort_order);

        $ret['rows'] = $query->get()->result();
        //count query



        $query = $this->db->count_all('users');

        $tmp = $query;
        $ret['num_rows'] = $tmp;
        return $ret;
    }
    
    public function getEditUsers($users_id) {
        $query = $this->db->query("SELECT * FROM users "
                . " LEFT JOIN user_groups ON users.user_group_id=user_groups.user_group_id" . ""
                . " WHERE users_id='" . $users_id . "' ");
        $results = array();
        foreach ($query->result() as $row) {
            array_push($results, array(
                'users_id' => $row->users_id,
                'first_name' => $row->first_name,
                'last_name' => $row->last_name,
                'username' => $row->username,
                'password' => $row->password,
                'email' => $row->email,
                'sendEmail' => $row->sendEmail,
                'registerDate' => $row->registerDate,
                'lastvisitDate' => $row->lastvisitDate,
                'activation' => $row->activation,
                'lastResetTime' => $row->lastResetTime,
                'resetCount' => $row->resetCount,
                'user_group_id' => $row->user_group_id,
                'user_group_name'=>$row->user_group_name,
                'choosenWord'=>$row->choosenWord

                    
            ));
        }
        return $results;
    }
    //Update 
    public function EditUsers($users_id, $data) {

        $this->db->where('users_id', $users_id);
        $this->db->update('users', $data);
    }
    
    public function searchPersonal($username, $email, $choosenWord) {
        $result = $this->db->query("SELECT * FROM users WHERE username='" . $username . "' AND email='" . $email . "'  AND choosenWord='" . $choosenWord . "'");
        return $result->num_rows() == 1;
    }
    
    public function recovering($username, $email,$choosenWord,$new_password) {
        $this->db->query("UPDATE users SET password='" . $new_password . "' WHERE username='" . $username . "' AND email='" . $email . "' AND choosenWord='" . $choosenWord . "'");
        return $new_password;
    }
}
