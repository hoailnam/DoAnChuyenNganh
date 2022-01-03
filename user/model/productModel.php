<?php
class productModel
{
    private $pr_id;
    private $pr_name;
    private $pr_price;
    private $pr_avtar;

    public function __construct($pr_id, $pr_name, $pr_price, $pr_avatar)
    {
        $this->pr_id = $pr_id;
        $this->pr_name = $pr_name;
        $this->pr_price = $pr_price;
        $this->pr_avtar = $pr_avatar;
    }
    public function get_prid()
    {
        return $this->pr_id;
    }
    public function get_prname()
    {
        return $this->pr_name;
    }
    public function get_prprice()
    {
        return $this->pr_price;
    }
    public function get_pravtar()
    {
        return $this->pr_avtar;
    }
}
