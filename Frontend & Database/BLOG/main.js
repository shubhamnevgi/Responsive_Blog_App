const navItems = document.querySelector('.nav__items');
const OpenNavBtn = document.querySelector('#open__nav-btn');
const CloseNavBtn = document.querySelector('#close__nav-btn');

//OPEN NAV DROPDOWN
const openNav = () => {
    navItems.style.display = 'flex';
    OpenNavBtn.style.display = 'none';
    CloseNavBtn.style.display = 'inline-block';
}

//CLOSE NAV DROPDOWN
const closeNav = () => {
    navItems.style.display = 'none';
    OpenNavBtn.style.display = 'inline-block';
    CloseNavBtn.style.display = 'none ';
}

OpenNavBtn.addEventListener('click', openNav);
CloseNavBtn.addEventListener('click', closeNav);

/*================== END OF NAV ================== */


const sidebar = document.querySelector('aside');
const showSidebarbtn = document.querySelector('#show__sidebar-btn');
const hideSidebarbtn = document.querySelector('#hide__sidebar-btn');

//Show sidebar for small devices
const showSidebar = () => {
    sidebar.style.left = '0';
    showSidebarbtn.style.display = 'none';
    hideSidebarbtn.style.display = 'inline-block';
}

//Hide sidebar for small devices
const hideSidebar = () => {
    sidebar.style.left = '-100%';
    showSidebarbtn.style.display = 'inline-block';
    hideSidebarbtn.style.display = 'none';
}

showSidebarbtn.addEventListener('click',showSidebar);
hideSidebarbtn.addEventListener('click',hideSidebar);
