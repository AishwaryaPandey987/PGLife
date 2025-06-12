<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Welcomes | PGLife</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
  include "includes/head_links.php";
  ?>
  <link href="css/home.css" rel="stylesheet" />
</head>

<body>
  <?php
  include "includes/header.php";
  ?>

  <div id="loading">

  </div>

  <div class="banner-container">

    <h2 class="white pb-3">Happiness per square Foot</h2>


    <form id="search-form" action="property_list.php" method="GET">
      <div class="input-group  mb-3  location-search">
        <input type="text" class="form-control input-location" id="location" name="location"
          placeholder="Enter your location to search for PGs" />
        <div class="input-group-append">
          <button type="submit" class="btn btn-secondary">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="page-container">
    <h1 class="location-heading">
      Major Locations
    </h1>
    <div class="row">
      <div class="location-card-container col-md">
        <a href="property_list.php?location=Katra">
          <div class="location-card rounded-circle">
            <img src="img/anandbhawan.jpg" class="location-img" />
             <h6>Katra</h6>
          </div>
        </a>
      </div>

      <div class="location-card-container col-md">
        <a href="property_list.php?location=Teliyerganj">
          <div class="location-card rounded-circle">
            <img src="img/curzonbridge.jpeg" class="location-img" />
            <h6>Teliyerganj</h6>
          </div>
        </a>
      </div>
      <div class="location-card-container col-md">
        <a href="property_list.php?location=Alopi">
          <div class="location-card rounded-circle">
            <img src="img/Alopi.png" class="location-img" />
            <h6>Alopi</h6>
          </div>
        </a>
      </div>
      <div class="location-card-container col-md">
        <a href="property_list.php?location=Civil Lines">
          <div class="location-card rounded-circle">
            <img src="img/civillines.png" class="location-img" />
            <h6>Civil Lines</h6>
          </div>
        </a>
      </div>
      <div class="location-card-container col-md">
        <a href="property_list.php?location=Soraon">
          <div class="location-card rounded-circle">
            <img src="img/ldc.png" class="location-img" />
            <h6>Soraon</h6>
          </div>
        </a>
      </div>
    </div>
  </div>
  </div>
  </div>
  <?php
  include "includes/signup_modal.php";
  include "includes/login_modal.php";
  include "includes/footer.php";
  ?>

</body>

</html>