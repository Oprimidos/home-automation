<!DOCTYPE html>
<html>
<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
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
        <h1 style="padding-top:30px; padding-bottom:30px;">Consumer Dashboard</h1>

        
        <button onclick="showTable('temperature')">Temperature</button>
        <button onclick="showTable('humidity')">Humidity</button>
        <button onclick="showTable('light')">Light</button>

        <!-- Temperature Table -->
        <table id="temperature-table">
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
                    if ($key == "temperature") {
                        echo "<tr>";
                        echo "<td>";
                        echo "Temperature (C)";
                        echo "</td>";
                        if (isset($value['reading'])) {
                            echo "<td>" . round(($value['reading'] )) . " C</td>";
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
                }
                ?>
            </tbody>
        </table>

        <!-- Humidity Table -->
        <table id="humidity-table" style="display:none;">
            <thead>
                <tr>
                    <th>Measurement</th>
                    <th>Reading</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php                
                foreach($data as $key => $value) {
                    if ($key == "humidity") {
                        echo "<tr>";
                        echo "<td>";
                        echo "Humidity (%)";
                        echo "</td>";
                        if (isset($value['reading'])) {
                            echo "<td>" . $value['reading'] . " %</td>";
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
                }
                ?>
            </tbody>
        </table>

        <!-- Light Table -->
        <table id="light-table" style="display:none;">
            <thead>
                <tr>
                    <th>Measurement</th>
                    <th>Reading</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php                
                foreach($data as $key => $value) {
                    if ($key == "light") {
                        echo "<tr>";
                        echo "<td>";
                        echo "Light";
                        echo "</td>";
                        if (isset($value['reading'])) {
                            echo "<td>" . ($value['reading'] ? "On" : "Off") . "</td>";
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
                }
                ?>
            </tbody>
        </table>

    </div>

    <script>
        function showTable(tableId) {
            var table = document.getElementById(tableId + "-table");
            if (table.style.display === "none") {
                table.style.display = "block";
            } else {
                table.style.display = "none";
            }
        }
    </script>

</body>
</html>
