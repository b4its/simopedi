// Update current time
function updateTime() {
    const now = new Date();
    document.getElementById('current-time').textContent = now.toLocaleTimeString();
}
updateTime();
setInterval(updateTime, 1000);

// // Sidebar toggle for mobile
// const sidebar = document.getElementById('sidebar');
// const sidebarToggle = document.getElementById('sidebar-toggle');
// const closeSidebar = document.getElementById('close-sidebar');

// sidebarToggle.addEventListener('click', function() {
//     sidebar.classList.toggle('hidden');
//     sidebar.classList.toggle('block');
// });

// closeSidebar.addEventListener('click', function() {
//     sidebar.classList.add('hidden');
//     sidebar.classList.remove('block');
// });