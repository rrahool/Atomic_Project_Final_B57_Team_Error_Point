<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 5/29/2017
 * Time: 1:38 PM
 */

namespace App\BookTitle;

use App\Message\Message;
use App\Model\Database;
use App\Utility\Utility;
use PDO;

class BookTitle extends Database
{

    public $id;
    public $bookTitle;
    public $authorName;


    public function setData($postArray){

        if(array_key_exists("id",$postArray)){
            $this->id = $postArray['id'];
        }

        if(array_key_exists("bookTitle",$postArray)){
            $this->bookTitle = $postArray['bookTitle'];
        }

        if(array_key_exists("authorName",$postArray)){
            $this->authorName = $postArray['authorName'];
        }
    } // end of setData()

    public function store(){

        $query = "INSERT INTO `tbl_book_title` (`book_title`, `author_name`) VALUES (?, ?);";

        $dataArray = array($this->bookTitle, $this->authorName);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Data Inserted Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Inserted!");
        }
    } // end of store()

    public function index(){

        $query = "SELECT * FROM `tbl_book_title` WHERE is_trashed = 'No'";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    } // end of index()

     public function view(){

            $query = "SELECT * FROM `tbl_book_title` WHERE `id`=".$this->id;

            $STH = $this->DBH->query($query);

            $STH->setFetchMode(PDO::FETCH_OBJ);
            $singleData = $STH->fetch();
            return $singleData;

        } // end of view()

    public function update(){

        $query = "UPDATE `tbl_book_title` SET `book_title` = ?,`author_name` = ? WHERE `id` = $this->id;";

       //Utility::dd($query);

        $dataArray = array($this->bookTitle, $this->authorName);

        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($dataArray);

        if($result){
            Message::message("Success :) Data Updated Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Updated!");
        }
    } // end of update()


    public function trash(){
        $query = "UPDATE `tbl_book_title` SET is_trashed = NOW() WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if($result){
            Message::message("Success :) Data Trashed Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Trashed!");
        }

    } // end of trash()


    public function trashed(){

        $query = "SELECT * FROM `tbl_book_title` WHERE is_trashed <> 'No'";

        $STH = $this->DBH->query($query);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;

    } // end of trashed()



    public function recover(){
            $query = "UPDATE `tbl_book_title` SET is_trashed = 'No' WHERE `id` = $this->id;";

            //Utility::dd($query);

            $result = $this->DBH->exec($query);

            if($result){
                Message::message("Success :) Data Recovered Successfully.");
            }
            else{
                Message::message("Failure :( Data Not Recovered!");
            }

        } // end of recover()

    public function delete(){
        $query = "DELETE FROM `tbl_book_title` WHERE `id` = $this->id;";

        //Utility::dd($query);

        $result = $this->DBH->exec($query);

        if($result){
            Message::message("Success :) Data Deleted Successfully.");
        }
        else{
            Message::message("Failure :( Data Not Deleted!");
        }


    } // end of delete()


    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `tbl_book_title` WHERE `is_trashed` ='No' AND (`book_title` LIKE '%".$requestArray['search']."%' OR `author_name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `tbl_book_title` WHERE `is_trashed` ='No' AND `book_title` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `tbl_book_title` WHERE `is_trashed` ='No' AND `author_name` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        return $someData;

    }// end of search()


    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->book_title);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->book_title);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->author_name);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->author_name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// end of getAllKeywords()


    public function indexPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from tbl_book_title  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of indexPaginator()


    public function trashedPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from tbl_book_title WHERE is_trashed <> 'No'  LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of trashedPaginator()


    public function trashList(){

        $sql = "Select * from tbl_book_title where is_trashed <> 'No'";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        return $STH->fetchAll();
    } // end of trashList()




} //end of BookTitle Class