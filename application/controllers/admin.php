<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: 柒祭
 * Date: 2018/6/24
 * Time: 14:40
 */
class admin extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }
    public  function v(){
        $this->load->view('admin/index.html');
    }
//   后台登录
    public function index()
    {
        $this->load->view('admin/a_login.html');
    }
    public function send()
    {
        $username = $this->input->post('username');//用户名
        $password = $this->input->post('password');//密码
        if($this->admin_model->check_user($username, $password)){//验证密码是否正确
            $auser_data = array(
                'name' => $username,
                'paw' => $password
            );
            $this->session->set_userdata($auser_data);//Session
            success('Welcome/admin', '登陆成功！');//自定义成功跳转函数
        }else{
            error('账号密码错误');
        }
    }
    public function exit_forum(){
        $array_items = array('name', 'paw');
        $this->session->unset_userdata($array_items);
        success("Welcome/index","退出成功");
    }
//   后台登录

//用户管理
    /*
         * 用户信息显示
         */
    public function user_info_show(){
        $data['user_info'] = $this->admin_model->get_user_info();
        $this->load->view("admin/a_users.html",$data);
    }

    /*
     * 单独的用户信息获取（用来修改）
     */
    public function get_user_info(){
        $uid = $_POST["u_id"];
        $data['special_user'] = $this->admin_model->get_a_user_info($uid);
        $data = json_encode($data);
        echo $data;
    }

    /*
     * 用户信息删除
     */
    public function user_delete(){
        $uid = $_POST['u_id'];
        $this->admin_model->delete_user_info($uid);
        $data['user_info'] = $this->admin_model->get_user_info();//删除之后获取最新用户信息
        $data = json_encode($data);
        echo $data;
    }

    /*
     * 用户信息修改
     */
    public function user_change(){
        $uid = $_POST['u_id'];
        $username = $_POST['u_name'];
        $password = $_POST['u_passw'];
        $select = $_POST['select'];
        $data = array(
            'u_name' => $username,
            'u_passw' => $password,
            'state' => $select
        );
        $this->admin_model->change_user_info($uid,$data);
        $data['special_user'] = $this->admin_model->get_a_user_info($uid);
        $data = json_encode($data);
        echo $data;
    }

//用户管理

//歌曲管理
    //展示 public function get($tname)
    public function songshow(){
        $tname="song";
        $data['song'] = $this->admin_model->get($tname);
        $this->load->view("admin/a_song.html",$data);
    }
    //获取 public function getid($id,$tname)
    public function getsong(){
        $id = $_POST["id"];
        $tname="song";
        $data['special_song'] = $this->admin_model->getid($id, $tname);
        $data = json_encode($data);
        echo $data;
    }
    //删除 public function delete($id,$tname)
    public function deletesong(){
        $id = $_POST['id'];
        $tname="song";
        $this->admin_model->delete($id,$tname);
        $data['song'] = $this->admin_model->get($tname);
        $data = json_encode($data);
        echo $data;
    }
    //修改 public function change($id,$tname,$data)
    public function changesong(){
        $tname="song";
        $id = $_POST['id'];
        $name = $_POST['g_name'];
        $album=$_POST['g_album'];
        $style=$_POST['g_style'];
        $language=$_POST['g_language'];
        $num=$_POST['g_num'];
        $singer=$_POST['g_singer'];
        $data = array(
            'g_name' => $name,
            'g_album' => $album,
            'g_style' => $style,
            'g_language' => $language,
            'g_num' => $num,
            'g_singer' => $singer,
        );
        $this->admin_model->change($id,$tname,$data);
        $data['special_song'] = $this->admin_model->get($tname);
        $data = json_encode($data);
        echo $data;
    }
    //添加 public function add($name,$tname,$data)
    public function addsong(){
        $tname="song";
        $name = $_POST['a'];
        $album=$_POST['al'];
        $style=$_POST['s'];
        $language=$_POST['l'];
        $num=0;
        $singer=$_POST['sr'];
        $data = array(
            'g_name' => $name,
            'g_album' => $album,
            'g_style' => $style,
            'g_language' => $language,
            'g_num' => $num,
            'g_singer' => $singer,
        );
        if( $this->admin_model->addg( $name,$tname,$data)){
            success('admin/songshow', '添加成功！');//自定义成功跳转函数
        }else{
            error("歌曲已存在！！！");
        };
    }

//歌手管理
    //展示 public function get($tname)
    public function singershow(){
        $tname="singer";
        $data['singer'] = $this->admin_model->get($tname);
        $this->load->view("admin/a_singer.html",$data);
    }
    //获取 public function getid($id,$tname)
    public function getsinger(){
        $id = $_POST["id"];
        $tname="singer";
        $data['special_singer'] = $this->admin_model->getid($id, $tname);
        $data = json_encode($data);
        echo $data;
    }
    //删除 public function delete($id,$tname)
    public function deletesinger(){
        $id = $_POST['id'];
        $tname="singer";
        $this->admin_model->delete($id,$tname);
        $data['singer'] = $this->admin_model->get($tname);
        $data = json_encode($data);
        echo $data;
    }
    //修改 public function change($id,$tname,$data)
    public function changesinger(){
        $tname="singer";
        $id = $_POST['id'];
        $name = $_POST['s_name'];
        $sex = $_POST['s_sex'];
        $address=$_POST['s_address'];
        $company=$_POST['s_company'];
        $data = array(
            's_name' => $name,
            's_sex'=>$sex,
            's_address' => $address,
            's_company' => $company,
        );
        $this->admin_model->change($id,$tname,$data);
        $data['special_singer'] = $this->admin_model->get($tname);
        $data = json_encode($data);
        echo $data;
    }
    //添加 public function add($name,$tname,$data)
    public function addsinger(){
        $tname="singer";
        $name = $_POST['n'];
        $sex=$_POST['s'];
        $adress=$_POST['a'];
        $company=$_POST['c'];

        $data = array(
            's_name' => $name,
            's_sex' => $sex,
            's_address' => $adress,
            's_company' => $company,
        );
        if( $this->admin_model->adds( $name,$tname,$data)){
            success('admin/singershow', '添加成功！');//自定义成功跳转函数
        }else{
            error("歌手已存在！！！");
        };
    }


//专辑管理
    //展示 public function get($tname)
    public function albumshow(){
        $tname="album";
        $data['album'] = $this->admin_model->get($tname);
        $this->load->view("admin/a_album.html",$data);
    }
    //获取 public function getid($id,$tname)
    public function getalbum(){
        $id = $_POST["id"];
        $tname="album";
        $data['special_album'] = $this->admin_model->getid($id, $tname);
        $data = json_encode($data);
        echo $data;
    }
    //删除 public function delete($id,$tname)
    public function deletealbum(){
        $id = $_POST['id'];
        $tname="album";
        $this->admin_model->delete($id,$tname);
        $data['album'] = $this->admin_model->get($tname);
        $data = json_encode($data);
        echo $data;
    }
    //修改 public function change($id,$tname,$data)
    public function changealbum(){
        $tname="album";
        $id = $_POST['id'];
        $name = $_POST['a_name'];
        $date=$_POST['a_date'];
        $singer=$_POST['a_singer'];
        $data = array(
            'a_name' => $name,
            'a_date' => $date,
            'a_singer' => $singer,
        );
        $this->admin_model->change($id,$tname,$data);
        $data['special_album'] = $this->admin_model->get($tname);
        $data = json_encode($data);
        echo $data;
    }
    //添加 public function add($name,$tname,$data)
    public function addalbum(){
        $tname="album";
        $name = $_POST['n'];
        $date=$_POST['d'];
        $singer=$_POST['s'];
        $data = array(
            'a_name' => $name,
            'a_date' => $date,
            'a_singer' => $singer,
        );
        if( $this->admin_model->adda( $name,$tname,$data)){
            success('admin/albumshow', '添加成功！');//自定义成功跳转函数
        }else{
            error("专辑已存在！！！");
        };
    }
}