<?php
include_once('header.php');

?>
<header id="portfolio">

    <a href="#"><img src="/myimages/avatar_g2.jpg" style="width:65px;"
            class="my-circle my-right my-margin my-hide-large my-hover-opacity"></a>
    <span class="my-button my-hide-large my-xxlarge my-hover-text-grey" onclick="my_open()"><i
            class="fa fa-bars"></i></span>
    <div class="my-container">
        <h1><b>Session Table</b></h1>
    </div>
</header>
<!-- First Photo Grid-->
<div class="my-row-padding">
    <div class="my-container">
        <br>
        <br>

        <table class="table my-table-all my-card-4 table" id="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Start</th>
                    <th scope="col">End</th>
                    <th scope="col">Session IP</th>
                    <th scope="col">No of Downloads</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                                $sql = "SELECT s.id as sessionid,start,end,sessionIP,downloads,u.username FROM tblsession s inner join user u on s.userid = u.id";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                   
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                    <th scope='row'>".$row["sessionid"]."</th>
                                                    <td>".$row["username"]."</td>
                                                    <td>".$row["start"]."</td>
                                                    <td>".$row["end"]."</td>
                                                    <td>".$row["sessionIP"]."</td>
                                                    <td>".$row["downloads"]."</td>
                                                </tr>";
                                                }
                                                } else {
                                                echo "0 results";
                                                }
                                                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once('footer.php');
?>