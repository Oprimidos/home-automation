<!DOCTYPE html>
<html>
<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <header>
  <nav class="navbar">
    <a href="#" class="navbar-logo">Home Automation</a>
    <ul class="navbar-menu">
      <li class="navbar-item"><a href="index.php">Home</a></li>
      <li class="navbar-item"><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
</header>
</head>
<body>
    <div class="container">
        <h1>Consumer Dashboard</h1>
        <table>
            <thead>
                <tr>
                    <th>Measurement</th>
                    <th>Reading</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $json = file_get_contents("mock_data/sensor_readings.json");
                $data = json_decode($json, true);

                foreach($data as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . ucfirst($key) . "</td>";
                    if(isset($value['reading'])) {
                        echo "<td>" . $value['reading'] . "</td>";
                    } else {
                        echo "<td>-</td>";
                    }
                    if(isset($value['timestamp'])) {
                        echo "<td>" . $value['timestamp'] . "</td>";
                    } else {
                        echo "<td>-</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
