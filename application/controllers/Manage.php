<?php
/**
 * Created by PhpStorm.
 * User: Thành
 * Date: 5/18/2018
 * Time: 1:33 PM
 */

class Manage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Manage");
    }

    function listUser()
    {
        $list['data'] = $this->M_Manage->listUser();
        $this->load->view("index", $list);
    }

    function delete($id)
    {
        $this->M_Manage->delete($id);
        redirect(base_url("DemoCI/index.php"));
    }

    function add(){
        $name = $_POST['name'];
        $this->M_Manage->add($name);
        redirect(base_url("DemoCI/index.php"));
    }

    function edit(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $this->M_Manage->edit($id, $name);
        redirect(base_url("DemoCI/index.php"));
    }
}