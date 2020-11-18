</body>

<footer class="footer font-small blue mt-4 pt-4" style="background-color:#007bff;color:white;">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">My Stamp Maker</h5>
                <p>Create a round stamp easily.</p>

            </div>
            <!-- Grid column -->


            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <ul class="list-unstyled">
                    <li>
                        <a style="color:white;" href="terms.php" target="_blank">
                            Terms & conditions.
                        </a>

                    </li>
                    <li>
                        <a style="color:white;" href="privacy.php" target="_blank">Privacy Notice</a>
                    </li>
                </ul>


            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
                <ul class="list-unstyled">
                    <li>
                        <b style="color:white;">Email:</b> sayapingeorge@gmail.com
                    </li>
                    <li>
                        <b style="color:white;">Address:</b> MyStampMaker <br>
                        Brentwood Street, 30709<br>
                        Southfield, MI 48076<br>
                        United States<br>

                    </li>
                    <li>
                        <b style="color:white;">Company Name:</b> My Stamp Maker
                    </li>
                </ul>


            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#" style="color:white;"> MyStampMaker</a>
    </div>
    <!-- Copyright -->

</footer>
<br><br><br>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#langS').select2({
            width: '100%',
            placeholder: "Select Native / Source Language",
            allowClear: true,
        });
        $('#langTarget').select2({
            width: '100%',
            placeholder: "Select Target Language",
            allowClear: true,
        });
    });
    var idleTime = 0;
    $(document).ready(function() {
        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function(e) {
            idleTime = 0;
        });
        $(this).keypress(function(e) {
            idleTime = 0;
        });
    });

    function timerIncrement() {
        idleTime = idleTime + 1;
        if (idleTime > 240) {
            $.ajax({
                url: "logout.php", //the page containing php script
                type: "post", //request type,
                dataType: 'json',
                success: function(response) {
                    if (response.abc == "done") {

                        swal("You Have Been Logout",
                            "You have been logout, Reason: Inactive for about 4 hours.", "warning").then(
                            function() {

                                location.reload();
                            });
                    }
                }
            });

        }
    }
</script>