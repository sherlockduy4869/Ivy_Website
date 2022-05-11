<?php
    include "../Lib/session.php";
    Session::checkLogin();
    include "../Lib/database.php";
    include "../Helpers/format.php";
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
                $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPassword = '$adminPassword' LIMIT 1";
                $result = $this->db->select($query);

                if($result != false)
                {
                    $value = $result->fetch_assoc();
                    Session::set('adminLogin',true);
                    Session::set('adminID',$value['adminID']);
                    Session::set('adminUser',$value['adminUser']);
                    Session::set('adminName',$value['adminName']);
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