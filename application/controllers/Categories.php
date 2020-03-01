<?php

class Categories extends CI_Controller{
    public function index(){
        $data['title'] = 'Post categories';
        $data['categories'] = $this->Category->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function add(){

        // Check login
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $data['title'] = 'Add a category';
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('categories/add', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Category->add_category();

            $this->session->set_flashdata('category_created', 'Successfuly added a category');

            redirect('categories');
        }
    }

    public function posts($id){
        $data['title'] = $this->Category->get_category($id)->name;
        $data['posts'] = $this->Post->get_posts_by_category($id);

        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer', $data);
    }
}