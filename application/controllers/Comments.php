<?php

class Comments extends CI_Controller{
    public function add($post_id){
        $slug = $this->input->post('slug');
        $data['post'] = $this->Post->get_posts($slug);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Comment->add_comment($post_id);
            redirect('/posts/'.$slug);
        }
    }
}