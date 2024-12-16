
function toggleForm() {
    const formTitle = document.getElementById('form-title');
    const authForm = document.getElementById('auth-form');
    const toggleLink = document.getElementById('toggle-link');

    if (formTitle.textContent === 'Sign In') {
        formTitle.textContent = 'Sign Up';
        authForm.innerHTML = `
                <form id="auth-form" action="connect.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" required>
                                    <option value="visitor">Visitor</option>
                                    <option value="author">Author</option>
                                </select>
                            </div>
                            <button type="submit" class="btn">Sign Up</button>
                </form>

                        `;
        toggleLink.textContent = 'Sign In';
    } else {
        formTitle.textContent = 'Sign In';
        authForm.innerHTML = `
                <form id="auth-form" action="connect.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" name="password" required>
                        </div>
                        <button type="submit" class="btn">Sign In</button>
                
                </form>   
                     `;
        toggleLink.textContent = 'Sign Up';
    }
}
