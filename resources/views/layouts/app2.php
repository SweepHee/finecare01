<?php $_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32)) ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>WEBPAGE || <?=$_SERVER['REQUEST_URI'] ?? "" ?></title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    <div id="app" class="uk-container-expand">
        테스트네비!!!!@@@
<!--        --><?//=$_SESSION['CSRF_TOKEN'];?>
        <?php
        $csrfToken = $_SESSION['CSRF_TOKEN'];
        echo hash_equals($csrfToken, $_SESSION['CSRF_TOKEN']);
        ?>
        <main id="main" role="main">
            <?php require_once dirname(__DIR__) . "/" . $view . ".php"; ?>
        </main>
    </div>

    <script src="//cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
    <script src="//cdn.ckeditor.com/ckeditor5/22.0.0/balloon-block/ckeditor.js"></script>
    <script src="/app.js"></script>
</body>
</html>