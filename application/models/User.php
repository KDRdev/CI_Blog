<?php

class User extends CI_Model{
    public function signup($enc_password){
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'zipcode' => $this->input->post('zipcode'),
            'email' => $this->input->post('email'),
            'password' => $enc_password
        );

        return $this->db->insert('users', $data);
    }

    public function login($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');
        if ($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return FALSE;
        }
    }

    public function username_exists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array())){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function email_exists($email){
        $query = $this->db->get_where('users', array('email' => $email));
        if(empty($query->row_array())){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}