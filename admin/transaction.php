<?php
    session_start();
    include "../connect.php";
    
    $email = $_SESSION['email'];
    if(!isset($_SESSION['email'])) {
        header("Location: ../login.php");
        exit();
    }

    
    // $select_signup = mysqli_query($conn, "SELECT * FROM signup WHERE `email`='$email'");
    // $signup = mysqli_fetch_assoc($select_signup);

    $select_transaction = mysqli_query($conn, "SELECT * FROM `transaction`");
    
    
    $conn->close();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction | MEGAPROFITSTRADE</title>
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
                                <a class="nav-link active text-white" aria-current="page" href="transaction.php">Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="wallet.php">Wallet details</a>
                            </li>
                        </ul>
                        <a href="../logout.php" class="ms-auto">
                            <button>Logout</button>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="details my-5 text-center">
                <h2 class="mb-4">Transaction Details</h2>
                <div class="container-fluid">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Email Address</th>
                            <th>Transaction Type</th>
                            <th>Cryptocurrency Type</th>
                            <th>Crytocurrency Amount</th>
                            <th>Amount in USD</th>
                            <th>Wallet Address</th>
                            <th>Datetime</th>
                        </tr>
                        <?php 
                            while ($transaction = mysqli_fetch_assoc($select_transaction)) {
                                ?>
                        <tr>
                            <td><?php echo $transaction['id'];?></td>
                            <td><?php echo $transaction['email'];?></td>
                            <td><?php echo $transaction['type'];?></td>
                            <td><?php echo $transaction['cryptoSelect'];?></td>
                            <td><?php echo $transaction['amount'];?></td>
                            <td><?php echo $transaction['convertedAmount'];?></td>
                            <td>
                                <?php
                                    if ($transaction['type'] == "withdraw"){
                                        echo $transaction['walletAddress'];
                                    }else {
                                        echo '------------';
                                    }
                                ?>  
                            </td>
                            <td><?php echo $transaction['time'];?></td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>