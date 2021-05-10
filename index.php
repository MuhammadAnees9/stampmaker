<?php
//session_start();

include_once('inc/header.php');

?>

<style type="text/css">

  @media screen and (max-width: 768px) {
  .wrapper {
    margin-top: 6em;
  }
  .canvas-col {
    margin-top: 1.5em;
    -ms-flex: 0 0 30%;
    flex: 0 0 30%;
    max-width: 30%;
  }
  .canvas-col .col-md-8{
    max-width: 100%;
    flex: 0 0 100%;
  }
  #properties {
    -ms-flex: 0 0 35%;
    flex: 0 0 30%;
    max-width: 30%;
  }
  #labels-container {
    margin-top: 1.5em;
  }
  .desktop-view {
    display: none;
  }
  .mobile-view {
    display: block;
    position: relative;
    left: 0px;
    bottom: 0.8em;
  }
  .left-banner, .right-banner {
    display: none;
  }
  .instruction .btn {
    width: 12.5em;
  }
  h1 {
    font-size: 2rem;
  }
  /* .brand {
    display: flex;
    justify-content: flex-end;
    align-items: center;
  } */
  .brand {
    text-align: left !important;
    justify-content: flex-start;
  }
  .btns-wrapper {
    padding-top: 0px;
    margin-bottom: 10px;
  }

  .mt-2 .editor-btn{
    max-width: 100%;
    flex: 0 0 100%;
  }

  .labels-card {
    max-height: 100%;
    height: 100%;
  }

  .btns {
    position: absolute;
    top: -5.7em;
    left: 0;
    width: 100%;
  }

  .btns-wrapper .btn {
    width: 120px;
  }

  .list-group {
    width: 80%;
    margin: auto;
  }

  .list-group {
    flex-direction: row;
  }
  .list-group-item, .list-group-item:nth-child(2) {
    width: 150px;
  }
  #stageparent {
    width: 100% !important;
    height: 21em !important;
    padding-top: 0.5em;
  }
  #container {
    width: 90% !important;
    height: 18em !important;
  }
  #labels {
    padding: 0px 5px;
  }
  .canvas-btns {
    bottom: 0;
  }
  .properties-wrapper h5 {
    display: none;
  }
  .slidecontainer p,
  .slidecontainer input {
    margin: 0px;
  }
  .download-btn {
    position: absolute;
    left: calc(50% - 68px);
  }
  /* .canvas {
    margin-top: 10px;
  } */
  .right-panel {
    margin-top: 20px;
  }
  .brand h1 {
    font-size: 1.6em;
    margin-left: 10px;
  }

  .bottomright {
    width: 45%;
    right: 0;
    bottom: 0;
  }

  .bottomleft {
    width: 45%;
  }

  .card-body {
    padding: 0.4rem; }

}

@media screen and (max-device-width: 480px) {
  .header{
    padding: 15px 0px 0px;
  }

  .canvas-col {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%;
    margin-left: 20px;
  }

  .top-logo{
    margin-bottom: -60px;
    width: 90px;
  }

  .top-logo-name{
    padding-left: 0px!important;
  }

  .header-navbar-buttons h6{
    margin: 20px 0px!important;
  }

  .wrapper {
    margin-top: 5em;
  }

  #properties {
    -ms-flex: 0 0 21%;
    flex: 0 0 100%;
    max-width: 100%;
  }

  .property h3{
    font-size: 27px;
  }

  .d-inline{
      font-size: 1.85em!important;
      margin-left: 10px;
  }

  .btns-wrapper .btn {
    width: 90px;
    height: 35px;
    line-height: 20px;
    /* margin-left: 10px; */
    color: #fff;
    margin-top: 0px!important;
    margin: 10px!important;
   }

   #labels-container {
    margin-top: 40px;
    padding-left: 0px;
    overflow: auto;
    height: 32em;
   }

   .download-btn {
      position: absolute;
      top: -105px;
      left: calc(50% - 68px);
    }

   #downloads{
    padding: 5px 10px;
   }

   .canvas-col{
    padding-left: 0px;
    margin-top: 120px;
   }

   .list-group .btn{
    padding: 0px;
   }

   .closeL{
    font-size: 14px!important;
   }

   .closeL img{
    display: none;
   }

   .elementlabel{
    font-size: 14px;
    padding: 5px 1px;
   }

   .move-up-element, .move-down-element{
    font-size: 13px;
   }

   .list-group{
    width: 80%;
    margin: 0 auto;
   }

   .list-group-item {
     width: 90px;
    }

    .list-group-item, .list-group-item:nth-child(2) {
      width: 70px;
    }

   .editor-btn{
    padding: 5px;
    flex: 0 0 100%;
    max-width: 100%;
   }

   .editor-btn-lt {
      flex: 0 0 100%;
      max-width: 100%;
   }

   .btns {
      left: 0;
      width: 100%!important;
      border: none;
    }

   .icon-btn {
      display: block; 
    }

    .right-panel {
        margin-top: 20px;
        margin-bottom: 70px;
    }

    .labels-card {
      max-height: 30.7em;    
    }

    #stageparent {
      width: 100% !important;
      height: 21.8em !important;
      padding-top: 1em;
  }
}

@media screen and (max-width: 350px) {
  h1 {
    font-size: 1.5em !important;
  }
  .brand {
    padding: 0px;
  }
  #stageparent {
    width: 100% !important;
    height: 16em !important;
    padding-top: 0.5em;
  }
  #container {
    width: 90% !important;
    height: 13em !important;
  }
  .instruction {
    position: relative;
    top: -85px !important;
  }
  .instruction .btn {
    width: 10em !important;
  }
}
</style>

<!-- <div id="measure"></div> -->
<header class="header">
    <div class="container-fluid" style="margin: 0px; padding: 0px;">
        <div class="row" style="margin: 0px; padding: 0px;">
            <div class="col-lg-8 col-md-7 col-sm-5 text-center top-logo-name d-flex text-white brand">
                <img class="d-inline top-logo" src="assets/img/Logo.svg" width="120px" />
                <h1 class="d-inline">My Stamp Maker</h1>
                <!-- <a href="pageMaker/index.html">Second Page</a> -->

            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 header-navbar-buttons">
                <div class="btns-wrapper">
                    <!-- <p class="mt-4">
                        <a href="pageMaker/" class="text-white" style="text-decoration: none;">Create Page</a>
                    </p> -->
                    <?php
                    getNav();
                    function getNav()
                    {
                        if (isset($_SESSION["uid"])) {

                            $d = $_SESSION["uid"];
                            echo "<h6 style='margin:20px; color: #ececec;'>Welcome, " . $d['username'] . "</h6><button class='btn btn-outline-warning' onclick='logout()' style='height:40px;margin:20px;'>Log Out</button>";
                            if ($d['role'] == "admin") {
                                // echo "<button class='btn btn-outline-warning' onclick='Dashboard()' style='height:40px;margin:20px;'>Dashboard</button>";
                                echo "<a class='btn btn-outline-warning' href='admin' style='height:40px;margin:20px;'>Dashboard</a>";
                            }
                        } else {
                            echo "<button type='button' class='btn btn-outline-warning signup-btn' data-toggle='modal' data-target='#myModal'>Sign Up</button><button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#myModalLogin' style='height:40px;margin:20px;' onclick='reset()'>Log In</button>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</header>
<div class="container-fluid content-body">
    <div class="row mt-lg-4 wrapper" style="position: relative;">
        <div class="left-panel">
          <div class="row">
          <div class="btns col-md-5" style="padding:0px;">
            <ul class="list-group">
                <li class="list-group-item">

                    <a class="btn o icon-btn" id="addroundtext" title="Text Around The Circle">
                        <img src="assets/img/IconRound.svg" alt="">
                        <span style="color:black; text-align:left">Round Text</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a class="btn o icon-btn" id="addlinetext" title="Line Text">
                        <img src="assets/img/IconLine.svg" alt="">
                        <span style="color:black; text-align:left">Line Text</span>

                    </a>
                </li>
                <li class="list-group-item">
                    <a class="btn o icon-btn" id="addcircle" title="Circle">
                        <img src="assets/img/IconShape.svg" alt="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="#000000" d="M125 15c-61,0 -110,49 -110,110 0,61 49,110 110,110 7,0 13,0 20,-1 -7,-7 -12,-15 -16,-24 -1,0 -3,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,2 0,2 9,3 17,8 24,15 1,-6 1,-11 1,-17 0,-61 -49,-110 -110,-110zm60 139l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12z">
                            </path>
                        </svg> -->
                        <span style="color:black; text-align:left">Circle</span>


                    </a>
                </li>
                <li class="list-group-item">
                    <a class="btn o icon-btn" id="addimage" title="Image">
                        <img src="assets/img/IconSquare.svg" alt="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path class="add_el_path" fill="#000000" d="M185 154l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12zm-83 -25c0,-11 -8,-20 -19,-20 -11,0 -20,9 -20,20 0,11 9,20 20,20 11,0 19,-9 19,-20zm-44 72l0 23 69 0c-2,-7 -4,-14 -4,-21 0,-22 12,-41 29,-53l-9 -12 -20 29 -25 -11 -40 45zm32 -174l-58 61 0 164 114 0c-5,-5 -9,-9 -12,-14l-88 0 0 -144 53 0 0 -53 101 0 0 99c5,1 9,3 14,5l0 -118 -124 0zm-5 26l0 27 -25 0 25 -27z">
                            </path>
                        </svg> -->
                        <span style="color:black; text-align:left">Image</span>

                    </a>
                </li>

            </ul>
        </div>
        <!--Labels -->
        <div class="col-md-6" id="labels-container" style="border: none; ">
            <div class="card labels-card elementlabel">
                <h5 class="text-center">Labels</h5>
                <div class="card-body" id="labels">
                    <!-- <div class='elementlabel mt-2' id='" + element + "'>
                        <div class=' card-item all' id='" + element + "'>
                            <p style='border-bottom: 1px solid blue; color: blue; font-weight: 600;margin-bottom: 2px;'>" + showText + "
                                <br /> " + showNumber + " </p>
                        </div>
                        <div style="display: flex; justify-content:space-between"> 
                        <button type='button' class='closeL btn' aria-label='Close' style='background: transparent; border: none; padding: 0px; color: blue; font-weight: 600;'>Delete<img width="15px" height="15px" src="assets/img/IconCross.svg" /></button>
                         <img width="30px" height="30px" src="assets/img/IconArrows.svg" alt="" />
                            <i class='far fa-caret-square-down' onclick='down(this)'></i>&nbsp;<i class='far fa-caret-square-up' onclick='up(this)'></i>
                        </div>
                    </div> -->
                </div>
            </div>

        </div>
        </div>
        </div>
          <div class="left-banner" style="padding:0px;">
              <img src="assets/img/banner.jpg" alt="" style="width:100%; height:100%">
          </div>
          <div class="canvas-col">
              <center>
                  <div id="stageparent" class="canvas-stageparent">
                      <div id="parent_sub">
                          <div class="canvas"></div>
                          <center class="canvas-btns">

                              <div class="canvasBtns">
                                  <button class="btn btn-outline-secondary btn-sm modals" onclick="plusStage()">+</button> |

                                  <button class="btn btn-outline-secondary btn-sm modals" onclick="minusStage()">-</button> |

                                  <button class="btn btn-outline-secondary btn-sm modals" onclick="real()">100%</button> |

                                  <button class="btn btn-outline-secondary btn-sm modals" onclick="fit()">[ ]</button>
                              </div>
                          </center>

                      </div>
                  </div>
              </center>
              <center class=" mt-2 download-btn">
                  <?php $session = (isset($_SESSION['uid'])) ? $_SESSION['sessionid'] : 'null'; ?>
                  <button class="btn btn-lg btn-warning shadow" style="color: white; border: none;" id="downloads" onclick="down('<?php echo $session ?>')">Download</button>

              </center>
          </div>
          <div class="right-banner" style="padding:0px;">
              <img src="assets/img/banner.jpg" alt="" style="width:100%; height:100%" />
          </div>

        <div class="right-panel" id="properties" style="height:auto;">

        </div>

    </div>
</div>
<script>
    // $(document).click(function(){
    // alert($("#colorpicker").spectrum("get").toHex());
    // })
</script>
<!-- Modal Of Sign Up -->
<?php include 'inc/signup_modal.php'; ?>
<?php include 'inc/login_modal.php'; ?>

</div>
<div class='demo bottomleft seggestions-section'>
    <div id='howto' onclick='toggleinstruction()'>
        To view Instruction or 'How To'.<b>Click Here</b>
    </div>
    <div class='suggest' id='suggestIns'>
        <div class="card">
            <div class="card-body">

                <!-- <center> -->
                <h5>Instructions</h5>
                <!-- </center> -->
                Select <b>Circle</b> element to add a stamp circle<br>
                Edit the circle, change its radius and stroke width<br>
                Select <b>Round</b> Text element to add a text around the circle<br>
                Enter and edit the text, change spacing and rotate it clockwise<br>
                Select <b>Line</b> Text element to add a text in the center<br>
                Enter and edit the text, move or rotate it<br>
                Select <b>Image</b> element to add an image<br>
                Upload the image, change its size and position<br>
                Add any numbers of elements<br>
                Delete elements clicking on <b>delete x</b> <br>
                <b>Download</b> your stamp
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<!-- Footer -->

<?php include 'inc/suggestion.php'; ?>
