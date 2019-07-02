<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: 柒祭
 * Date: 2018/6/24
 * Time: 14:40
 */
class users extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->view('users/login.html');
    }
    public function send()
    {
        $username = $this->input->post('username');//用户名
        $password = $this->input->post('password');//密码
        if($this->user_model->check_user($username, $password)){//验证密码是否正确
            $user_data = array(
                'u_name' => $username,
                'u_passw' => $password
            );
            $this->session->set_userdata($user_data);//Session
            success('Welcome/user', '登陆成功！');//自定义成功跳转函数
        }else{
            error('账号密码错误');
        }
    }

    public function sign_up()
    {
        $this->load->view("users/signup.html");
    }
    public function signup()
    {
        $username = $this->input->post('username');//用户名
        $password = $this->input->post('password');//密码
        if($this->user_model->register($username, $password)){
            success("users/index","注册成功,请进行登录");
        }else{
            error("用户名重复！！！");
        };
    }
    public function exit_forum(){
        $array_items = array('u_name', 'u_passw');
        $this->session->unset_userdata($array_items);
        success("Welcome/index","退出成功");

    }

    public  function v(){
        $this->load->view('users/index.html');
    }

    public  function like(){
        $this->load->view('users/like.html');
    }
}