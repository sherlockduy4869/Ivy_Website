<?php
    include "Lib/database.php";
    include "Helpers/format.php";
?>

<?php

    class category
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($cateName){

            $cateName = $this->fm->validation($cateName);
            $cateName = mysqli_real_escape_string($this->db->link, $cateName);

            $query = "INSERT INTO tbl_category(cateName) VALUES('$cateName')";
            $result = $this->db->insert($query);

            if($result)
            {
                $alert = "<span class = 'addSuccess'>Add category successfully</span>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Can not add category</span>";
                return $alert;
            }
        }
    }

?>