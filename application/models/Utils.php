<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils extends CI_Model {

    public function get_current_language($languages, $key = NULL)
    {
        $_lang = "";

		foreach ($languages as $language)
        {
        	if ($key)
        	{
        		$_lang = $language['key'] == $this->uri->segment(1) ? $language : "";
        	}
        	else
        	{
        		$_lang = $language['default'] == 1 ? $language : "";
        	}
            
            if ($_lang !== "") return $_lang;
        }
	}

	public function load_language($language)
	{
	    foreach (array('site', 'form_validation') as $file)
        {
            $this->config->set_item('language', $language['package']);
            $this->lang->load($file, $language['package']);
        }
	}

    public function send_email_smtp($from, $reply_to = NULL, $to, $cc = NULL, $language, $subject, $data)
    {
        $this->load->library('email');

        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($from, 'myprohr.info');
        $this->email->to($to);

        if ($reply_to)
            $this->email->reply_to($reply_to);

        if ($cc)
            $this->email->cc($cc);

        $message = "
            <html>
                <head></head>
                <body>
                    <h1>Mesaj de la {$data['name']}, ({$data['email']})</h1>
                    <p><b>Subiect:<b> {$data['subject']}</p><br>
                    <p><b>Mesaj</b>:</p>
                    {$data['message']}
                </body>
            </html>
        ";

        $this->email->subject($subject);
        $this->email->message($message);

        if (!$this->email->send())
        {
            return FALSE;
        }

        return TRUE;
    }
}
