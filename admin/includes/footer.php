        <footer class="footer pt-5 py-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-12">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="#" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link pe-0 text-muted" target="_blank">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        </main>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
                $('#myTable').css("height", "auto")
                $("#myTable_length").remove();
                $("#myTable_filter").remove();
                $("#myTable_paginate").remove();
                $("#myTable_info").remove();
            })
            $("table").css("overflow-y", "");
            $("#myTable").css("border-bottom", "none");
            if ($("#viewOrder").length > 0) {
                $("#viewOrder").css("overflow-y", "scroll");
            }
        </script>
        <!-- <script src="../assets/js/jquery-3.7.1.min.js"></script> -->
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/smooth-scrollbar.min.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="../assets/js/custom.js"></script>

        <?php
        $currentURL = $_SERVER['REQUEST_URI'];
        if (strpos($currentURL, '/statistical') !== false) {
            echo '<script src="../assets/vendors/jquery/dist/jquery.min.js"></script>';
            echo '<script src="../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>';
            echo '<script src="../assets/vendors/fastclick/lib/fastclick.js"></script>';
            echo '<script src="../assets/vendors/nprogress/nprogress.js"></script>';
            // echo '<script src="../assets/vendors/echarts/dist/echarts.min.js"></script>';
            // echo '<script src="../assets/vendors/echarts/map/js/world.js"></script>';
            // echo '<script src="../assets/vendors/raphael/raphael.min.js"></script>';
            // echo '<script src="../assets/vendors/morris.js/morris.min.js"></script>';
            echo '<script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>';
            echo '<script src="../assets/vendors/Flot/jquery.flot.js"></script>';
            echo '<script src="../assets/vendors/Flot/jquery.flot.pie.js"></script>';
            echo '<script src="../assets/vendors/Flot/jquery.flot.time.js"></script>';
            echo '<script src="../assets/vendors/Flot/jquery.flot.stack.js"></script>';
            echo '<script src="../assets/vendors/Flot/jquery.flot.resize.js"></script>';
            echo '<script src="../assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>';
            echo '<script src="../assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>';
            echo '<script src="../assets/vendors/flot.curvedlines/curvedLines.js"></script>';
            echo '<script src="../assets/vendors/DateJS/build/date.js"></script>';
            echo '<script src="../assets/vendors/moment/min/moment.min.js"></script>';
            echo '<script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>';

            echo '<script src="../assets/build/js/custom.js"></script>';
        }

        ?>

        <!-- Alertify Js -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

        <script>
            <?php
            if (isset($_SESSION['message'])) {
            ?>
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('<?= $_SESSION['message']; ?>');
            <?php
                unset($_SESSION['message']);
            }
            ?>
        </script>

        </body>

        </html>