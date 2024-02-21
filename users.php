<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
  exit();
}

// Fetch user details
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
  $row = mysqli_fetch_assoc($sql);
}



?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          
            
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Դուրս գալ</a>
      </header>
      <div class="search">
        <span class="text">Ընտրեք օգտվողին զրույց սկսելու համար</span>
        <input type="text" placeholder="Մուտքագրեք անունը որոնման համար...">
        <button><i class="fas fa-search"></i></button>
      </div>

      
        
       

      <div class="users-list">
     
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>
