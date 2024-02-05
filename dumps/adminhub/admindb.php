<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!--Boxicons-->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/156e77427f.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="astyle.css" />
  </head>
  <body>
    <!--SIDEBAR-->
    <section id="sidebar">
      <a href="#" class="brand">
        <i class="fa-solid fa-briefcase"></i>
        <span class="text">&nbsp; JobSpace.</span>
      </a>
      <ul class="side-menu top">
        <li class="active">
          <a href="#">
            <i class="bx bxs-dashboard"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-group"></i>
            <span class="text">JobSeekers</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-store"></i>
            <span class="text">Company</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-group"></i>
            <span class="text">Jobs</span>
          </a>
        </li>
      </ul>

      <ul class="side-menu">
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="text">Settings</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-log-out-circle"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!--SIDEBAR-->
    <!-- CONTENT -->
    <section id="content">
      <!-- NAVBAR -->
      <nav>
        <i class="bx bx-menu"></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
          <div class="form-input">
            <input type="search" placeholder="Search..." />
            <button type="submit" class="search-btn">
              <i class="bx bx-search"></i>
            </button>
          </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
          <i class="bx bxs-bell"></i>
          <span class="num">8</span>
        </a>
        <a href="#" class="profile">
          <img src="image/1.jpg" />
        </a>
      </nav>
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Home</a>
              </li>
            </ul>
          </div>
          <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
          </a>
        </div>

        <ul class="box-info">
          <li>
            <i class="bx bxs-calendar-check"></i>
            <span class="text">
              <h3>1000</h3>
              <p>New Jobs</p>
            </span>
          </li>
          <li>
            <i class="bx bxs-group"></i>
            <span class="text">
              <h3>1500</h3>
              <p>Job Seekers</p>
            </span>
          </li>
          <li>
            <i class="bx bxs-home"></i>
            <span class="text">
              <h3>100</h3>
              <p>Companies</p>
            </span>
          </li>
        </ul>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Recent Jobs</h3>
              <i class="bx bx-search"></i>
              <i class="bx bx-filter"></i>
            </div>
            <table>
              <thead>
                <tr>
                  <th>User</th>
                  <th>Upload Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="image/1.jpg" />
                    <p>Roman</p>
                  </td>
                  <td>2080-1-20</td>
                  <td><span class="status completed">Approved</span></td>
                </tr>
                <tr>
                  <td>
                    <img src="image/2.jpg" />
                    <p>Naresh</p>
                  </td>
                  <td>2080-1-21</td>
                  <td><span class="status pending">Declined</span></td>
                </tr>
                <tr>
                  <td>
                    <img src="image/1.jpg" />
                    <p>Arbeen</p>
                  </td>
                  <td>2080-1-22</td>
                  <td><span class="status process">Pending</span></td>
                </tr>
                <tr>
                  <td>
                    <img src="image/2.jpg" />
                    <p>Sulav</p>
                  </td>
                  <td>2080-1-23</td>
                  <td><span class="status pending">Declined</span></td>
                </tr>
                <tr>
                  <td>
                    <img src="image/1.jpg" />
                    <p>Chiran</p>
                  </td>
                  <td>2080-1-24</td>
                  <td><span class="status completed">Approved</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="todo">
            <div class="head">
              <h3>Todos</h3>
              <i class="bx bx-plus"></i>
              <i class="bx bx-filter"></i>
            </div>
            <ul class="todo-list">
              <li class="completed">
                <p>Review Jobs</p>
                <i class="bx bx-dots-vertical-rounded"></i>
              </li>
              <li class="completed">
                <p>Add Company</p>
                <i class="bx bx-dots-vertical-rounded"></i>
              </li>
              <li class="not-completed">
                <p>Delete Expired Jobs</p>
                <i class="bx bx-dots-vertical-rounded"></i>
              </li>
              <li class="completed">
                <p>Approve Jobs</p>
                <i class="bx bx-dots-vertical-rounded"></i>
              </li>
              <li class="not-completed">
                <p>Delete Job Seekers</p>
                <i class="bx bx-dots-vertical-rounded"></i>
              </li>
            </ul>
          </div>
        </div>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="script.js"></script>
  </body>
</html>
