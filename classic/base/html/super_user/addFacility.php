<?php
  include('DBConnector.php');
?>
<?php  
      if (isset($_POST['addFac'])) {
        # code...
        //$name = $_POST['name']
       
        $level=$_POST['level'];
        $room=$_POST['room'];
        $type=$_POST['roomType'];
        $description=$_POST['description'];
        $capacity=$_POST['capacity'];

        $query = "INSERT INTO facilities (facilityLevel, facilityRoom, roomType, roomDescription, roomCapacity) VALUES ('$level', '$room', '$type', '$description', '$capacity')";
        mysqli_query($conn, $query);
        header('Location: facilities.php');
      }
