<?php
    session_start();
    include "connect.php";
    
    $email = $_SESSION['email'];
    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }

    
    $select_signup = mysqli_query($conn, "SELECT * FROM signup WHERE `email`='$email'");
    $signup = mysqli_fetch_assoc($select_signup);

    $select_transaction = mysqli_query($conn, "SELECT * FROM `transaction` WHERE `email`='$email'");
    
    
    $conn->close();
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade | MEGAPROFITSTRADE</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://kit.fontawesome.com/be0461b2be.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="megaprofits">
    <?php
                include "sidebar/heading.php";
            ?>
                        <div class="content p-3">
                            <div class="head">
                                <h2>Available Packages</h2>
                                <p>Upgrade your trading account to a plan that best suit your trading experience and have access to several Trading benefits.</p>
                            </div>
                            <div class="upgrade-history py-3">
                                <div class="row g-4">
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="plans shadow">
                                            <h5>STARTER</h5>
                                            <h3>35% / <span>TRADE</span></h3>
                                            <div class="other">
                                                <p><i class="bi bi-square-fill"></i>Principal return on maturity</p>
                                                <p><i class="bi bi-square-fill"></i>Instant Withdrawal</p>
                                                <p><i class="bi bi-square-fill"></i>Professional Charts</p>
                                                <p><i class="bi bi-square-fill"></i>24/7 Support</p>
                                                <p><i class="bi bi-square-fill"></i>Min Deposit: $500</p>
                                                <p><i class="bi bi-square-fill"></i>Max Deposit: $5,000</p>
                                            </div>
                                            <small>Make a minimum deposit of $500 to Select this plan</small>
                                            <button>Join plan</button>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="plans shadow">
                                            <h5>PREMIUM</h5>
                                            <h3>50% / <span>TRADE</span></h3>
                                            <div class="other">
                                                <p><i class="bi bi-square-fill"></i>Principal return on maturity</p>
                                                <p><i class="bi bi-square-fill"></i>Instant Withdrawal</p>
                                                <p><i class="bi bi-square-fill"></i>Professional Charts</p>
                                                <p><i class="bi bi-square-fill"></i>24/7 Support</p>
                                                <p><i class="bi bi-square-fill"></i>Min Deposit: $2000</p>
                                                <p><i class="bi bi-square-fill"></i>Max Deposit: $15,000</p>
                                            </div>
                                            <small>Make a minimum deposit of $2,000 to Select this plan</small>
                                            <button>Join plan</button>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="plans shadow">
                                            <h5>VIP</h5>
                                            <h3>75% / <span>TRADE</span></h3>
                                            <div class="other">
                                                <p><i class="bi bi-square-fill"></i>Principal return on maturity</p>
                                                <p><i class="bi bi-square-fill"></i>Instant Withdrawal</p>
                                                <p><i class="bi bi-square-fill"></i>Professional Charts</p>
                                                <p><i class="bi bi-square-fill"></i>24/7 Support</p>
                                                <p><i class="bi bi-square-fill"></i>Min Deposit: $20,00</p>
                                                <p><i class="bi bi-square-fill"></i>Max Deposit: $40,000</p>
                                            </div>
                                            <small>Make a minimum deposit of $20,000 to Select this plan</small>
                                            <button>Join plan</button>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="plans shadow">
                                            <h5>EXCLUSIVE</h5>
                                            <h3>85% / <span>TRADE</span></h3>
                                            <div class="other">
                                                <p><i class="bi bi-square-fill"></i>Principal return on maturity</p>
                                                <p><i class="bi bi-square-fill"></i>Instant Withdrawal</p>
                                                <p><i class="bi bi-square-fill"></i>Professional Charts</p>
                                                <p><i class="bi bi-square-fill"></i>24/7 Support</p>
                                                <p><i class="bi bi-square-fill"></i>Min Deposit: $50,00</p>
                                                <p><i class="bi bi-square-fill"></i>Max Deposit: $100,000</p>
                                            </div>
                                            <small>Make a minimum deposit of $50,000 to Select this plan</small>
                                            <button>Join plan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>