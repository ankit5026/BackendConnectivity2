<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced PHP Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .details-container {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .details-container.visible {
            display: block;
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter Your Details</h2>
        <form id="form" action="process.php" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            
            <label>Gender:</label>
            <div class="radio-group">
                <input type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>
            </div>
            
            <label for="hobbies">Hobbies:</label>
            <div class="checkbox-group">
                <input type="checkbox" id="reading" name="hobbies[]" value="Reading">
                <label for="reading">Reading</label>
                <input type="checkbox" id="sports" name="hobbies[]" value="Sports">
                <label for="sports">Sports</label>
                <input type="checkbox" id="music" name="hobbies[]" value="Music">
                <label for="music">Music</label>
            </div>
            
            <label for="country">Country:</label>
            <select id="country" name="country">
                <option value="India">India</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
            </select>
            
            <label for="experience">Experience Level:</label>
            <input type="range" id="experience" name="experience" min="1" max="10">
            
            <label for="profile_pic">Upload Profile Picture:</label>
            <input type="file" id="profile_pic" name="profile_pic">
            
            <button type="submit">Submit</button>
        </form>

        <div class="container" id="responseMessage" style="display:none;"></div>

        <div class="container details-container" id="details"></div>
    </div>

    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            event.preventDefault();  

            let formData = new FormData(this);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'process.php', true);

            xhr.onload = function() {
                let response = JSON.parse(xhr.responseText);

                if (response.status === 'success') {
                    
                    document.getElementById('responseMessage').innerHTML = '<h2>' + response.message + '</h2>';
                    document.getElementById('responseMessage').style.display = 'block';

                
                    let seeDetailsButton = document.createElement('button');
                    seeDetailsButton.textContent = 'See Details';
                    seeDetailsButton.onclick = function() {
                        showDetails(response.details);
                    };
                    document.getElementById('responseMessage').appendChild(seeDetailsButton);
                } else {
                    alert(response.message);  
                }
            };

            xhr.send(formData);
        });

        function showDetails(details) {
            let detailsContainer = document.getElementById('details');
            detailsContainer.classList.add('visible');
            detailsContainer.innerHTML = `
                <h3>Submitted Details</h3>
                <table border='1'>
                    <tr><th>Name</th><td>${details.name}</td></tr>
                    <tr><th>Age</th><td>${details.age}</td></tr>
                    <tr><th>Email</th><td>${details.email}</td></tr>
                    <tr><th>DOB</th><td>${details.dob}</td></tr>
                    <tr><th>Gender</th><td>${details.gender}</td></tr>
                    <tr><th>Hobbies</th><td>${details.hobbies}</td></tr>
                    <tr><th>Country</th><td>${details.country}</td></tr>
                    <tr><th>Experience Level</th><td>${details.experience}</td></tr>
                    <tr><th>Profile Picture</th><td><img src='${details.profile_pic}' width='100'></td></tr>
                </table>
            `;
        }
    </script>
</body>
</html>
