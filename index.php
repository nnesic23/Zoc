<!DOCTYPE html>
<html lang="sr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="msapplication-config" content="/favicons/browserconfig.xml" />
    <meta name="theme-color" content="#ffffff" />

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/grid.css" />
    <link rel="stylesheet" type="text/css" href="/css/queries.css" />
    <link rel="stylesheet" type="text/css" href="/css/normalize.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400&display=swap"
      rel="stylesheet"
    />
    <link
      crossorigin="anonymous"
      media="all"
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />

    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="/favicons/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="/favicons/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="/favicons/favicon-16x16.png"
    />
    <link rel="manifest" href="/favicons/site.webmanifest" />
    <link
      rel="mask-icon"
      href="/favicons/safari-pinned-tab.svg"
      color="#5bbad5"
    />
    <link rel="shortcut icon" href="/favicons/favicon.ico" />

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule=""
      src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"
    ></script>

    <title>Žoc</title>
  </head>

  <body>
    <header>
      <nav>
        <div class="row">
          <img src="./images/logo.png" alt="logo" class="logo" />

          <ul class="main-nav">
            <li><a href="#">Početna</a></li>
            <li><a href="#section-form">Poruči pivo</a></li>
            <li><a href="#footer">Kontakt</a></li>
            <li><a href="#section-about">O nama</a></li>
          </ul>
          <a class="mobile-nav-icon"><i class="ion-navicon-round"></i></a>
        </div>
      </nav>

      <div class="main">
        <h1>Da li ste probali Žoc pivo?</h1>
        <a href="#section-form" class="btn btn-full">Poručite odmah</a>
      </div>
    </header>

    <section class="section-about" id="section-about">
      <div class="row">
        <div class="col span-3-of-3">
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae,
            nesciunt? Molestiae magni ad repudiandae aliquam rem quas, eligendi
            eaque quod distinctio illum a eos soluta in fugiat. Rerum, qui
            sapiente.
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col span-3-of-3">
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae,
            nesciunt? Molestiae magni ad repudiandae aliquam rem quas, eligendi
            eaque quod distinctio illum a eos soluta in fugiat. Rerum, qui
            sapiente.
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col span-3-of-3">
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae,
            nesciunt? Molestiae magni ad repudiandae aliquam rem quas, eligendi
            eaque quod distinctio illum a eos soluta in fugiat. Rerum, qui
            sapiente.
          </p>
        </div>
      </div>
    </section>

    <section class="section-beers">
      <ul class="beer-showcase clearfix">
        <li>
          <figure class="beer-photo">
            <img src="/images/resized/DENN6496resized.jpg" alt="beer" />
          </figure>
        </li>
        <li>
          <figure class="beer-photo">
            <img src="/images/resized/DENN6518.jpg" alt="beer" />
          </figure>
        </li>
        <li>
          <figure class="beer-photo">
            <img src="/images/resized/DENN6566.jpg" alt="beer" />
          </figure>
        </li>
        <li>
          <figure class="beer-photo">
            <img src="/images/resized/DENN6550.jpg" alt="beer" />
          </figure>
        </li>
        <li>
          <figure class="beer-photo">
            <img src="/images/resized/DENN6541.jpg" alt="beer" />
          </figure>
        </li>
        <li>
          <figure class="beer-photo">
            <img src="/images/resized/DENN6573.jpg" alt="beer" />
          </figure>
        </li>
        <li>
          <figure class="beer-photo">
            <img src="/images/resized/DENN6574.jpg" alt="beer" />
          </figure>
        </li>
        <li>
          <figure class="beer-photo">
            <img src="/images/resized/DENN6575.jpg" alt="beer" />
          </figure>
        </li>
      </ul>
    </section>

    <section class="section-form" id="section-form">
      <div class="row" id="form">
        <h2>Vaša porudžbina</h2>
      </div>
      <div class="row">
        <div class="products">
          <div class="product bottle">
            <img
              src="./images/DENN6496-copy.jpg"
              alt="bottle"
              class="productImg"
            />
            <p class="price">300 rsd / 0.33ml</p>
            <input type="number" min="0" value="0" class="quantity" />
            <a href="#" class="btn-add">Potvrdi</a>
          </div>
          <div class="product can">
            <img
              src="./images/DENN6496-copy.jpg"
              alt="can"
              class="productImg"
            />
            <p class="price">300 rsd / 0.33ml</p>
            <input type="number" min="0" value="0" class="quantity" />
            <a href="#" class="btn-add">Potvrdi</a>
          </div>
        </div>
      </div>

      <form method="post" action="mailer.php" class="contact-form">
        <div class="row">
          <?php
          if($_GET["success"] == 1) {
             echo "<div class=\"form-messages success\">Uspešna porudžbina!</div>"
          } if($_GET["success"] == -1) {
            echo "<div class=\"form-messages error\">Greška, pokušajte ponovo!</div>"
          }
          ?>
        </div>

        <div class="row">
          <div class="col span-3-of-3">
            <input
              type="text"
              name="name"
              placeholder="Vaše ime"
              id="name"
              required
            />
          </div>
        </div>

        <div class="row">
          <div class="col span-3-of-3">
            <input
              type="text"
              name="surname"
              placeholder="Vaše prezime"
              id="surname"
              required
            />
          </div>
        </div>

        <div class="row">
          <div class="col span-3-of-3">
            <input
              type="email"
              name="email"
              placeholder="Vaš email"
              id="email"
              required
            />
          </div>
        </div>

        <div class="row">
          <div class="col span-3-of-3">
            <input
              type="text"
              name="city"
              placeholder="Grad"
              id="city"
              required
            />
          </div>
        </div>

        <div class="row">
          <div class="col span-3-of-3">
            <input
              type="text"
              name="address"
              placeholder="Vaša adresa"
              id="address"
              required
            />
          </div>
        </div>

        <div class="row">
          <div class="col span-3-of-3">
            <input
              type="text"
              name="phone-number"
              placeholder="Vaš broj telefona"
              id="phone-number"
              required
            />
          </div>
        </div>

        <div class="row">
          <div class="col span-3-of-3">
            <textarea
              name="message"
              placeholder="Napomena..."
              id="message"
            ></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col span-1-of-3">
            <label for="promo">Želim da primam obaveštenja o promocijama</label>
          </div>
          <div class="col span-2-of-3">
            <input type="checkbox" name="promo" id="promo" checked /> Da
          </div>
        </div>

        <div class="row">
          <div class="col span-1-of-3">
            <label>&nbsp;</label>
          </div>
          <div class="col span-2-of-3">
            <input type="submit" value="Poruči!" />
          </div>
        </div>
      </form>
    </section>

    <footer id="footer">
      <div class="row">
        <div class="col span-1-of-2">
          <ul class="footer-nav">
            <li>
              <i class="ion-ios-email-outline"></i
              ><a href="#">zocpivo@gmail.com</a>
            </li>
            <li><i class="ion-iphone"></i><a href="#">+381645555996</a></li>
            <li>
              <i class="ion-ios-location-outline"></i
              ><a href="https://goo.gl/maps/qc3XPkqnTgWJonJy7" target="_blank"
                >Miloša Obilića 42, Čačak</a
              >
            </li>
          </ul>
        </div>

        <div class="col span-1-of-2">
          <ul class="social-links">
            <li>
              <a href="https://www.facebook.com/" target="_blank"
                ><i class="ion-social-facebook"></i
              ></a>
            </li>
            <li>
              <a href="https://www.instagram.com/caffezoc032" target="_blank"
                ><i class="ion-social-instagram"></i
              ></a>
            </li>
            <li>
              <a href="#" target="_blank"
                ><i class="ion-social-googleplus"></i
              ></a>
            </li>
          </ul>
        </div>
      </div>

      <div class="row">
        <p>Copyright &copy; 2020 by Žoc. All rights reserved.</p>
      </div>
    </footer>

    <script src="/js/noframework.waypoints.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
  </body>
</html>
