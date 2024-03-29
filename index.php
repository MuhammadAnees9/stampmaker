<?php
session_start();

include_once('inc/header.php');

?>

<!-- <div id="measure"></div> -->
<header class="header">
    <div class="container-fluid" style="margin: 0px; padding: 0px;">
        <div class="row" style="margin: 0px; padding: 0px;">
            <div class="col-lg-8 col-md-7 col-sm-5 text-center d-flex text-white brand">
                <img class="d-inline" src="assets/img/Logo.svg" width="120px" />
                <h1 class="d-inline">My Stamp Maker</h1>
                <!-- <a href="pageMaker/index.html">Second Page</a> -->

            </div>
            <div class="col-lg-4 col-md-5 col-sm-6" style="display: flex; align-items:center">
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
                            echo "<h6 style='margin:20px;'>Welcome, " . $d['username'] . "</h6><button class='btn btn-outline-warning' onclick='logout()' style='height:40px;margin:20px;'>Log Out</button>";
                            if ($d['role'] == "admin") {
                                // echo "<button class='btn btn-outline-warning' onclick='Dashboard()' style='height:40px;margin:20px;'>Dashboard</button>";
                                echo "<a class='btn btn-outline-warning' href='admin' style='height:40px;margin:20px;'>Dashboard</a>";
                            }
                        } else {
                            echo "<button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#myModal' style='height:40px;margin:20px;'>Sign Up</button><button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#myModalLogin' style='height:40px;margin:20px;' onclick='reset()'>Log In</button>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</header>
<div class="container-fluid">
    <div class="row mt-lg-4 wrapper" style="position: relative;">
        <div class="btns" style="padding:0px;">
            <ul class="list-group">
                <li class="list-group-item">

                    <button class="btn o icon-btn" id="addroundtext" title="Text Around The Circle">
                        <img src="assets/img/IconRound.svg" alt="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="#000000" d="M136 153l-37 0 -10 23 -27 0 49 -102 27 0 27 55c-12,5 -22,13 -29,24zm5 -17l-17 -38 -17 38 34 0zm-21 -126c-61,0 -110,50 -110,111 0,61 49,110 110,110 7,0 13,0 20,-2 -7,-6 -12,-14 -16,-23 -1,0 -2,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,1 0,2 9,3 18,8 24,15 1,-6 2,-12 2,-17 0,-61 -50,-111 -111,-111zm60 140l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -28 0 -2zm2 -15c-30,4 -50,30 -46,58 3,27 27,50 58,46 16,-2 27,-10 34,-18 19,-23 15,-57 -6,-74 -11,-9 -24,-14 -40,-12z">
                            </path>
                        </svg> -->

                        <span style="color:black; text-align:left">Round Text</span>
                    </button>
                </li>
                <li class="list-group-item">
                    <button class="btn o icon-btn" id="addlinetext" title="Line Text">
                        <img src="assets/img/IconLine.svg" alt="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="#000000" d="M5 236l60 1 15 -38 45 0c-1,-20 3,-35 15,-50 1,-1 1,-2 2,-2l-41 -1 24 -59 22 54c1,0 7,-5 10,-7 13,-8 27,-11 43,-10l-45 -113 -60 0 -90 225zm180 -82l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12z">
                            </path>
                        </svg> -->
                        <span style="color:black; text-align:left">Line Text</span>

                    </button>
                </li>
                <li class="list-group-item">
                    <button class="btn o icon-btn" id="addcircle" title="Circle">
                        <img src="assets/img/IconShape.svg" alt="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="#000000" d="M125 15c-61,0 -110,49 -110,110 0,61 49,110 110,110 7,0 13,0 20,-1 -7,-7 -12,-15 -16,-24 -1,0 -3,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,2 0,2 9,3 17,8 24,15 1,-6 1,-11 1,-17 0,-61 -49,-110 -110,-110zm60 139l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12z">
                            </path>
                        </svg> -->
                        <span style="color:black; text-align:left">Circle</span>


                    </button>
                </li>
                <li class="list-group-item">
                    <button class="btn o icon-btn" id="addimage" title="Image">
                        <img src="assets/img/IconSquare.svg" alt="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path class="add_el_path" fill="#000000" d="M185 154l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12zm-83 -25c0,-11 -8,-20 -19,-20 -11,0 -20,9 -20,20 0,11 9,20 20,20 11,0 19,-9 19,-20zm-44 72l0 23 69 0c-2,-7 -4,-14 -4,-21 0,-22 12,-41 29,-53l-9 -12 -20 29 -25 -11 -40 45zm32 -174l-58 61 0 164 114 0c-5,-5 -9,-9 -12,-14l-88 0 0 -144 53 0 0 -53 101 0 0 99c5,1 9,3 14,5l0 -118 -124 0zm-5 26l0 27 -25 0 25 -27z">
                            </path>
                        </svg> -->
                        <span style="color:black; text-align:left">Image</span>

                    </button>
                </li>

            </ul>
        </div>
        <!--Labels -->
        <div class="col-lg-2 col-sm-2 col-md-3 col-3" id="labels-container" style="border: none; ">
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

        <!-- Canvas -->
        <div class="col-lg-6 col-sm-8 col-md-6 col-9 mb-lg-2  canvas-col">
            <div class="row">
                <!-- <ul class="bookmarks col-lg-2 col-sm-2 col-md-3 col-2" id="labels">
        </ul> -->
                <div class="col-lg-2 col-md-2 left-banner" style="padding:0px; height:21em">
                    <img src="assets/img/banner.jpg" alt="" style="width:100%; height:100%">
                </div>
                <div class="col-lg-8 col-sm-12 col-md-8 col-12 ">
                    <center>
                        <div id="stageparent" class="canvas-stageparent">
                            <div id="parent_sub">
                                <!-- <div id="container"></div> -->
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
                        <button class="btn btn-lg btn-warning shadow" style="color: white" id="downloads" onclick="down('<?php echo $session ?>')">Download</button>

                    </center>
                </div>
                <div class="col-lg-2 col-md-2 right-banner" style="padding:0px; height:21em">
                    <img src="assets/img/banner.jpg" alt="" style="width:100%; height:100%" />
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-sm-12 col-md-3 col-12 right-panel" id="properties" style="height:auto;">

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
