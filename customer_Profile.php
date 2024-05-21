

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" />
<style type="text/css">
    	body{margin-top:20px;}
                .card-style1 {
                box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
                }
                .border-0 {
                    border: 0!important;
                }
                .card {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    min-width: 0;
                    word-wrap: break-word;
                    background-color: #fff;
                    background-clip: border-box;
                    border: 1px solid rgba(0,0,0,.125);
                    border-radius: 0.25rem;
                }

                section {
                    padding: 120px 0;
                    overflow: hidden;
                    background: #fff;
                }
                .mb-2-3, .my-2-3 {
                    margin-bottom: 2.3rem;
                }

                .section-title {
                    font-weight: 600;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                    margin-bottom: 10px;
                    position: relative;
                    display: inline-block;
                }
                .text-primary {
                    color: #ceaa4d !important;
                }
                .text-secondary {
                    color: #15395A !important;
                }
                .font-weight-600 {
                    font-weight: 600;
                }
                .display-26 {
                    font-size: 1.3rem;
                }

                @media screen and (min-width: 992px){
                    .p-lg-7 {
                        padding: 4rem;
                    }
                }
                @media screen and (min-width: 768px){
                    .p-md-6 {
                        padding: 3.5rem;
                    }
                }
                @media screen and (min-width: 576px){
                    .p-sm-2-3 {
                        padding: 2.3rem;
                    }
                }
                .p-1-9 {
                    padding: 1.9rem;
                }

                .bg-secondary {
                    background: #15395A !important;
                }
                @media screen and (min-width: 576px){
                    .pe-sm-6, .px-sm-6 {
                        padding-right: 3.5rem;
                    }
                }
                @media screen and (min-width: 576px){
                    .ps-sm-6, .px-sm-6 {
                        padding-left: 3.5rem;
                    }
                }
                .pe-1-9, .px-1-9 {
                    padding-right: 1.9rem;
                }
                .ps-1-9, .px-1-9 {
                    padding-left: 1.9rem;
                }
                .pb-1-9, .py-1-9 {
                    padding-bottom: 1.9rem;
                }
                .pt-1-9, .py-1-9 {
                    padding-top: 1.9rem;
                }
                .mb-1-9, .my-1-9 {
                    margin-bottom: 1.9rem;
                }
                @media (min-width: 992px){
                    .d-lg-inline-block {
                        display: inline-block!important;
                    }
                }
                .rounded {
                    border-radius: 0.25rem!important;
                }

                .avatar {
                              vertical-align: middle;
                              width: 50px;
                              height: 50px;
                              border-radius: 50%;
                                    </style>
</head>
<body>

    <!-- Your HTML content here -->

    <header class="header">
        <!-- Your header content here -->
    </header>

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                                </div>
                                <div class="col-lg-6 px-xl-10">
                                    <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                        <h3 class="h2 text-white mb-0">User Details:</h3>
                                    </div>
                                    <ul class="list-unstyled mb-1-9">
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Name:</span> <?php echo $name; ?></li>
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Date of Birth:</span> <?php echo $dob; ?></li>
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Contact:</span> <?php echo $contact; ?></li>
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Address:</span> <?php echo $address; ?></li>
                                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Pincode:</span> <?php echo $pincode; ?></li>
                                    </ul>
                                    <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                        <!-- Your social icons here -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Include your footer or other code as needed
    include 'Footer.php';
    ?>

    <!-- Your scripts and closing body/html tags here -->

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        // Your JavaScript code here
    </script>
</body>
</html>
