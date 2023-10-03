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
    

    if(isset($_POST['withdraw'])){
        $type = "withdraw";
        $cryptoSelect = $_POST['cryptoSelect'];
        $amount = $_POST['amount'];
        $convertedAmount = $_POST['convertedAmount'];
        $walletAddress = $_POST['walletAddress'];
        $time = date('Y-m-d H:i:s');

        
        $select_inner = mysqli_query($conn, "SELECT * FROM signup WHERE `email`='$email'");
        $inner = mysqli_fetch_assoc($select_inner);

        // if($convertedAmount < $inner['accountBalance']){
            $insert = mysqli_query($conn, "INSERT INTO `transaction`(`email`, `type`, `cryptoSelect`, `amount`, `convertedAmount`,`walletAddress`, `time`) VALUES ('$email', '$type', '$cryptoSelect', '$amount', '$convertedAmount', '$walletAddress', '$time')");
            if($insert){
                header("location: transaction.php");
            }
            else{
                $msg = "Unapproved withdraw";
            }
        // }
        // else {
        //     $msg = "Your account balance is low";
        //     echo $convertedAmount;
        //     echo $inner['accountBalance'];
        // }
    }
    $conn->close();
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal | MEGAPROFITSTRADE</title>
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
                                <h2>Withdrawal</h2>
                                <p>Add your Withdrawal info and ensure it is accurate, as cryptocurrency transactions are irreversible.</p>
                            </div>
                            <div class="withdraw-history py-3">
                                <div class="row">
                                    <div class="col col-lg-6 col-md-6 col-12 m-auto">
                                        <div class="form shadow p-lg-5 p-md-4 p-3">
                                            <center><i>Kindly wait till your Crypto Amount has been converted...</i></center>
                                            <form action="" method="post">
                                                <label for="cryptoSelect">Select Cryptocurrency and Enter Amount:</label>
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
                                                <label for="walletAddress">Wallet Address:</label>
                                                <input type="text" id="walletAddress" name="walletAddress" placeholder="Enter your wallet address" required>
                                                <label for="usdAmount">Equivalent Amount in USD:</label>
                                                <input type="text" id="usdAmount" name="convertedAmount" readonly required>
                                                <center class="text-danger mt-3"><?php echo $msg;?></center>
                                                <button type="submit" name="withdraw">Submit</button>
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="app.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>