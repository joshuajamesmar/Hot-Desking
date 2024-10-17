<!-- <?php

    @include 'config.php';
    session_start();
    $id = $_SESSION['user_id'];


    $start = "";
    $end = "";
    $desk_num = "";
    $error_message = "";

    if(isset($_POST['submit']))
    {

        $start = mysqli_real_escape_string($conn, $_POST['start']);
        $end = mysqli_real_escape_string($conn, $_POST['end']);
        $desk_num = mysqli_real_escape_string($conn, $_POST['desk_num']);

        if (empty($start) || empty($end) || empty($desk_num)) {
            $error_message = "All fields are required!";
        } else 
        
        {
            $unv = "SELECT * FROM bookings WHERE start = '$start' and desk_num = '$desk_num'";
            $result = mysqli_query($conn, $unv);
            $row_count = mysqli_num_rows($result);
            if($row_count > 0){
                $error_message = "Desk Unavailable!";
            }else {
                $insert = "INSERT INTO bookings (user_id, start, end, desk_num) VALUES('$id', '$start', '$end', '$desk_num')";
                $query_run = mysqli_query($conn, $insert);
        
                if($query_run){
                    echo "<script>alert('Booked Successfully!')</script>";
                }
                else {

                };
            };
    
        };
    };
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/navigation.css">
    <title>Lava Room | Bookings</title>
</head>
<body>

    <?php require 'navigation.php'?>

     <div class="main-container">
        <div class="left-div">
            <h3>Floors</h3>
            <a href=""><h4>01</h4></a>
            <a href=""><h4>02</h4></a>
        </div>

        <div class="mid-div"></div>

        <form action="" class="right-div" method="POST">
        
            <h2 id="work">Workspace Booking</h2>

            <label for="start">Start Date</label>
            <input type="date" name="start" id="dates">

            <label for="start">End Date</label>
            <input type="date" name="end" id="dates">

            <label for="desk_num">Desk Number</label>
            <select name="desk_num" id="desk_num">
                <option value="">Select Desk Number</option>
                <option value="A1">Desk A1</option>
                <option value="A2">Desk A2</option>
                <option value="A3">Desk A3</option>
                <option value="A4">Desk A4</option>
                <option value="A5">Desk A5</option>
                <option value="A6">Desk A6</option>
                <option value="B1">Desk B1</option>
                <option value="B2">Desk B2</option>
            </select>

            <?php if (!empty($error_message)) { ?>
                <div class="alert"><?php echo $error_message ?></div>
            <?php }?>

            <button type="submit" name="submit" id="sub">Start Booking!</button>
        </form>
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