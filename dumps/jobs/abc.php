<!DOCTYPE html>
<html>

<head>
    <title>Job Details - JobSpace</title>
    <link rel="stylesheet" href="../homepage/headstyle.css" />
    <style>
        @import url("https://cdnjs.cloudfare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css");

        @import url("https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap");

        :root {
            --main-color: #2980b9;
            --red: red;
            --light-color: #777;
            --light-bg: #eee;
            --black: #2c3e50;
            --white: #fff;
            --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
            --border: 0.1rem solid rgba(0, 0, 0, 0.3);
        }

        * {
            font-family: "Comfortaa", cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            outline: none;
            border: none;
        }

        body {
            background-color: var(--light-bg);
        }

        section {
            padding: 2rem;
            margin: 0 auto;
            max-width: 1200px;
        }

        .job-details.details {
            background-color: var(--white);
            border-radius: 0.5rem;
            border: var(--border);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .job-details.details h3 {
            margin-bottom: 1rem;
            font-size: 2rem;
            color: var(--black);
            text-transform: capitalize;
            text-overflow: ellipsis;
        }

        .job-details.details.job-info a {
            display: block;
            font-size: 1.6rem;
            color: var(--main-color);
            margin: 0.5rem 0;
        }

        .job-details.details.job-info a:hover {
            text-decoration: underline;
        }

        .job-details.details.job-info p {
            padding: poiu 1rem 0;
            font-size: 1.6rem;
            color: var(--light-color);
        }

        .job-details.details .basic-details {
            background-color: var(--light-bg);
            margin: 1.5rem 0;
            border-radius: 0.5rem;
            padding: 2rem;
            padding-bottom: 0;
        }

        .job-details.details .basic-details p {
            color: var(--light-color);
            padding: 1.5rem;
            font-size: 1.6rem;
        }

        .job-details.details ul {
            margin: 1rem 0;
        }

        .job-details.details ul li {
            padding: 1rem 0;
            font-size: 1.6rem;
            color: var(--light-color);
            margin-left: 3rem;
        }

        .job-details.details .description {
            margin-top: 1.5rem;
        }

        .job-details.details .description p {
            font-size: 1.6rem;
            color: var(--light-color);
            line-height: 1.8;
            padding: 0.5rem 0;
        }

        .job-details.details .save {
            background-color: var(--light-bg);
            border-radius: 0.5rem;
            padding: 1rem 1.5rem;
            cursor: pointer;
            font-size: 1.8rem;
            margin-top: 1rem;
        }

        .job-details.details .save:hover {
            background-color: var(--black);
        }

        .job-details.details .save i {
            margin-right: 0.5rem;
            color: var(--black);
        }

        .job-details.details .save span {
            color: var(--light-color);
        }

        .job-details.details .save:hover i {
            color: var(--white);
        }

        .job-details.details .save:hover span {
            color: var(--white);
        }
    </style>
</head>

<body>
    <header>
        <!-- Include your header content from headstyle.css here -->
        <nav class="navbar">
            <a href="#" class="logo">JobSpace.</a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">View Jobs</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About Us</a>
                </li>
            </ul>

            <div class="signin-signup">
                <div class="join">
                    <a href="my-profile.php" class="sign-in">My Profile</a>
                    <a href="logout.php" class="sign-up">Log Out</a>
                </div>

                <div id="menu-icon" class="fa-solid fa-bars"></div>
            </div>
        </nav>
    </header>

    <section class="job-details">
        <h1 class="heading">job-details</h1>
        <div class="details">
            <div class="job-info">
                <h3>senior web designer</h3>
                <a href="view_company.html">IT infosys co.</a>
                <p><i class="fas fa-map-marker-alt"></i>pokhara, kathmandu</p>
            </div>
            <div class="basic-details">
                <h3>salary</h3>
                <p>10000-25000 per month</p>
                <h3>benefits</h3>
                <p>work from home, health insurance</p>
                <h3>job type</h3>
                <p>part-time</p>
                <h3>schedule</h3>
                <p>day shift</p>
            </div>
            <ul>
                <h3>qualification</h3>
                <li>bachelor's (preferred)</li>
                <li>PHP: 1 year (preferred)</li>
                <li>web design: 1 year (preferred)</li>
                <li>wordpress: 1 year (preferred)</li>
                <li>total work: 3 years (required)</li>
            </ul>
            <ul>
                <li>skills</li>
                <li>html5 and css3</li>
                <li>javascript</li>
                <li>node.js</li>
                <li>react.js</li>
                <li>php</li>
                <li>mysql</li>
            </ul>
            <div class="description">
                <h3>job description</h3>
                <p>lorem ipsum dolor sit amet consecteture ..........</p>
                <ul>
                    <li>Hiring 2 candidate for this role</li>
                    <li>posted 2 days ago</li>
                </ul>
            </div>
            <form action="" method="post" class="flex-btn">
                <input type="submit" value="apply now" name="apply" class="btn">
                <button type="submit"><i class="far fa-heart"></i>save job</button>
            </form>
        </div>
    </section>


    <script src="https://kit.fontawesome.com/156e77427f.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>