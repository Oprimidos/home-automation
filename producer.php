<!DOCTYPE html>
<html>
<head>
    <title>Producer Dashboard</title>
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

<div class="container">
        <h1>Producer Dashboard</h1>
        <h2>Add Sensor Reading</h2>
        <form method="POST" action="">
            <label for="type">Type:</label>
            <select name="type" id="type">
                <option value="light">Light</option>
                <option value="temperature">Temperature</option>
                <option value="humidity">Humidity</option>
            </select>
            <br>
            <label for="value">Value:</label>
            <input type="text" id="value" name="value">
            <br>
            <input type="submit" value="Add">
        </form>
        <h2>Sensor Readings</h2>
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
                    foreach ($sensor_data as $reading) {
                        echo "<tr><td>" . ucfirst($reading['type']) . "</td><td>" . $reading['value'] . "</td><td>" . date('Y-m-d H:i:s', $reading['timestamp']) . "</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
