document.getElementById('registrationForm').addEventListener('submit', function(event) {
    // Get input values
    let fullName = document.getElementById('full_name').value.trim();
    let userName = document.getElementById('user_name').value.trim();
    let email = document.getElementById('email').value.trim();
    let phone = document.getElementById('phone').value.trim();
    let whatsapp = document.getElementById('whatsapp').value.trim();
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm_password').value;
    let userImage = document.getElementById('user_image').value.trim();

    // Regular expressions
    let nameRegex = /^[a-zA-Z ]+$/;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let phoneRegex = /^[0-9]{10,15}$/;
    let passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

    // Validation checks
    if (!fullName || !nameRegex.test(fullName)) {
        alert('Full Name must contain only letters and spaces.');
        event.preventDefault();
        return;
    }

    if (userName.length < 5) {
        alert('Username must be at least 5 characters long.');
        event.preventDefault();
        return;
    }

    if (!email || !emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        event.preventDefault();
        return;
    }

    if (!phone || !phoneRegex.test(phone)) {
        alert('Phone number must be between 10 to 15 digits.');
        event.preventDefault();
        return;
    }

    if (!whatsapp || !phoneRegex.test(whatsapp)) {
        alert('WhatsApp number must be between 10 to 15 digits.');
        event.preventDefault();
        return;
    }

    if (!password || !passwordRegex.test(password)) {
        alert('Password must be at least 8 characters long, contain a number, and a special character.');
        event.preventDefault();
        return;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        event.preventDefault();
        return;
    }

    if (!userImage) {
        alert('Please upload a profile picture.');
        event.preventDefault();
        return;
    }
});
/*
async function validateWhatsApp() {
    // Get WhatsApp number from input field
   // let number = document.getElementById("whatsapp").value.trim();
    let number = "+201152529724";

    if (number === "") {
        alert("Please enter a WhatsApp number.");
        return;
    }

    // Define API URL
    const apiUrl = `https://whatsapp-number-validators.p.rapidapi.com/?number=${number}`;

    // Replace this with your actual API key (Keep this secure in the backend)
    const apiKey = "b234398200msh68ad41185d16776p14cd86jsn157a160d4458";

    // API request configuration
    const options = {
        method: "GET",
        headers: {
            "X-RapidAPI-Key": apiKey,
            "X-RapidAPI-Host": "whatsapp-number-validators.p.rapidapi.com"
        }
    };

    try {
        // Fetch response from API
        let response = await fetch(apiUrl, options);
        let data = await response.json();

        // Check if the number is valid
        if (data.valid) {
            alert(" This is a valid WhatsApp number.");
        } else {
            alert(" This number is NOT a valid WhatsApp number.");
        }
    } catch (error) {
        console.error("API Error:", error);
        alert("Error validating WhatsApp number. Please try again.");
    }
}*/
