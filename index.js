document.addEventListener("DOMContentLoaded", () => {
    // Smooth scrolling for all nav links
   /*
     document.querySelectorAll('a[href^="#"], .header2 nav ul li , footer .foot1-ul a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href").split("#")[1];
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 50, // Offset to account for sticky header
                    behavior: "smooth"
                });
            }
        });
    });

   */
    // Sticky header on scroll
    const header = document.querySelector("header");
    const sticky = header.offsetTop;
    window.addEventListener("scroll", () => {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    });

    // Highlight active section in nav as you scroll
    const sections = document.querySelectorAll("main section");
    const navLinks = document.querySelectorAll(".header2 nav ul li a");
    window.addEventListener("scroll", () => {
        let currentSection = "";
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 60;
            if (window.pageYOffset >= sectionTop) {
                currentSection = section.getAttribute("id");
            }
        });

        navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.getAttribute("href").includes(currentSection)) {
                link.classList.add("active");
            }
        });
    });

    // Search button interaction
    const searchButton = document.querySelector('.search-btn');
    const searchInput = document.querySelector('.searchinput');
    searchButton.addEventListener('click', () => {
        const query = searchInput.value.trim();
        if (query) {
            alert(`Searching for: ${query}`);
            // Replace with actual search functionality if available
        } else {
            alert('Please enter a search term.');
        }
    });
});
