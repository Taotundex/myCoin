<?php
    session_start();
    include "../connect.php";

    if(!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
    }

    $msg = "";
    if(isset($_POST['update'])){
        $cryptoSelect = $_POST['cryptoSelect'];
        $newWalletAddress = $_POST['newWalletAddress'];

        $selectWallet = mysqli_query($conn, "SELECT * FROM wallet WHERE cryptoSelect = '$cryptoSelect'");
        // $wallet = mysqli_fetch_assoc($select_wallet);
        
        if ($selectWallet->num_rows > 0) {
            // Coin type exists, update the wallet address
            $updateQuery = "UPDATE wallet SET `cryptoSelect` = '$cryptoSelect', `newWalletAddress` = '$newWalletAddress' WHERE `cryptoSelect` = '$cryptoSelect'";
            if ($conn->query($updateQuery) === TRUE) {
                $msg = "Wallet address for $cryptoSelect updated successfully.";
            } else {
                $msg = "Error updating wallet address: " . $conn->error;
            }
        } else {
            // Coin type does not exist, insert a new record
            $insertQuery = "INSERT INTO wallet (`cryptoSelect`, `newWalletAddress`) VALUES ('$cryptoSelect', '$newWalletAddress')";
            if ($conn->query($insertQuery) === TRUE) {
                $msg = "Wallet address for $cryptoSelect inserted successfully.";
            } else {
                $msg = "Error inserting wallet address: " . $conn->error;
            }
        }
        
    }

    
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet | MEGAPROFITSTRADE</title>
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://kit.fontawesome.com/be0461b2be.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .admin{
        height: 100vh;
        background-attachment: fixed;
        overflow-y: scroll;
    }
</style>
<body>
    <div class="megaprofits">
        <div class="admin">
            <nav class="navbar navbar-expand-lg sticky-top shadow">
                <div class="container">
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <img src="../images/logo1.png" width="100%" alt="">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">User details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="transaction.php">Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="wallet.php">Wallet details</a>
                            </li>
                        </ul>
                        <a href="../logout.php" class="ms-auto">
                            <button>Logout</button>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="row g-0">
                <div class="col col-12">
                    <section class="body">
                        <div class="container">
                            <div class="content p-3">
                                <div class="head text-center">
                                    <h2>Wallet Update</h2>
                                </div>
                                <div class="withdraw-history py-3">
                                    <div class="row">
                                        <div class="col col-lg-6 col-md-6 col-12 m-auto">
                                            <div class="form shadow p-lg-5 p-md-4 p-3">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <label for="cryptoSelect">Select Cryptocurrency Type and Enter New Wallet Address:</label>
                                                    <div class="d-flex">
                                                        <select id="cryptoSelect" name="cryptoSelect">
                                                            <option value="bitcoin">BTC</option>
                                                            <option value="tether">USDT</option>
                                                            <option value="ethereum">ETH</option>
                                                            <option value="usd-coin">USDC</option>
                                                            <option value="tron">TRX</option>
                                                        </select>
                                                        <input type="text" id="newWalletAddress" name="newWalletAddress" placeholder="Enter New Wallet Address" required>
                                                    </div>
                                                    <!-- <label for="newQrcode">Upload New QRCode:</label>
                                                    <input type="file" id="newQrcode" name="newQrcode" required> -->
                                                    <center style="color: #efd777;" class="mt-3 fs-7"><i><?php echo $msg;?></i></center>
                                                    <button type="submit" name="update">Update</button>
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="app.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>