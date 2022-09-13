<?php
?>
<!DOCTYPE html>
<!--[if lt IE 8]><html lang="en-us" class="no-js lt-ie8"> <![endif]-->
<!--[if gte IE 8]><!--><html lang="en-us" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Casino</title>

    <link rel="stylesheet" href="/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/css/style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Main -->
<div class="main">

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/resources/views/partials/header.php'; ?>

    <!-- Content -->
    <main class="content">

        <?= $template ?>

    </main>
    <!-- End Content -->

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/resources/views/partials/footer.php'; ?>

</div>
<!-- End Main-->

<script src="/resources/js/libs/jquery.js"></script>
<script src="/resources/js/libs/bootstrap.min.js"></script>
<script src="/resources/js/script.js"></script>

</body>
</html>

