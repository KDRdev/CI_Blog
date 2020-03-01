<?php

class Users extends CI_Controller{
    public function register(){
        $data['title'] = 'Sign up';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'User name', 'required|callback_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'matches[password]');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/signup', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->User->signup($enc_password);

            // Set message

            $this->session->set_flashdata('user_registered', 'Successfuly created an account');

            redirect('posts');
        }
    }

    public function login(){
        $data['title'] = 'Login';
        $this->form_validation->set_rules('username', 'User name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // Get username
            $username = $this->input->post('username');

            // Get and encrypt password
            $password =md5($this->input->post('password'));

            // Login user
            $user_id = $this->User->login($username, $password);

            if ($user_id){
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_logged_in', 'Successfuly logged in');
                redirect('posts');
            } else {
                $this->session->set_flashdata('user_login_failed', 'Login failed');
                redirect('users/login');
            }
        }
    }

    public function logout(){
        // Unset userdata
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('user_logged_out', 'Successfuly logged out');
        redirect('users/login');
    }
    
    // Check if user exists
    public function username_exists($username){
        $this->form_validation->set_message('username_exists', 'This username is already taken. Please enter a different one');
        if ($this->User->username_exists($username)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // Check if email exists
    public function email_exists($email){
        $this->form_validation->set_message('email_exists', 'This email is already taken. Please enter a different one');
        if ($this->User->email_exists($email)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}