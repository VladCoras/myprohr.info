<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

         /* --------------- Load content --------------- */

        // Load active slides
        if ($slides = $this->Getter->get('slide', TRUE, TRUE, array('id_language' => $this->language['id_language'], 'active' => 1, 'various' => array('order_by' => 'position'))))
        {
            $data_view['slides'] = $slides;
        }
        else
        {
            $data_view['slides'] = NULL;
        }

        if($categories = $this->Getter->get('category', TRUE, TRUE, array('active' => 1, 'deleted' => 0, 'id_language' => $this->language['id_language'])))
        {
            $data_view['categories'] = $categories;
        }
        else
        {
            $data_view['categories'] = NULL;
        }

        if($companies = $this->Getter->get('company', TRUE, TRUE, array('active' => 1, 'deleted' => 0, 'id_language' => $this->language['id_language'])))
        {
            $data_view['companies'] = $companies;
        }
        else
        {
            $data_view['companies'] = NULL;
        }

        /* ------------- END Load content ------------- */

        // Page info 
        $data_view['page_title'] = $this->lang->line('title');
        $data_view['page_class'] = "home";

        // Meta info
        $data_view['meta_title'] = $data_view['page_title'];
        $data_view['meta_description'] = "Description";
        $data_view['meta_keywords'] = "bookdesk, book, desk, personal space, rent";

        $data['main'] = $this->load->view('home/index', $data_view, TRUE);
        $this->load->view('page', $data);
	}
}
