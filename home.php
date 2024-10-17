<!-- <?php

// @include 'config.php';
// session_start();

// $user_bookings = "";

// $search = "";

// $id = $_SESSION['user_id'];

// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// $select = "SELECT * FROM bookings WHERE user_id = '{$id}'";
// $result = mysqli_query($conn, $select);
// $row_count = mysqli_num_rows($result);

// if ($row_count > 0) {
//   while($row = mysqli_fetch_assoc($result)) {
//     $booking = $row['booking_id'];
//     $start = $row['start'];
//     $end = $row['end'];
//     $desk_num = $row['desk_num'];


//     $user_bookings .= "

//     <div id='ubooked'>
//             <h4>Booking ID: $booking</h4>
//             <h6>Start Date:</h6>
//               <div>$start</div>
//             <h6>End Date:</h6>
//               <div>$end</div>
//             <h6>Desk Number:</h6>
//               <div>$desk_num</div>
//           </div>
//     ";
//   }
// }

?> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/home.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&display=swap"
      rel="stylesheet"
    />
    <title>Home</title>
  </head>
  <body>
    <div class="nav">
      <div class="container-left">
        <a href="home.php"><img
          id="lg"
          src="images/lavaroom-logo.png "
          alt="logo"
        /></a>

        <div class="nav-btn">
          <ul>
            <a href="bookings.php"><img src="icons\icons8-book-48.png" alt="">Bookings</a>
            <a href="viewpage.php"><img src="icons\icons8-view-schedule-48.png" alt="">Available Desks</a>
          </ul>
        </div>
      </div>

      <div class="profile-container">
        <ul id="profile">
          <a href="contactus.php" ><img id="cont" src="icons\icons8-ask-question-48.png " alt="">Contact Us</a>
          <img src="icons\icons8-user-48.png" alt="" class="click">
        </ul>
    
        <div class="list">
          <a href="profile.php" class="links">Profile</a>
          <a href="logout.php"class="links">Logout</a>
        </div>
      </div>
    </div>

    <div class="main-container">
      <div class="left-side">
        <form class="left-container" method="GET">
          <input type="text" placeholder="Search your bookings" name="search"/>
          <button name="search">Search</button>
          <hr/>
        <?php
          echo $user_bookings;
        ?>
        </form>
      </div>

      <div class="right-side">
        <h1 id="ctop">Calendar</h1>
        <iframe src="https://calendar.google.com/calendar/embed?height=800&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FManila&src=ZzdrYXN0aWVsQGdtYWlsLmNvbQ&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=ZmFtaWx5MDU5MDkzNzU5MjA4NDgyNTcyNzhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=ZW4ucGhpbGlwcGluZXMjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%2333B679&color=%239E69AF&color=%230B8043" style="border:solid 1px #777" width="auto" height= "auto" frameborder="0" scrolling=""></iframe>
      </div>
    </div>

    <script>
      let click = document.querySelector(".click");
      let list = document.querySelector(".list");
      click.addEventListener("click", () => {
        list.classList.toggle("newlist");
      });
    </script>
  </body>
</html>


<!-- <style>
div.list{
  border: 1px rgb(128, 26, 26);
}
</style> -->