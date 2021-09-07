<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="assets/admin/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css">

        <!-- App styles -->
		<link rel="stylesheet" href="assets/admin/css/app.min.css">
		<title>Error</title>
    </head>

    <body data-ma-theme="green">
        <section class="error">
            <div class="error__inner">
				<h1><?php echo $heading; ?></h1>
				<?php echo $message; ?>
            </div>
        </section>

        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Warning!!</h1>
                    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="assets/admin/img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="assets/admin/img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="assets/admin/img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="assets/admin/img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="assets/admin/img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/admin/img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="assets/admin/vendors/jquery/jquery.min.js"></script>
        <script src="assets/admin/vendors/popper.js/popper.min.js"></script>
        <script src="assets/admin/vendors/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>