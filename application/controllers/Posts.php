<?php

class Posts extends CI_Controller{
    public function index(){
        $data['title'] = 'Posts';
        $data['posts'] = $this->Post->get_posts();

        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($slug = NULL){
        $data['post'] = $this->Post->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comments'] = $this->Comment->get_comments($post_id);

        if (empty($data['post'])){
            show_404();
        }
        $data['title'] = $data['post']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add(){
        
        // Check login
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $data['title'] = 'Add post';
        $data['categories'] = $this->Post->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('posts/add', $data);
            $this->load->view('templates/footer', $data);
        }
        else{
            $config['upload_path'] = './assets/img/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '500';
            $config['max_height'] = '500';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.png';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }
            $this->Post->add($post_image);
            
            $this->session->set_flashdata('post_created', 'Successfuly added a post');

            redirect('posts');
        }
    }

    public function edit($slug){

        // Check login
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $data['post'] = $this->Post->get_posts($slug);

        // Check user

        if ($this->session->userdata('user_id') != $this->Post->get_posts($slug)['user_id']){
            redirect('posts');
        }

        $data['title'] = 'Edit post';
        $data['categories'] = $this->Post->get_categories();

        $this->load->view('templates/header', $data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update(){

        // Check login
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->Post->update();

        $this->session->set_flashdata('post_updated', 'Successfuly updated a post');

        redirect('posts');
    }
    
    public function delete($id){

        // Check login
        if (!$this->session->userdata('logged_in')){
            redirect('users/login');
        }

        $this->Post->delete($id);

        $this->session->set_flashdata('post_deleted', 'Successfuly deleted a post');

        redirect('posts');
    }
}