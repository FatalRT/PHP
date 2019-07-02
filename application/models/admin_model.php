<?php if( ! defined('BASEPATH')) exit('No direct script access allowed!')?>
<?php

/**
 * Created by PhpStorm.
 * User: 柒祭
 * Date: 2018/6/24
 * Time: 17:09
 */
class admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //管理员登录及用户管理
    public function check_user($username, $password){
        $q = $this->db
            ->where(array(
                'name'=>$username,
                'paw'=>$password
            ))->get('admin')->result_array();
        if(isset($q[0])){
            return true;
        }
        return false;
    }
    /*
    * 获取所有用户信息
    */
    public function get_user_info(){
        $data = $this->db->get('user')->result_array();
        return $data;
    }
    /*
     * 获取单独用户信息
     */
    public function get_a_user_info($uid){
        $data = $this->db->where(array('u_id'=>$uid))->get('user')->result_array();
        return $data;
    }
    /*
     * 删除用户信息
     */
    public function delete_user_info($uid){
        $this->db->where('u_id',$uid)->delete('user');
    }
    /*
     * 修改用户信息
     */
    public function change_user_info($uid,$data){
        $this->db->where('u_id',$uid)->update('user', $data);
    }

    //内容管理
    //获取内容
    public function get($tname){
        $data = $this->db->get($tname)->result_array();
        return $data;
    }
    //获取单个内容
    public function getid($id,$tname){
        $data = $this->db->where(array('id'=>$id))->get($tname)->result_array();
        return $data;
    }
    //删除
    public function delete($id,$tname)
    {
        $this->db->where('id',$id)->delete($tname);
    }
    //修改
    public function change($id,$tname,$data){
        $this->db->where('id',$id)->update($tname, $data);
    }
    //添加
    public function addg($name,$tname,$data)
    {
        $q = $this->db
            ->where(array(
                'g_name'=>$name,
            ))->get($tname)->result_array();
        if(isset($q[0])){
            return false;//已被注册，返回flase
        }else{
            $this->db->insert($tname, $data);
            return true;
        }

    }

    public function adds($name,$tname,$data)
    {
        $q = $this->db
            ->where(array(
                's_name'=>$name,
            ))->get($tname)->result_array();
        if(isset($q[0])){
            return false;//已被注册，返回flase
        }else{
            $this->db->insert($tname, $data);
            return true;
        }

    }

    public function adda($name,$tname,$data)
    {
        $q = $this->db
            ->where(array(
                'a_name'=>$name,
            ))->get($tname)->result_array();
        if(isset($q[0])){
            return false;//已被注册，返回flase
        }else{
            $this->db->insert($tname, $data);
            return true;
        }

    }
}