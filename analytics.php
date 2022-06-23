<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./bargraph.js"></script>
    <link rel="stylesheet" type="text/css" href="graph_styles.css">
  </head>

  <body>
    <h3>Analytics section</h3>

    <aside>
      <div id="search">
        <input id="btnSearch" type="button" value="Search" />
        <label for="txtSearch">Search</label>
        <input type="text" name="txtSearch" id="txtSearch" />
      </div>
    </aside>

    <div id="container" class="container" style="display: block;">
      <div class="firstgraph">
        <!-- Interactive graph for the browser identifiers and normalized exposure score -->
        <canvas id="chart"></canvas>
      </div>
      <div class="secondgraph">
        <canvas id=""></canvas>
      </div>
      <div class="thirdgraph">

      </div>
      <div class="fourthgraph">

      </div>
    </div>
  </body>
</html>
