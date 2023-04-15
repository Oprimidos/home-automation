<!DOCTYPE html>
<html>
<head>
    <title>Home Automation - Consumer Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Home Automation - Consumer Dashboard</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Latest Sensor Readings</h2>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sensor_data = json_decode(file_get_contents('mock_data/sensor_readings.json'), true);
                    $latest_readings = array();
                    foreach ($sensor_data as $reading) {
                        if (!array_key_exists($reading['type'], $latest_readings) || $reading['timestamp'] > $latest_readings[$reading['type']]['timestamp']) {
                            $latest_readings[$reading['type']] = $reading;
                        }
                    }
                    foreach ($latest_readings as $reading) {
                        echo "<tr><td>" . ucfirst($reading['type']) . "</td><td>" . $reading['value'] . "</td><td>" . date('Y-m-d H:i:s', $reading['timestamp']) . "</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
