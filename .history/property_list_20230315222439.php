<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$city_name = $_GET["city"];

$sql_1 = "SELECT * FROM cities WHERE name = '$city_name'";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$city = mysqli_fetch_assoc($result_1);
if (!$city) {
    echo "Sorry! We do not have any PG listed in this city.";
    return;
}
$city_id = $city['id'];


$sql_2 = "SELECT * FROM properties WHERE city_id = $city_id";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$properties = mysqli_fetch_all($result_2, MYSQLI_ASSOC);


$sql_3 = "SELECT * 
            FROM interested_users_properties iup
            INNER JOIN properties p ON iup.property_id = p.id
            WHERE p.city_id = $city_id";
$result_3 = mysqli_query($conn, $sql_3);
if (!$result_3) {
    echo "Something went wrong!";
    return;
}
$interested_users_properties = mysqli_fetch_all($result_3, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best PG's in Mumbai | PG Life</title>
    <?php
   include "includes/head.links.php";
   ?>
    <link href="css/property_list.css" rel="stylesheet" />
  </head>
  <body>
  <?php
   include "includes/header.php";
   ?>

   
    <div id="loading">
    </div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb py-2">
        <li class="breadcrumb-item">
          <a href="index.php"> Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Mumbai
        </li>
      </ol>
    </nav>

    <div class="page-container">
      <div class="filter-bar row justify-content-around">
        <div class="col-auto" data-toggle="modal" data-target="#filter-modal">
          <img src="img/filter.png" alt="filter">
          <span>Filter</span>
        </div>
        <div class="col-auto">
          <img src="img/desc.png" alt="short-desc">
          <span>Highest rent first</span>
        </div>
        <div class="col-auto">
          <img src="img/asc.png" alt="short-asc">
          <span>Lowest rent first</span>
        </div>
      </div>
    
       <?php
        foreach ($properties as $property) {
            $property_images = glob("img/properties/" . $property['id'] . "/*");
        ?>

    <div class="property-card row">
      <div class="image-container col-md-4">
        <img src="<?= $property_images[0] ?>">
      
      </div>

      <div class="content-container col-md-8">
        <div class="row no-gutters justify-content-between">
        <?php
                        $total_rating = ($property['rating_clean'] + $property['rating_food'] + $property['rating_safety']) / 3;
                        $total_rating = round($total_rating, 1);
                        ?>
          <div class="star-container" title="<?= $total_rating ?>" >
           <?php
                            $rating = $total_rating;
                            for ($i = 0; $i < 5; $i++) {
                                if ($rating >= $i + 0.8) {
                            ?>
            <i class="fas fa-star"></i>
            <?php
                                } elseif ($rating >= $i + 0.3) {
                                ?>
            <i class="fas fa-star-half-alt"></i>
            <?php
                                } else {
                                ?>
                                    <i class="far fa-star"></i>
                            <?php
                                }
                            }
                            ?>
          </div>
          <div class="interested-container">
          <?php
                            $interested_users_count = 0;
                            $is_interested = false;
                            foreach ($interested_users_properties as $interested_user_property) {
                                if ($interested_user_property['property_id'] == $property['id']) {
                                    $interested_users_count++;

                                    if ($interested_user_property['user_id'] == $user_id) {
                                        $is_interested = true;
                                    }
                                }
                            }
                            if ($is_interested) {
                              ?>
            <i class="far fa-heart"></i>
            <?php
                            } else {
                            ?>
                             <i class="far fa-heart"></i>
                            <?php
                            }
                            ?>
            <div class="interested-text"><?= $interested_users_count ?> interested</div>
          </div>
        </div>

        <div class="detail-container">
          <div class="property-name"><?= $property['name'] ?></div>
          <div class="property-address"><?= $property['address'] ?></div>
          <div class="property-gender">
          <?php
                            if ($property['gender'] == "male") {
                            ?>
            <img src="img/male.png">
             <?php
                            } elseif ($property['gender'] == "female") {
                            ?>
                            <img src="img/female.png" />
                            <?php
                            } else {
                            ?>
                                <img src="img/unisex.png" />
                            <?php
                            }
                            ?>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="rent-container col-6">
           
          <div class="rent">₹ <?= number_format($property['rent']) ?>/-</div>
            <div class="rent-unit">per month</div>
          </div>
          <div class="button-container col-6">
          <a href="property_detail.php?property_id=<?= $property['id'] ?>" class="btn btn-primary">View</a>
          </div>
        </div>

      </div>
    </div>


    
      
    <?php
        }

        if (count($properties) == 0) {
        ?>
            <div class="no-property-container">
                <p>No PG to list</p>
            </div>
        <?php
        }
        ?>
  </div>

  <div class="modal fade" id="filter-modal" tabindex="-1" role="dialog"aria-labelledby="filter-heading" aria-hidden="true">
    <div class="modal-dialoge modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modal-heading">Filters</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <div class="modal-body">
          <h5>Gender</h5>
          <hr/>
          <div>
            <button class="btn btn-outline-dark btn-active">
              No Filter
            </button>
            <button class="btn btn-outline-dark">
              <i class="fas fa-venus-mars"></i>Unisex
            </button>
            <button class="btn btn-outline-dark">
              <i class="fas fa-mars"></i>Male
            </button>
            <button class="btn btn-outline-dark">
              <i class="fas fa-venus"></i>Female
            </button>
          </div>
        </div>

        <div class="modal-footer">
          <button  data-dismiss="modal" class="btn btn-success" >Okay</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog"aria-labelledby="signup-heading" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="signup-heading">Signup with PGLife</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <div class="modal-body">
          <form class="form" role="form" id="signup-form">
            <div class="input-group form-group" >
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="full_name" placeholder="Full Name" maxlength="30" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="fas fa-phone-alt"></i>
                  </span>
              </div>
              <input type="text" class="form-control" name="phone" placeholder="Phone Number" maxlength="10" minlength="10" required>
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>

        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" required>
        </div>

        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-university"></i>
                </span>
            </div>
            <input type="text" class="form-control" name="college_name" placeholder="College Name" maxlength="150" required>
        </div>

        <div class="form-group">
            <span>I'm a</span>
            <input type="radio" class="ml-3" id="gender-male" name="gender" value="male" /> Male
            <label for="gender-male">
            </label>
            <input type="radio" class="ml-3" id="gender-female" name="gender" value="female" />
            <label for="gender-female">
                Female
            </label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Create Account</button>
        </div>
          </form>
        </div>

        <div class="modal-footer">
          <span>Already have an account?
              <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#login-modal">Login</a>
          </span>
      </div>
  </div>
</div>
</div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-heading" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="login-heading">Login with PGLife</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <div class="modal-body">
              <form id="login-form" class="form" role="form">
                  <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-user"></i>
                          </span>
                      </div>
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>

                  <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fas fa-lock"></i>
                          </span>
                      </div>
                      <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" required>
                  </div>

                  <div class="form-group">
                      <button type="submit" class="btn btn-block btn-primary">Login</button>
                  </div>
              </form>
          </div>

          <div class="modal-footer">
              <span>
                  <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signup-modal">Click here</a>
                  to register a new account
              </span>
          </div>
      </div>
  </div>
</div>

<?php 
include "includes/signup_modal.php";
include "includes/login-modal.php";
include "includes/footer.php";
?>

  </body>
</html>
