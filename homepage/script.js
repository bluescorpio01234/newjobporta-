let menu = document.getElementById("menu-icon");
let navList = document.querySelector(".nav-list");

menu.onclick = () => {
  menu.classList.toggle("fa-x");
  navList.classList.toggle("open");
};

// Update the toggleDropdown function
function toggleDropdown() {
  var dropdown = document.getElementById("dropdown");
  dropdown.classList.toggle("show");

  // Add event listener to close dropdown when clicking outside
  if (dropdown.classList.contains("show")) {
    document.addEventListener("click", closeDropdownOutside);
  } else {
    document.removeEventListener("click", closeDropdownOutside);
  }
}

// Function to close the dropdown when clicking outside
function closeDropdownOutside(event) {
  var dropdown = document.getElementById("dropdown");
  if (!dropdown.contains(event.target)) {
    dropdown.classList.remove("show");
    document.removeEventListener("click", closeDropdownOutside);
  }
}

//Nav bar action
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
  sections.forEach(sec =>{
    let top = window.scrollY;
    let offset = sec.offsetTop;
    let height = sec.offsetHeight;
    let id = sec.getAttribute('id');

    if (top >= offset && top < offset + height ){
      navLinks.forEach(links => {
        links.classList.remove('nav-link');
        document.querySelector('header nav a [href*= ' + id +']').classList.add('nav-link')
      })
    }

  })
}
