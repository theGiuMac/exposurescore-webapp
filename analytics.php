<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./bargraph.js"></script>
    <link rel="stylesheet" type="text/css" href="graph_styles.css">
  </head>

  <body>
    <h1 style="font-size: 6vw">Analytics section</h1>

    <aside>
      <div id="search">
        <p>Search  
        <input id="btnSearch" type="button" value="Search" />
        <input type="text" name="txtSearch" id="txtSearch" />
      </div>
    </aside>


    <div id="container" class="container" style="display: block;">
      <hr width="3" size="500" style="display:inline-block">

      <div class="firstgraph">
        <!-- Interactive graph for the browser identifiers and normalized exposure score -->
        <canvas id="bar-chart"></canvas>
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
