<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
      .container {
        width: 100%;
        max-width: 1174px;
        min-width: 0;
        background-color: #f1f1f1;
        box-shadow: 0 1px 3px
                    rgba(0,0,0,0,12), 0 1px 2px
                    rgba(0,0,0,0,24);
        margin: auto;
        margin-top: auto;
        margin-bottom: auto;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        height: auto;
        bottom: auto;
      }

     .firstgraph, .secondgraph {
        width: 50%;
        max-width: 485px;
        min-width: 0;
        background-color: transparent;
        border: 5px solid green;
        float: left;
        padding: 20px;
      }
    </style>

  </head>

  <body>
    <script type="text/javascript" src="./bargraph.js"></script>

    <h3>Analytics section</h3>

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
