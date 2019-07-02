<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function index()
	{
       $this->load->view ( 'home/index.html' );
	}

	public  function  find()
    {
        $this->load->view ( 'home/find.html' );
    }
    public  function  user()
    {
        if (isset($this->session->u_name)){//后台用户已经登陆
            $this->load->view ( 'home/user.html');
        }else{//后台用户还未登陆
            $this->load->view('users/login.html');
        }
    }

    public  function  admin()
    {
        if (isset($this->session->name)){//后台用户已经登陆
            $this->load->view ( 'home/admin.html' );
        }else{//后台用户还未登陆
            $this->load->view('admin/a_login.html');
        }

    }

}
