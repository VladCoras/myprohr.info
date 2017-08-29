<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

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

	public function view($url_key = NULL)
    {

        $content = "";
        $data_view['content'] = $content;

        if (isset($url_key) && $url_key !== NULL)
        {

            if ($this->form_validation->run('apply') == FALSE)
            {           
                if ($this->input->post('ajax'))
                {   
                    die(json_encode(array('success' => 0, 'message' => '', 'errors' => validation_errors())));
                }

                if($company = $this->Getter->get('company', FALSE, TRUE, array('url_key' => $url_key, 'active' => 1, 'deleted' => 0, 'id_language' => $this->language['id_language'])))
                {
                    $data_view['company'] = $company;
                   
                    // Add view.
                    $this->Setter->set("company", FALSE, array('id_company' => $company['id_company']), NULL, array('views' => ($company['views'] + 1)));
                }
                else
                {
                    show_404();
                }

                // Page info 
                $data_view['page_title'] = $company['name'];
                $data_view['page_class'] = "company-view";

                // Meta info
                $data_view['meta_title'] = $data_view['page_title'];
                $data_view['meta_description'] = "Description";
                $data_view['meta_keywords'] = "bookdesk, book, desk, personal space, rent";
                
                $data['main'] = $this->load->view('company/view', $data_view, TRUE);
            }
            else
            {
                $data = array(
                    'name'      => $this->input->post('name'),
                    'email'     => $this->input->post('email'),
                    'message'   => $this->input->post('message')
                );

                // Send mail to Admin
                // $this->send($data);

                if($this->multiple_upload()) {
                    die(json_encode(array('success' => 1, 'message' => $this->lang->line('message_sent'), 'data' => $data, 'redirect' => base_url())));
                }
                else
                {
                    $data = $this->upload->get_multi_upload_data();
                    die(json_encode(array('success' => 1, 'message' => $this->lang->line('message_sent'), 'data' => $data, 'redirect' => base_url())));
                }
            }
        }
        else
        {

            if($companies = $this->Getter->get('company', TRUE, TRUE, array('active' => 1, 'deleted' => 0, 'id_language' => $this->language['id_language'])))
            {
                $data_view['companies'] = $companies;
            }
            else
            {
                $data_view['companies'] = NULL;
            }

            // Page info 
            $data_view['page_title'] = $this->lang->line('title');
            $data_view['page_class'] = "companies-list";

            // Meta info
            $data_view['meta_title'] = $data_view['page_title'];
            $data_view['meta_description'] = "Description";
            $data_view['meta_keywords'] = "bookdesk, book, desk, personal space, rent";

            $data['main'] = $this->load->view('company/index', $data_view, TRUE);
        }
        
        $this->load->view('page', $data);
    }

    private function safe_string($string)
    {
        return str_replace(" ", "-", strtolower($string));
    }

    public function multiple_upload()
    {
        $this->load->library('upload');

        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";
        $number_of_files_uploaded = count($_FILES['upl_files']['name']);
        
        // Faking upload calls to $_FILE
        for ($i = 0; $i < $number_of_files_uploaded; $i++)
        {

            $_FILES['userfile']['name']     = $_FILES['upl_files']['name'][$i];
            $_FILES['userfile']['type']     = $_FILES['upl_files']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['upl_files']['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES['upl_files']['error'][$i];
            $_FILES['userfile']['size']     = $_FILES['upl_files']['size'][$i];

            $config = array(
              'file_name'     => "",
              'allowed_types' => 'jpg|jpeg|png|gif|',
              'max_size'      => 3000,
              'overwrite'     => FALSE,
              
              /* real path to upload folder ALWAYS */
              'upload_path'
                  => $_SERVER['DOCUMENT_ROOT'] . '/media/candidates/' . $this->input->post('name')
            );

            $this->upload->initialize($config);

            if (!$this->upload->do_upload()) 
            {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            }
            else 
            {
                $data[] = $this->upload->data();
                return $data;
            }
        }
    }
}
