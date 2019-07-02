<?php

/**
 * Created by PhpStorm.
 * User: 柒祭
 * Date: 2018/6/20
 * Time: 0:40
 */
class user_model  extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    public function check_user($username, $password){
        $q = $this->db
            ->where(array(
                'u_name'=>$username,
                'u_passw'=>$password,
                'state'=>1
            ))->get('user')->result_array();
        if(isset($q[0])){
            return true;
        }
        return false;
    }
    public function register($username, $password){
        $q = $this->db
            ->where(array(
                'u_name'=>$username,
            ))->get('user')->result_array();
        if(isset($q[0])){
            return false;//已被注册，返回flase
        }else{
            $data = array(
                'u_name'=>$username,
                'u_passw'=>$password,
            );
            $this->db->insert('user',$data);
            return true;
        }
    }
}