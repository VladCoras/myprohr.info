<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

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
    
	public function view($url_key = NULL, $pagination = NULL)
	{

		$content = "";
		$data_view['content'] = $content;

        if (isset($url_key) && $url_key !== NULL && $url_key != "page")
        {
            if($candidate = $this->Getter->get('candidate', FALSE, FALSE, array('url_key' => $url_key, 'active' => 1, 'deleted' => 0)))
            {
                $data_view['candidate'] = $candidate;
            }
            else
            {
                show_404();
            }

            if ($administrator = $this->Getter->get('administrator', FALSE, FALSE, array('id_administrator' => $candidate['id_administrator'])))
            {
                $data_view['added_by'] = $administrator['name'];
            }

            if ($category = $this->Getter->get('category', FALSE, TRUE, array('id_category' => $candidate['id_category'], 'id_language' => $this->language['id_language'])))
            {
                $data_view['category'] = $category;
            }

            // Page info 
            $data_view['page_title'] = $candidate['id_candidate'] . ". " . $candidate['function'];
            $data_view['page_class'] = "candidate-view";

            // Meta info
            $data_view['meta_title'] = $data_view['page_title'];
            $data_view['meta_description'] = "Description";
            $data_view['meta_keywords'] = "bookdesk, book, desk, personal space, rent";

            $data['main'] = $this->load->view('candidate/view', $data_view, TRUE);
        }
        else
        {
            if ($url_key == "page")
            {
                if($candidates = $this->Getter->get(
                    'candidate', 
                    TRUE, 
                    FALSE, 
                    array(
                        'active' => 1, 
                        'deleted' => 0,
                        'various' => array(
                            'order_by' => 'id_candidate',
                            'order_type' => 'desc',
                            'limit' => 20,
                            'offset' => 20 * (isset($pagination) ? $pagination : NULL) 
                        ),
                    )))
                {
                    $data_view['candidates_count'] = $this->Getter->getEntriesCount('candidate');
                    $data_view['candidates_current_page'] = isset($pagination) ? $pagination : 1;
                    $data_view['candidates'] = $candidates;
                }
                else
                {
                    $data_view['candidates'] = NULL;
                }
            } 
            else
            {
                if($candidates = $this->Getter->get(
                    'candidate', 
                    TRUE, 
                    FALSE, 
                    array(
                        'active' => 1, 
                        'deleted' => 0,
                        'various' => array(
                            'order_by' => 'id_candidate',
                            'order_type' => 'desc'
                        ),
                    )))
                {
                    $data_view['candidates_count'] = $this->Getter->getEntriesCount('candidate');
                    $data_view['candidates_current_page'] = isset($pagination) ? $pagination : 1;
                    $data_view['candidates'] = array_slice($candidates, 0, 20, TRUE);
                }
                else
                {
                    $data_view['candidates'] = NULL;
                }
            }
        
            if($categories = $this->Getter->get('category', TRUE, TRUE, array('active' => 1, 'deleted' => 0, 'id_language' => $this->language['id_language'])))
            {
                $data_view['categories'] = $categories;
            }
            else
            {
                $data_view['categories'] = NULL;
            }

            // Page info 
            $data_view['page_title'] = $this->lang->line('title');
            $data_view['page_class'] = "candidates-list";

            // Meta info
            $data_view['meta_title'] = $data_view['page_title'];
            $data_view['meta_description'] = "Description";
            $data_view['meta_keywords'] = "bookdesk, book, desk, personal space, rent";

            $data['main'] = $this->load->view('candidate/index', $data_view, TRUE);
        }
        
        $this->load->view('page', $data);
	}

    public function generateurlkeys()
    {

        $candidates = $this->Getter->get(
                    'candidate', 
                    TRUE, 
                    FALSE, 
                    array());

        foreach ($candidates as $candidate)
        {

            $url_key = substr(strtolower(urlencode(str_replace(" ", "", $candidate['function']))), 0, 96). md5(uniqid("", true));
            $this->Setter->set('candidate', FALSE, array('id_candidate' => $candidate['id_candidate']), NULL, array('url_key' => $url_key));
        }
    }
}
