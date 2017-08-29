<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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

    }

    public function index()
    {

        if ($this->form_validation->run('contact') == FALSE)
        {           
            if ($this->input->post('ajax'))
            {   
                die(json_encode(array('success' => 0, 'message' => '', 'errors' => validation_errors())));
            }
            
            // Page info 
            $data_view['page_title'] = $this->lang->line('title');
            $data_view['page_class'] = "contact";

            // Meta info
            $data_view['meta_title'] = $data_view['page_title'];
            $data_view['meta_description'] = "Description";
            $data_view['meta_keywords'] = "hr, myprohr, hr agency, resumee, doctors, assistents";

            $data['main'] = $this->load->view('contact/index', $data_view, TRUE);
            $this->load->view('page', $data);
        }
        else
        {
            $data = array(
                'name'      => $this->input->post('name'),
                'subject'   => $this->input->post('subject'),
                'email'     => $this->input->post('email'),
                'message'   => $this->input->post('message')
            );

            // Send mail to Admin
            $this->send($data);

            die(json_encode(array('success' => 1, 'message' => $this->lang->line('message_sent'), 'data' => $data, 'redirect' => base_url())));

        }
    }

    private function send($data = array())
    {
        $from    = 'coras.vlad@yahoo.com'; //'contact@myprohr.info';
        $subject = 'Mesaj de pe myprohr.info';
        
        if ($this->Utils->send_email_smtp($from, $data['email'], $from, NULL, $this->language['package'], $subject, $data))
        {
            return TRUE;            
        }
    }
        
}