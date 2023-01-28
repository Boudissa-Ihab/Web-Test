<?php require("backend.php") ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Web Test</title>
  <link rel="stylesheet" href="style.css">
  <?php
	 	if(array_key_exists("num1", $num_errors) && $num_errors["num1"] != null)
	 		?> <style>.error{display:block}</style> <?php
	 	if(array_key_exists("num2", $num_errors) && $num_errors["num2"] != null)
	 		?> <style>.error{display:block}</style> <?php
	 	if(array_key_exists("num3", $num_errors) && $num_errors["num3"] != null)
	 		?> <style>.error{display:block}</style> <?php
	?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" 
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
  <!-- Instead of installing ApexCharts, we include it directly using a CDN -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
  <div class="container">
    <h1>Web test</h1>
    <form action="backend.php" method="post" id="form">
      <div class="row">
        <div class="col-20">
          <label>Number 1 : </label>
        </div>
        <div class="col-80">
          <input type="number" id="num1" name="params[0]" min="0" max="100" step=".01" required />
          <p class="num1-message error">
            <?php if(array_key_exists("num1", $num_errors) && $num_errors["num1"] != null): ?>
              <?php echo $num_errors["num1"]; ?>
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label>Number 2 : </label>
        </div>
        <div class="col-80">
          <input type="number" id="num2" name="params[1]" min="0" max="100" step=".01" required />
          <p class="num2-message error">
            <?php if(array_key_exists("num2", $num_errors) && $num_errors["num2"] != null): ?>
              <?php echo $num_errors["num2"]; ?>
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-20">
          <label>Number 3 : </label>
        </div>
        <div class="col-80">
          <input type="number" id="num3" name="params[2]" min="0" max="100" step=".01" required />
          <p class="num3-message error">
            <?php if(array_key_exists("num3", $num_errors) && $num_errors["num3"] != null): ?>
              <?php echo $num_errors["num3"]; ?>
            <?php endif; ?>
          </p>
        </div>
      </div>
      <div class="row">
        <button type="submit" name="submit" onclick="formSubmit()">Submit</button>
      </div>
    </form>
    <div id="chart"></div>
  </div>

  <script>
    $(document).submit((e) => e.preventDefault())

    const formSubmit = () => {
      let inputs = document.getElementsByTagName("input");
      let numbers = {};
      // Get values of all inputs number we have (in this example we have 3 only)
      for (let i = 0; i < inputs.length; i++)
        numbers["num" + (i + 1)] = parseFloat(document.getElementById("num" + (i + 1)).value);

      // Send an ajax request to backend with numbers as payload
      $.ajax({
        data: {
          ...numbers
        },
        type: "post",
        url: "backend.php",
        success: (result) => {
          // Before showing the chart, we empty the content of the div
          // We do this in order not to paint the div multiple times
          document.getElementById("chart").innerHTML = "";
          
          // We provide several options in order to display the chart
          var options = {
            chart: {
              // The type of chart, it can be "line", "column", "heat map" etc...
              type: 'bar',
              height: 350,
              width: 350
            },
            plotOptions: {
              bar: {
                // Direction of the bars, whether it's horizontally or vertically
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
              },
            },
            stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
            },
            // Data representing each column
            series: [{
              name: 'categories',
              data: [...Object.values(numbers), result]
            }],
            // Labels displayed under the x-axis for each column
            xaxis: {
              categories: [...Object.keys(numbers), "average"]
            }
          }
          var chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();
        }
      });
    }
  </script>
</body>

</html>