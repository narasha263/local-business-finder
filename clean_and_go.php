<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean & Go</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 1em 0;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        .business-details {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 20px 0;
            padding: 20px;
        }
        .business-details img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .reviews {
            margin-top: 20px;
        }
        .reviews h3 {
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .review-item {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }
        .star-rating {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            font-size: 2em;
            cursor: pointer;
        }
        .star-rating input[type="radio"]:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #FFD700;
        }
        .review-form {
            margin-top: 20px;
        }
        .review-form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .review-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .review-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Clean & Go</h1>
    </header>
    <div class="container">
        <div class="business-details">
            <img src="car.png" alt="Clean & Go">
            <h2>About Clean & Go</h2>
            <p>Clean & Go is your one-stop shop for car washing and detailing services. We ensure your vehicle looks as good as new.</p>
            <p><strong>Location:</strong> MUGUTHA</p>
            <p><strong>Open Times:</strong> Monday-Saturday: 8 AM - 5 PM, Sunday: Closed</p>
            <p><strong>Phone:</strong> 0712345678</p>
            <p><strong>Email:</strong> cleango@example.com</p>
        </div>
        <div class="reviews">
            <h3>Customer Reviews</h3>
            <div class="review-item">
                <p>"My car looks brand new after every wash. Great service!" - Michael P.</p>
            </div>
            <div class="review-item">
                <p>"The staff is very thorough and professional. Highly recommend!" - Laura B.</p>
            </div>
        </div>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5">&#9733;</label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4">&#9733;</label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3">&#9733;</label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2">&#9733;</label>
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1">&#9733;</label>
        </div>
        <div class="review-form">
            <textarea id="review-text" placeholder="Write your review here..."></textarea>
            <button onclick="submitReview()">Submit Review</button>
        </div>
    </div>

    <script>
        function submitReview() {
            const rating = document.querySelector('input[name="rating"]:checked');
            const reviewText = document.getElementById('review-text').value;

            if (!rating || !reviewText) {
                alert('Please provide a rating and a review.');
                return;
            }

            const newReview = document.createElement('div');
            newReview.classList.add('review-item');
            newReview.innerHTML = `<p>${reviewText} (Rating: ${rating.value}/5)</p>`;

            document.querySelector('.reviews').appendChild(newReview);

            // Clear the form
            document.getElementById('review-text').value = '';
            document.querySelectorAll('input[name="rating"]').forEach(radio => {
                radio.checked = false;
            });

            alert('Thank you for your review!');
        }
    </script>
</body>
</html>

