<?php
session_destroy();
?>

<!-- Section Form -->
<section>

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-lg-6 offset-lg-3">

                <!-- title -->
                <h2 class="text-center mb-5">
                    Registration
                </h2>
                <!-- end title -->

                <!-- form -->
                <form action="/register" method="post" class="row">

                    <!-- col -->
                    <div class="form-group col-lg-6 mb-3">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                    <!-- end col -->

                    <!-- col -->
                    <div class="form-group col-lg-6 mb-3">
                        <label for="phone">Your Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="">
                    </div>
                    <!-- end col -->

                    <!-- col -->
                    <div class="form-group col-lg-4 offset-lg-4">

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

                    </div>
                    <!-- end col -->

                    <?php if( isset($_SESSION['error']) ) { ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?= $_SESSION['error'] ?>
                        </div>
                    <?php } ?>

                </form>
                <!-- end form -->

            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

</section>
<!-- End Section Form -->
