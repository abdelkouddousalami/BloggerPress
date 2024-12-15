
function toggleForm() {
    const formTitle = document.getElementById('form-title');
    const authForm = document.getElementById('auth-form');
    const toggleLink = document.getElementById('toggle-link');

    if (formTitle.textContent === 'Sign In') {
        formTitle.textContent = 'Sign Up';
        authForm.innerHTML = `
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn">Sign Up</button>
        `;
        toggleLink.textContent = 'Sign In';
    } else {
        formTitle.textContent = 'Sign In';
        authForm.innerHTML = `
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn">Sign In</button>
        `;
        toggleLink.textContent = 'Sign Up';
    }
}
