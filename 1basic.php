<!-- Basics in PHP -->

<h1>Basic saving variable and echos</h1>
<h2> This is sum of 2 + 2</h2><?php echo 2+2;

$myname = "Aslam";
?>

<h1>This page contain <?php echo $myname ;?></h1>



<!-- Functions in PHP -->
<h1> 1 Function start here </h1>
<?php 

function myFirstFunction(){
    echo "<p>Hello this is my first functions calling 4 times</p>";
} 
myFirstFunction();
myFirstFunction();
myFirstFunction();
myFirstFunction();
?>

<h1> 2- Argument $name is parameter in fucntun , calling function values 
    argument Function start here </h1>

<?php 
function greet($name, $color){
    echo "<p>Hi, my name is $name and my favorite color is $color </p>";
}

greet("John", "Green");
greet("Jane", "yellow");

?>

<h1>Calling WP funnction demos</h1>

<h2><?php bloginfo('name');?></h2>

<!-- While loop in PHP -->
<h1> Loop  start here</h1>
<?php 

$names = array('Brad', 'John', 'Jane', 'Meowsalot');

$count = 0 ;

while($count < count($names)){
    echo "<li> Hi, my name is $names[$count] </li>";
    $count++;
}


?>