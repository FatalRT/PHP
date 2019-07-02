<?php if( ! defined('BASEPATH')) exit('No direct script access allowed!')?>
<?php

/**
 * Created by PhpStorm.
 * User: 柒祭
 * Date: 2018/6/24
 * Time: 20:08
 */
class find_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   public  function find($tname,$name)
{
    $data = $this->db->where(array('g_name'=>$name))->get($tname)->result_array();
    return $data;
}
    public  function find1($tname,$name)
    {
        $data = $this->db->where(array('s_name'=>$name))->get($tname)->result_array();
        return $data;
    }
    public  function find2($tname,$name)
    {
        $data = $this->db->where(array('a_name'=>$name))->get($tname)->result_array();
        return $data;
    }
}