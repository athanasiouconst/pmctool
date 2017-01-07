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
        $query = $this->db->query("SELECT user_group_id  FROM `users` WHERE username='" . $username . "'");
        return $query->row()->user_group_id;
    }

}
