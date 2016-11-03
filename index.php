<!DOCTYPE html>
<html>
  <?php
    require_once('assets/head.php');
    require_once('connection.php');
  ?>
<body>
    <?php require_once('assets/header.php'); ?>

    <h1>Dashboard</h1>
    <div class="main">
      <h2>Opkomende Examens</h2>
    </div>

    <?php
    //Prepare and run a query
    $getCalendar = $dbh->prepare("SELECT `calendar`.*, `user1`.`username` AS `docent1`, `user2`.`username` AS `docent2`, `student`.`first_name` AS `student_first_name`, `student`.`last_name` AS `student_last_name`
                                  FROM `calendar`
                                  LEFT JOIN `user` AS `user1`
                                  ON user1.id = calendar.user_id_1
                                  LEFT JOIN `user` AS `user2`
                                  ON user2.id = calendar.user_id_2
                                  LEFT JOIN `student`
                                  ON student.id = calendar.student_id
                                  WHERE DATE(date)=CURDATE()
                                  ORDER BY date ASC, time ASC");
    $getCalendar->execute();
    $calendar = $getCalendar->fetchAll();

    //Create the table
    echo "<section>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>
            <th>Naam</th>
            <th>Examinatoren</th>
            <th>Datum</th>
            <th>Tijd</th>
          </tr>";
    echo "</thead>";

    echo "<tbody>";
    foreach( $calendar as $row) {
      echo "<tr>";
      echo "<td>".$row['student_first_name']."&nbsp;".$row['student_last_name']."</td>";
      echo "<td>".$row['docent1']."<span> & </span>".$row['docent2']."</td>";
      echo "<td>".$row['date']."</td>";
      echo "<td>".$row['time']."</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</section>";
  ?>
  </body>
</html>
