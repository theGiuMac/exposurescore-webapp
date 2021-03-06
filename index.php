<!DOCTYPE html>

<?php
   session_start();
   if (!isset( $_SESSION['visits'])) {
       $_SESSION['visits'] = 1;
   } else {
       $_SESSION['count']++;
   }
   require "./connectionDB.php";
   $sqlupdate = "UPDATE `visitors` SET visits = visits+1 WHERE id = 1";
   if (!$conn->query($sqlupdate)) echo $conn->error;
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script>
        var _umb = {
            require: {
                chrome: 97,
                safari: 14,
                edge: 93,
                firefox: 91,
                ie: 11,
                opera: 78
            },
            nonCritical: true
        };
        (function(u) {
            var s = document.createElement('script');
            s.async = true;
            s.src = u;
            var b = document.getElementsByTagName('script')[0];
            b.parentNode.insertBefore(s, b);
        })('//updatemybrowser.org/umb.js');
    </script>
    <?php
    //ini_set('display_errors', 1);
    //ini_set('display_startup_errors', 1);
    //error_reporting(E_ALL);
    require "./connectionDB.php";
    require "./agentstrings.php";
    require "./arrays.php";
    require "./extract_useragents_from_browser.php";

    session_start();

    ?>
    <meta charset="utf-8">
    <title>Safe Browsing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585Ach69TLBQObG" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="./newstyle.css">

    <script>
        function loadCalc() {
            var a = document.getElementById("resultCalc").innerText;
            if (a == null || a == "") {
                var x = document.getElementById("loadCalc");
                x.style.display = "block";
            } else {
                var x = document.getElementById("loadCalc");
                x.style.display = "none";
            }

        }
    </script>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        th {
            background-color: #4287f5;
            color: white;
        }
        th,
        td {
            width: 150px;
            text-align: center;
            border: 1px solid black;
            padding: 10px;
        }
      }
    </style>

</head>

<body>
    <ul style="margin-bottom: 10px; text-align: center;">
        <a class="nav-link active" aria-current="page" href="./index.php">
          <img src="./logo1.png" alt="Logo">
        </a>
    </ul>



    <div class="container" id="div1_top">
        <h3 style="text-align: center;">What is my User-Agent?</h3>
        <div class="container-fluid">
            <h5>Your User-Agent is:</h5>
            <div class="container-fluid" style="text-align: center;">
                <p style="font-size: large; background-color: #faeded;">
                    <span>
                        <?php
                        echo $useragent;
                        ?>
                    </span>
                </p>
            </div>
            <div class="container-fluid">
                <p>This page shows you what your web browser is sending in the "User-Agent" header for your HTTP
                    requests.<span> <a href="./infosys.php"> Want to know what headers your browser is sending?</a></span>
                </p>
            </div>
        </div>
        <div class="container-fluid" id="calculating" style="text-align: center;">
            <div class="container-fluid" id="div5">
                <br>
                <form method="post" enctype="multipart/form-data">
                    <input style="background-color:#198754; color:black;" type="submit" onclick="loadCalc()" name="calcScore" class="btn btn-secondary btn-lg" value="Calculate Browser Score" />
                </form>
                <br>
                <div class="loader" id="loadCalc"></div>
                <div class="container-fluid" id="resultCalc">
                    <?php
                    if (isset($_POST['calcScore'])) {
                        require "./calculate.php";
                    }
                    ?>
                </div>
                <div class="container-fluid" id="alternative">
                    <?php
                    if (isset($_POST['calcScore'])) {
                        require "./select_alternative_browser.php";
                    }
                    ?>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <h5>Can i change my User-Agent?</h5>
            <div class="container-fluid" style="text-align: left;">
                <p>It is possible to change or "fake" what your web browser sends as its user agent.
                    Some mobile web browsers will let you change what the browser identifies
                    itself as (ie "Mobile Mode" or "Desktop Mode") in order to access certain
                    websites that only allow desktop computers.
                    If you change this setting, the user agent is what is affected.
                </p>
            </div>
        </div>
        <div class="container-fluid">
            <h5>About us:</h5>
            <div class="container-fluid" style="text-align: left;">
                <p>This score determines the extent to which your privacy is exposed to the violation,
                    by means of our equation that depends on the largest site in the field of leaked vulnerabilities
                    is CVEs by taking CVSS scores in addition to the percentage of leakage by the user agent.
                    From which we get a total of 20 scores. We present it to you and suggest you the best options.


                </p>
            </div>
        </div>
    </div>

    <div id="sfcfaah9bke1fr1pm1m2a7jhf6mblh18541"></div>
    <script type="text/javascript" src="https://counter9.stat.ovh/private/counter.js?c=faah9bke1fr1pm1m2a7jhf6mblh18541&down=async" async></script>
    <noscript><a href="https://www.freecounterstat.com" title="web counter"><img src="https://counter9.stat.ovh/private/freecounterstat.php?c=faah9bke1fr1pm1m2a7jhf6mblh18541" border="0" title="web counter" alt="web counter"></a></noscript>
    

    <ul style="margin-top: 100px; margin-bottom: 25px; text-align: center;">
        <a class="nav-link active" aria-current="page" href="./analytics.php">
            <h3 style="color:black;"><b>Analytics</b></h3>
        </a>
    </ul>


    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" id="footer">
            ?? 2021 Copyright:
            <a class="text-dark" href="./index.php">Research Project</a>
        </div>
    </footer>

</body>

</html>
