<?php
include_once('header.php');
?>
<header id="portfolio">

    <a href="#"><img src="/myimages/avatar_g2.jpg" style="width:65px;"
            class="my-circle my-right my-margin my-hide-large my-hover-opacity"></a>
    <span class="my-button my-hide-large my-xxlarge my-hover-text-grey" onclick="my_open()"><i
            class="fa fa-bars"></i></span>
    <div class="my-container">
        <h1><b>Translation Table</b></h1>
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
                    <th scope="col">Source Lang</th>
                    <th scope="col">Target Lang</th>
                    <th>Purpose Of Using (Not a Translator)</th>
            </thead>
            <tbody>
                <?php
                                                $sql = "SELECT t.id as tid,sourceLang,TargetLang,u.username as username,reason from tbltranslation t inner join user u on t.userid = u.id";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                    <th scope='row'>".$row["tid"]."</th>
                                                    <td>".$row["username"]."</td>
                                                    <td>".$row["sourceLang"]."</td>
                                                    <td>".$row["TargetLang"]."</td>
                                                    <td>".$row["reason"]."</td>
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