<?php

namespace App\MyClasses;

class MyService implements MyServiceInterface
{

    // private $serial;
    private $id = -1;
    private $msg = 'no id...ののおお変更を確認OK';
    private $data = ['Hello', 'Welcome', 'Bye'];


    // $id 引数を渡すように変更
    public function __construct()
    {
        // $this->setId($id);
        // $this->serial = rand();
        // echo "「{$this->serial}」";
    }


    public function setId($id)
    {
        $this->id = $id;
        if ($id >= 0 && $id < count($this->data)) {
            $this->msg = "select  id:" . $id
                . ', data:"' . $this->data[$id] . '"';
        }
    }


    public function say()
    {
        return $this->msg;
    }


    public function data(int $id)
    {
        return $this->data[$id];
    }


    public function alldata()
    {
        return $this->data;
    }
}
