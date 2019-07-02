<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: 柒祭
 * Date: 2018/6/20
 * Time: 20:41
 */
class find extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('find_model');
    }
    public  function v(){
        $this->load->view('find/index.html');
    }

    //歌曲查询
    public function fsong()
    {
      $this->load->view ( 'find/song.html' );
    }
    // public  function find($tname,$name)
    public function fsongs()
    {
        $tname="song";
        $name = $_POST['name'];
        $data['songs']=$this->find_model-> find($tname,$name);
        $data = json_encode($data);
        echo $data;
    }



    public function fsinger()
    {
        $this->load->view ( 'find/singer.html' );
    }
    // public  function find($tname,$name)
    public function fsingers()
    {
        $tname="singer";
        $name = $_POST['name'];
        $data['singers']=$this->find_model-> find1($tname,$name);
        $data = json_encode($data);
        echo $data;
    }
    public function falbum()
    {
        $this->load->view ( 'find/album.html' );
    }
    // public  function find($tname,$name)
    public function falbums()
    {
        $tname="album";
        $name = $_POST['name'];
        $data['albums']=$this->find_model-> find2($tname,$name);
        $data = json_encode($data);
        echo $data;
    }
}