<?php
include "header.php";
?>
<main>
    <!-- main content goes here -->
    <style>
        /* Slider container */
        .slider-container {
            padding-top: 25px;
            position: relative;
            width: 100%;
            max-width: 800px;
            height: 400px; /* Fixed height for the slider container */
            margin: 0 auto;
            overflow: hidden;
        }

        /* Slides */
        .slides {
            display: flex;
            transition: transform 0.5s ease;
            height: 100%; /* Ensure slides fill the container vertically */
        }

        .slide {
            min-width: 100%;
            overflow: hidden;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 100%; /* Ensure the image fills the slide container */
            object-fit: cover; /* Maintain aspect ratio and cover the container */
            filter: brightness(60%);
            display: block;
            border-radius: 10px;
            position: relative;
            z-index: -1;
        }

        /* Slide text */
        .slide .slide-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            text-align: center;
        }

        /* Buttons */
        .slider-btn {
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            padding: 10px;
            z-index: 1;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }
    </style>

    <div class="slider-container">
        <div class="slides">
            <div class="slide">
                <img src="images/p1.jpg" alt="Slide 1">
                <div class="slide-text">Welcome to Car Parking Management System</div>
            </div>
            <div class="slide">
                <img src="images/p2.jpg" alt="Slide 2">
                <div class="slide-text">Welcome to Car Parking Management System</div>
            </div>
            <div class="slide">
                <img src="images/p3.jpg" alt="Slide 3">
                <div class="slide-text">Welcome to Car Parking Management System</div>
            </div>
        </div>
        <button class="slider-btn prev" onclick="prevSlide()">&#10094;</button>
        <button class="slider-btn next" onclick="nextSlide()">&#10095;</button>
    </div>

    <script>
        let slideIndex = 0;
        showSlide(slideIndex);

        // Start the timer when the page loads
        let slideTimer = setInterval(nextSlide, 2000);

        // Stop the timer when the user interacts with the slider
        document.querySelector('.slider-container').addEventListener('mouseover', () => clearInterval(slideTimer));
        document.querySelector('.slider-container').addEventListener('mouseleave', () => slideTimer = setInterval(nextSlide, 3000));

        function prevSlide() {
            showSlide(slideIndex -= 1);
        }

        function nextSlide() {
            showSlide(slideIndex += 1);
        }

        function showSlide(n) {
            const slides = document.getElementsByClassName("slide");
            if (n >= slides.length) { slideIndex = 0 }
            if (n < 0) { slideIndex = slides.length - 1 }
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }
    </script>
</main>

<?php 
include "footer.php"; 
?>
