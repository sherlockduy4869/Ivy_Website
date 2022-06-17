<?php
     include $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Lib/session.php';
     Session::checkLogin();
     include $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Lib/database.php';
     include $_SERVER['DOCUMENT_ROOT'].'/Web_Final_Project/Helpers/format.php';
?>

<?php

    class adminLogin
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Check login
        public function login_check($adminUser, $adminPassword){
            $adminUser = $this->fm->validation($adminUser);
            $adminPassword = $this->fm->validation($adminPassword);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

            if(empty($adminUser) || empty($adminPassword))
            {
                $alert = "User and password can not be empty";
                return $alert;
            }
            else 
            {
                $query = "SELECT * FROM tbl_admin WHERE ADMIN_USER = '$adminUser' AND ADMIN_PASS = '$adminPassword' LIMIT 1";
                $result = $this->db->select($query);

                if($result != false)
                {
                    $value = $result->fetch_assoc();
                    Session::set('adminLogin',true);
                    Session::set('adminID',$value['ADMIN_ID']);
                    Session::set('adminUser',$value['ADMIN_USER']);
                    Session::set('adminName',$value['ADMIN_NAME']);
                    header('Location:index.php');
                } 
                else
                {
                    $alert = "Wrong User_Name or Password";
                    return $alert;
                }
            }
        }
    }

?>