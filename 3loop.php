<!-- Variables in PHP -->
 <!-- Saving one time and using multiple times -->

 <h1> Variable saving in PHP</h1>
<?php  

$myName = "Aslam";

?>

<p>my name is <?php echo $myName ; ?></p>
<p>my name is <?php echo $myName ; ?></p>
<p>my name is <?php echo $myName ; ?></p>
<p>my name is <?php echo $myName ; ?></p>

<!-- Arrays in PHP-->

<?php 

$names = array('Brad', 'Aslam', 'Zeenat','Basha') ;?>

<p> My name is <?php echo $names[0] ;?></p>
<p>My second name is <?php  echo $names[1] ;?> </p>


<!-- Loops in PHP -->

<?php 
$count = 0;
while($count<count($names)){
echo "<li>Hi, my name is $names[$count] </li>";
$count++;
} ?>

<!-- Printing number  -->
<?php 
$i = 1;

while ($i < 100) {
  echo $i ."<br>" ;
  
  $i++;}

?>