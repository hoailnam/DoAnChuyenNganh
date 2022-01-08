<?php

class userModel
{
    private $id;
    private $name;
    private $email;
    private $pass;
    private $phone;
    private $address;

    public function __construct($id, $uname, $uemail, $upass, $uphone, $uaddress)
    {
        $this->id = $id;
        $this->name = $uname;
        $this->email = $uemail;
        $this->pass = $upass;
        $this->phone = $uphone;
        $this->address = $uaddress;
    }
    public function get_id()
    {
        return $this->id;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_pass()
    {
        return $this->pass;
    }
    public function get_phone()
    {
        return $this->phone;
    }
    public function get_address()
    {
        return $this->address;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setPass($pass): void
    {
        $this->pass = $pass;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }
}
