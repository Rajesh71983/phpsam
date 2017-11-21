<?php
//echo date('d F Y', strtotime('fifth wednesday of March 2018'))."line1";

//exit;
/* get same day of same week every month*/
$startdate = '2017-11-30';
$enddate = '2028-03-31';
$startday='01';
$startYear = date('Y', strtotime($startdate));
$endYear = date('Y', strtotime($enddate));
$startMonth = date('m', strtotime($startdate));
$endMonth = date('m', strtotime($enddate));
$years = array();
$datesarray = array();
$months= array(1,2,3,4,5,6,7,8,9,10,11,12);
	for($i=$startYear;$i<=$endYear;$i++){
		$years[]=$i; 
	}
foreach($years as $year){
	foreach($months as $month){
		$newdate= date('Y-m-d',strtotime($year.'-'.$month.'-'.$startday));
		$selected_day = date('l', strtotime($startdate));
		$selectedMonth = date('F', strtotime($newdate));
		
		$numbers = array(1=>'first',2=>'second',3=>'third',4=>'fourth',5=>'fifth',6=>'sixth',7=>'seventh');
		
		$generatedDate = date('Y-m-d',strtotime($numbers[5].' '.strtolower($selected_day).' of '.$selectedMonth.' '.$year));
		if($generatedDate >= $startdate && $generatedDate <= $enddate && date('m',strtotime($generatedDate)) == $month){
			$datesarray[]=$generatedDate;
		}
		
	}
}
/* get same day of same week every month ends here*/
/* get same date of  every month*/
$startdate = '2017-12-31';
$enddate = '2018-12-31';
$startday=date('d',strtotime($startdate));
$startYear = date('Y', strtotime($startdate));
$endYear = date('Y', strtotime($enddate));
$startMonth = date('m', strtotime($startdate));
$endMonth = date('m', strtotime($enddate));
$years = array();
$datesarray = array();
$months= array(1,2,3,4,5,6,7,8,9,10,11,12);
	for($i=$startYear;$i<=$endYear;$i++){
		$years[]=$i; 
	}
foreach($years as $year){
	foreach($months as $month){
		$newdate= date('Y-m-d',strtotime($year.'-'.$month.'-'.$startday));
		$newDateday = date('d',strtotime($newdate));
		if($newdate >= $startdate && $newdate <= $enddate && $newDateday == $startday){
			$datesarray[] = $newdate;
		}			
	}
}
/* get same date of  every month ends here*/


echo "<pre>";
print_r($datesarray);
exit;
