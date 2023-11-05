document.addEventListener('DOMContentLoaded', function () {
    // Get all navigation links and corresponding content divs
    const navLinks = document.querySelectorAll('.nav-links');
    const contentDivs = document.querySelectorAll('.gallery');

    // Function to show the gallery section by default
    function showGallerySection() {
        // Remove the 'active' class from all navigation links
        
        // Hide all content divs
        contentDivs.forEach((contentDiv) => {
            contentDiv.style.display = 'none';
        });

        // Find the index of the 'gallery' link and set it as active
        const galleryIndex = Array.from(navLinks).findIndex((navLink) => {
            return navLink.getAttribute('href') === '#home';
        });

        // If the 'gallery' link is found, set it as active and show the gallery section
        if (galleryIndex !== -1) {
            contentDivs[galleryIndex].style.display = 'block';
        }
    }

    // Show the gallery section by default on page load
    showGallerySection();

    // Add a click event listener to each navigation link
    navLinks.forEach((link, index) => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior

            

            // Hide all content divs
            contentDivs.forEach((contentDiv) => {
                contentDiv.style.display = 'none';
            });

            // Add the 'active' class to the clicked navigation link
           

            // Show the corresponding content div based on the index
            contentDivs[index].style.display = 'block';
        });
    });
});