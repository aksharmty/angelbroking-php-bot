<?php
include "connect.php";
//$today = "2021-10-22"; 
$today = DATE("Y-m-d"); 
$hma = date("Ymd"); echo "hma " . $hma;
echo "<br> today date ".$today;
//$sql = "SELECT * FROM nse where symbol ='SBIN' AND series=' EQ' order by timestamp desc limit 1";
$sql = "SELECT * FROM nse order by timestamp desc limit 1";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $lastdate = $row["timestamp"]; $id = $row["id"]; echo  "<br> ld " . $id; $ids = $id+1;  echo  "<br> lds " . $ids; echo  "<br> last date " . $lastdate;
$timestamp = strtotime($lastdate);
$time = $timestamp + (24*60*60);
// Date and time after subtraction
$date = date("dmY", $time);
echo "<br> new date ".$date;
$tm = date("Y-m-d", $time);
echo "<br> tm date ".$tm;
$tm0 = date(" d-M-Y", $time);
echo "<br> tm0 date ".$tm0;
$dup = mysqli_fetch_assoc(mysqli_query($connection," SELECT * FROM nse where symbol='SBIN' AND series=' EQ' AND date != cdate")) ;
$date0 = $dup["date"]; $cdate0 = $dup["cdate"]; $dt=$dup["timestamp"]; $delly=$dup["delly"];
echo "<br> Dup ".$date0 . " Cdate0 ".$cdate0 . " Dt ".$dt ."hhhhhhhhhhh<br>";
}
} else {  echo "0 results"; $tm = DATE("Y-m-d"); echo "<br> tm date ".$tm ; 
} 
echo "<br>------------------------------------------------------------- ";
if($today <= $lastdate){ echo $today ."Data found in database";} else {
//$date = "22102021";
$date = date("dmY");
echo " date ".$date;
$url0 = 'https://archives.nseindia.com/products/content/sec_bhavdata_full_';
$url1 = $date.'.csv';
$url = $url0.$url1;
echo "<br> url ".$url;

$ff ="./sec_bhavdata_full_";
$file = $ff.$url1;
echo "<br> file name ".$file;
// Initialize a file URL to the variable 
//$url = 'https://archives.nseindia.com/products/content/sec_bhavdata_full_09042021.csv';

// Initialize the cURL session 
$ch = curl_init($url); 

// Inintialize directory name where 
// file will be save 
$dir = './'; 

// Use basename() function to return 
// the base name of file 
$file_name = basename($url); 

// Save file into file location 
$save_file_loc = $dir . $file_name; 

// Open file 
$fp = fopen($save_file_loc, 'wb'); 

// It set an option for a cURL transfer 
curl_setopt($ch, CURLOPT_FILE, $fp); 
curl_setopt($ch, CURLOPT_HEADER, 0); 

// Perform a cURL session 
$result = curl_exec($ch); 
if(!$result){die("Connection Failure");} else { echo "new copy date updated"; }
// Closes a cURL session and frees all resources 
curl_close($ch); 

// Close file 
fclose($fp); 
echo $result;

?>   
<?php 
$filename = $file;

// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 10000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_big_array[] = $data;		
  }

  // Close the file
  fclose($h);
}

// Display the code in a readable format
echo "<pre>";
//var_dump($the_big_array);
//print_r($the_big_array);
echo "</pre>";
//(
//          [0] => SYMBOL
//            [1] =>  SERIES
//            [2] =>  DATE1
//            [3] =>  PREV_CLOSE
//            [4] =>  OPEN_PRICE
//            [5] =>  HIGH_PRICE
//            [6] =>  LOW_PRICE
//            [7] =>  LAST_PRICE
//            [8] =>  CLOSE_PRICE
//            [9] =>  AVG_PRICE
//            [10] =>  TTL_TRD_QNTY
//            [11] =>  TURNOVER_LACS
//            [12] =>  NO_OF_TRADES
//            [13] =>  DELIV_QTY
//            [14] =>  DELIV_PER
//        )


foreach ($the_big_array as $key =>$value){
$symbol = $the_big_array[$key][0];
$a = $the_big_array[$key][1];
$b = $the_big_array[$key][2];
$c = $the_big_array[$key][3];
$d = $the_big_array[$key][4];
$e = $the_big_array[$key][5];
$f = $the_big_array[$key][6];
$g = $the_big_array[$key][7];
$h = $the_big_array[$key][8];
$i = $the_big_array[$key][9];
$j = $the_big_array[$key][10];
$k = $the_big_array[$key][11];
$l = $the_big_array[$key][12];
$m = $the_big_array[$key][13];
$n = $the_big_array[$key][14];
//echo "a" .$a . $b;

$query = mysqli_query($connection,"INSERT INTO nse(symbol,series,open,high,low,close,date,timestamp,cdate,hma,volume) VALUES ('$symbol','$a','$d','$e','$f','$g','$b','$tm','$tm0','$hma','$j')");
} 
if($d < "1") { $query = mysqli_query($connection,"INSERT INTO nse(timestamp) VALUES ('$tm')");}
}
?>
<?php
//$delcan = mysqli_query($connection,"DELETE FROM `nse` WHERE timestamp = '$dt'");
$count = mysqli_fetch_array(mysqli_query($connection,"SELECT count(symbol) as tm500 FROM `nse` where symbol='symbol'"));
$tm = $count['tm500']; echo "<br> 50 count ".$tm5;

if($tm5 >= "200"){ $sql50 = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM nse order by timestamp asc limit 1"));
$tm50 = $sql50['timestamp']; echo "<br> 200 old date ".$tm50;
$del0 = mysqli_query($connection,"DELETE FROM `nse` WHERE timestamp='$tm50'"); }

$del1 = mysqli_query($connection,"DELETE FROM `nse` WHERE series = ' GS'");
$del2 = mysqli_query($connection,"DELETE FROM `nse` WHERE series = ' BE'");
$del3 = mysqli_query($connection,"DELETE FROM `nse` WHERE series = ' E1'");
$del4 = mysqli_query($connection,"DELETE FROM `nse` WHERE series = ' MF'");
$del5 = mysqli_query($connection,"DELETE FROM `nse` WHERE series = ' SM'");
$del6 = mysqli_query($connection,"DELETE FROM `nse` WHERE series = ' BZ'");
$del7 = mysqli_query($connection,"DELETE FROM `nse` WHERE series = ' N1' OR series = ' N2' OR series = ' N3' OR series = ' N4' OR series = ' N5' OR series = ' N6'");
