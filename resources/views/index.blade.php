<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>UsedCars</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/icons/car-icon.png') }}">
        <script src="{{ asset('js/index.js') }}" defer></script>
    </head>
    <body>
        <header>
            <div class="menu">
                <div class="logo">
                    <img src="{{ asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo">
                    <span class="yellow">Used</span>
                    <span class="white">Cars</span>
                </div>
                <img src="{{ asset('img/icons/hamburger-icon.png') }}" alt="Hamburger icon" id="hamburger">
            </div>
            <nav id="nav">
                <ul>
                    <li><a href=" {{ url('/') }}">Početna</a></li>
                    <li><a href="#">Pretraga</a></li>
                    <li><a href="#">Vesti</a></li>
                    <div class="buttons">
                        <li><button class="modal-btn">Prijavi se</button></li>
                        <li><a href="{{ url('register') }}" class="login-btn">Registruj se</a></li>
                    </div>
                </ul>
            </nav>
            <div id="overlay">
                <form method="POST" action='login'>
                    <div class="login-form">
                        <div class="login-data">
                            <div class="login-item">
                                <label for="uname">Korisničko ime</label>
                                <input type="text" placeholder="Korisničko ime" name="uname" required>
                            </div>
                            <div class="login-item">
                                <label for="psw">Šifra</label>
                                <input type="password" placeholder="Šifra" name="psw" required>
                            </div>
                            <button type="submit" class="login-btn">Ulogus</button>
                        </div>
                        
                        <div class="close-login">
                            <button type="button" class="cancel-btn">Zatvori</button>
                            <a href="{{ url('register') }}">Nemate svoj nalog? Napravite novi!</a>
                        </div>
                    </div>
                </form>
            </div>
        </header>
        <main>
            <section class="search">
                <h1>Dobrodošli na UsedCars stranicu!</h1>
                <label htmlFor="search-bar">Izaberi kriterijum za pretragu: </label>
                <select id="search-bar" class="search-select">
                    <option value="marka" default>Marka vozila</option>
                    <option value="tip">Tip vozila</option>
                    <option value="godina">Godina proizvodnje</option>
                    <option value="kilometraza">Pređeni kilometri</option>
                    <option value="cena">Cena</option>
                    <option value="pogon">Vrsta pogona</option>
                    <option value="menjac">Vrsta menjača</option>
                </select>
                <div class="search-text">
                    <input type="text" name="search-input" id="search-input" />
                    <button class="login-btn">Pretraži</button>
                </div>
            </section>
            <section class="car-ads">
                <h1>Oglasi</h1>
                <div class="car-ads-grid">
                    <div class="car-ad">
                        <img src="{{ asset('img/car_images/car1.jpg')}}" alt="A car">
                        <div class="car-desc">
                            <div class="car-name-price">
                                <h2 class="car-name">Lorem, ipsum dolor.</h2>
                                <p class="car-price">1,400.00$</p>
                            </div>
                            <p class="car-details">Benzin (2007) | Futog</p>
                        </div>
                    </div>
                    <div class="car-ad">
                        <img src="{{ asset('img/car_images/car2.jpg') }}" alt="A car">
                        <div class="car-desc">
                            <div class="car-name-price">
                                <h2 class="car-name">Lorem, ipsum dolor.</h2>
                                <p class="car-price">1,400.00$</p>
                            </div>
                            <p class="car-details">Benzin (2007) | Futog</p>
                        </div>
                    </div>
                    <div class="car-ad">
                        <img src="{{ asset('img/car_images/car3.jpg') }}" alt="A car">
                        <div class="car-desc">
                            <div class="car-name-price">
                                <h2 class="car-name">Lorem, ipsum dolor.</h2>
                                <p class="car-price">1,400.00$</p>
                            </div>
                            <p class="car-details">Benzin (2007) | Futog</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="guide">
                <div class="guide-desc">
                    <h1 class="guide-title">Kako izabrati najbolji automobil za Vas?</h1>
                    <p>Na šta sve treba obratiti pažnju pri kupovini automobila, koji detalji su najvažniji? Pročitajte naš <a href="https://www.polovniautomobili.com/pomoc-pri-kupovini-automobila">vodič</a> pre Vaše prve kupovine!</p>
                </div>
                <img src="{{ asset('img/icons/shopping_cart.png') }}" alt="Shopping cart icon">
            </section>
        </main>
        <footer>
            <div class="logo">
                <img src="{{ asset('img/icons/car-icon.png') }}" alt="Yellow car icon that is part of the logo">
                <span class="yellow">Used</span>
                <span class="white">Cars</span>
            </div>
            <div class="contact">
                <div class="contact-info">
                    <a href="#">Oglasi</a>
                    <a href="#">Cene</a>
                    <a href="register.html" class="login-btn">Registruj se</a>
                </div>
                <div class="contact-sections">
                    <div class="contact-section">
                        <h2>Kompanija</h2>
                        <a href="#">Iskustva korisnika</a>
                        <a href="#">O nama</a>
                        <a href="#">Kontakt</a>
                    </div>
                    <div class="contact-section">
                        <h2>Pomoć</h2>
                        <a href="#">Podrška</a>
                        <a href="#">Blog</a>
                    </div>
                </div>
            </div>
            <p>©2022 UsedCars.com, sva prava zadržana.</p>
        </footer>
    </body>
</html>