<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
    
    public function view($url_key)
    {

        if (empty($url_key)) show_404();

        if ($category = $this->Getter->get('category', FALSE, TRUE, array('url_key' => $url_key, 'active' => 1, 'deleted' => 0, 'id_language' => $this->language['id_language'])))
        {
            $data_view['category'] = $category;
        } 
        else
        {
            show_404();
        }

        if ($candidates = $this->Getter->get('candidate', TRUE, FALSE, array('id_category' => $data_view['category']['id_category'], 'active' => 1, 'deleted' => 0)))
        {
            $data_view['candidates'] = $candidates;
        }
        else
        {
            $data_view['candidates'] = NULL;
        }

        // Page info 
        $data_view['page_title'] = $this->lang->line('title');
        $data_view['page_class'] = "category-view";

        // Meta info
        $data_view['meta_title'] = $data_view['page_title'];
        $data_view['meta_description'] = "Description";
        $data_view['meta_keywords'] = "";

        $data['main'] = $this->load->view('category/view', $data_view, TRUE);
        $this->load->view('page', $data);
    }
}
