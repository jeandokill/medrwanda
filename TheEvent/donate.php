<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<!-- Background & animion & navbar & title -->
  <div class="container-fluid">
<!-- Background animtion-->
    <div class="background">
       <div class="cube"></div>
       <div class="cube"></div>
       <div class="cube"></div>
       <div class="cube"></div>
      <div class="cube"></div>
    </div>
<!-- header -->
   <header>
<!-- navbar -->
     <nav>
        <ul >
        <li ><a style="font-size:12px;"  href="index.php">Home</a></li>
          <li><a  style="font-size:12px;" href="awareness.php">Awareness</a></li>
          <li><a  style="font-size:12px;"  href="services.php">Services</a></li>
          <li><a  style="font-size:12px;" href="About Us.php">About Us</a></li>
          <li><a  style="font-size:12px;" href="Blog.php">Blog</a></li>
          <li><a  style="font-size:12px;" href="contact.php">Contact</a></li>
          <li><button onclick="location.href='/EVENT/login/login.php'" class="login-button"style="background-color: darkslategray; border-radius: 10px; font-weight: bold; margin-left: 20px; color: lavenderblush;">Login</button></li>
         </ul>
       </nav>
<!-- logo -->
<a href="index.php">
  <div style="font-size:12px;" class="logo"><span>MEDCANCER</span></div>
</a>
<!-- title & content -->
      <section class="header-content">
         <h1 style =" font-size:20px; font-weight: bold; " >DONATE</h1>
        <p style =" font-size:15px; "  > Your generosity fuels the battle against cancer, offering hope and healing to those in need.<br> Every donation, no matter the size, makes a powerful impact in the fight for a world free of cancer.</p>

        <section class="image-section">
            <img src="assets/img/mtn.jpg" alt="Image description">
        </section>

        <button style="font-size:14px; font-weight: bold;" onclick="toggleCode()">I donate on code</button>
        <button style="font-size:14px; font-weight: bold;" onclick="toggleNumber()">I donate on number</button>
        <div id="codeSection" class="hidden">Code: <span id="code" class="large">431810</span></div>
        <div id="numberSection" class="hidden">Number: <span id="number" class="large">+250781182207</span></div>

      </section>
  </header>

  <script>
  var codeVisible = false;
  var numberVisible = false;

  function toggleCode() {
    var codeSection = document.getElementById("codeSection");
    if (!codeVisible) {
      codeSection.style.display = "block";
      setTimeout(function() {
        codeSection.style.opacity = "1";
      }, 100);
      codeVisible = true;
    } else {
      codeSection.style.opacity = "0";
      setTimeout(function() {
        codeSection.style.display = "none";
      }, 300);
      codeVisible = false;
    }
  }

  function toggleNumber() {
    var numberSection = document.getElementById("numberSection");
    if (!numberVisible) {
      numberSection.style.display = "block";
      setTimeout(function() {
        numberSection.style.opacity = "1";
      }, 100);
      numberVisible = true;
    } else {
      numberSection.style.opacity = "0";
      setTimeout(function() {
        numberSection.style.display = "none";
      }, 300);
      numberVisible = false;
    }
  }
</script>

