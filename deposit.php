<?php
    session_start();
    include "connect.php";
    
    $msg = "";
    $email = $_SESSION['email'];
    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }

    
    $select_signup = mysqli_query($conn, "SELECT * FROM signup WHERE `email`='$email'");
    $signup = mysqli_fetch_assoc($select_signup);
    
    
    if(isset($_POST['deposit'])){
        // $email = $_POST['email'];
        $type = "deposit";
        $cryptoSelect = $_POST['cryptoSelect'];
        $amount = $_POST['amount'];
        $convertedAmount = $_POST['convertedAmount'];
        $status = $_POST["status"];
        $time = date('Y-m-d H:i:s');

        $insert = mysqli_query($conn, "INSERT INTO `transaction`(`email`, `type`, `cryptoSelect`, `amount`, `convertedAmount`, `status`, `time`) VALUES ('$email', '$type', '$cryptoSelect', '$amount', '$convertedAmount', '$status', '$time')");
        // $insert = mysqli_query($conn, "INSERT INTO `transaction`(`type`, `cryptoSelect`, `amount`, `convertedAmount`, `status`, `time`) VALUES ('$type', '$cryptoSelect', '$amount', '$convertedAmount', '$status', '$time')");
        if($insert){
            header("location: transaction.php");
        }
        else{
            $msg = "Unapproved deposit";
        }
    }
            
            $select_wallet = mysqli_query($conn, "SELECT * FROM `wallet`");
            // $wallet = mysqli_fetch_assoc($select_wallet);

    $conn->close();
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit | MEGAPROFITSTRADE</title>
    <link rel="stylesheet" href="styling.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/dist/qrcode.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script> -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
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
                                <h2>Deposit</h2>
                                <p>For faster confirmation, kindly fill the form below after making deposit to the account below.</p>
                            </div>
                            <div class="deposit-history py-3">
                                <div class="row g-4 text-center">
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="coin shadow">
                                            <img src="images/btc.avif" width="100%" alt="">
                                            <h3>BITCOIN</h3>
                                            <p>To deposit your bitcoin, kindly click the button below</p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bitcoinModal">View details</button>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="coin shadow">
                                            <img src="images/eth.png" width="100%" alt="">
                                            <h3>ETHEREUM</h3>
                                            <p>To deposit your ethereum, kindly click the button below</p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ethereumModal">View details</button>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="coin shadow">
                                            <img src="images/usdt.jfif" width="100%" alt="">
                                            <h3>USDT</h3>
                                            <p>To deposit your USDT, kindly click the button below</p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usdtModal">View details</button>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="coin shadow">
                                            <img src="images/tron.webp" width="100%" alt="">
                                            <h3>TRX</h3>
                                            <p>To deposit your TRX, kindly click the button below</p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trxModal">View details</button>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="coin shadow">
                                            <img src="images/usdC.jfif" width="100%" alt="">
                                            <h3>USDC</h3>
                                            <p>To deposit your USDC, kindly click the button below</p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usdcModal">View details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="withdraw-history my-5">
                                <div class="row">
                                    <div class="col col-lg-6 col-md-6 col-12 m-auto">
                                        <div class="form shadow p-lg-5 p-md-4 p-3">
                                            <center><i>Fill the form below for faster confirmation and kindly wait till your Crypto Amount has been converted...</i></center>
                                            <form action="" method="post">
                                                <label for="cryptoSelect">Select Cryptocurrency and Amount Deposited:</label>
                                                <div class="d-flex">
                                                    <select id="cryptoSelect" name="cryptoSelect">
                                                        <option value="bitcoin">BTC</option>
                                                        <option value="tether">USDT</option>
                                                        <option value="ethereum">ETH</option>
                                                        <option value="usd-coin">USDC</option>
                                                        <option value="tron">TRX</option>
                                                    </select>
                                                    <input type="number" name="amount" id="cryptoAmount" placeholder="Enter Cryptocurrency Amount" step="0.0001" required>
                                                </div>
                                                <!-- <label for="cryptoAmount">Enter Cryptocurrency Amount:</label> -->
                                                <label for="usdAmount">Equivalent Amount in USD:</label>
                                                <input type="text" name="convertedAmount" id="usdAmount" readonly required>
                                                <center class="text-danger mt-3"><small><?php echo $msg;?></small></center>
                                                <button type="submit" name="deposit">Deposit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


<?php 
    while ($wallet = mysqli_fetch_assoc($select_wallet)) {
        ?>
            <!--BITCOIN Modal -->
        <div class="modal fade" id="bitcoinModal" tabindex="-1" aria-labelledby="bitcoinModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="bitcoinModalLabel">BITCOIN</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="qrcodeBitcoin" class="qr-code"></div>
                        <div class="ad d-flex align-items-center">
                            <!-- <input id="inputBitcoin" class="qr-input" type="text" value="36PpVirTGqq3kPpKBK8GJafPsDfd8iAr5u" readonly> -->
                            <?php 
                                if($wallet['cryptoSelect'] == "bitcoin"){
                                    ?>
                                    <input id="inputBitcoin" class="qr-input" type="text" value="<?php echo $wallet['newWalletAddress'];?>" readonly>
                            <?php }?>
                            <i class="bi bi-copy" id="copyButtonBitcoin"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
            <!--ETH Modal -->
        <div class="modal fade" id="ethereumModal" tabindex="-1" aria-labelledby="ethereumModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ethereumModalLabel">ETHEREUM</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="qrcodeEthereum" class="qr-code"></div>
                        <div class="ad d-flex align-items-center">
                            <!-- <input id="inputEthereum" class="qr-input" type="text" value="0x194797b336251b7aD6eE32148B721f6BFD828600" readonly> -->
                            <?php 
                                if($wallet['cryptoSelect'] == "ethereum"){
                                    ?>
                                    <input id="inputEthereum" class="qr-input" type="text" value="<?php echo $wallet['newWalletAddress'];?>" readonly>
                            <?php } ?>
                            <i class="bi bi-copy" id="copyButtonEthereum"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
            <!--USDT Modal -->
        <div class="modal fade" id="usdtModal" tabindex="-1" aria-labelledby="usdtModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="usdtModalLabel">USDT</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="qrcodeUsdt" class="qr-code"></div>
                        <div class="ad d-flex align-items-center">
                            <!-- <input id="inputUsdt" class="qr-input" type="text" value="0x194797b336251b7aD6eE32148B721f6BFD828600" readonly> -->
                            <?php 
                                if($wallet['cryptoSelect'] == "tether"){
                                    ?>
                                    <input id="inputUsdt" class="qr-input" type="text" value="<?php echo $wallet['newWalletAddress'];?>" readonly>
                                    <?php }?>
                            <i class="bi bi-copy" id="copyButtonUsdt"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
            <!--TRX Modal -->
        <div class="modal fade" id="trxModal" tabindex="-1" aria-labelledby="trxModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="trxModalLabel">TRX</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="qrcodeTrx" class="qr-code"></div>
                        <div class="ad d-flex align-items-center">
                            <!-- <input id="inputTrx" class="qr-input" type="text" value="TVYseKQCFBU2vf93W9i1R9v4T7GhczguzP" readonly> -->
                            <?php 
                                if($wallet['cryptoSelect'] == "tron"){
                                    ?>
                                    <input id="inputTrx" class="qr-input" type="text" value="<?php echo $wallet['newWalletAddress'];?>" readonly>
                                <?php }?>
                            <i class="bi bi-copy" id="copyButtonTrx"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
            <!--USDC Modal -->
        <div class="modal fade" id="usdcModal" tabindex="-1" aria-labelledby="usdcModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="usdcModalLabel">USDC</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="qrcodeUsdc" class="qr-code"></div>
                        <div class="ad d-flex align-items-center">
                            <!-- <input id="inputUsdc" class="qr-input" type="text" value="GBVWHCT5J47XJHZQVTWWZNL2CSTG4KPTLECOSYAVCBNSKJKFNR4UHTFB" readonly> -->
                            <?php 
                                if($wallet['cryptoSelect'] == "usd-coin"){
                                    ?>
                            <input id="inputUsdc" class="qr-input" type="text" value="<?php echo $wallet['newWalletAddress'];?>" readonly>
                            <?php }?>
                            <i class="bi bi-copy" id="copyButtonUsdc"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="app.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>