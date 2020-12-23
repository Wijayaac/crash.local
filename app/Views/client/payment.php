<?php

namespace Midtrans;

require_once VENDORPATH . '/midtrans/midtrans-php/Midtrans.php';

//Set Your server key
Config::$serverKey = "your server key here";

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;

// Uncomment for append and override notification URL
// Config::$appendNotifUrl = "https://example.com";
// Config::$overrideNotifUrl = "https://example.com";

// Required
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $price, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => 'a1',
    'price' => $price,
    'quantity' => 1,
    'name' => $product,
);

// // Optional
// $item2_details = array(
//     'id' => 'a2',
//     'price' => 20000,
//     'quantity' => 2,
//     'name' => "Orange"
// );

// Optional
$item_details = array($item1_details);

// Optional
$billing_address = array(
    'first_name'    => $name,
    // 'last_name'     => "Litani",
    'address'       => $address,
    // 'city'          => "Jakarta",
    // 'postal_code'   => "16602",
    // 'phone'         => "081122334455",
    // 'country_code'  => 'IDN'
);

// Optional
$shipping_address = array(
    'first_name'    => $name,
    // 'last_name'     => "Supriadi",
    'address'       => $address,
    // 'city'          => "Jakarta",
    // 'postal_code'   => "16601",
    // 'phone'         => "08113366345",
    // 'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
    'first_name'    => $name,
    // 'last_name'     => "Litani",
    'email'         => $email,
    // 'phone'         => "081122334455",
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);

// Optional, remove this to display all available payment methods
// $enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel');

// Fill transaction details
$transaction = array(
    // 'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snapToken = Snap::getSnapToken($transaction);
// echo "snapToken = " . $snapToken;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Annex - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- payment script -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="your client key here"></script>
    <link rel="shortcut icon" href="<?= base_url() ?>/favicon.ico">

    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/client.css" rel="stylesheet" type="text/css">

</head>


<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                    <!--<a href="index.html" class="logo">-->
                    <!--Annex-->
                    <!--</a>-->
                    <!-- Image Logo -->
                    <a href="index.html" class="logo">
                        <i class="mdi mdi-ticket" style="color: black;">Crash</i>
                    </a>

                </div>
                <!-- End Logo container-->


                <div class="menu-extras topbar-custom">

                    <ul class="list-inline float-right mb-0">


                        <!-- notification-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-success noti-icon-badge">21</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5>Notification (3)</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                    <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                </a>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    View All
                                </a>

                            </div>
                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->

        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <a href="index.html"><i class="mdi mdi-airplay"></i>Dashboard</a>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="mdi mdi-layers"></i>Advanced UI</a>
                            <ul class="submenu">
                                <li><a href="advanced-highlight.html">Highlight</a></li>
                                <li><a href="advanced-rating.html">Rating</a></li>
                                <li><a href="advanced-alertify.html">Alertify</a></li>
                                <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                            </ul>
                        </li>

                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->


    <div class="wrapper">
        <div class="container-fluid">
            <?php foreach ($item->getResult('array') as $item) :
            ?>
                <!-- Page-Title -->
                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-md-8 col-lg-8 col-xl-6">
                        <div class="card m-b-30">
                            <div class="card-body text-center">
                                <img class="card-img-top img-fluid" style="width: 300px; " src="<?= base_url('/uploads/' . $item['image']); ?>" alt="Card image cap">
                                <h4 class="card-title font-20 mt-0 text-left"><?= $item['productName']; ?></h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">By. : <?= $item['sellerName']; ?></li>
                                <li class="list-group-item">Send From : <?= $item['sellerAddress']; ?></li>
                                <li class="list-group-item">
                                    <hr>
                                </li>
                                <li class="list-group-item">Receiver : <?= $name; ?></li>
                                <li class="list-group-item">Notify Me : <?= $email; ?></li>
                                <li class="list-group-item">Send To : <?= $address; ?></li>
                            </ul>
                            <div class="card-body">
                                <button id="pay-button" class="btn btn-block btn-primary"><i class="mdi mdi-currency-usd"></i> Pay Now !</button>
                            </div>
                        </div>

                    </div><!-- end col -->
                    <!-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> -->
                </div>
                <form action="<?= site_url(); ?>home/transaction" method="post" id="transaction-form">
                    <input type="hidden" name="seller" value="<?= $item['sellerId']; ?>">
                    <input type="hidden" name="name" value="<?= $name; ?>">
                    <input type="hidden" name="email" value="<?= $email; ?>">
                    <input type="hidden" name="address" value="<?= $address; ?>">
                    <input type="hidden" name="total" value="<?= $item['price']; ?>">
                </form>
            <?php endforeach; ?>
            <!-- end page title end breadcrumb -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    © 2018 Annex by Mannatthemes.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- payment script -->


    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('<?php echo $snapToken ?>', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    $('#transaction-form').submit();
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    $('#transaction-form').submit();
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
    <!-- jQuery  -->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/waves.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.scrollTo.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html>