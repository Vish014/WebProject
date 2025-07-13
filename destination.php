<?php
session_start(); 


if (!isset($_SESSION['user_id'])) {

    header("Location: start.php?login_required=true");
    exit(); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>GO SRILANKA - Destination</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }        

        body {
            font-family: 'Inter', sans-serif; 
            line-height: 1.6;
            background-color: #080808; 
            color: #f0f0f0; 
        }

        .container {
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 0 20px; 
        }

   
        .navbar {
            background-color: #2a2c3a; 
            color: #fff; 
            padding: 15px 0; 
            position: sticky; 
            top: 0; 
            z-index: 1000; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.2); 
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            flex-shrink: 0; 
        }

        .logo a {
            color: #fff; 
            text-decoration: none; 
            font-size: 24px; 
            font-weight: bold; 
        }

        
        .nav-items-wrapper {
            display: flex; 
            align-items: center;
            flex-grow: 1; 
            justify-content: flex-end; 
            flex-wrap: wrap; 
        }

        .nav-links-list { 
            list-style: none; 
            display: flex; 
            align-items: center; 
            margin-right: 0; 
            flex-wrap: wrap; 
            justify-content: center; 
        }

        .nav-links-list li {
            margin-left: 30px; 
        }

        .nav-links-list li a {
            color: #fff; 
            text-decoration: none; 
            font-size: 16px; 
            padding: 5px 0; 
            transition: color 0.3s ease; 
        }

        .nav-links-list li a:hover,
        .nav-links-list li a.active {
            color: #ffd700; 
        }

        .book-now-btn {
            background-color: #ffd700;
            color: #2a2c3a; 
            border: none; 
            padding: 10px 18px; 
            border-radius: 20px; 
            cursor: pointer; 
            font-size: 16px; 
            margin-left: 15px; 
            transition: background-color 0.3s ease, transform 0.2s ease; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.2); 
            white-space: nowrap; 
            font-weight: 500; 
            text-decoration: none;
        }

        .book-now-btn a {
            text-decoration: none;
            color: inherit; 
        }


        .book-now-btn:hover {
            background-color: #e6c200; 
            transform: translateY(-1px); 
            text-decoration: none;
        }

        
        .burger {
            display: none; 
            cursor: pointer;
            flex-direction: column;
            justify-content: space-around;
            width: 30px;
            height: 25px;
        }

        .burger div {
            width: 100%;
            height: 3px;
            background-color: #fff;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        
        .destinations-section {
            padding: 40px 20px;
            max-width: 1200px;
            margin: auto;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
            justify-content: center;
        }

        .filters button {
            padding: 10px 18px;
            border: none;
            border-radius: 20px;
            background-color: #e4e4e4;
            cursor: pointer;
            font-weight: 500;
            color: #333; 
        }

        .filters .active {
            background-color: #28a745;
            color: white;
        }

        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 25px;
        }

        .destination-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            position: relative; 
        }

        .destination-card:hover {
            transform: translateY(-5px);
        }

        .destination-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .province-tag {
            position: absolute;
            background: #444;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 0 0 8px 0;
            top: 0;
            left: 0;
        }

        .destination-card h3 {
            color: #333;
            font-size: 20px;
            margin: 16px 16px 8px;
        }

        .destination-card p {
            margin: 0 16px 10px;
            font-size: 14px;
            color: #555; 
        }

        .destination-card ul {
            margin: 0 16px 10px;
            padding-left: 18px;
            color: #555; 
        }

        .details-button {
            display: block;
            margin: 12px 16px 16px;
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            
        }

        .details-button:hover {
            background-color: #1d2e7b;
        }

        .footer {
            background-color: #2a2c3a;
            color: #fff;
            text-align: center;
            padding: 30px 20px;
            margin-top: 50px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .footer p {
            font-size: 14px;
            opacity: 0.8;
        }

        @media screen and (max-width: 1023px) {
            .nav-links-list {
                display: none;
            }
            .nav-items-wrapper {
                justify-content: flex-end;
            }
            .burger {
                display: flex;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .nav-links-list {
                display: none;
            }

            .nav-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .logo {
                margin-bottom: 15px;
            }

            .nav-items-wrapper {
                width: 100%; 
                justify-content: center; 
                margin-right: 0;
                order: 1; 
            }

            .book-now-btn { 
                display: none;
            }

            .burger {
                display: flex; 
                order: 1; 
                margin-left: auto; 
            }
        }

        @media (max-width: 480px) {
            .navbar .container {
                padding: 0 15px;
            }
            .logo a {
                font-size: 20px;
            }
            .book-now-btn {
                font-size: 14px;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <header class="header" id="header">
        <nav class="navbar">
            <div class="logo">
                <a href="start.php">GO SRILANKA</a>
            </div>
            <div class="nav-items-wrapper">
                <ul class="nav-links-list">
                    <li><a href="start.php">Home</a></li>
                    <li><a href="destination.php" class="active">Destinations</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
                    <?php else: ?>
                        <li><a href="start.php?login_required=true">Login</a></li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <button class="book-now-btn"><a href="booknow.html">Book Now</a></button>
                <?php else: ?>
                    <button class="book-now-btn"><a href="start.php?login_required=true">Book Now</a></button>
                <?php endif; ?>
            </div>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    <main class="main">
        <section class="destinations-section">
            <div class="destinations-grid">
                <div class="destination-card">
                    <img src="colombo.jpg" alt="colombo">
                    <div class="province-tag">Western Province</div>
                    <h3>Colombo</h3>
                    <p>Sri Lanka’s capital and urban hub, blending colonial heritage with modern development.</p>
                    <ul>
                        <li>Galle Face & Colombo Fort</li>
                        <li>National Museum & Independence Square</li>
                        <li>Lotus Tower & One Galle Face</li>
                    </ul>
                    <p><strong>Best time:</strong> November to March</p>
                    <p><strong>Nearby:</strong> Mount Lavinia Beach, Diyatha Uyana</p><br/>
                    <a href="colombo.html" class="details-button">View Details</a>
                </div>

                <div class="destination-card">
                    <img src="hambanthota.webp" alt="hambanthota">
                    <div class="province-tag">Southern Province</div>
                    <h3>Hambanthota</h3>
                    <p>A rising tourism hub near wildlife sanctuaries and southern beaches.</p>
                    <ul>
                        <li>Bundala National Park (birdwatching)</li>
                        <li>Hambantota Port & Dry Zone Botanical Garden</li>
                        <li>Safari trips to Ridiyagama Park</li>
                    </ul>
                    <p><strong>Best time:</strong> December to March</p>
                    <p><strong>Nearby:</strong> Yala, Kataragama Temple, Rekawa Turtle Beach</p><br/>
                    <a href="hambanthota.html" class="details-button">View Details</a>
                </div>

                <div class="destination-card">
                    <img src="kandy.jpg" alt="kandy">
                    <div class="province-tag">Central Province</div>
                    <h3>Kandy</h3>
                    <p>Sacred Buddhist city surrounded by hills. Known for the Temple of the Tooth, cultural shows, and colonial charm.</p>
                    <ul>
                        <li>Temple of the Tooth Relic (Sri Dalada Maligawa)</li>
                        <li>Royal Botanical Gardens – Peradeniya</li>
                        <li>Kandy Lake & Esala Perahera festival</li>
                    </ul>
                    <p><strong>Best time:</strong> January to September</p>
                    <p><strong>Nearby:</strong>Udawattakele Forest Reserve, Bahirawakanda Buddha Statues</p>
                    <a href="kandy.html" class="details-button">View Details</a>
                </div>

                <div class="destination-card">
                    <img src="kurunagala.jpg" alt="kurunagala">
                    <div class="province-tag">North Western Province</div>
                    <h3>Kurunegala</h3>
                    <p>Ancient royal capital surrounded by rock hills, ideal for hiking, heritage exploration, and nature.</p>
                    <ul>
                        <li>Kurunegala Lake & Ethagala (Elephant Rock)</li>
                        <li>Ridi Viharaya (silver temple)</li>
                        <li>Panduwasnuwara ancient city</li>
                    </ul>
                    <p><strong>Best time:</strong> January to April</p>
                    <p><strong>Nearby:</strong> Yapahuwa Rock Fortress, Kobeigane Tank</p>
                    <a href="kurunagala.html" class="details-button">View Details</a>
                </div>

                <div class="destination-card">
                    <img src="trincomalee.jpg" alt="Trincomalee">
                    <div class="province-tag">Eastern Province</div>
                    <h3>Trincomalee</h3>
                    <p>Coastal town with crystal-clear beaches and colonial history. A top spot for snorkeling and whale watching.</p>
                    <ul>
                        <li>Nilaveli & Uppuveli beaches</li>
                        <li>Pigeon Island National Park (snorkeling/diving)</li>
                        <li>Koneswaram Temple & Lover’s Leap viewpoint</li>
                    </ul>
                    <p><strong>Best time:</strong> April to October</p>
                    <p><strong>Nearby:</strong> Marble Beach, Fort Frederick</p>
                    <a href="trincomalee.html" class="details-button">View Details</a>
                </div>

                <div class="destination-card">
                    <img src="ella.jpg" alt="Ella">
                    <div class="province-tag">Uva Province</div>
                    <h3>Ella</h3>
                    <p>Mountain village with tea plantations, waterfalls, and adventure vibes.</p>
                    <ul>
                        <li>Nine Arch Bridge</li>
                        <li>Little Adam’s Peak</li>
                        <li>Ella Rock hikes</li>
                    </ul>
                    <p><strong>Best time:</strong> January to March</p>
                    <p><strong>Nearby:</strong> Ravana Falls, Lipton’s Seat</p>
                    <a href="ella.html" class="details-button">View Details</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <p>&copy; 2025 GO SRILANKA. All rights reserved.</p>
    </footer>

    <script>
        
        const burger = document.querySelector('.burger');
        const navLinksList = document.querySelector('.nav-links-list');

        burger.addEventListener('click', () => {
            navLinksList.classList.toggle('nav-active');
            
            burger.classList.toggle('toggle');
        });

        
        const mediaQuery = window.matchMedia('(max-width: 768px)');

        function handleTabletChange(e) {
            if (e.matches) {
                
                navLinksList.style.transition = 'transform 0.3s ease-out';
                
                if (!navLinksList.classList.contains('nav-active')) {
                    navLinksList.style.transform = 'translateX(100%)';
                }
            } else {
                
                navLinksList.style.transition = 'none';
                navLinksList.style.transform = 'translateX(0)';
                navLinksList.classList.remove('nav-active');
                burger.classList.remove('toggle');
            }
        }

        
        handleTabletChange(mediaQuery);

        
        mediaQuery.addListener(handleTabletChange);

        
        burger.addEventListener('click', () => {
            if (mediaQuery.matches) { 
                if (navLinksList.classList.contains('nav-active')) {
                    navLinksList.style.transform = 'translateX(0%)';
                } else {
                    navLinksList.style.transform = 'translateX(100%)';
                }
            }
        });
    </script>
</body>
</html>