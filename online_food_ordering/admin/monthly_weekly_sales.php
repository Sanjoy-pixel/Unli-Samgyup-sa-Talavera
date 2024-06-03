

<?php

        include 'db_connect.php';
        include 'total_sales_function.php';
    
       


if(isset($_POST['submit'])){
 
  
  
 
  $month =  $_POST['month'];
  $year =   $_POST['year'];

}
 else {

      
   
	$month_num = date('m');

	$month_name = date("F", mktime(0, 0, 0, $month_num, 10));

  
  $month = $month_name;

  $year =  date('Y');
 
}






          //  week 1

        $day1 = sum_total_day($month , 1, $conn);
       
        $day2 = sum_total_day($month , 2, $conn);
            
        $day3 = sum_total_day($month , 3, $conn);
       
        $day4 = sum_total_day($month , 4, $conn);
       
        $day5 = sum_total_day($month , 5, $conn);
            
        $day6 = sum_total_day($month , 6, $conn);
       
        $day7 = sum_total_day($month , 7, $conn);
       
       
        $week1 = $day1 + $day2 + $day3 + $day4 + $day5 + $day6 + $day7;


      // week 2

      
       $day8 = sum_total_day($month ,  8, $conn);

       $day9 = sum_total_day($month ,  9, $conn);
     
       $day10 = sum_total_day($month , 10, $conn);

       $day11 = sum_total_day($month , 11, $conn);

       $day12 = sum_total_day($month , 12, $conn);
     
       $day13 = sum_total_day($month , 13, $conn);

       $day14 = sum_total_day($month , 14, $conn);



 $week2 = $day8 + $day9 + $day10 + $day11 + $day12 + $day13 + $day14;


    // week3

    $day15 = sum_total_day($month , 15, $conn);

    $day16 = sum_total_day($month , 16, $conn);
        
    $day17 = sum_total_day($month , 17, $conn);
    
    $day18 = sum_total_day($month , 18, $conn);
    
    $day19 = sum_total_day($month , 19, $conn);
        
    $day20 = sum_total_day($month , 20, $conn);
    
    $day21 = sum_total_day($month , 21, $conn);
    
    
    
    $week3 = $day15 + $day16 + $day17 + $day18 + $day19 + $day20 + $day21;


   // week4

   $day22 = sum_total_day($month , 22, $conn);

   $day23 = sum_total_day($month , 23, $conn);
       
   $day24 = sum_total_day($month , 24, $conn);
   
   $day25 = sum_total_day($month , 25, $conn);
   
   $day26 = sum_total_day($month , 26, $conn);
       
   $day27 = sum_total_day($month , 27, $conn);
   
   $day28 = sum_total_day($month , 28, $conn);

   $day29 = sum_total_day($month , 29, $conn);

   $day30 = sum_total_day($month , 30, $conn);

   $day31 = sum_total_day($month , 31, $conn);
   
   
   
   $week4 = $day22 + $day23 + $day24 + $day25 + $day26 + $day27 + $day28 + $day29 + $day30 + $day31;



  //  whole month

  $whole_month = sum_total_month($month , $conn);


    $week1_numformat = number_format($week1);
    $week2_numformat = number_format($week2);
    $week3_numformat = number_format($week3);
    $week4_numformat = number_format($week4);
    $whole_month_numformat = number_format($whole_month);







   ?>





<div class="container-fluid">
	
      <div class="card">

          <div class="card-body vh-height grid-2-cols">

               <div class="container-left">




               <h1 class="heading-primary">Weekly Sales Month of <?php echo $month;  ?> <?php echo $year;  ?>  </h1>




                <table class="table table-bordered " >
                    <thead>
                        <tr>
                          <th class="t-a-center th-bg-color">Week 1</th>
                          <th class="t-a-center th-bg-color">Week 2</th>
                          <th class="t-a-center th-bg-color">Week 3</th>
                          <th class="t-a-center th-bg-color">Week 4</th>

                        </tr>

                       <tbody>
                        <tr>
                           <td class="t-a-center">Total Sales: <span class="t-number">&#8369;<?php display_week1($month, $year, $week1_numformat); ?></span></td>
                           <td class="t-a-center">Total Sales: <span class="t-number">&#8369;<?php display_week2($month, $year, $week2_numformat); ?></span></td>
                           <td class="t-a-center">Total Sales: <span class="t-number">&#8369;<?php display_week3($month, $year, $week3_numformat); ?></span></td>
                           <td class="t-a-center">Total Sales: <span class="t-number">&#8369;<?php display_week4($month, $year, $week4_numformat); ?></span></td>
                           
                        </tr>

                       </tbody>


                    </thead>
                </table>



                <table class="table table-bordered " >
                    <thead>
                        <tr>
                          <th class="t-a-center th-bg-color">Whole Month Sales</th>
                          

                        </tr>

                       <tbody>
                        <tr>
                           <td class="t-a-center">Total Sales: <span class="t-number">&#8369;<?php display_month($month, $year, $whole_month_numformat); ?></span></td>
                           
                        </tr>

                       </tbody>


                    </thead>
                </table>
               
                </div>
               
             
               <div class="container-right">

               <form class="select-form" method="post" action="index.php?page=monthly_weekly_sales">
                   <select class="select-month" name="month">
                     <option value="">Select Month</option>
                     <option value="January">January</option>
                     <option value="February">February</option>
                     <option value="March">March</option>
                     <option value="April">April</option>
                     <option value="May">May</option>
                     <option value="June">June</option>
                     <option value="July">July</option>
                     <option value="August">August</option>
                     <option value="September">September</option>
                     <option value="October">October</option>
                     <option value="November">November</option>
                     <option value="December">December</option>
                   </select>


                   <input type="text" name="year" placeholder="Input year">

                   <button class="btn btn-success" name="submit">Search</button> 
                </form>

               </div>

          </div>


      </div>

</div>



  

