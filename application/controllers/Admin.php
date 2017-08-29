<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $languages;
    public $language;

    public function __construct()
    {
        parent::__construct();

        // Get langauges and define current language
        $this->languages     = $this->Getter->get('language', TRUE, FALSE, array('active' => 1));
        $this->language      = $this->Utils->get_current_language($this->languages, $this->uri->segment(1));
        
        // Load it into framework
        $this->Utils->load_language($this->language);

        $this->checkLogin();

    }

    public function index() 
    {
        $this->redirect(base_url($this->language['key'] . '/admin/candidates'));
    }

    public function login()
    {   

        $data_view = "";

        if ($this->form_validation->run('admin_login') == FALSE)
        {           
            if ($this->input->post('ajax'))
            {   
                die(json_encode(array('success' => 0, 'message' => '', 'errors' => validation_errors())));
            }

            $this->load->view('admin/login/index');
        }
        else
        {
            $data = array(
                'email'      => $this->input->post('email'),
                'password'   => md5($this->input->post('password')),
            );

            if (!isset($data['email']) && empty($data['email']))
            {
                die(json_encode(array('success' => 0, 'message' => "No email provided", 'data' => $data)));
            } 

            if ($admin = $this->Getter->get('administrator', FALSE, FALSE, array('email' => $data['email'], 'password' => $data['password'])))
            {
                $admin_session = array(
                    'id_administrator' => $admin['id_administrator'],
                    'admin_email' => $admin['email'],
                    'admin_name' => $admin['name'],
                    'log_time' => date('Y-m-d H:i:s')
                );

                $this->session->set_userdata($admin_session);
                die(json_encode(array('success' => 1, 'message' => "Login successful", 'data' => $data, 'redirect' => base_url($this->language['key'] . '/admin/index') )));
            }
            else
            {
                die(json_encode(array('success' => 0, 'message' => "Date de acces incorecte", 'data' => $data)));
            }
        }
    }

    public function logout()
    {
        $admin_session = array('id_administrator', 'email', 'log_time');

        $this->session->unset_userdata($admin_session);
        $this->redirect(base_url($this->language['key'] . '/admin'));
    }

    public function candidates($action = NULL, $id_candidate = NULL) 
    {

        $data_view = "";

        // Edit
        if ($action == "edit" && isset($id_candidate) && $id_candidate > 0)
        {
            // Get candidates
            if ($candidate = $this->Getter->get('candidate', FALSE, FALSE, array('id_candidate' => $id_candidate)))
            {
                $data_view['candidate'] = $candidate;
            }

            // Get categories
            if ($categories = $this->Getter->get('category', TRUE, TRUE, array('active' => 1, 'deleted' => 0, 'id_language' => $this->language['id_language'])))
            {
                $data_view['categories'] = $categories;
            } 

            // Send admin name
            $data_view['admin_name'] = $this->session->admin_name;

            $data['main'] = $this->load->view('admin/candidate/form', $data_view, TRUE);
        }
        // List
        elseif (($action == "" && empty($action)) || $action == "list")
        { 

            if($candidates = $this->Getter->get('candidate', TRUE, FALSE, array('deleted' => 0)))
            {
                $data_view['candidates'] = $candidates;
            }
            else
            {
                $data_view['candidates'] = NULL;
            }

            $data['main'] = $this->load->view('admin/candidate/list', $data_view, TRUE);
        }
        elseif ($action == "delete")
        {
            $this->Setter->set('candidate', FALSE, array('update' => TRUE, 'id_candidate' => $id_candidate), NULL, array('deleted' => 1));
            $this->redirect(base_url($this->language['key'] . '/admin/candidates'));
        }
        else
        {
            echo "Sorry, not found. You die().";
            die();
        }


        $this->load->view('admin/page', $data);
    }
    public function companies($id_company = NULL) {}
    public function settings() {}
    public function tools() {}

    private function checkLogin()
    {
        if ($this->uri->segment(2) !== "admin") 
        {
            header("Location: " . base_url('ro/admin'));
            die();
        }
        if ($this->uri->segment(3) == "login" || $this->uri->segment(3) == "") { return FALSE; }

        if (isset($this->session->id_administrator))
        {
            return TRUE;
        } 
        else
        {
            echo "redirect";
            $this->redirect(base_url($this->language['key'] . '/admin/login'));
            return FALSE;
        }
    }

    private function redirect($location)
    {

        header("Location: " . $location);
        die();
    }
}