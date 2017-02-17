<!DOCTYPE html>
<html >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="">
    <link href="bootstrap/ltr/bootstrap.min.css" rel="stylesheet" />
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-sm-6 col-md-5 col-md-offset-3 col-lg-6 col-lg-offset-0">



<?php

function Test( $string ,$string2 ){
	return ucfirst($string);
}


$origarray1 = array('ZAPATA', 'HOtititiaia', 'METAL hhhJJJJ');
$origarray2 = array('NOOlan', 'TATAT', 'STAMPLE');

$return = (array_map('strtolower', $origarray1  )); // $origarray1 stays the same
//$return = (array_map('strtolower', $origarray2 ,$origarray1  ));

var_dump($return);

$temp = Test( 'nina', function(){
	return 'Looola';
}); // the PHP Anonymous Function is some kinda Object Clouser Class ( ??! )

echo $temp ;

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function getGreetingFunction() {
 
  $timeOfDay = "morning";
 
  return ( function( $name ) use ( &$timeOfDay ) {
    $timeOfDay = ucfirst( $timeOfDay ); 
    return ( "Good $timeOfDay, $name!" );
  } );
};
 
$greetingFunction = getGreetingFunction();
echo $greetingFunction( "Fred" ); // Displays "Good Morning, Fred!"


$people = array(
  0 => array( "name" => "Fred", "age" => 14 ),
  1 =>array( "name" => "Sally", "age" => 23 ),
  2 =>array( "name" => "Mary", "age" => 7 ),
  3 =>array( "name" => "Joe", "age" => 5 )
);


usort( $people, function( $personA, $personB ) {
  return ( $personA["age"] < $personB["age"] ) ? -1 : 1;
} );
 
var_dump( $people );


?>


</div>

</body>
</html>