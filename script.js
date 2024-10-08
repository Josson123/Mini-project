
// Simulating user login status using localStorage (replace this logic with your backend login session)
let isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

document.addEventListener("DOMContentLoaded", () => {
    updateNav();

    document.getElementById('login-link').addEventListener('click', function(e) {
        if (isLoggedIn) {
            // Log out logic
            localStorage.setItem("isLoggedIn", "false");
            isLoggedIn = false;
            updateNav();
            e.preventDefault(); // Prevent redirect if logging out
        }
    });
});

function updateNav() {
    const loginLink = document.getElementById('login-link');
    const profileLink = document.getElementById('profile-link');

    if (isLoggedIn) {
        loginLink.innerHTML = 'Logout';
        loginLink.href = '#'; // Prevent navigation on logout
        profileLink.classList.remove('disabled');
        profileLink.setAttribute('aria-disabled', 'false');
    } else {
        loginLink.innerHTML = 'Login';
        loginLink.href = 'login.php'; // Link to the login page
        profileLink.classList.add('disabled');
        profileLink.setAttribute('aria-disabled', 'true');
    }
}
