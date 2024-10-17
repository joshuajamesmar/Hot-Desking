<!-- <?php
    @include 'config.php';
    session_start();
    
    $id = $_SESSION['user_id'];
    
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $select = "SELECT * FROM users WHERE user_id = '{$id}'";
    $result = mysqli_query($conn, $select);
    $row_count = mysqli_num_rows($result);
    
    if ($row_count > 0) {
      if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
      }
    }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&display=swap" rel="stylesheet">
    <title>Lava Room | Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/navigation.css">
</head>
<body>

    <?php require 'navigation.php'?>

    <div class="main-container">
        
        <div class="top-header">
            <h1>Profile</h1>
            <a href=""><img src="icons\icons8-notification-48.png" alt="notification-icon" id="notif"></a>
        </div>

        <div class="infos">
            
            <h3>Full Name</h3>
            <input type="text" placeholder="<?php echo $name ?>" name="fullname">
            <h3>Email Address</h3>
            <input type="email" placeholder="<?php echo $email ?>" name="email">
            <h3>Phone Number</h3>
            <input type="text" placeholder="" name="phone">
            <h3>City</h3>
            <input type="text" placeholder="" name="city">
            <h3>Province</h3>
            <input type="text" placeholder="" name="province">
            <h3>Country</h3>
            <input type="text" placeholder="" name="country">
            <h3>Zip Code</h3>
            <input type="text" placeholder="" id="zip" name="zip">
            <a href=""><button id="cp">Save Changes</button></a>
            <div class="btn-below">
                <a href="home.php"><button>Back to Home</button></a>
                <a href=""><button>Change Password</button></a>
            </div>
        </div>


    </div>



    <script>
        let click = document.querySelector('.click');
        let list = document.querySelector('.list');
        click.addEventListener("click", ()=>{
            list.classList.toggle('newlist');
        });
    </script>
    
</body>
</html>