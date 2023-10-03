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
    
    $msg = "";
    if(isset($_POST['update'])){
        $profilePic = $_FILES['profilePic']['name'];
        $tmp_profilePic = $_FILES['profilePic']['tmp_name'];

        $update = mysqli_query($conn,"UPDATE signup SET `profilePic`='$profilePic' WHERE email='$email'");
        if($update){
                move_uploaded_file($tmp_profilePic,"upload/$profilePic");
                header("location:profile.php");
        }
        else{
                $msg = "Error uploading picture";
        }
    }
    $conn->close();
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | MEGAPROFITSTRADE</title>
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
                                <h2>Profile</h2>
                                <p>Set up your profile</p>
                            </div>
                            <div class="profile-history py-3">
                                <div class="row g-4">
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="balance shadow text-center">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="input">
                                                    <i class="bi bi-person-fill"></i>
                                                    <input type="file" name="profilePic" id="profilePic" required>
                                                    <div class="img">
                                                        <img src="upload/<?php echo $signup['profilePic'];?>" width="100%" alt="">
                                                    </div>
                                                </div>
                                                <center><b>MEGAPROFITSTRADE USER</b></center>
                                                <button type="submit" name="update">Update Picture</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col col-lg-8 col-md-6 col-12">
                                        <div class="mybal shadow">
                                            <h3>User Details</h3>
                                            <div class="users">
                                                <div class="one">
                                                    <p>Firstname:</p>
                                                    <h6><?php echo $signup['firstname']?></h6>
                                                </div>
                                                <div class="one">
                                                    <p>Lastname:</p>
                                                    <h6><?php echo $signup['lastname']?></h6>
                                                </div>
                                                <div class="one">
                                                    <p>Gender:</p>
                                                    <h6><?php echo $signup['gender']?></h6>
                                                </div>
                                                <div class="one">
                                                    <p>Country:</p>
                                                    <h6><?php echo $signup['country']?></h6>
                                                </div>
                                                <div class="one">
                                                    <p>Email:</p>
                                                    <h6><?php echo $signup['email']?></h6>
                                                </div>
                                                <div class="one">
                                                    <p>Phone Number:</p>
                                                    <h6><?php echo $signup['number']?></h6>
                                                </div>
                                            </div>
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