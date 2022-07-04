<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./bargraph.js"></script>
    <script type="text/javascript" src="./polargraph.js"></script>
    <link rel="stylesheet" type="text/css" href="graph_styles.css">
  </head>

  <body>
    <h1 style="font-size: 6vw">Analytics section</h1>

    <div id="sfcfaah9bke1fr1pm1m2a7jhf6mblh18541"></div>
    <script type="text/javascript" src="https://counter9.stat.ovh/private/counter.js?c=faah9bke1fr1pm1m2a7jhf6mblh18541&down=async" async></script>
    <noscript><a href="https://www.freecounterstat.com" title="web counter"><img src="https://counter9.stat.ovh/private/freecounterstat.php?c=faah9bke1fr1pm1m2a7jhf6mblh18541" border="0" title="web counter" alt="web counter"></a></noscript>
    
    <div class="menu">
      <section id="homeButton">
        <a href="https://mybrowserscore.com">
          <img border="0" alt="HomePage" src="./logo1.png" width="250" heigth="250">
        </a>
      </section>
      <section id="searchAttribute">
        <div id="search">
          <input id="btnSearch" type="button" value="Search" />
          <input type="text" name="txtSearch" id="txtSearch" />
        </div>
      </section>
      <section id="deviceForm">
        <form action="#" id="device-form" method="post">
          <label for="device_info">Choose a device attribute identified by the User Agent:</label>
          <select name="device_info" id="device-info">
            <option value="device_name">Device name</option>
            <option value="device_type">Device type</option>
            <option value="device_maker">Device maker</option>
            <option value="device_brand_name">Device brand name</option>
          </select><br>
          <label for="d-i-limit">Number of devices (between 3 and 15):</label>
          <input type="number" id="device-info-limit" name="d-i-limit" min="3" max="15">
          <input type="submit" id="show-graph" value="Show graph">
        </form>
      </section>
    </div>


    <div id="container" class="container" style="display: block;">
      <div class="firstgraph">
        <!-- Interactive graph for the browser identifiers and normalized exposure score -->
        <canvas id="bar-chart"></canvas>
      </div>
      <div class="secondgraph">
        <canvas id="polar-chart"></canvas>
      </div>
      <div class="thirdgraph">

      </div>
      <div class="fourthgraph">

      </div>
    </div>
  </body>
</html>
