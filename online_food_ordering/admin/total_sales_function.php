<?php


  
        //   Total sales per day

function sum_total_day($month, $day, $conn){

    $qry = $conn->query("SELECT SUM(total_sales) AS 'total_sales_day1' FROM $month WHERE day = $day "); 
          
    $row = $qry->fetch_assoc();
    
    $total_sales = $row['total_sales_day1'];
    
    return  $total_sales;
  
  
  }
  
        // whole month

  function sum_total_month($month , $conn){

    $qry = $conn->query("SELECT SUM(total_sales) AS 'total_sales_month' FROM $month WHERE month = '$month'"); 
          
    $row = $qry->fetch_assoc();
    
    $total_sales = $row['total_sales_month'];
    
    return  $total_sales;
  
  
  }
  



          //display week 1
 
  function display_week1($month, $year, $total_sale){

    $nmonth = date('m',strtotime($month));
    
    $date = "$year"."-".$nmonth."-" . "8";


    
  if(strtotime("today") == strtotime($date)){
         echo $total_sale;
    }

    else if(strtotime("today") > strtotime($date)){
        echo $total_sale;
    }  
     else {
      echo 0;
     
    }  


  }
        //display week 2

  function display_week2($month, $year, $total_sale){

 
    $nmonth = date('m',strtotime($month));
    
    $date = "$year"."-".$nmonth."-" . "15";


    
  if(strtotime("today") == strtotime($date)){
         echo $total_sale;
    }

    else if(strtotime("today") > strtotime($date)){
        echo $total_sale;
    }  
       else {

        echo 0;
       
      }


  }
 
   //display week 3

  function display_week3($month, $year, $total_sale){
    
    $nmonth = date('m',strtotime($month));
    
    $date = "$year"."-".$nmonth."-" . "22";

    
  if(strtotime("today") == strtotime($date)){
         echo $total_sale;
    }

    else if(strtotime("today") > strtotime($date)){
        echo $total_sale;
    }  
    else {
      echo 0;
    }   


  }

  //display week 4

  function display_week4($month, $year, $total_sale){
    
    $nmonth = date('m',strtotime($month));
    
    $date = "$year"."-".$nmonth."-" . "29";

    
  if(strtotime("today") == strtotime($date)){
         echo $total_sale;
    }

    else if(strtotime("today") > strtotime($date)){
        echo $total_sale;
    }  
    else {
      echo 0;
    }   


  }



  //display whole month

  function display_month($month, $year, $total_sale){
    
    $nmonth = date('m',strtotime($month));
    
    $day = '31';
    $dday = date('d');
      
    if( $dday  = '29'){
      $day = '30';
    }
      else if( $dday = '31'){
        $day = 1;
      }

    $date = "$year"."-".$nmonth."-" . "$day";

    
  if(strtotime("today") == strtotime($date)){
         echo $total_sale;
    }

    else if(strtotime("today") > strtotime($date)){
        echo $total_sale;
    }  
    else {
      echo 0;
    }   


  }


















?>