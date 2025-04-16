
<?php include 'Header.php'; ?>

<div class="wrapper">
    <div class="content">
        <main>
            <form id="registrationForm" action="DB_Ops.php" method="POST" enctype="multipart/form-data">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required placeholder="Enter your Full Name">

                <label for="user_name">Username:</label>
                <input type="text" id="user_name" name="user_name" required minlength="5"  placeholder="Enter your User Name">

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required pattern="[0-9]{10,15}" placeholder="Enter your Phone Number">

                <label for="whatsapp">WhatsApp Number:</label>
                <div style="display: flex; gap: 10px;">
                    <select id="countryCode" name="countryCode" style="width: 30%; padding: 8px;">
                        <option value="1">🇺🇸 +1 (USA)</option>
                        <option value="44">🇬🇧 +44 (UK)</option>
                        <option value="20" selected>🇪🇬 +20 (Egypt)</option>
                        <option value="91">🇮🇳 +91 (India)</option>
                        <option value="971">🇦🇪 +971 (UAE)</option>
                        <option value="33">🇫🇷 +33 (France)</option>
                    </select>
                    <input type="text" id="whatsapp" name="whatsapp" placeholder="Enter WhatsApp number" required>
                </div>
                <button type="button" onclick="validateWhatsApp()">Check WhatsApp</button>
                <p id="validation"></p>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required  placeholder="Enter your address" >

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email address" >

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required pattern="(?=.*\d)(?=.*[!@#$%^&*]).{8,}" placeholder="Enter a strong password">

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Re-enter your password">

                <label for="user_image">Profile Picture:</label>
                <input type="file" id="user_image" name="user_image" required>

                <button type="submit">Register</button>
            </form>
        </main>
    </div>
</div>
<script src="API_Ops.js"></script>
<?php include 'Footer.php'; ?>
