
$(document).ready(function () {

    if ($('#producer').length) {
      $('#generate-data-btn').on('click', function () {
        $.ajax({
          url: 'generate_sensor_data.php',
          type: 'GET',
          dataType: 'json',
          success: function (data) {
            $('#sensor-reading').text(data.reading);
            $('#sensor-timestamp').text(data.timestamp);
          },
          error: function (xhr, status, error) {
            console.log('Error generating sensor data: ' + error);
          }
        });
      });
    }
  
    if ($('#consumer').length) {
      $('#fetch-data-btn').on('click', function () {
        $.ajax({
          url: 'fetch_sensor_data.php',
          type: 'GET',
          dataType: 'json',
          success: function (data) {
            $('#sensor-reading').text(data.reading);
            $('#sensor-timestamp').text(data.timestamp);
          },
          error: function (xhr, status, error) {
            console.log('Error fetching sensor data: ' + error);
          }
        });
      });
    }
    
  });
  