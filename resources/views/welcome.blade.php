<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rentlee - Book Mini Buses in Clicks</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;800&family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('/css/landing.css') }}">

    <style>
        .calendar-navigation {
            background: linear-gradient(135deg, #9A18FF 0%, #5C0E99 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
    padding: 5px;
    color: white;
}

.calendar-nav-btn {
    background: #ffffff;
    color: #5C0E99;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s ease-in-out;
    box-shadow: 0px 3px 10px rgba(255, 102, 0, 0.3);
}

.calendar-nav-btn:hover {
    background: #e65a00;
    transform: translateY(-2px);
}

.calendar-month-year {
    font-size: 18px;
    font-weight: 700;
    color: #ffffff;
}

        .distance-display {
            background: linear-gradient(135deg, #9A18FF 0%, #5C0E99 100%);
            color: white;
            padding: 16px;
            border-radius: 8px;
            margin-top: 12px;
            text-align: center;
            font-weight: 600;
            font-size: 18px;
        }

        .distance-loading {
            color: #999;
            font-size: 14px;
            margin-top: 12px;
            text-align: center;
        }

        .distance-error {
            background: #FEE;
            color: #C33;
            padding: 12px;
            border-radius: 8px;
            margin-top: 12px;
            font-size: 14px;
        }

        /* Keep map responsive inside container */
        .map-container {
            width: 100%;
            height: 300px;
        }

        /* Optional small spacing for distance text */
        #distance-output {
            margin-top: 12px;
        }
    </style>
</head>

<body>
    <!-- Header/Navbar -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <img src="https://api.builder.io/api/v1/image/assets/TEMP/6d33d9f029781ee2b35e700458519cc9994f86c0?width=62" alt="Rentlee Icon" class="logo-icon">
                    <img src="https://api.builder.io/api/v1/image/assets/TEMP/66c1b2b713bc36ddc9b7f79c78b10f0c1663bb94?width=300" alt="Rentlee Logo" class="logo-text">
                </div>

                <button class="hamburger-menu" id="hamburger-menu" aria-label="Toggle navigation menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>

                <nav class="main-nav" id="main-nav">
                    <a href="#" class="nav-link">Book Ride</a>
                    <a href="#" class="nav-link">Vehicles</a>
                    <a href="#" class="nav-link">About Us</a>
                    <button class="btn-get-price-nav">GET PRICE</button>
                </nav>

                <div class="header-actions" id="header-actions">
                    <a href="{{ route('login') }}" class="btn-login">Login</a>
                    <a href="#" class="btn-quick-support">Quick Support</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-image-wrapper">
                    <div class="hero-background">
                        
                        <!-- <img src="https://api.builder.io/api/v1/image/assets/TEMP/aeda7577fe43fcf6e5e45adbdecc16be536d2b35?width=2671" alt="Mountain View" class="background-image"> -->
                    </div>
                    <div class="hero-accent-bar"></div>
                    <div class="bus-image-container">
                        <img src="/images/img.png" alt="Image" class="img-responsive img-fluid background-image">
                        <!-- <img src="https://api.builder.io/api/v1/image/assets/TEMP/39ee071b40ce3ed406c5191f58b76258bb5083d4?width=2026" alt="Rentlee Bus" class="bus-image">
                        <img src="https://api.builder.io/api/v1/image/assets/TEMP/2c97ad77f9c8216f9aec422b180f85c33bf03d00?width=346" alt="Rentlee Badge" class="bus-badge"> -->
                    </div>
                    <!-- <img src="https://api.builder.io/api/v1/image/assets/TEMP/005a194abe22dbebeb1b6853fc91676a31fc84b5?width=2612" alt="Road" class="road-image"> -->
                </div>

                <div class="hero-text">
                    <h1 class="hero-title">Book Mini Buses in Clicks Travel in Comfort Pay Smart</h1>
                    <div class="vehicle-types">
                        <span class="vehicle-type">Traveller</span>
                        <span class="separator">|</span>
                        <span class="vehicle-type">Urbania</span>
                        <span class="separator">|</span>
                        <span class="vehicle-type">Caravan</span>
                    </div>
                    <a href="#location" class="btn-book-ride" style="text-decoration: none;">Book a Ride</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Planning Section -->
    <section class="journey-section">
        <div class="container">
            <h2 class="section-title">What is the Plan ?</h2>
            <p class="section-subtitle">tell us about your journey</p>

            <!-- <div class="trip-type-selector">
                <label class="trip-type-option">
                    <input type="radio" name="trip-type" value="one-way" checked>
                    <span>One Way</span>
                </label>
                <span class="trip-separator">|</span>
                <label class="trip-type-option">
                    <input type="radio" name="trip-type" value="round-trip">
                    <span>Round Trip</span>
                </label>
            </div> -->

            <div class="journey-form" id="location">
                <div class="form-section location-section">
                    <h3 class="form-section-title">Location</h3>

                    <!-- REPLACED location inputs to use same IDs as distance.blade (from / to) -->
                    <div class="form-group">
                        <label class="form-label">From</label>
                        <input type="text" class="form-input" id="from" placeholder="Eg. Hadapsar, Pune">
                    </div>
                    <div class="form-group">
                        <label class="form-label">To</label>
                        <input type="text" class="form-input" id="to" placeholder="Eg. Dapoli, Maharashtra">
                    </div>

                    <!-- area where distance result from /calculate-distance will be shown -->
                    <div id="distance-result"></div>

                    <!-- <button class="btn-add-stops">Add Stops</button> -->
                </div>

                <div class="form-section map-section">
                    <h3 class="form-section-title">Map & Distance</h3>
                    <div class="map-container">
                        <div id="route-map" style="width:100%; height:100%; border-radius:10px;"></div>
                    </div>

                    <!-- also show summary info here -->
                    <div id="distance-info"></div>
                    <!-- keep an output node matching distance.blade -->
                    <div id="distance-output" style="margin-top:8px;"></div>
                </div>

                <div class="form-section date-section">
                    <h3 class="form-section-title">Date</h3>
                    <div class="calendar-navigation">
                        <button type="button" class="calendar-nav-btn" id="prev-month">←</button>
                        <span class="calendar-month-year" id="calendar-month-year"></span>
                        <button type="button" class="calendar-nav-btn" id="next-month">→</button>
                    </div>
                    <div class="calendar-widget">
                        <div class="calendar-header">
                            <div class="calendar-day">Su</div>
                            <div class="calendar-day">Mo</div>
                            <div class="calendar-day">Tu</div>
                            <div class="calendar-day">We</div>
                            <div class="calendar-day">Th</div>
                            <div class="calendar-day">Fr</div>
                            <div class="calendar-day">Sa</div>
                        </div>
                        <div class="calendar-body" id="calendar-body">
                        </div>
                    </div>
                    <input type="hidden" id="selected-travel-date">
                </div>

                <div class="form-section capacity-section">
                    <h3 class="form-section-title">
                        Seating Capacity
                    </h3>
                    <select id="seating-capacity" class="form-input seating-capacity-select" required>
                        <option value="">Select Seating Capacity</option>
                        <option value="17 Seater">17 Seater</option>
                        <option value="20 Seater">20 Seater</option>
                        <option value="26 Seater">26 Seater</option>
                        <option value="32 Seater">32 Seater</option>
                        <option value="45 Seater">45 Seater</option>
                    </select>
                </div>
            </div>

            <div class="contact-section">
                <label class="contact-label">Your Contact * :</label>
                <input type="tel" id="contact-number" class="contact-input" placeholder="Enter 10-digit phone number" required pattern="[0-9]{10}">
                <button type="button" class="btn-get-price" id="btn-get-price-form">GET PRICE</button>
            </div>
        </div>
    </section>

    <!-- Vehicles Section -->
    <section class="vehicles-section">
        <div class="container">
            <h2 class="section-title-xl">Ride the XPerience !!</h2>

            <div class="decorative-stars stars-left">
                <svg width="105" height="62" viewBox="0 0 178 138" fill="none">
                    <path d="M76.7603 64.4452L107.414 51.549L116.849 56.008L113.742 62.1912L113.698 64.3519L97.7741 67.4738L104.89 92.9799L84.8573 72.6964L76.7603 64.4452Z" fill="url(#star-gradient)" />
                    <defs>
                        <linearGradient id="star-gradient" x1="95.6433" y1="61.892" x2="94.8531" y2="75.7006" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#9A18FF" />
                            <stop offset="1" stop-color="#5C0E99" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>

            <div class="vehicles-grid">
                <div class="vehicle-card">
                    <div class="vehicle-image-wrapper">
                        <img src="https://api.builder.io/api/v1/image/assets/TEMP/2d6fbcfe226207e21f76c56e6b7c3906d03a2ae8?width=950" alt="Tempo Traveller" class="vehicle-image">
                    </div>
                    <h3 class="vehicle-name">Tempo Traveller</h3>
                    <div class="vehicle-price">
                        <span class="price">₹15</span>
                        <span class="price-unit">per KM</span>
                    </div>
                    <div class="vehicle-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-text">4.7 (985 reviews)</span>
                    </div>
                    <p class="vehicle-best-for">Best for: Large groups & tours</p>
                    <ul class="vehicle-features">
                        <li>🪑 12 Seats</li>
                        <li>💺 Maximum space</li>
                        <li>🪑 Reclining seats</li>
                        <li>🎵 Entertainment system</li>
                    </ul>
                    <button class="btn-book-now">Book Now</button>
                </div>

                <div class="vehicle-card featured">
                    <div class="most-popular-badge">Most Popular</div>
                    <div class="decorative-stars stars-badge">
                        <svg width="105" height="62" viewBox="0 0 178 138" fill="none">
                            <path d="M76.7603 64.4452L107.414 51.549L116.849 56.008L113.742 62.1912L113.698 64.3519L97.7741 67.4738L104.89 92.9799L84.8573 72.6964L76.7603 64.4452Z" fill="url(#star-gradient-2)" />
                            <defs>
                                <linearGradient id="star-gradient-2" x1="95.6433" y1="61.892" x2="94.8531" y2="75.7006" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#9A18FF" />
                                    <stop offset="1" stop-color="#5C0E99" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="vehicle-image-wrapper">
                        <img src="https://api.builder.io/api/v1/image/assets/TEMP/e621d459c5210337db23c83f86a6e66654e83ab6?width=942" alt="Force Urbania" class="vehicle-image">
                    </div>
                    <h3 class="vehicle-name">Force Urbania</h3>
                    <div class="vehicle-price">
                        <span class="price">₹15</span>
                        <span class="price-unit">per KM</span>
                    </div>
                    <div class="vehicle-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-text">4.7 (985 reviews)</span>
                    </div>
                    <p class="vehicle-best-for">Best for: Large groups & tours</p>
                    <ul class="vehicle-features">
                        <li>🪑 12 Seats</li>
                        <li>💺 Maximum space</li>
                        <li>🪑 Reclining seats</li>
                        <li>🎵 Entertainment system</li>
                    </ul>
                    <button class="btn-book-now">Book Now</button>
                </div>

                <div class="vehicle-card">
                    <div class="decorative-stars stars-right">
                        <svg width="105" height="62" viewBox="0 0 178 138" fill="none">
                            <path d="M76.7603 64.4452L107.414 51.549L116.849 56.008L113.742 62.1912L113.698 64.3519L97.7741 67.4738L104.89 92.9799L84.8573 72.6964L76.7603 64.4452Z" fill="url(#star-gradient-3)" />
                            <defs>
                                <linearGradient id="star-gradient-3" x1="95.6433" y1="61.892" x2="94.8531" y2="75.7006" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#9A18FF" />
                                    <stop offset="1" stop-color="#5C0E99" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="vehicle-image-wrapper">
                        <img src="https://api.builder.io/api/v1/image/assets/TEMP/f7f0b35ff042206e08ea220917d7cc6e28e9ab0d?width=900" alt="Caravan" class="vehicle-image">
                    </div>
                    <h3 class="vehicle-name">Caravan</h3>
                    <div class="vehicle-price">
                        <span class="price">₹15</span>
                        <span class="price-unit">per KM</span>
                    </div>
                    <div class="vehicle-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-text">4.7 (985 reviews)</span>
                    </div>
                    <p class="vehicle-best-for">Best for: Large groups & tours</p>
                    <ul class="vehicle-features">
                        <li>🪑 12 Seats</li>
                        <li>💺 Maximum space</li>
                        <li>🪑 Reclining seats</li>
                        <li>🎵 Entertainment system</li>
                    </ul>
                    <button class="btn-book-now">Book Now</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Rentlee Section -->
    <section class="benefits-section">
        <div class="container">
            <h2 class="section-title-benefits">Why Rentlee ?</h2>

            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="white" />
                        </svg>
                    </div>
                    <h3 class="benefit-title">Verified Drivers</h3>
                    <p class="benefit-description">All our drivers are verified with years of professional experience and clean records.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="white" />
                        </svg>
                    </div>
                    <h3 class="benefit-title">Premium Comfort</h3>
                    <p class="benefit-description">Experience ultimate comfort with well-maintained vehicles, professional service, and luxury amenities.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z" fill="white" />
                        </svg>
                    </div>
                    <h3 class="benefit-title">Transparent Pricing</h3>
                    <p class="benefit-description">No hidden charges. What you see is what you pay. Competitive rates across all vehicle categories.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" fill="white" />
                        </svg>
                    </div>
                    <h3 class="benefit-title">On-Time Guarantee</h3>
                    <p class="benefit-description">We guarantee punctual pickups and drop-offs because we value your time as precious.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 9h-2V5h2v6zm0 4h-2v-2h2v2z" fill="white" />
                        </svg>
                    </div>
                    <h3 class="benefit-title">24/7 Support</h3>
                    <p class="benefit-description">Round-the-clock customer support ready to assist you with any queries or concerns.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" fill="white" />
                        </svg>
                    </div>
                    <h3 class="benefit-title">Safety First</h3>
                    <p class="benefit-description">Advanced safety features, GPS tracking, emergency assistance, and comprehensive insurance coverage.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="footer-image-wrapper">
            <img src="https://api.builder.io/api/v1/image/assets/TEMP/4f6da39b3152948695f3b303e079e99e52ce40d7?width=3828" alt="Beach View" class="footer-image">
        </div>
    </footer>

   <script>
/* ================================
   SIMPLE WORKING CALENDAR SYSTEM
   ================================ */

let currentDate = new Date();
let selectedDate = null;

function initializeCalendar() {
    renderCalendar();
    setupCalendarNavigation();
}

function renderCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    document.getElementById('calendar-month-year').textContent =
        `${monthNames[month]} ${year}`;

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const daysInPrevMonth = new Date(year, month, 0).getDate();

    const calendarBody = document.getElementById("calendar-body");
    calendarBody.innerHTML = "";

    // PREVIOUS MONTH DAYS
    for (let i = firstDay - 1; i >= 0; i--) {
        const cell = document.createElement("div");
        cell.className = "calendar-cell disabled";
        cell.textContent = daysInPrevMonth - i;
        calendarBody.appendChild(cell);
    }

    // CURRENT MONTH DAYS
    for (let day = 1; day <= daysInMonth; day++) {
        const cell = document.createElement("div");
        cell.className = "calendar-cell";
        cell.textContent = day;

        const thisDate = new Date(year, month, day);

        // highlight today
        const today = new Date();
        if (
            today.getDate() === day &&
            today.getMonth() === month &&
            today.getFullYear() === year
        ) {
            cell.classList.add("today");
        }

        // highlight selected date
        if (
            selectedDate &&
            selectedDate.getDate() === day &&
            selectedDate.getMonth() === month &&
            selectedDate.getFullYear() === year
        ) {
            cell.classList.add("selected");
        }

        cell.addEventListener("click", () => selectDate(thisDate));

        calendarBody.appendChild(cell);
    }

    // NEXT MONTH DAYS TO FILL GRID (42 total)
    const totalCells = calendarBody.children.length;
    const nextDays = 42 - totalCells;

    for (let i = 1; i <= nextDays; i++) {
        const cell = document.createElement("div");
        cell.className = "calendar-cell disabled";
        cell.textContent = i;
        calendarBody.appendChild(cell);
    }
}

function setupCalendarNavigation() {
    document.getElementById("prev-month").onclick = () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    };

    document.getElementById("next-month").onclick = () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    };
}

function selectDate(dateObj) {
    selectedDate = dateObj;

    // Store YYYY-MM-DD in Asia/Kolkata timezone
    const options = { timeZone: 'Asia/Kolkata', year: 'numeric', month: '2-digit', day: '2-digit' };
    const parts = new Intl.DateTimeFormat('en-GB', options).formatToParts(selectedDate);

    const year = parts.find(p => p.type === 'year').value;
    const month = parts.find(p => p.type === 'month').value;
    const day = parts.find(p => p.type === 'day').value;

    const localDate = `${year}-${month}-${day}`;
    document.getElementById("selected-travel-date").value = localDate;

    console.log("Selected date (Asia/Kolkata):", localDate);

    renderCalendar();
}


/* ================================
   FORM VALIDATION + SUBMISSION
   ================================ */

document.addEventListener("DOMContentLoaded", () => {
    initializeCalendar();
    initMap();

    const btnGetPrice = document.getElementById("btn-get-price-form");
    if (btnGetPrice) btnGetPrice.addEventListener("click", submitEnquiry);

    const fromEl = document.getElementById("from");
    const toEl = document.getElementById("to");

    const debounce = (fn, delay = 600) => {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => fn(...args), delay);
        };
    };

    if (fromEl) fromEl.addEventListener("keyup", debounce(calculateDistance));
    if (toEl) toEl.addEventListener("keyup", debounce(calculateDistance));
});

async function submitEnquiry(e) {
    e.preventDefault();

    const from = document.getElementById("from").value.trim();
    const to = document.getElementById("to").value.trim();
    const travelDate = document.getElementById("selected-travel-date").value;
    const seating = document.getElementById("seating-capacity").value;
    const phone = document.getElementById("contact-number").value.trim();

    if (!from) return alert("Please enter departure location");
    if (!to) return alert("Please enter destination location");
    if (!travelDate) return alert("Please select a travel date");
    if (!seating) return alert("Please select seating capacity");
    if (!/^[0-9]{10}$/.test(phone)) return alert("Please enter valid 10-digit phone number");

    // extract distance if available
    let distanceKm = null;
    const distanceResult = document.getElementById("distance-result");
    if (distanceResult) {
        const match = distanceResult.textContent.match(/(\d+\.?\d*) km/);
        if (match) distanceKm = match[1];
    }

    const btn = document.getElementById("btn-get-price-form");
    btn.disabled = true;
    btn.textContent = "Submitting...";

    const res = await fetch("{{ route('enquiry.store') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content
        },
        body: JSON.stringify({
            from,
            to,
            travel_date: travelDate,
            seating_capacity: seating,
            phone_number: phone,
            distance_km: distanceKm
        })
    });

    const data = await res.json();

    if (res.ok && data.success) {
        alert(data.message);
    } else {
        alert("Failed to submit enquiry");
    }

    btn.disabled = false;
    btn.textContent = "GET PRICE";
}

/* ================================
   MAP + DISTANCE SYSTEM
   ================================ */

function initMap() {
    window.map = new google.maps.Map(document.getElementById("route-map"), {
        center: { lat: 19.7515, lng: 75.7139 },
        zoom: 7
    });

    window.directionsService = new google.maps.DirectionsService();
    window.directionsRenderer = new google.maps.DirectionsRenderer({
        map: map
    });
}

function showRouteOnMap(from, to) {
    if (!from || !to) return;

    directionsService.route(
        {
            origin: from,
            destination: to,
            travelMode: google.maps.TravelMode.DRIVING
        },
        (response, status) => {
            if (status === "OK") {
                directionsRenderer.setDirections(response);
            }
        }
    );
}

async function calculateDistance() {
    const from = document.getElementById("from").value.trim();
    const to = document.getElementById("to").value.trim();
    const distanceResult = document.getElementById("distance-result");

    if (!from || !to) {
        if (distanceResult) distanceResult.innerHTML = "";
        return;
    }

    distanceResult.innerHTML = "<div>Calculating distance...</div>";

    const res = await fetch("{{ route('distance.calculate') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content
        },
        body: JSON.stringify({ from, to })
    });

    const data = await res.json();

    if (data.success) {
        distanceResult.innerHTML = `
            <div>
                Distance: <strong>${data.distanceText}</strong><br>
                Duration: ${data.duration}
            </div>
        `;

        showRouteOnMap(from, to);
    } else {
        distanceResult.innerHTML = "<div>Error calculating distance</div>";
    }
}
</script>


    <!-- Google Maps JS: make sure Maps JavaScript API is enabled in your Cloud project -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVQPe_ZEPz20V63SzhGLW8yG4wt3sgXEU&libraries=places&callback=initMap" async defer></script>

</body>

</html>