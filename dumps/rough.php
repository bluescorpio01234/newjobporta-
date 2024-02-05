<!-- AddCompanyForm.html -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JobSpace</title>
  <link rel="stylesheet" href="headstyle.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap");

    body {
      background-color: #ffffff;
      color: #3c91e6;
      font-family: "Poppins", sans-serif;
      font-family: "Lato", sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      margin-top: 50px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="file"] {
      width: 95%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ddd;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      background-color: #3c91e6;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: rgb(23, 64, 126);
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar">
      <a href="#" class="logo">JobSpace.</a>
      <ul class="nav-list">
        <li class="nav-item">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Post a Job</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Available Jobs</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">About Us</a>
        </li>
      </ul>

      <div class="signin-signup">
        <div class="join">
          <a href="#" class="sign-in" onclick="toggleDropdown()">Get Started <i class="fa-solid fa-chevron-down"></i></a>
          <div id="dropdown" class="dropdown">
            <a href="#" class="dropdown-item"><i class="fa-solid fa-user"></i> As a Jobseeker</a>
            <a href="./company/company-login.php" class="dropdown-item"><i class="fa-solid fa-building"></i> As a Company</a>
          </div>
        </div>
        <div id="menu-icon" class="fa-solid fa-bars"></div>
      </div>
    </nav>
    <!-- </header> -->
    <div class="banner">
      <div class="banner-text">
        <p>
          Any Industry, Any Loction, Any Experience
          <i class="fa-solid fa-briefcase"></i>
        </p>
        <h2>Hey! Searching for a Job?</h2>
        <p>
          Then you are in a good place. JobSpace here is waiting for talents
          like you to get hired.
        </p>
        <div class="search-box">
          <i class="fa-brands fa-searchengin"></i>
          <input type="search" name="search-box" id="-search-box" placeholder="Search your dream job" />
          <button class="btn">Search</button>
        </div>

        <div class="candidate">
          <div class="box box-1">
            <img src="../images/4.png" alt="" />
          </div>
          <div class="box box-2">
            <img src="../images/1.png" alt="" />
          </div>
          <div class="box box-3">
            <img src="../images/2.png" alt="" />
          </div>
          <div class="box box-4">
            <img src="../images/3.png" alt="" />
          </div>
          <div class="box box5">
            <p>200+</p>
          </div>
        </div>
      </div>
      <div class="banner-img">
        <img src="../images/banner1.png" alt="banner" />
      </div>
    </div>

    <div class="categories">
      <div class="categorie-text">
        <h4>High Demand Categories Featured</h4>
      </div>
      <div class="categorie">
        <div class="categorie-box">
          <p class="fa-solid fa-microchip fa-fade"></p>
          <p>AI Engineer</p>
        </div>
        <div class="categorie-box">
          <p class="fa-solid fa-code fa-fade"></p>
          <p>Web Development</p>
        </div>
        <div class="categorie-box">
          <p class="fa-solid fa-chart-line fa-fade"></p>
          <p>Marketing</p>
        </div>
        <div class="categorie-box">
          <p class="fa-solid fa-gamepad fa-fade"></p>
          <p>Game Developer</p>
        </div>
      </div>
    </div>
  </header>
  <script src="https://kit.fontawesome.com/156e77427f.js" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>