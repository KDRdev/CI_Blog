<?php

class Post extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_posts($slug = FALSE){
        if ($slug == FALSE){
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }
        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_categories(){
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function get_posts_by_category($category_id){
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('category_id' => $category_id));
        return $query->result_array();
    }

    public function add($post_image){
        $slug = url_title($this->input->post('title'), $lowercase=TRUE);
        $data = array(
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'user_id' => $this->session->userdata('user_id'),
            'post_image' => $post_image
        );
        return $this->db->insert('posts', $data);
    }

    public function update(){
        $slug = url_title($this->input->post('title'));
        $data = array(
            'title' => $this->input->post('title'),
            'category_id' => $this->input->post('category_id'),
            'slug' => $slug,
            'body' => $this->input->post('body')
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return TRUE;
    }
}