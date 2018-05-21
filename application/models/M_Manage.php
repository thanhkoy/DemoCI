<?php
/**
 * Created by PhpStorm.
 * User: Thành
 * Date: 5/18/2018
 * Time: 2:06 PM
 */

class M_Manage extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listUser()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function delete($id)
    {
        $this->db->delete('user', array('id' => $id));
    }

    public function add($name){
        $data = array(
            "name" => "{$name}"
        );
        $this->db->insert("user", $data);
    }

    public function edit($id, $name){
        $data = array(
            'name' => $name
        );

        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}