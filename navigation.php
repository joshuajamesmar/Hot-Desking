

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
          <a href="contact.php" ><img id="cont" src="icons\icons8-ask-question-48.png " alt="">Contact Us</a>
          <img src="icons\icons8-user-48.png" alt="" class="click">
        </ul>
    
        <div class="list">
          <a href="profile.php" class="links">Profile</a>
          <a href="logout.php"class="links">Logout</a>
        </div>
      </div>
</div>

<script>
// When the user scrolls down 20px from the top of the document, slide down the navbar
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementByClass("nav-btn").style.top = "0";
  } else {
    document.getElementByClass("nav-btn").style.top = "-50px";
  }
}
</script>