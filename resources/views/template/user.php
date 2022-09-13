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
                    Hello, <?= $user->name ?>
                </h2>
                <!-- end title -->

                <!-- row -->
                <div class="row mb-3">

                    <!-- col -->
                    <div class="col-lg-4">

                        <a href="/update/<?= $user->id ?>" class="btn btn-primary btn-block">Regenerate Link</a>

                    </div>
                    <!-- end col -->

                    <!-- col -->
                    <div class="col-lg-4">

                        <a href="/destroy/<?= $user->id ?>" class="btn btn-danger btn-block">Deactivate Link</a>

                    </div>
                    <!-- end col -->

                    <!-- col -->
                    <div class="col-lg-4">

                        <a href="/history/<?= $user->id ?>" class="btn btn-info btn-block getHistory">History</a>

                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->

                <!-- row -->
                <div class="row mb-3">

                    <!-- col -->
                    <div class="col-lg-4 offset-lg-4">

                        <a href="/spin/<?= $user->id ?>" class="btn btn-success btn-block btn-lg goSpin">I`m Feeling Lucky</a>

                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->

                <!-- container -->
                <div class="ajax ajaxContainer" style="min-height: 80px">

                    <div class="result ajax__result">

                    </div>

                    <div class="ajax__spinner spinner-border text-success" role="status">
                        <span class="sr-only"></span>
                    </div>

                </div>
                <!-- end container -->

            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

    </div>
    <!-- end container -->

</section>
<!-- End Section Form -->
