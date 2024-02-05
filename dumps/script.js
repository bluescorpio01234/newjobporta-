let menu = document.getElementById("menu-icon");
let navList = document.querySelector(".nav-list");

menu.onclick = () => {
  menu.classList.toggle("fa-x");
  navList.classList.toggle("open");
};
function toggleDropdown() {
  var dropdown = document.getElementById("dropdown");
  dropdown.classList.toggle("show");
}
{
  /* <div class="signin-signup">
                <div class="join">
                    <a href="my-profile.php" class="sign-in">My Profile</a>
                    <a href="logout.php" class="sign-up">Log Out</a>
                </div> */
}
