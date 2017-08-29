<?php
    $config = array(
    	'contact' => array(
            array(
                'field' => 'name',
                'label' => 'lang:name',
                'rules' => 'required|trim|max_length[64]'
            ),
            array(
                'field' => 'subject',
                'label' => 'lang:subject',
                'rules' => 'trim|max_length[64]'
            ),
            array(
                'field' => 'email',
                'label' => 'lang:email',
                'rules' => 'required|valid_email|trim|max_length[64]'
            ),
            array(
                'field' => 'message',
                'label' => 'lang:message',
                'rules' => 'required|trim'
            ),
    	),

        'apply' => array(
            array(
                'field' => 'name',
                'label' => 'lang:name',
                'rules' => 'required|trim|max_length[64]'
            ),
            array(
                'field' => 'email',
                'label' => 'lang:email',
                'rules' => 'required|valid_email|trim|max_length[64]'
            ),
            array(
                'field' => 'message',
                'label' => 'lang:message',
                'rules' => 'required|trim'
            ),
        ),

        'admin_login' => array(
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required|valid_email|trim|max_length[64]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|max_length[64]'
            ),
        )
    );
?>