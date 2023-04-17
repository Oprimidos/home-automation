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
      <li class="navbar-item"><a href="index.php">Logout</a></li>
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
            <div id="value-inputs">
                <div id="light-input">
                    <label for="value-on-off">On/Off:</label>
                    <select name="value-on-off" id="value-on-off">
                        <option value="on">On</option>
                        <option value="off">Off</option>
                    </select>
                </div>
              <div id="temperature-input">
    <label for="value-temperature">Temperature (C):</label>
    <input type="number" id="value-temperature" name="value-temperature" step="0.1" min="-273.15"> C
</div>
<div id="humidity-input">
    <label for="value-humidity">Humidity (%):</label>
    <input type="number" id="value-humidity" name="value-humidity" step="0.1" min="0" max="100"> %
</div>

            </div>
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
             foreach ($sensor_data as $key => $reading) {
                 if ($key === "light") {
                      echo "<tr><td>" . ucfirst($key) . "</td><td>" . ($reading['reading'] ? "On" : "Off") . "</td><td>" . date('Y-m-d H:i:s', strtotime($reading['timestamp'])) . "</td></tr>";
                  } else if ($key === "temperature") {
                       echo "<tr><td>" . ucfirst($key) . "</td><td>" . $reading['reading'] . " °C</td><td>" . date('Y-m-d H:i:s', strtotime($reading['timestamp'])) . "</td></tr>";
                  } else if ($key === "humidity") {
                     echo "<tr><td>" . ucfirst($key) . "</td><td>" . $reading['reading'] . " %</td><td>" . date('Y-m-d H:i:s', strtotime($reading['timestamp'])) . "</td></tr>";
     }
}
?>
            </tbody>
        </table>
    </div>

    <script>
        var typeSelect = document.getElementById("type");
        var valueInputsDiv = document.getElementById("value-inputs");
        var lightInputDiv = document.getElementById("light-input");
        var temperatureInputDiv = document.getElementById("temperature-input");
        var humidityInputDiv = document.getElementById("humidity-input");

        // Tüm veri girişlerini başlangıçta gizler
        lightInputDiv.style.display = "none";
        temperatureInputDiv.style.display = "none";
        humidityInputDiv.style.display = "none";

        // Seçilen türe göre uygun veri girişini göster
        typeSelect.addEventListener("change", function() {
            if (typeSelect.value === "light") {
                lightInputDiv.style.display = "block";
                temperatureInputDiv.style.display = "none";
humidityInputDiv.style.display = "none";
} else if (typeSelect.value === "temperature") {
lightInputDiv.style.display = "none";
temperatureInputDiv.style.display = "block";
humidityInputDiv.style.display = "none";
} else if (typeSelect.value === "humidity") {
lightInputDiv.style.display = "none";
temperatureInputDiv.style.display = "none";
humidityInputDiv.style.display = "block";
}
});
</script>

</body>
</html>
