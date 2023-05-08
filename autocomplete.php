<?php
 include("connection.php");
 $word = $_REQUEST["word"];
 if ($word != ""){
 $sql = "SELECT * FROM courses WHERE c_name like '%$word%' ";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              echo "<table class='hint table caption-top sreach table-light'>";
                while ($row = $result->fetch_assoc()){
                echo "<tr><td onclick='setword(\"".$row["c_name"]."\")'><a href='form_detail.php?coursesID=".$row["c_id"]."'>".$row["c_name"]. "</a></td></tr>";
            }
            echo "</table>";
        } 
}

        $conn->close();
?>