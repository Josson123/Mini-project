

// Handle dynamic nav update
window.addEventListener('DOMContentLoaded', function() {
    let isLoggedIn = localStorage.getItem('loggedIn') === 'true';
    
    if (isLoggedIn) {
        // Add 'Log out' option to the nav
        let logoutLink = document.createElement('li');
        logoutLink.innerHTML = '<a href="#" id="logout-nav">Log out</a>';
        document.getElementById('nav-list').appendChild(logoutLink);

        // Hide the 'Login' link
        document.getElementById('login-nav').style.display = 'none';

        // Log out event
        document.getElementById('logout-nav').addEventListener('click', function () {
            localStorage.removeItem('loggedIn');
            alert('Logout successful!');
            window.location.href = 'index.html';  // Redirect to home page
        });
    }
});

// Handle checking availability (Home page logic)
document.getElementById('bike-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('bikes-list').innerHTML = '<li>Bike 1</li><li>Bike 2</li><li>Bike 3</li>';
    document.getElementById('book-btn').classList.remove('hidden');
});

// Handle booking (Home page logic)
document.getElementById('book-btn')?.addEventListener('click', function() {
    let isLoggedIn = localStorage.getItem('loggedIn') === 'true';

    if (!isLoggedIn) {
        alert('You need to log in to rent a bike.');
        window.location.href = 'login.html';
    } else {
        alert('Bike booked successfully!');
    }
});

// Handle login (Login page logic)
document.getElementById('login-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    if (email === 'user@example.com' && password === 'password') {
        localStorage.setItem('loggedIn', 'true');
        window.location.href = 'index.html';  // Redirect to home page after login
    } else {
        alert('Invalid login credentials.');
    }
});

// Handle profile edit (Profile page logic)
document.getElementById('edit-profile-btn')?.addEventListener('click', function() {
    document.getElementById('edit-profile-form').classList.toggle('hidden');
});

document.getElementById('profile-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    let newName = document.getElementById('edit-name').value;
    let newPhone = document.getElementById('edit-phone').value;

    alert('Profile updated successfully!');
});
