document.addEventListener('DOMContentLoaded', function() {
    // Get the dropdown button and content
    const dropbtn = document.querySelector('.dropbtn');
    const dropdownContent = document.querySelector('.dropdown-content');

    // Show the dropdown content when hovering over the button
    dropbtn.addEventListener('mouseover', function() {
        dropdownContent.style.display = 'block';
    });

    // Hide the dropdown content when not hovering over the button or content
    dropbtn.addEventListener('mouseout', function() {
        setTimeout(function() {
            if (!dropdownContent.matches(':hover') && !dropbtn.matches(':hover')) {
                dropdownContent.style.display = 'none';
            }
        }, 100); // Small delay to allow for hovering over content
    });

    dropdownContent.addEventListener('mouseover', function() {
        dropdownContent.style.display = 'block';
    });

    dropdownContent.addEventListener('mouseout', function() {
        setTimeout(function() {
            if (!dropdownContent.matches(':hover') && !dropbtn.matches(':hover')) {
                dropdownContent.style.display = 'none';
            }
        }, 100); // Small delay to allow for hovering over button
    });
});
