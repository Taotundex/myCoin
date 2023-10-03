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
    <title>Transaction | MEGAPROFITSTRADE</title>
    <link rel="stylesheet" href="styling.css">
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
                                <h2>Transaction</h2>
                                <p>Keep your account credentials and transaction details secure.</p>
                            </div>
                            <div class="transaction-history shadow">
                                <div class="transact">
                                    <h4>Transaction Details</h4>
                                    <table>
                                        <tr>
                                            <th>Transaction Type</th>
                                            <th>Cryptocurrency Type</th>
                                            <th>Crytocurrency Amount</th>
                                            <th>Amount in USD</th>
                                            <th>Wallet Address</th>
                                            <th>Datetime</th>
                                        </tr>
                                        <?php
                                            if ($select_transaction == ""){
                                                echo '<tr>
                                                        <td colspan="100"><center><i>No transaction yet...</i></center></td>
                                                    </tr>
                                                ';
                                            }
                                            else {
                                                while ($transaction = mysqli_fetch_assoc($select_transaction)) {
                                        ?>
                                        <tr>
                                            <td>
                                            <?php echo $transaction['type'];?>     
                                            </td>
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
                                        <?php }} ?>
                                    </table>
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