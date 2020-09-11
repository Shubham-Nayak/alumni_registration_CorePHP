
<html>
<body>
    <form action="" method="post">
    <input type="text" name="matrix[]" >
    <input type="submit" name="submit">
    </form>
</body></html>
<?php



$input=$_POST['matrix']; 




$items = array();
// $size = count($names);

// foreach($input as $data){

	$colors="";
foreach($input as $g)  
{  
  $colors .= $g.",";  
} 
print_r($colors);die();

// }

$value;
$i=0;
$j=1;
foreach($input as $b)
{
    
    $value[$i][]=$b;
    
    if(count($value[$i])>=6)
    {
        $i+=1;
    }
   
}

// print_r($value);



$input=array(1,3,0,0,0,0,0,0,4,5,1,0,0,0,0,6,7,6,0,0,0,0,5,0) ; 
// print_r($input);

die();

$value;
$i=0;
$j=1;
foreach($input as $b)
{
    
    $value[$i][]=$b;
    
    if(count($value[$i])>=6)
    {
        $i+=1;
    }
   
}

echo no_of_path($value,4,6);  // 4 is row 6 is coloums or cells


// now we have to follow same pattern 							
							
	// 1	3					
	// 		4	5	1		
	// 			6	7	6	
	// 				5		

    


function process($a,$b, $m, $n, $i, $j) {  //Problem matrix
    if($a[$i][$j]==1 || $a[$i][$j]==4 || $a[$i][$j]==5 || $a[$i][$j]==7)
        if($j<$n-1)
            $b[$i][$j+1]+=$b[$i][$j];

    if($a[$i][$j]==2 || $a[$i][$j]==4 || $a[$i][$j]==6 || $a[$i][$j]==7)
        if($i<$m-1)
            $b[$i+1][$j]+=$b[$i][$j];

    if($a[$i][$j]==3 || $a[$i][$j]==5 || $a[$i][$j]==6 || $a[$i][$j]==7)
        if($j<$n-1 && $i<$m-1)
            $b[$i+1][$j+1]+=$b[$i][$j];

        return $b;
}

function no_of_path($a,$m,$n) {
    $b=array();
    for ($i = 0; $i < $m; $i++) {
        $b1=array();
        for($j=0;$j<$n;$j++) $b1[]=0;
            $b[]=$b1;
    }
    $b[0][0]=1;
    for ($i = 0; $i < min($m,$n); $i++) {
        $b=process($a,$b,$m,$n,$i,$i); //solution matrix
        for($j=$i+1;$j<$n;$j++)
            $b=process($a,$b,$m,$n,$i,$j);
        for($j=$i+1;$j<$m;$j++) 
            $b=process($a,$b,$m,$n,$j,$i);
    }
    return $b[$m-1][$n-1]; // output return now we have to print this function or echo and pass array value and m,n
}




?>
