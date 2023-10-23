<?php
session_start();
// echo "<script>alert($_SESSION[stock_index])<script>";
require('./main/connection.php');
// $query = "UPDATE `watchlist` SET `stock1`=null,`stock2`=null,`stock3`=null,`stock4`=null,`stock5`=null,`stock6`=null,`stock7`=null,`stock8`=null,`stock9`=null',`stock10`=null WHERE `username`= messi";
// mysqli_query($con,$query);
// $_SESSION['loggedIn'] = "1";
// $_SESSION['stock_index'] = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lightstox</title>
  <link rel="shortcut icon" href="images/statistics.png" type="image/x-icon">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.4.5/themes/satellite-min.css" integrity="sha256-TehzF/2QvNKhGQrrNpoOb2Ck4iGZ1J/DI4pkd2oUsBc=" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family= :ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.4.5/themes/satellite-min.css" integrity="sha256-TehzF/2QvNKhGQrrNpoOb2Ck4iGZ1J/DI4pkd2oUsBc=" crossorigin="anonymous" />
  <!-- Hotjar Tracking Code for my site -->
  <script>
    (function(h, o, t, j, a, r) {
      h.hj = h.hj || function() {
        (h.hj.q = h.hj.q || []).push(arguments)
      };
      h._hjSettings = {
        hjid: 3316116,
        hjsv: 6
      };
      a = o.getElementsByTagName('head')[0];
      r = o.createElement('script');
      r.async = 1;
      r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
      a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
  </script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark border-bottom border-success" id="mainnavbar">
    <div class="container-fluid">
      <img src="images/v22.png" alt="" width="140">
      <button class="navbar-toggler" id="navtog" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 ml-auto">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="about/">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="contact/">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" data-bs-toggle="offcanvas" href="#offcanvasWithBothOptions" role="button" aria-controls="offcanvasWithBothOptions"><?php if (isset($_SESSION['username'])) echo "Watchlist"; ?></a>
          </li>
          <li class="nav-item login2">
            <a class="nav-link" aria-current="page" href="main/login.php"><?php if (!(isset($_SESSION['username']))) echo "Login"; ?></a>
          </li>
          <!-- text-dark -->
          <?php
          if (isset($_SESSION['username'])) { ?>
            <form action="logout.php" method="post">
              <li class="nav-item login2">
                <div class="mr-1 w-64 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none d-flex flex-col hidden" id="user-menu2" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 d-flex" role="menuitem" tabindex="-1" id="user-menu-item-0"><svg xmlns="http://www.w3.org/2000/svg" height="20" fill="#000000" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>&nbsp;&nbsp;<?php echo "$_SESSION[username]" ?></a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 d-flex" role="menuitem" tabindex="-1" id="user-menu-item-1"><svg xmlns="http://www.w3.org/2000/svg" height="20" fill="#000000" class="bi bi-envelope" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>&nbsp;&nbsp;<?php echo "$_SESSION[email]" ?></a>
                  <button type="submit" class="btn btn-success mx-4">Sign Out</button>
                </div>
              </li>
            </form>
          <?php
          }
          ?>


          <button type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm bg-transparent focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" height="27" fill="#799187" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
          </button>


          <!-- profile card desktop start -->
          <?php
          if (isset($_SESSION['username'])) { ?>
            <form action="logout.php" method="post">
              <div class="absolute right-0 z-10 mt-12 mr-1 w-64 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden d-flex flex-col" id="user-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 d-flex" role="menuitem" tabindex="-1" id="user-menu-item-0"><svg xmlns="http://www.w3.org/2000/svg" height="20" fill="#000000" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                  </svg>&nbsp;&nbsp;<?php echo "$_SESSION[username]" ?></a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 d-flex" role="menuitem" tabindex="-1" id="user-menu-item-1"><svg xmlns="http://www.w3.org/2000/svg" height="20" fill="#000000" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                  </svg>&nbsp;&nbsp;<?php echo "$_SESSION[email]" ?></a>

                <button type="submit" class="btn btn-dark mx-4">Sign Out</button>
              </div>
            </form>
          <?php
          }
          ?>
          <!-- profile card desktop end -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar Close -->







  <section class="ttpar">

    <?php
    if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
      echo '<div class="mc-alert pt-1">
  <h6 style="margin-left: auto!important;"><span id="mctxt">Market is closed!</span> Charts will go live in 
  <span id="days"></span>D : <span id="hours"></span>H : <span id="minutes"></span>M : <span id="seconds"></span>S
  </h6>
  <button style="margin-left: auto!important;" class="mr-2 mb-2" id="mc-alert-button"><svg xmlns="http://www.w3.org/2000/svg" height="40" fill="#ffffff" viewBox="0 96 960 960" width="20"><path d="M480.333 650.333 289 841.666q-16 16-37.667 16-21.666 0-36.999-16-16-15.333-16-36.833 0-21.499 16-36.833l191.333-192.333-191.333-191.334Q199 369 199 347.167q0-21.834 15.334-37.167 14.333-15.333 36.333-15.333 21.999 0 37.999 15.333L480 502.001l191.667-192.667Q687 294 708.667 294q21.666 0 37.666 15.334 15.333 15.999 15.333 37.666 0 21.666-15.333 37l-192 191.333 191.333 192.001q16 16 16 37.666 0 21.667-16 36.666-14.999 16-36.999 16t-36.333-16L480.333 650.333Z"/></svg></button>
  </div>
  ';
    }
    ?>


    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container" style="pointer-events: none;">
      <div class="tradingview-widget-container__widget"></div>
      <div class="tradingview-widget-copyright hidden">
        <a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank">
          <span class="blue-text">Markets today</span>
        </a>
        by TradingView
      </div>
      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
        {
          "symbols": [{
              "description": "IRCTC",
              "proName": "BSE:IRCTC"
            },
            {
              "description": "UPL",
              "proName": "BSE:UPL"
            },
            {
              "description": "ABBOTIND",
              "proName": "BSE:ABBOTINDIA"
            },
            {
              "description": "ADANIPOWER",
              "proName": "BSE:ADANIPOWER"
            },
            {
              "description": "ADANIENT",
              "proName": "BSE:ADANIENT"
            },
            {
              "description": "ADANIGREEN",
              "proName": "BSE:ADANIGREEN"
            },
            {
              "description": "ADANIPORTS",
              "proName": "BSE:ADANIPORTS"
            },
            {
              "description": "HDFC",
              "proName": "BSE:HDFCBANK"
            },
            {
              "description": "HINDUNILVR",
              "proName": "BSE:HINDUNILVR"
            },
            {
              "description": "GAIL",
              "proName": "BSE:GAIL"
            },
            {
              "description": "",
              "proName": "BSE:GODREJCP"
            },
            {
              "description": "",
              "proName": "BSE:HINDALCO"
            },
            {
              "description": "",
              "proName": "BSE:ICICIBANK"
            },
            {
              "description": "",
              "proName": "BSE:INFY"
            },
            {
              "description": "",
              "proName": "BSE:TCS"
            },
            {
              "description": "",
              "proName": "BSE:LTTS"
            },
            {
              "description": "",
              "proName": "BSE:SBIN"
            },
            {
              "description": "",
              "proName": "BSE:TATAMOTORS"
            },
            {
              "description": "",
              "proName": "BSE:WIPRO"
            },
            {
              "description": "",
              "proName": "BSE:HINDPETRO"
            },
            {
              "description": "",
              "proName": "BSE:GUJGAS"
            },
            {
              "description": "",
              "proName": "BSE:ITC"
            },
            {
              "description": "",
              "proName": "BSE:IDFCFIRSTB"
            },
            {
              "description": "",
              "proName": "BSE:JSWSTEEL"
            },
            {
              "description": "",
              "proName": "BSE:JSWENERGY"
            },
            {
              "description": "",
              "proName": "BSE:JUBLFOOD"
            },
            {
              "description": "",
              "proName": "BSE:TATACHEM"
            },
            {
              "description": "",
              "proName": "BSE:TATASTEEL"
            },
            {
              "description": "",
              "proName": "BSE:YESBANK"
            },
            {
              "description": "",
              "proName": "BSE:ZOMATO"
            },
            {
              "description": "",
              "proName": "BSE:VEDL"
            },
            {
              "description": "",
              "proName": "BSE:ULTRACEMCO"
            },
            {
              "description": "",
              "proName": "BSE:WHIRLPOOL"
            },
            {
              "description": "",
              "proName": "BSE:TECHM"
            },
            {
              "description": "",
              "proName": "BSE:POLYCAB"
            },
            {
              "description": "",
              "proName": "BSE:RELIANCE"
            },
            {
              "description": "",
              "proName": "BSE:HAVELLS"
            },
            {
              "description": "",
              "proName": "BSE:HEROMOTOCO"
            },
            {
              "description": "",
              "proName": "BSE:DRREDDY"
            },
            {
              "description": "",
              "proName": "BSE:DELHIVERY"
            },
            {
              "description": "",
              "proName": "BSE:CROMPTON"
            },
            {
              "description": "",
              "proName": "BSE:COALINDIA"
            },
            {
              "description": "",
              "proName": "BSE:CIPLA"
            },
            {
              "description": "",
              "proName": "BSE:CANBK"
            },
            {
              "description": "",
              "proName": "BSE:BRITANNIA"
            },
            {
              "description": "",
              "proName": "BSE:AIRTELPP"
            },
            {
              "description": "",
              "proName": "BSE:BANKINDIA"
            },
            {
              "description": "",
              "proName": "BSE:BERGEPAINT"
            },
            {
              "description": "",
              "proName": "BSE:BANKBARODA"
            },
            {
              "description": "",
              "proName": "BSE:BAJAJ_AUTO"
            },
            {
              "description": "",
              "proName": "NSE:BAJFINANCE"
            },
            {
              "description": "",
              "proName": "BSE:AXISBANK"
            },
            {
              "description": "",
              "proName": "BSE:ASIANPAINT"
            },
            {
              "description": "",
              "proName": "BSE:AMBUJACEM"
            },
            {
              "description": "",
              "proName": "BSE:ABCAPITAL"
            },
            {
              "description": "",
              "proName": "BSE:APOLLOHOSP"
            },
            {
              "description": "",
              "proName": "BSE:ADANITRANS"
            }
          ],
          "showSymbolLogo": true,
          "colorTheme": "dark",
          "isTransparent": true,
          "displayMode": "adaptive",
          "locale": "en"
        }
      </script>
    </div>
    <!-- TradingView Widget END -->
  </section>



  <!-- Watchlist code start -->
  <?php
  if (isset($_SESSION['username'])) { ?>
    <section class="h-100">
      <div class="offcanvas offcanvas-start text-bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Watchlist</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

          <?php
          // $apiikey = "95W9S19AZQ0PL1SG";
          $allData = "SELECT * FROM `watchlist` WHERE `username`='$_SESSION[username]'";
          $result = mysqli_query($con, $allData);
          $result_fetch = mysqli_fetch_assoc($result);
          foreach ($result_fetch as $key => $stock) {
            if (!($key == 'username') && !($stock == null)) {



              echo "<div class='d-flex flex-row justify-between border-bottom border-secondary mt-3'>
              <form method='post' action='index.php'><input class='hidden' name='stockname' value=$stock><button type='submit'><h5>$stock</h5></button></form>
              <form method='post' action='watchlist/delete.php'>
              <button type = 'submit' name='delete'>" . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>' . "</button>
            <input type='hidden' value=$stock name='delete_stock'>
              </form>
              </div>";
            }
          }



          ?>

        </div>
      </div>
    </section>

  <?php
  }
  ?>
  <!-- Watchlist code end -->





  <!-- form front -->
  <section id="lp" class="d-flex justify-center aligh-center items-center flex-col">
    <div class="lpquote" id="lpquote">
      <h1>#MONEYNEVERSLEEPS</h1>
    </div>
  </section>









  <!-- Form -->
  <div class="mb-3 lpheaderpar d-flex items-center flex-col">
    <div class="gh1">
      <h1 class="gradienth1">Search your next moneyrise stockxx!!!###</h1>
    </div>
    <div class="gh2">
      <h1 class="gradienth1">Search your next stockxx!!!###</h1>
    </div>
    <div class="gh3">
      <h1 class="gradienth1 mb-2">Search next stocxx!!!##</h1>
    </div>
    <div class="gh4">
      <h1 class="gradienth1 mb-2">Search!!!##</h1>
    </div>
    <header id="lpheader">
      <div id="search-box"></div>
    </header>
    <main id="lpmain" class="hidden">
      <div id="hits"></div>
      <div id="pagination"></div>
    </main>
    <script type="text/html" id="hit-template">
      <div class="hit">
        <form class="hit-name" id="hitid" action="index.php" method="post" onsubmit="document.addEventListener('load',()=>{alert('devaj bhadva hai')});">

          <input name="stockname" class="hidden" value="{{Security Id}}">
          <button class="mainsubmitbtn" type="submit">
            {{Security Name}}
            <h2 class="m-0">
              {{#helpers.highlight}}{ "attribute": "Security Id" }{{/helpers.highlight}}
            </h2>
          </button>

      </div>
    </script>
  </div>



  <!-- saved button code -->
  <?php
  if (isset($_SESSION['username'])) { ?>
    <form action="watchlist/watchlist.php" method="post">
      <button class="watchlistpar mr-2 px-4 py-1 my-1">
        <h5 class="text-white d-flex">
          <svg xmlns="http://www.w3.org/2000/svg" height="25" fill="#ffffff" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
            <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z" />
          </svg>&nbsp;Save
          <?php $stockname = 'TCS';
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $stockname = $_POST['stockname'];
          }
          echo $stockname; ?>
        </h5>

        <h5 class="text-white d-flex hidden">
          <svg xmlns="http://www.w3.org/2000/svg" height="25" fill="#ffffff" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z" />
          </svg>&nbsp;Saved!
        </h5>
      </button>
      <input type="hidden" name="stockname" value=<?= $stockname ?>>
      <input type="hidden" name="username" value=<?= $_SESSION['username'] ?>>
    </form>
  <?php
  }
  ?>





  <section id="stockintro">

    <!-- TradingView Widget BEGIN -->
    <?php
    // Add this line only in production mode
    error_reporting(E_ERROR | E_PARSE);
    $stockname = 'TCS';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $stockname = $_POST['stockname'];
    }

    echo '<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright hidden"><a href="https://www.tradingview.com/symbols/BSE-HIPOLIN/" rel="noopener" target="_blank"><span class="blue-text">HIPOLIN price today</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js" async>
    {
      "symbol": "BSE:' . $stockname . '",
      "width": "100%",
      "locale": "en",
      "colorTheme": "dark",
      "isTransparent": false
    }
  </script>
</div>';

    ?>
    <!-- TradingView Widget END -->
  </section>







  <!-- Chart Start -->
  <?php
  // Add this line only in production mode
  error_reporting(E_ERROR | E_PARSE);
  $stockname = 'TCS';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stockname = $_POST['stockname'];
  }

  echo '
  <div class="tradingview-widget-container chartmain">
    <div id="tradingview_02441"></div>
    <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/BSE-TCS/" rel="noopener" target="_blank"><span class="blue-text">TCS Chart</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
      new TradingView.widget({
        "width": "100%",
        "height": "100%",
        "symbol": "BSE:' . $stockname . '",
        "interval": "1",
        "timezone": "Asia/Kolkata",
        "theme": "dark",
        "style": "1",
        "locale": "in",
        "toolbar_bg": "#f1f3f6",
        "enable_publishing": false,
        "container_id": "tradingview_02441"
      });
    </script>
  </div>';


  ?>
  <!-- Chart End -->





  <section id="sect2">




    <div id="profile">
      <!-- TradingView Widget BEGIN -->
      <?php
      // Add this line only in production mode
      error_reporting(E_ERROR | E_PARSE);
      $stockname = 'TCS';
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $stockname = $_POST['stockname'];
      }

      echo '<div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NSE-TCS/" rel="noopener" target="_blank"><span class="blue-text">TCS key facts</span></a> by TradingView</div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-profile.js" async>
          {
            "width": "100%",
            "height": "100%",
            "colorTheme": "dark",
            "isTransparent": false,
            "symbol": "BSE:' . $stockname . '",
            "locale": "en"
          }
        </script>
      </div>';
      ?>
    </div>





    <div id="mmi">

      <?php
      // Add this line only in production mode
      error_reporting(E_ERROR | E_PARSE);
      $stockname = 'TCS';
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $stockname = $_POST['stockname'];
      }

      echo '<div class="tradingview-widget-container"><div class="tradingview-widget-container__widget"></div><div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/NASDAQ-AAPL/technicals/" rel="noopener" target="_blank"><span class="blue-text">Technical Analysis for AAPL</span></a> by TradingView</div><script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>{
    "interval": "1m",
    "width": "100%",
    "isTransparent": false,
    "height": "100%",
    "symbol": "BSE:' . $stockname . '",
    "showIntervalTabs": true,
    "locale": "in",
    "colorTheme": "dark"
  }
  </script>
  </div>';
      ?>
    </div>


  </section>




  <section id="fundapar">
    <div id="funda">
      <?php
      $key = "RLQNJ35SEX76N8S9";
      $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=" . $stockname . ".BSE&apikey=" . $key;
      $json = file_get_contents($url);
      $result = json_decode($json, true);
      $lrdate = $result["Meta Data"]["3. Last Refreshed"];

      $key2 = "b0da2d529d445d557b38d1de51a7bf9ce00da03b685a0dd18fb6a08af0923de0";
      $url2 = "https://api.stockmarketapi.in/api/v1/allstocks?token=" . $key2;
      $json2 = file_get_contents($url2);
      $result2 = json_decode($json2, true);

      ?>
      <div class="container px-5 py-12 sm:px-4 sm:py-6 bg-black text-white">
        <div class="flex flex-wrap text-center">
          <div class="flex flex-col text-center w-full">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-white mb-1 mt-8">
              Statistics
            </h1>
          </div>
          <div class="p-4 sm:w-1/4 w-1/2 statitem">
            <h2 class="title-font font-medium sm:text-3xl text-3xl text-white">
              <?php echo $result["Time Series (Daily)"][$lrdate]["1. open"]; ?>
            </h2>
            <p class="leading-relaxed">Open</p>
          </div>
          <div class="p-4 sm:w-1/4 w-1/2 statitem">
            <h2 class="title-font font-medium sm:text-3xl text-3xl text-white">
              <?php echo $result["Time Series (Daily)"][$lrdate]["2. high"]; ?>
            </h2>
            <p class="leading-relaxed">High</p>
          </div>
          <div class="p-4 sm:w-1/4 w-1/2 statitem">
            <h2 class="title-font font-medium sm:text-3xl text-3xl text-white">
              <?php echo $result["Time Series (Daily)"][$lrdate]["3. low"]; ?>
            </h2>
            <p class="leading-relaxed">Low</p>
          </div>
          <div class="p-4 sm:w-1/4 w-1/2 statitem">
            <h2 class="title-font font-medium sm:text-3xl text-3xl text-white">
              <?php echo $result["Time Series (Daily)"][$lrdate]["4. close"]; ?>
            </h2>
            <p class="leading-relaxed">Close</p>
          </div>
          <div class="p-4 sm:w-1/4 w-1/2 statitem">
            <h2 class="title-font font-medium sm:text-3xl text-3xl text-white">
              <?php echo $result["Time Series (Daily)"][$lrdate]["5. adjusted close"]; ?>
            </h2>
            <p class="leading-relaxed">Adjusted Close</p>
          </div>
          <div class="p-4 sm:w-1/4 w-1/2 statitem">
            <h2 class="title-font font-medium sm:text-3xl text-3xl text-white">
              <?php echo $result["Time Series (Daily)"][$lrdate]["6. volume"]; ?>
            </h2>
            <p class="leading-relaxed">Volume</p>
          </div>
          <div class="p-4 sm:w-1/4 w-1/2 statitem">
            <h2 class="title-font font-medium sm:text-3xl text-3xl text-white">
              <?php echo $result["Time Series (Daily)"][$lrdate]["7. dividend amount"]; ?>
            </h2>
            <p class="leading-relaxed">Dividend Amount</p>
          </div>
          <div class="p-4 sm:w-1/4 w-1/2 statitem">
            <h2 class="title-font font-medium sm:text-4xl text-3xl text-white">
              <?php echo $result["Time Series (Daily)"][$lrdate]["8. split coefficient"]; ?>
            </h2>
            <p class="leading-relaxed">Split Coefficient</p>
          </div>
        </div>
        <h6 class="text-success ">Last Refreshed : <?php echo $lrdate; ?></h6>
      </div>

    </div>

  </section>





  <section id="fundamentals">
    <!-- TradingView Widget BEGIN -->
    <?php
    // Add this line only in production mode
    error_reporting(E_ERROR | E_PARSE);
    $stockname = 'TCS';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $stockname = $_POST['stockname'];
    }

    echo '<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NSE-RELIANCE/financials-overview/" rel="noopener" target="_blank"><span class="blue-text">RELIANCE fundamentals</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-financials.js" async>
      {
        "colorTheme": "dark",
        "isTransparent": false,
        "largeChartUrl": "",
        "displayMode": "regular",
        "width": "100%",
        "height": "830",
        "symbol": "BSE:' . $stockname . '",
        "locale": "en"
      }
    </script>
  </div>';
    ?>
  </section>
  <!-- TradingView Widget END -->





  <div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright hidden"><a href="https://in.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Quotes</span></a> by TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
      {
        "symbols": [{
            "description": "SENSEX",
            "proName": "INDEX:SENSEX"
          },
          {
            "description": "USDINR",
            "proName": "FX_IDC:USDINR"
          },
          {
            "proName": "BITSTAMP:BTCUSD",
            "title": "Bitcoin"
          },
          {
            "proName": "FOREXCOM:SPXUSD",
            "title": "S&P 500"
          },
          {
            "proName": "FOREXCOM:NSXUSD",
            "title": "US 100"
          }
        ],
        "colorTheme": "dark",
        "isTransparent": false,
        "showSymbolLogo": true,
        "locale": "in"
      }
    </script>
  </div>





  <!-- Contact Start -->
  <section id="contactpar">
    <div class="contactcontainer">
      <h1>
        Subscribe to our Email Newsletter
      </h1>
      <form action="submit.php" method="post" class="contact">
        <div class="mb-3 contactch">
          <input type="email" name="email" class="form-control" id="newsemail" placeholder="Enter the Alpha Email">
          <input class="btn btn-primary" name="subscribe" type="submit" value="Subscribe!" id="newsemailbtn">
        </div>
      </form>
    </div>
  </section>





  <!-- Footer Start -->
  <footer class="text-gray-400 bg-gray-900 body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-white" href="#">
        <img src="images/v22.png" alt="" width="140" class="mt-2">
      </a>
      <p class="text-sm text-gray-400 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">Developed by Himaj, Devaj and Jay
        <!-- <a href="https://github.com/HimajPatil/" class="text-gray-500 ml-1" target="_blank" rel="noopener noreferrer">@himajpatil</a> -->
      </p>
      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
        <a class="text-gray-400">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-400">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-400">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-400">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
      </span>
    </div>
  </footer>





</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.14.2/dist/algoliasearch-lite.umd.js" integrity="sha256-dImjLPUsG/6p3+i7gVKBiDM8EemJAhQ0VvkRK2pVsQY=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.49.1/dist/instantsearch.production.min.js" integrity="sha256-3s8yn/IU/hV+UjoqczP+9xDS1VXIpMf3QYRUi9XoG0Y=" crossorigin="anonymous"></script>
<script src="script/app.js"></script>
<script src="script/script.js"></script>

</html>