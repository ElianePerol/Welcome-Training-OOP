// Wait for the form submission and handle the success/error message
document.addEventListener('DOMContentLoaded', function() {
    // Grab the form and success/error messages
    const form = document.querySelector('form');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    // If the form is being submitted
    form.addEventListener('submit', function() {
        // Check if success or error message exists after form submission
        if (successMessage) {
            // Show success message and set timeout to fade out after 5 seconds
            setTimeout(function() {
                successMessage.classList.add('fade-out');
            }, 2000); // 5 seconds delay
        }

        if (errorMessage) {
            // Show error message and set timeout to fade out after 5 seconds
            setTimeout(function() {
                errorMessage.classList.add('fade-out');
            }, 2000); // 5 seconds delay
        }
    });
});
