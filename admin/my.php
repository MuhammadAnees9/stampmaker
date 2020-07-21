<?php include "../dbConfig.php";
session_start();
CheckIfAdmin();
?>
<!DOCTYPE html>
<html>
<title>my.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/my.css">
<script type="text/javascript" src="../modals.js"></script>
<script src="assets/js/jquery-3.5.1.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<link href="assets/css/dataTables.min.css" rel="stylesheet">
<script src="assets/js/dataTables.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Raleway", sans-serif
}
</style>

<body class="my-light-grey my-content" style="max-width:1600px">
    <!-- Navbar (sit on top) -->

    <!-- Sidebar/menu -->
    <div class="my-display-container">
        <div class="">
            <div class="my-bar my-white my-wide my-padding my-card my-black">
                <a href="#" class="my-bar-item my-button"><b class="my-text-blue">Stamp Maker</b> Admin</a>
            </div>
        </div>
    </div>
    <nav class="my-sidebar my-collapse my-white my-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>

        <div class="my-container">
            <a href="#" onclick="my_close()" class="my-hide-large my-right my-jumbo my-padding my-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <img src="assets/img/admin.png" style="width:45%;" class="my-round"><br><br>
            <h4><b>Admin</b></h4>
        </div>
        <div class="my-bar-block">
            <a href="index.php" onclick="my_close()" class="my-bar-item my-button my-padding my-text-teal"><i
                    class="fa fa-users fa-fw my-margin-right"></i>Users Table</a>
            <a href="session.php" onclick="my_close()" class="my-bar-item my-button my-padding"><i
                    class="fa fa-user fa-fw my-margin-right"></i>Sessions Table</a>
            <a href="translation.php" onclick="my_close()" class="my-bar-item my-button my-padding"><i
                    class="fa fa-envelope fa-fw my-margin-right"></i>Translation Table</a>
            <a href="translation.php" onclick="logout()" class="my-bar-item my-button my-padding"><i
                    class="fa fa-sign-out fa-fw my-margin-right"></i>Logout</a>
        </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="my-overlay my-hide-large my-animate-opacity" onclick="my_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="my-main" style="margin-left:300px">

        <!-- Header -->
        <header id="portfolio">

            <a href="#"><img src="/myimages/avatar_g2.jpg" style="width:65px;"
                    class="my-circle my-right my-margin my-hide-large my-hover-opacity"></a>
            <span class="my-button my-hide-large my-xxlarge my-hover-text-grey" onclick="my_open()"><i
                    class="fa fa-bars"></i></span>
            <div class="my-container">
                <h1><b>Users Detail</b></h1>
            </div>
        </header>

        <!-- First Photo Grid-->
        <div class="my-row-padding">
            <div class="my-container">
                <button class="my-button my-blue fa fa-plus" data-toggle='modal' data-target='#myModal'>Add
                    Users</button>
                <br>
                <br>
                <table id="example" class="my-table-all my-card-4 table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">User IP</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                                    $sql = "SELECT id, username, email,userIP,isActive FROM user where role != 'admin'";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        $status = ($row['isActive']==1)?'Active':'Not active';
                                                    echo "<tr>
                                                        <th scope='row'>".$row["id"]."</th>
                                                        <td>".$row["username"]."</td>
                                                        <td>".$row["email"]."</td>
                            
                                                        <td><input type='password' onkeydown='UpdatePassword(this)' id=".$row['id']."></td>
                                                        <td>".$row["userIP"]."</td>
                                                           <td>".$status."</td>
                                                        <td>
                                                      
                                                        <button class='delete btn-danger' id=".$row["id"].">Delete</button>
                                                        </td>
                                                       
                                                    </tr>";
                                                    }
                                                    } else {
                                                    echo "0 results";
                                                    }
                                                    ?>
                    </tbody>

            </div>
        </div>


    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });

    function my_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function my_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
    </script>

</body>

</html>