<?php


namespace App\MyClasses;


class PowerMyService implements MyServiceInterface
{
    private $id = -1;
    private $msg = 'NO ID...これはPowerMyService';
    private $data = ['いちご', 'りんご', 'バナナ', 'みかん', 'ぶどう'];

    function __construct()
    {
        $this->setId(rand(0, count($this->data)));
    }

    public function setId(int $id)
    {
        if ($id >= 0 && $id < count($this->data))
        {
            $this->id = $id;
            $this->msg = "あなたが好きなのは、" . $id
                . '番の' . $this->data[$id] . 'ですね！';
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function allData()
    {
        return $this->data;
    }

    public function data(int $id)
    {
        $this->data[$id];
    }

    // public function setData($data)
    // {
    //     $this->data = $data;
    // }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
