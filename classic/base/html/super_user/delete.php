<?php
  include('DBConnector.php');
?>
<?php 
            // if (isset($_GET['delete'])) {
            //   # code...
            //   $id = $_GET['delete'];
            //   $conn->query("DELETE FROM facilities WHERE facilityID=$id");

            //   // $dQuery = "DELETE FROM facilities WHERE facilityID=?";
            //   // $stmt = $conn->prepare($dQuery);
            //   // $stmt->bind_param('b', $id);
            //   // $stmt->close();
            //   // $conn->close();
            //    header("location: facilities.php");

            //   }
        $sql = "DELETE FROM facilities WHERE facilityID='$_GET[id]'";
        if (mysqli_query($conn,$sql)) {
          # code...
          header("refresh:1; url=facilities.php");
        }else{
          echo "not deleted";
          
        }
?>