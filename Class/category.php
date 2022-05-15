<?php
    include_once "Lib/database.php";
    include_once "Helpers/format.php";
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

        //Insert category
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

        //Show category list
        public function show_category_list(){
            $query = "SELECT * FROM tbl_category ORDER BY cateID DESC";
            $result = $this->db->insert($query);
            return $result;
        }
        
        //Get category information by ID
        public function get_cate_name_by_id($cateID){
            $query = "SELECT * FROM tbl_category WHERE cateID = '$cateID'";
            $result = $this->db->select($query);
            return $result;
        }

        //Edit category information
        public function edit_category($cateID, $cateName){

            $cateName = $this->fm->validation($cateName);
            $cateName = mysqli_real_escape_string($this->db->link, $cateName);

            $query = "UPDATE tbl_category SET cateName = '$cateName' WHERE cateID = '$cateID'";
            $result = $this->db->update($query);
            if($result)
            {
                $alert = "<span class = 'addSuccess'>Edit category successfully</span>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Can not edit category</span>";
                return $alert;
            }
        }

        //Delete category information
        public function delete_category($delID){
            $query = "DELETE FROM tbl_category WHERE cateID = '$delID'";
            $result = $this->db->delete($query);

            header('Location:categorylist.php');
        }
    }

?>