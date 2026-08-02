// Toggle password visibility
function togglePassword(id, icon) {
    const input = document.getElementById(id);

    if (input.type === "password") {
        input.type = "text";
        icon.textContent = "🙈";
    } else {
        input.type = "password";
        icon.textContent = "👁";
    }
}

// Login Validation


// Registration Validation
function registerUser() {

    const name = document.getElementById("fullName").value.trim();
    const email = document.getElementById("registerEmail").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("confirmPassword").value;
    const terms = document.getElementById("terms");

    if (name === "" || email === "" || phone === "" || password === "" || confirm === "") {
        alert("Please fill in all fields.");
        return;
    }

    if (password !== confirm) {
        alert("Passwords do not match.");
        return;
    }

    if (!terms.checked) {
        alert("Please accept the Terms & Conditions.");
        return;
    }

    alert("Registration Successful!");

    window.location='home.php'
}