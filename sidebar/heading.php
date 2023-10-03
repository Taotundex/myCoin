<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <!-- <div class="offcanvas-body"> -->
        <section class="sidebar shadow">
            <div class="img d-flex w-100">
                <img src="images/logo1.png" alt="" width="100%">
                <!-- <i class="bi bi-x btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></i> -->
            </div>
            <hr>
            <div class="menu">
                <a href="dashboard.php" class="shadow">
                    <i class="bi bi-house-door-fill"></i>
                    Dashboard
                </a>
                <a href="deposit.php" class="shadow">
                    <i class="bi bi-cash-coin"></i>
                    Deposit
                </a>
                <a href="withdraw.php" class="shadow">
                    <i class="bi bi-credit-card-fill"></i>
                    Withdrawal
                </a>
                <a href="transaction.php" class="shadow">
                    <i class="bi bi-bar-chart-fill"></i>
                    Transaction
                </a>
                <a href="upgrade.php" class="shadow">
                    <i class="bi bi-boxes"></i>
                    Upgrade Plan
                </a>
                <hr>
                <a href="logout.php" class="shadow">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </a>
            </div>
        </section>
    <!-- </div> -->
</div>
<div class="row g-0">
    <div class="col col-lg-2 col-md-3 col-12 myPosition d-lg-block d-md-block d-none">
        <section class="sidebar shadow">
            <div class="container py-3">
                <div class="img">
                    <img src="images/logo1.png" alt="" width="100%">
                </div>
                <hr>
                <div class="menu">
                    <a href="dashboard.php" class="shadow">
                        <i class="bi bi-house-door-fill"></i>
                        Dashboard
                    </a>
                    <a href="deposit.php" class="shadow">
                        <i class="bi bi-cash-coin"></i>
                        Deposit
                    </a>
                    <a href="withdraw.php" class="shadow">
                        <i class="bi bi-credit-card-fill"></i>
                        Withdrawal
                    </a>
                    <a href="transaction.php" class="shadow">
                        <i class="bi bi-bar-chart-fill"></i>
                        Transaction
                    </a>
                    <a href="upgrade.php" class="shadow">
                        <i class="bi bi-boxes"></i>
                        Upgrade Plan
                    </a>
                    <hr>
                    <a href="logout.php" class="shadow">
                        <i class="bi bi-box-arrow-left"></i>
                        Logout
                    </a>
                </div>
            </div>
        </section>
    </div>
    <div class="col col-lg-10 col-md-9 col-12">
        <section class="body">
            <div class="container">
                <nav class="w-100 py-2 px-3 shadow">
                    <i class="bi bi-list" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></i>
                    <a href="profile.php" class="profile text-decoration-none">
                        <div class="name">
                            <p>Hello</p>
                            <h4><?php echo $signup['firstname']?>!</h4>
                        </div>
                        <?php
                            if($signup['profilePic'] == ""){
                            ?>
                            <i class="bi bi-person-fill"></i>;
                            <?php }
                            else {
                                ?>
                            <img src="upload/<?php echo $signup['profilePic'];?>" width="100%" alt="">
                        <?php }?>
                    </a>
                </nav>