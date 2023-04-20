<!DOCTYPE html>
<html>
<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <header>
  <?php include("navbar.html"); ?>
</header>
</head>
<body>
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 style="padding-top:30px; padding-bottom:30px;" >Consumer Dashboard</h1>
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
                        echo "<td>";
                        if ($key == "temperature") {
                            echo "Temperature (C)";
                        } else if ($key == "humidity") {
                            echo "Humidity (%)";
                        } else {
                            echo ucfirst($key);
                        }
                        echo "</td>";
                        if (isset($value['reading'])) {
                            if ($key == "temperature") {
                                echo "<td>" . round(($value['reading'] )) . " C</td>";
                            } else if ($key == "humidity") {
                                echo "<td>" . $value['reading'] . " %</td>";
                            } else if ($key == "light") {
                                echo "<td>" . ($value['reading'] ? "On" : "Off") . "</td>";
                            } else {
                                echo "<td>" . $value['reading'] . "</td>";
                            }
                        } else {
                            echo "<td>-</td>";
                        }
                        if (isset($value['timestamp'])) {
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
