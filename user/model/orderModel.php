<?php
class orderModel
{
    private $order_id;
    private $order_date;
    private $order_name;
    private $order_phone;
    private $order_address;
    private $product_id;
    private $quaility;
    private $amount;
    private $order_status;
    private $order_email;
    public function __construct($id_order,$id_pr,$name,$stt, $amou, $date, $phone,$address, $email, $qty)
    {
        $this->order_id = $id_order;
        $this->product_id = $id_pr;
        $this->order_name = $name;
        $this->order_status = $stt;
        $this->amount = $amou;
        $this->order_date = $date;
        $this->order_phone = $phone;
        $this->order_address = $address;
        $this->quaility = $qty;
        $this->order_email=$email;
    }
    public function get_orderemail()
    {
        return $this->order_email;
    }

    public function set_orderemail($id)
    {
        $this->order_email = $id;
    }
    public function get_orderid()
    {
        return $this->order_id;
    }

    public function set_orderid($id)
    {
        $this->order_id = $id;
    }
    public function get_Date()
    {
        return $this->order_date;
    }

    public function set_Date($id)
    {
        $this->order_date = $id;
    }
    public function get_name()
    {
        return $this->order_name;
    }

    public function set_name($id)
    {
        $this->order_name = $id;
    }
    public function get_phone()
    {
        return $this->order_phone;
    }

    public function set_phone($ma)
    {
        $this->order_phone = $ma;
    }
    public function get_address()
    {
        return $this->order_address;
    }

    public function set_address($id)
    {
        $this->order_address = $id;
    }
    public function get_productid()
    {
        return $this->product_id;
    }

    public function set_productid($ma)
    {
        $this->product_id = $ma;
    }
    public function get_Qty()
    {
        return $this->quaility;
    }

    public function set_Qty($ma)
    {
        $this->quaility = $ma;
    }
    public function get_amount()
    {
        return $this->amount;
    }

    public function set_amount($ma)
    {
        $this->amount = $ma;
    }
    public function get_Stt()
    {
        return $this->order_status;
    }

    public function set_Stt($ma)
    {
        $this->order_status = $ma;
    }
}
?>