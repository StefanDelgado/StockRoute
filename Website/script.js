document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".sidebar nav ul li");
    const sections = document.querySelectorAll(".section");

    // Function to switch sections
    function showSection(index) {
        sections.forEach(section => section.style.display = "none");
        sections[index].style.display = "block";

        menuItems.forEach(item => item.classList.remove("active"));
        menuItems[index].classList.add("active");
    }

    // Add event listeners to menu items
    menuItems.forEach((item, index) => {
        item.addEventListener("click", function () {
            showSection(index);
        });
    });

    // Show only the dashboard section by default
    showSection(0);
});
