<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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

	public function register()
	{

		$content = "";
		$data_view['content'] = $content;

        // If form submitted
        if ($this->input->post("submit")) 
        {
            // If something is missing
            if (empty($this->input->post('email')) || empty($this->input->post('password'))) die('Email and password required');
            
            // If account exists
            $email = $this->input->post('email');
            if ($client = $this->Getter->get('client', FALSE, FALSE, array('email' => $email)))
            {
                die("This e-mail is already in use.");
            }

            $password = md5($this->input->post('password'));

            $_data = array(
                'email' => $email,
                'password' => $password,
            );

            // Add client to database
            $id_client = $this->Setter->set('client', FALSE, array('add' => TRUE), NULL, $_data);

            // Create a cart for client
            $_cart = array(
                'id_client' => $id_client,
                'total' => 0
            );
            $id_cart = $this->Setter->set('cart', FALSE, array('add' => TRUE), NULL, $_cart);

            $user_data = array(
                        'id_client' => $id_client,
                        'email'     => $email,
                    );
            $this->session->set_userdata($user_data);
            $this->redirect(base_url());
        }


        // Page info 
        $data_view['page_title'] = $this->lang->line('title');
        $data_view['page_class'] = "register register-register";

        // Meta info
        $data_view['meta_title'] = $data_view['page_title'];
        $data_view['meta_description'] = "Description";
        $data_view['meta_keywords'] = "bookdesk, book, desk, personal space, rent";

        $data['main'] = $this->load->view('register/index', $data_view, TRUE);
        $this->load->view('page', $data);
	}


    public function logout()
    {
        $user_data = array('id_client', 'email');
        $this->session->unset_userdata($user_data);
        $this->redirect(base_url());
    }

    private function redirect($url)
    {
        header('Location: ' . $url);
        die();
    }
}
