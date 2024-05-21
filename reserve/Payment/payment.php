<?php
// Retrieve the query parameters from the URL
$date = isset($_GET['date']) ? $_GET['date'] : 'N/A';
$time = isset($_GET['time']) ? $_GET['time'] : 'N/A';
$court = isset($_GET['court']) ? $_GET['court'] : 'N/A';
$duration = isset($_GET['duration']) ? $_GET['duration'] : 'N/A';

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paywall</title>
        <style>
             body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, black, green);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

            .paywall-container {
                position: relative;
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                max-width: 800px;
                width: 100%;
            }

            .flex-container {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap; /* Added flex-wrap to handle smaller screens */
            }

            .section {
                margin-bottom: 20px;
                flex: 0 0 48%; /* Adjusted width for better alignment */
            }

            .section h2 {
                font-size: 1.5em;
                margin-bottom: 10px;
            }

            .detail-item {
                margin-bottom: 10px;
            }

            .detail-item label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .detail-item input[type="text"],
            .detail-item input[type="file"] {
                width: calc(100% - 10px);
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .detail-item input[type="datetime-local"] {
                width: calc(100% - 10px);
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .pay-button {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: green;
                color: #fff;
                font-size: 1em;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .pay-button:hover {
                background-color: #0056b3;
            }

            .image-preview {
                position: relative;
                max-width: 220px;
                max-height: 220px;
                border: 1px solid #ccc;
                text-align: center;
                margin: 0 auto;
                overflow: hidden;
            }

        
            .image-preview img {
        width: 150px; /* Set a fixed width */
        height: 150px; /* Set a fixed height */
        object-fit: cover; /* Maintain aspect ratio and cover the container */
        border-radius: 5px;
    }

            @media only screen and (max-width: 600px) {
                .section {
                    flex: 0 0 100%; /* Make sections full width on smaller screens */
                }
            }
            .detail-item input[type="date"] {
        width: 400px; /* Adjust the width as needed */
    }
    .back-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: red;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .back-button:hover {
            background-color: darkred;
        }
    
        </style>
    </head>
    <body>
        

        <div class="paywall-container">
            <div class="flex-container">
                <div class="section">
                    <h2>Reservation Details</h2>
                    
                   
                    <div class="detail-item">
    <label for="date">Date:</label>
    <input type="text" id="date" name="date">
</div>


                    <div class="detail-item">
                        <label for="time">time:</label>
                        <input type="text" id="time" name="time">
                    </div>
                    <div class="detail-item">
                        <label for="court-number">Court Number:</label>
                        <input type="text" id="court-number" name="court-number">
                    </div>
                    <div class="detail-item">
                        <label for="duration">Duration:</label>
                        <input type="text" id="duration" name="duration">
                    </div>
                  
                    <div class="detail-item">
                        <label for="promo-code">Promo Code:</label>
                        <input type="text" id="promo-code" name="promo-code">
                    </div>
                </div>
                <div class="section">
                    <h2>Gcash Details</h2>
                    <div class="detail-item">
                        <label for="reference-no">Reference No:</label>
                        <input type="text" id="reference-no" name="reference-no">
                    </div>
                    <div class="detail-item">
                        <label for="gcash-qrcode">Upload Gcash QR Code:</label>
                        <input type="file" id="gcash-qrcode" name="gcash-qrcode" accept="image/*">
                        <div class="image-preview" id="image-preview">
            <div class="image-title">Gcash QR Code</div>
            <!-- Attached Image will be placed here -->
        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <h2>Payment Details</h2>
                <div class="detail-item">
                    <label for="total">Total:</label>
                    <input type="text" id="total" name="total">
                </div>
            </div>
            <div class="section">
                <button class="pay-button">Confirm</button>
                <button class="back-button" onclick="window.location.href='http://localhost/reservation_system/reserve/calendar/#'">Back</button>
            </div>
        </div>

        <script src="script.js"></script>
        <script>
        document.getElementById('gcash-qrcode').addEventListener('change', function(event) {
            const preview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create a new image element
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Gcash QR Code';

                    // Append the image below the title
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
        // Function to get URL parameters
        function getUrlParameter(name) {
            name = name.replace(/[\[\]]/g, '\\$&');
            const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
            const results = regex.exec(window.location.href);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        // Populate input fields with URL parameters
        document.getElementById('date').value = getUrlParameter('date');
        document.getElementById('time').value = getUrlParameter('time');
        document.getElementById('court-number').value = getUrlParameter('court');
        document.getElementById('duration').value = getUrlParameter('duration');
    });



    </script>
    </body>
    </html>
