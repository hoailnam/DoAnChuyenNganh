<?php

     class userModel{
         
        private $user_id;
        private $user_name;
        private $user_email;
        private $user_pass;
        private $user_phone;
        private $user_address;


        public function __construct($user_id, $user_name, $user_email, $user_pass,$user_phone, $user_address)
        {
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->user_email = $user_email;
            $this->user_pass = $user_pass;
            $this->user_phone = $user_phone;
            $this->user_address = $user_address;
        }
        public function get_id()
        {
            return $this->user_id;
        }
        public function get_name()
        {
            return $this->user_name;
        }
        public function get_email()
        {
            return $this->user_email;
        }
        public function get_pass()
        {
            return $this->user_pass;
        }
        public function get_phone()
        {
            return $this->user_phone;
        }
         public function get_adress()
        {
            return $this->address;
        }
        public function setId($user_id): void {  
            $this->user_id = $user_id; 
        }
        public function setName($user_name): void {  
		    $this->user_name = $user_name; 
	    }

        public function setEmail($user_email): void {  
            $this->user_email = $user_email; 
        }

        public function setPass($user_pass): void{  
            $this->user_pass = $user_pass; 
        }

        public function setPhone($user_phone): void {  
            $this->user_phone = $user_phone; 
        }

        public function setAddress($user_address): void {  
            $this->user_address = $user_address; 
        }
    

}

	

	

	

	
