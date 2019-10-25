<?php


namespace App\MyClasses;


class MyService
{
    private $msg;
    private $data;

    public function __construct()
    {
        $this->msg = 'hello MyService!';
        $this->data = ['hello', 'welcome', 'bye'];
    }

    public function say()
    {
        return $this->msg;
    }

    public function data()
    {
        return $this->data;
    }


}
