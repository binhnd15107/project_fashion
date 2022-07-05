<?php
class controller
{
    public function Model($model)
    {
        require_once "./mvc/models/" . $model . ".php";
        return new $model;
    }
    public function view($view, $data = [])
    {
        require_once "./mvc/views/user/" . $view . ".php";
    }
    public function viewadmin($view, $data = [])
    {
        require_once "./mvc/views/admin/" . $view . ".php";
    }
    // public function viewdetail($view,$data=[])
    // {
    //     require_once "./mvc/views/detail/" . $view . ".php";
    // }
    // public function viewintroduce($view,$data=[])
    // {
    //     require_once "./mvc/views/introduce/" . $view . ".php";
    // }
}
