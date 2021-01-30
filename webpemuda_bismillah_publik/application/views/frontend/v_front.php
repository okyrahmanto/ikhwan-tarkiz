<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Pemuda Bismillah</title>

  <!--|Google Font( Open Sans )|-->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <!--|Google Font( Roboto Slab )|-->
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700' rel='stylesheet' type='text/css'>
  <!--|Icon Font( Ion Icon)|-->
  <link href="<?php echo base_url(); ?>assets/rhyme/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <!--|Owl Carousel|-->
  <link href="<?php echo base_url(); ?>assets/rhyme/css/owl.carousel.css" rel="stylesheet" type="text/css">
  <!--|Bootstrap|-->
  <link href="<?php echo base_url(); ?>assets/rhyme/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!--|Site Stylesheet|-->
  <!--//Note: If you want to change color, just uncomment the commented stylesheet link and comment the uncommented link -->
  <link href="<?php echo base_url(); ?>assets/rhyme/css/style.css" rel="stylesheet" type="text/css">
  <!--<link href="assets/css/style_blue.css" rel="stylesheet" type="text/css">-->
  <!--<link href="assets/css/style_purple.css" rel="stylesheet" type="text/css">-->
  <!--<link href="assets/css/style_teal.css" rel="stylesheet" type="text/css">-->

  <!--|Favicon|-->
  <link rel="icon" href="<?php echo base_url(); ?>assets/rhyme/images/favicon.ico">
  <!-- Touch Icons -->
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/rhyme/images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/rhyme/images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/rhyme/images/apple-touch-icon-114x114.png">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<!--||Site Header||-->
<header id="home" class="site-header overlay-black">
  <div class="overlay-inner">
    <div class="fp-navbar">
      <nav class="navbar">
        <div class="container">
          <div class="navbar-header">
            <!--|Toggle Btn|-->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <i class="ion-navicon"></i>
            </button> <!--|End Toggle Btn|-->

            <!--|Brand( Logo )|-->
            <a class="navbar-brand" href="#home">
              <img class="logo-white" alt="rhyme" src="<?php echo base_url(); ?>assets/rhyme/images/logo_white.png">
              <img class="logo-black" alt="rhyme" src="<?php echo base_url(); ?>assets/rhyme/images/logo_black.png">
            </a> <!--|End Brand( Logo )|-->
          </div>

          <!--|Navbar collapse|-->
          <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-right">
              <!--<li><a href="#speakers">Pembicara</a></li>-->
              <li><a href="#schedule">Jadwal</a></li>
              <li><a href="#benefits">Download</a></li>
              <li><a href="#packages">Paket</a></li>
              <li><a href="#faqs">Faq</a></li>
              <!--<li><a href="#gallery">Galeri</a></li>-->
              <!--<li><a href="#blog">Blog</a></li>-->
              <li><a href="#sponsor">Sponsor</a></li>
              <li><a class="btn btn-primary" href="#register">Pesan</a></li>
            </ul>
          </div> <!--|End Navbar collapse|-->
        </div>
      </nav>
    </div>

    <!--|Greeting Content|-->
    <div class="greetings-content text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-10 content-center">
            <!--|Head Text|-->
            <div class="head-text">
              <p class="fp-meta">Banjarmasin, 5 April 2020</p>
              <h1 class="head-title">Pemuda Bismillah On 4D</h1>
              <p class="fp-meta">Bersahabat di Dunia, berkumpul di Surga</p>
            </div> <!--|End Head Text|-->

            <!--|Event Countdown|-->
            <div class="event-countdown">
              <p>Waktu mulai acara</p>

              <div id="countdown-timer" class="countdown-timer"></div>
            </div> <!--|End Event Countdown|-->
          </div>
        </div>
      </div>
    </div> <!--|End Greeting Content|-->
  </div>

  <!--|Animated Mouse Icon|-->
  <span class="dwon-icon ion-mouse"></span>
</header> <!--||End Site Header||-->

<!--||Overview||-->
<div id="overview" class="overview">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <!--|Overview Box|-->
        <div class="overview-box">
          <span class="fp-icon"><i class="ion-map"></i></span>
          <div class="fp-desc">
            <h4 class="title">Hotel Rodhita Banjarbaru, Indonesia</h4>
            <p>Banjarmasin, 2020</p>
          </div>
        </div> <!--|End Overview Box|-->
      </div>

      <div class="col-md-3 col-sm-6">
        <!--|Overview Box|-->
        <div class="overview-box">
          <span class="fp-icon"><i class="ion-android-microphone"></i></span>
          <div class="fp-desc">
            <h4 class="title">Event Dahsyat</h4>
            <p>Menampilkan kreativitas terbaik</p>
          </div>
        </div> <!--|End Overview Box|-->
      </div>

      <div class="col-md-3 col-sm-6">
        <!--|Overview Box|-->
        <div class="overview-box">
          <span class="fp-icon"><i class="ion-leaf"></i></span>
          <div class="fp-desc">
            <h4 class="title">Persembahan Terbaik</h4>
            <p>Tim Profesional</p>
          </div>
        </div> <!--|End Overview Box|-->
      </div>

      <div class="col-md-3 col-sm-6">
        <!--|Overview Box|-->
        <div class="overview-box">
          <span class="fp-icon"><i class="ion-person-stalker"></i></span>
          <div class="fp-desc">
            <h4 class="title">Peserta Terbatas</h4>
            <p>500 Kursi</p>
          </div>
        </div> <!--|End Overview Box|-->
      </div>
    </div>
  </div>
</div> <!--||End Overview||-->

<!--||Speakers||-->
<!--<section id="speakers" class="speakers section overlay-white">
  <div class="overlay-inner">
    <div class="container">
      |Section Header|
      <header class="section-header">
        <div class="row">
          <div class="col-md-6 content-center">
            <h2 class="section-title">
              <span class="fp-meta">Regional & Nasional</span>
              <span class="title-text">Pembicara</span>
            </h2>
            <p>Kami Menghadirkan pembicara Nasional dan Regional untuk Anda</p>
          </div>
        </div>
      </header> |End Section Header|

      <div class="row">
        <div class="col-md-3 col-sm-6">
         
          <div class="speaker">
            <figure class="avatar">
              <img src="assets/images/speaker01.jpg" alt="">

              <figcaption class="social-links">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-linkedin"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
              </figcaption>
            </figure>

            <div class="speaker-info">
              <h4 class="name">Budi Pramono</h4>
              <cite>Co-Founder Abude Group Nusantara</cite>
            </div>
          </div> 
        </div>

        <div class="col-md-3 col-sm-6">
          
          <div class="speaker">
            <figure class="avatar">
              <img src="assets/images/speaker02.jpg" alt="">

              <figcaption class="social-links">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-linkedin"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
              </figcaption>
            </figure>

            <div class="speaker-info">
              <h4 class="name">Hasan Biasa</h4>
              <cite>Tangan Kanan Budi Pramono</cite>
            </div>
          </div> 

        <div class="col-md-3 col-sm-6">
         
          <div class="speaker">
            <figure class="avatar">
              <img src="assets/images/speaker03.jpg" alt="">

              <figcaption class="social-links">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-linkedin"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
              </figcaption>
            </figure>

            <div class="speaker-info">
              <h4 class="name">Amda Magiyasa</h4>
              <cite>CEO Fotokopi Bersemi Kembali</cite>
            </div>
          </div> |End speaker|
        </div>

        <div class="col-md-3 col-sm-6">
          |speaker|
          <div class="speaker">
            <figure class="avatar">
              <img src="assets/images/speaker04.jpg" alt="">

              <figcaption class="social-links">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-linkedin"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
              </figcaption>
            </figure>

            <div class="speaker-info">
              <h4 class="name">Aziz Batulicin</h4>
              <cite>Penemu Cinta di Kampus seberang</cite>
            </div>
          </div> |End speaker|
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6">
          |speaker|
          <div class="speaker">
            <figure class="avatar">
              <img src="assets/images/speaker05.jpg" alt="">

              <figcaption class="social-links">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-linkedin"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
              </figcaption>
            </figure>

            <div class="speaker-info">
              <h4 class="name">Jeremy Knight</h4>
              <cite>Pixar Animation Studios</cite>
            </div>
          </div>|End speaker|
        </div>-->

        <!--<div class="col-md-3 col-sm-6">
          |speaker|
          <div class="speaker">
            <figure class="avatar">
              <img src="assets/images/speaker06.jpg" alt="">

              <figcaption class="social-links">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-linkedin"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
              </figcaption>
            </figure>

            <div class="speaker-info">
              <h4 class="name">Doris Cole</h4>
              <cite>Producer, CSI:Cyber</cite>
            </div>
          </div> |End speaker|
        </div>-->

        <!--<div class="col-md-3 col-sm-6">
          |speaker|
          <div class="speaker">
            <figure class="avatar">
              <img src="assets/images/speaker07.jpg" alt="">

              <figcaption class="social-links">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-linkedin"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
              </figcaption>
            </figure>

            <div class="speaker-info">
              <h4 class="name">Megan Clark</h4>
              <cite>GM, The boxtrap</cite>
            </div>
          </div> |End speaker|
        </div>-->

        <!--<div class="col-md-3 col-sm-6">
          |speaker|
          <div class="speaker">
            <figure class="avatar">
              <img src="assets/images/speaker08.jpg" alt="">

              <figcaption class="social-links">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-linkedin"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
              </figcaption>
            </figure>

            <div class="speaker-info">
              <h4 class="name">Jason Rice</h4>
              <cite>CEO, Hatem Co.</cite>
            </div>
          </div> |End speaker|-
        </div>
      </div>
    </div>
  </div>
</section> End Speaker-->

<!--||Schedule||-->
<section id="schedule" class="schedule-wrapper section">
  <div class="container">
    <!--|Section Header|-->
    <header class="section-header">
      <div class="row">
        <div class="col-md-6 content-center">
          <h2 class="section-title">
            <span class="fp-meta">Jadwal</span>
            <span class="title-text">Acara</span>
          </h2>
          <p>Kami Memiliki beragam acara yang akan ditampilkan pada saat Pemuda Bismillah On 4D</p>
        </div>
      </div>
    </header> <!--|End Section Header|-->

    <div class="row">
      <div class="col-md-9 content-center">
        <!--|Tab Navigation|-->
        <div class="tab-navigation">
          <ul class="tabs">
            <li><a class="active" href="#" data-tab="day1">25 Mar, 2020</a></li>
            <!--<li><a href="#" data-tab="day2">26 Jan, 2016</a></li>
            <li><a href="#" data-tab="day3">27 Jan, 2016</a></li>-->
          </ul>
        </div> <!--|End Tab Navigation|-->

        <!--|schedules|-->
        <div class="schedules">
          <ul id="day1" class="tab-content current">
            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>Scheduled</span><br>Hall#01</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Pembacaan Ayat Suci Alqur'an</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar02.png" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Tim Pemuda Bismillah</h4>
                     <p>Tim</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>Scheduled</span><br>Hall#01</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Atraksi Bendera</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar02.png" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Tim Pemuda Bismillah</h4>
                    <p>Tim</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>Scheduled</span><br>Hall#01</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Penampilan Spesial 4D </h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar02.png" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Tim Pemuda Bismillah</h4>
                    <p>Tim Kreatif</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>Scheduled</span><br>Hall#01</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Training Pemuda</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar02.png" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Pemuda Adalah Kekuatan</h4>
                    <p>Trainer Spesial</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>

          <ul id="day2" class="tab-content">
            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>08:30am</span><br>Hall#01</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Plugin Development</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar04.jpg" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Aaron Banks</h4>
                    <p>CEO, The Sage Group</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>09:30am</span><br>Hall#01</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Useing SASS</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar03.jpg" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Joe Fisher</h4>
                    <p>GM, The Boxstrap</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>12:00pm</span><br>Hall#03</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Lunch Brack</h4>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>01:00pm</span><br>Hall#02</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">CSS Best Practices</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar02.jpg" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Maria Hall</h4>
                    <p>CEO, Google Inc.</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>02:00pm</span><br>Hall#02</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">CSS Animation In-Depth Post-Conference Workshop</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar01.jpg" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Jamie Wen</h4>
                    <p>Co-Founder &amp; CEO, Slack</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>

          <ul id="day3" class="tab-content">
            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>08:30am</span><br>Hall#02</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Frontend Tooling Post-Conference Workshop</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar02.jpg" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Maria Hall</h4>
                    <p>CEO, Google Inc.</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>09:30am</span><br>Hall#01</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Plugin Development</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar04.jpg" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Aaron Banks</h4>
                    <p>CEO, The Sage Group</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>12:00pm</span><br>Hall#03</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">Lunch Brack</h4>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>01:30am</span><br>Hall#01</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">CSS Animation In-Depth Post-Conference Workshop</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar03.jpg" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Joe Fisher</h4>
                    <p>GM, The Boxstrap</p>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="pull-right text-right">
                <span class="fp-meta"><span>02:00pm</span><br>Hall#02</span>
              </div>
              <div class="schedule-info">
                <h4 class="title">SMACSS Post-Conference Workshop</h4>
                <div class="speaker">
                  <figure class="avatar">
                    <img src="<?php echo base_url(); ?>assets/rhyme/images/avatar01.jpg" alt="">
                  </figure>
                  <div class="fp-desc">
                    <h4 class="name">Jamie Wen</h4>
                    <p>Co-Founder &amp; CEO, Slack</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div> <!--|End schedules|-->
      </div>
    </div>
  </div>
</section> <!--||End Schedule||-->

<!--||Benefits||-->
<section id="benefits" class="benefits section overlay-black" style="background-image: url('<?php echo base_url(); ?>assets/rhyme/images/background01.jpg');">
  <div class="overlay-inner">
    <div class="container">
      <!--|Section Header|-->
      <header class="section-header">
        <div class="row">
          <div class="col-md-6 content-center">
            <h2 class="section-title">
              <span class="title-text">Download</span>
            </h2>
            <table align="center" border="0">
              <tr>
                <td align="right" width="65%"><a href="#"><img src="<?php echo base_url(); ?>assets/rhyme/images/gplay.png" alt="Playstore" width="50%" height="50%"></a></td>
                <td align="left" width="50%"><a href="#"><img src="<?php echo base_url(); ?>assets/rhyme/images/astore.sv" alt="" width="45%" height="45%"></a></td>
              </tr>
            </table>
          </div>
        </div>
      </header> <!--|End Section Header|-->
    </div>
  </div>
</section> <!--||End Benefits||-->

<!--||Packages||-->
<section id="packages" class="packages section">
  <div class="container">
    <!--|Section Header|-->
    <header class="section-header">
      <div class="row">
        <div class="col-md-6 content-center">
          <h2 class="section-title">
            <span class="fp-meta">Bismillah</span>
            <span class="title-text">Paket</span>
          </h2>
          <p>Kami menawarkan paket untuk acara Grand Opening Pemuda Bismillah</p>
        </div>
      </div>
    </header> <!--|End Section Header|-->

    <div class="row">
      <div class="col-md-4 col-sm-4">
        <!--|Pricing Table|-->
        <div class="package">
          <div class="package-header">
            <p class="package-name">EARLY BIRD</p>
            <p class="price"><span class="currency-symbol">Rp.</span>30K <span class="duration"></span></p>
          </div>
          <div class="pricing-features">
            <ul>
              <li>1-7 Maret 2020</li>
              <li>Regular Seat</li>
              <li class="enable">Snack</li>
              <!--<li class="disable">Makan Siang</li>-->
            </ul>
          </div>
        </div> <!--|Pricing Table|-->
      </div>

      <div class="col-md-4 col-sm-4">
        <!--|Pricing Table|-->
        <div class="package">
          <div class="package-header">
            <p class="package-name">Standar</p>
            <p class="price"><span class="currency-symbol">Rp.</span>40K <span class="duration"></span></p>
          </div>
          <div class="pricing-features">
            <ul>
              <li>8-15 Maret 2020</li>
              <li>Regular Seat</li>
              <li>Snack</li>
              <!--<li>Makan Siang</li>-->
            </ul>
          </div>
        </div> <!--|Pricing Table|-->
      </div>

      <div class="col-md-4 col-sm-4">
        <!--|Pricing Table|-->
        <div class="package">
          <div class="package-header">
            <p class="package-name">Normal</p>
            <p class="price"><span class="currency-symbol">Rp.</span>50K <span class="duration"></span></p>
          </div>
          <div class="pricing-features">
            <ul>
              <li>16-23 Maret 2020</li>
              <li>Regular Seat</li>
              <li>Snack</li>
            </ul>
          </div>
        </div> <!--|Pricing Table|-->
      </div>
    </div>
  </div>
</section> <!--||End Packages||-->

<!--||Register||-->
<section id="register" class="register section overlay-black">
  <div class="overlay-inner">
    <div class="container">
      <!--|Section Header|-->
      <header class="section-header">
        <div class="row">
          <div class="col-md-6 content-center">
            <h2 class="section-title">
              <span class="fp-meta">Sekarang</span>
              <span class="title-text">Daftar</span>
            </h2>
            <p></p>
          </div>
        </div>
      </header> <!--|End Section Header|-->

      <!--|Register Form|-->
      <form class="register-form" action="<?php echo base_url()?>index.php/front/daftar" method="post" id="register-form" >
        <div class="row">
          <div class="col-md-2 col-sm-6">
            <input type="text" required="" placeholder="Nama" id="nama" name="nama">
          </div>
          <div class="col-md-3 col-sm-6">
            <input type="email" required="" placeholder="Email" id="email" name="email">
          </div>
          <div class="col-md-2 col-sm-6">
            <input type="tel" placeholder="Nomor Whatsapp" id="noTelepon" name="noTelepon">
          </div>
          <div class="col-md-2 col-sm-6">
            <select id="option" name="jenisKelamin">
              <option value="Laki-laki" selected="">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="col-md-3 col-sm-6">
              <?php
                //today
                
                $paymentDate = date('Y-m-d');
                $paymentDate=date('Y-m-d', strtotime($paymentDate));
                //echo $paymentDate; // echos today! 
                $earlyDateBegin = date('Y-m-d', strtotime("2020/03/01"));
                $earlyDateEnd = date('Y-m-d', strtotime("2020/03/07"));

                $standarDateBegin = date('Y-m-d', strtotime("2020/03/08"));
                $standarDateEnd = date('Y-m-d', strtotime("2020/03/15"));


                $normalDateBegin = date('Y-m-d', strtotime("2020/03/16"));
                $normalDateEnd = date('Y-m-d', strtotime("2020/03/23"));

                if (($paymentDate >= $earlyDateBegin) && ($paymentDate <= $earlyDateEnd)){
                    echo '<select id="option" name="kelas">
                        <option value="1">Early Bird</option>
                        </select>';
                }else if (($paymentDate >= $standarDateBegin) && ($paymentDate <= $standarDateEnd)){
                    echo '<select id="option" name="kelas">
                        <option value="2">Standar</option>
                        </select>';  
                } else if (($paymentDate >= $normalDateBegin) && ($paymentDate <= $normalDateEnd)) {
                    echo '<select id="option" name="kelas">
                        <option value="3">Normal</option>
                        </select>';
                } else {
                    echo '<select id="option" name="kelas">
                    <option value="Silver" disabled >Ditutup</option>
                  </select>';
                }

               
              ?>
          </div>
          <div class="col-md-12 col-sm-12" align="center">
            <button class="btn btn-block btn-primary" type="submit" style="width: 200px">Daftar</button>
          </div>
        </div>
      </form> <!--|End Register Form|-->
    </div>
  </div>
</section> <!--||End Register||-->

<!--||FAQ||-->
<section id="faqs" class="section">
  <div class="container">
    <!--|Section Header|-->
    <header class="section-header">
      <div class="row">
        <div class="col-md-6 content-center">
          <h2 class="section-title">
            <span class="fp-meta">Some</span>
            <span class="title-text">FAQ</span>
          </h2>
          <p>Beberapa Pertanyaan yang sering ada</p>
        </div>
      </div>
    </header> <!--|End Section Header|-->

    <div class="row">
      <div class="col-md-9 content-center">
        <!--|FAQS|-->
        <div class="faq-wrapper" id="faq-panel">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#faq-panel" href="#faqOne">
                  <i class="fa-icon ion-help-circled"></i> Bagaimana kami bisa mengikuti Acara?
              </h4>
            </div>
            <div id="faqOne" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>Silahkan Anda mengisi form pendaftaran pada web ini, selanjutnya tunggu tim Pemuda Bismillah menghubungi Anda melalui whatsapp</p>
                <p>Setelah tim menghubungi Anda, dan menyampaikan instruksi lanjutan, maka selanjutnya tiket akan terbit didalam aplikasi atau e-mail Anda.</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#faq-panel" href="#faqTwo">
                  <i class="fa-icon ion-chatbox-working"></i>  Apakah pendaftaran bisa dilakukan secara kumulatif?
                </a>
              </h4>
            </div>
            <div id="faqTwo" class="panel-collapse collapse">
              <div class="panel-body">
                <p>Tidak bisa, Pendaftaran hanya bisa harus dilakukan perorang yang bersangkutan dengan menyertakan data diri yang tertera.</p>
                <p></p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#faq-panel" href="#faqThree">
                  <i class="fa-icon ion-images"></i> Apakah ada Lanjutan dari Progam ini?
                </a>
              </h4>
            </div>
            <div id="faqThree" class="panel-collapse collapse">
              <div class="panel-body">
                <p>Pemuda Bismillah akan mengadakan event yang terus menerus dan berkelanjutan, kami akan memberikan info lanjutan melalui aplikasi</p>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#faq-panel" href="#faqFour">
                  <i class="fa-icon ion-social-usd"></i> Apa saja pilihan tiket untuk acara ini?
                </a>
              </h4>
            </div>
            <div id="faqFour" class="panel-collapse collapse">
              <div class="panel-body">
                <p>Semua tiket yang kami tawarkan memiliki fasilitas yang sama, namun untuk Anda yang mendaftar lebih cepat akan mendapatkan harga yang lebih terjangkau,oleh karenanya segera mendaftar</p>
                <p></p>
              </div>
            </div>
          </div>
        </div> <!--|End FAQS|-->
      </div>
    </div>
  </div>
</section> <!--||End FAQ||-->

<!--||Gallery||-->
<section id="gallery" class="section section-bg" style="display: none">
  <div class="container">
    <!--|Section Header|-->
    <header class="section-header">
      <div class="row">
        <div class="col-md-6 content-center">
          <h2 class="section-title">
            <span class="fp-meta">Event</span>
            <span class="title-text">Gallery</span>
          </h2>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        </div>
      </div>
    </header> <!--|End Section Header|-->

    <div class="row">
      <div class="col-md-9 content-center">
        <!--|Gallery|-->
        <div class="gallery">
          <div class="gallery-item">
            <div class="item-inner">
              <img src="<?php echo base_url(); ?>assets/rhyme/images/header_bg.jpg" alt="">
            </div>
          </div>

          <div class="gallery-item">
            <div class="item-inner vid-responsive">
              <iframe src="https://player.vimeo.com/video/25447460?color=4caf50&amp;title=0&amp;byline=0&amp;portrait=0" width="500" height="281"></iframe>
            </div>
          </div>

          <div class="gallery-item">
            <div class="item-inner">
              <img src="<?php echo base_url(); ?>assets/rhyme/images/benefit_bg.jpg" alt="">
            </div>
          </div>
        </div> <!--|End Gallery|-->
      </div>
    </div>
  </div>
</section> <!--||End Gallery||-->

<!--||Blog|DIGANTI EVENT BERIKUTNYA|-->
<!--<section id="blog" class="blog-posts section">
  <div class="container">
    |Section Header|
    <header class="section-header">
      <div class="row">
        <div class="col-md-6 content-center">
          <h2 class="section-title">
            <span class="fp-meta">From</span>
            <span class="title-text">Blog</span>
          </h2>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        </div>
      </div>
    </header> |End Section Header|

    |Post Wrapper|
    <div class="posts-wrapper">
      <div class="row">
        <div class="col-md-6">
          <!-|Post|--
          <article class="fp-post">
            <a class="thumb-container" href="#">
              <img src="<?php echo base_url(); ?>assets/rhyme/images/posts/img01.jpg" alt="">
            </a>
            <div class="post-desc">
              <header class="post-header">
                <div class="fp-cat post-meta"><a href="#">Business</a></div>
                <h4 class="post-title"><a href="#">You Might not be Aware</a></h4>
              </header>
              <div class="fp-entry">
                <p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt[...]</p>
                <a class="more-btn" href="#">Read More +</a>
              </div>
            </div>
          </article> <!-|End Post|--
        </div>

        <div class="col-md-6">
          <!-|Post|--
          <article class="fp-post">
            <a class="thumb-container" href="#">
              <img src="<?php echo base_url(); ?>assets/rhyme/images/posts/img02.jpg" alt="">
            </a>
            <div class="post-desc">
              <header class="post-header">
                <div class="fp-cat post-meta"><a href="#">Business</a></div>
                <h4 class="post-title"><a href="#">Proin Gravida Nibh vel Velit</a></h4>
              </header>
              <div class="fp-entry">
                <p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt[...]</p>
                <a class="more-btn" href="#">Read More +</a>
              </div>
            </div>
          </article> <!-|End Post|--
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <!-|Post|--
          <article class="fp-post">
            <a class="thumb-container" href="#">
              <img src="<?php echo base_url(); ?>assets/rhyme/images/posts/img03.jpg" alt="">
            </a>
            <div class="post-desc">
              <header class="post-header">
                <div class="fp-cat post-meta"><a href="#">Business</a></div>
                <h4 class="post-title"><a href="#">Tips for Increasing.</a></h4>
              </header>
              <div class="fp-entry">
                <p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt[...]</p>
                <a class="more-btn" href="#">Read More +</a>
              </div>
            </div>
          </article> <!-|End Post|--
        </div>

        <div class="col-md-6">
          <!-|Post|--
          <article class="fp-post">
            <a class="thumb-container" href="#">
              <img src="<?php echo base_url(); ?>assets/rhyme/images/posts/img04.jpg" alt="">
            </a>
            <div class="post-desc">
              <header class="post-header">
                <div class="fp-cat post-meta"><a href="#">Webdesign</a></div>
                <h4 class="post-title"><a href="#">You might not be aware</a></h4>
              </header>
              <div class="fp-entry">
                <p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt[...]</p>
                <a class="more-btn" href="#">Read More +</a>
              </div>
            </div>
          </article> <!-|End Post|--
        </div>
      </div>

      <!-|Button Panel|--
      <div class="btn-panel">
        <a class="btn btn-primary" href="#">View More</a>
      </div> <!-|End Button Panel|--
    </div> <!-|End Post Wrapper|--
  </div>
</section> <!-||End Blog||-->

<!--||Sponsor||-->
<section id="sponsor" class="section section-bg">
  <div class="container">
    <!--|Section Header|-->
    <header class="section-header">
      <div class="row">
        <div class="col-md-6 content-center">
          <h2 class="section-title">
            <span class="fp-meta">Event</span>
            <span class="title-text">Sponsor</span>
          </h2>
          <p>Pendukung acara Pemuda Bismillah</p>
          <p></p>
        </div>
      </div>
    </header> <!--|End Section Header|-->

    <div class="sponsor-panel" align="center">
      <!--|Sponsors|-->
      <ul class="sponsors">
        <li><a href="#"><img src="<?php echo base_url(); ?>assets/rhyme/images/sponsors/osaka_pancake.jpg" alt=""></a></li>
        <li><a href="https://api.whatsapp.com/send?phone=6285345683025"><img src="<?php echo base_url(); ?>assets/rhyme/images/sponsors/logo02.png" alt=""></a></li>
        <li><a href="https://api.whatsapp.com/send?phone=6285754377773"><img src="<?php echo base_url(); ?>assets/rhyme/images/sponsors/abude.png" alt=""></a></li>
        <li><a href="https://api.whatsapp.com/send?phone=6285251270303"><img src="<?php echo base_url(); ?>assets/rhyme/images/sponsors/dihnulogo.jpeg" alt=""></a></li>
      </ul> <!--|End Sponsors|-->

      <div class="button-panel text-center">
        <a class="btn btn-primary" href="https://api.whatsapp.com/send?phone=6285345683025">Menjadi Sponsor</a>
      </div>
    </div>
  </div>
</section> <!--||End Sponsor||-->

<!--||Google Map||-->
<!--div id="map" class="map-container"></div>--> <!--||End Google Map||-->

<!--||Subscribe||-->
<div class="subscribe">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <!--|Section Header|-->
        <header class="section-header">
          <h2 class="section-title">
            <span class="fp-meta">Untuk berlangganan email materi dari Pemuda Bismillah</span>
            <span class="title-text">Langganan Sekarang</span>
          </h2>
          <p></p>
        </header> <!--|End Section Header|-->
      </div>

      <div class="col-md-8">
        <!--|Subscribe Form|-->
        <form class="subscribe-form">
          <p class="subscribe-success" style="color: #008000"></p>
          <p class="subscribe-error" style="color: #ff0000"></p>
          <div class="row">
            <div class="col-md-8"><input type="email" placeholder="Enter your email address" name="EMAIL"></div>
            <div class="col-md-4"><button type="submit" class="submit-btn"><i class="ion-paper-airplane"></i> Subscribe</button></div>
          </div>
        </form> <!--|End Subscribe Form|-->
      </div>
    </div>
  </div>
</div> <!--||End Subscribe||-->

<!--||Footer||-->
<footer id="footer" class="footer">
  <div class="container">
    <!--|Social Links|-->
    <div class="social-links">
      <a href="https://www.instagram.com/pemudabismillah.id/"><i class="ion-social-instagram"></i></a>
      <!--<a href="#"><i class="ion-social-facebook"></i></a>-->
      <!--<a href="#"><i class="ion-social-linkedin"></i></a>-->
      <a href="https://www.youtube.com/channel/UCVJnz4XskbE7y8R23sbHYiA/featured"><i class="ion-social-youtube"></i></a>
    </div> <!--|End Social Links|-->

    <!--|Copyright|-->
    <p class="copyright">&copy; 2020 <a href="#home">Pemuda Bismillah</a> . All Rights Reserved.</p> <!--|End Copyright|-->
  </div>
</footer> <!--||Footer||-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="<?php echo base_url();?>/assets/img/notice.jpeg"> 
      </div>
    </div>
  </div>
</div>

<!--||Javascript||-->
<!--|jQuery|-->
<script src="<?php echo base_url(); ?>assets/rhyme/js/jquery.min.js"></script>
<!--|Countdown|-->
<script src="<?php echo base_url(); ?>assets/rhyme/js/jquery.countdown.min.js"></script>
<!--Owl Carousel-->
<script src="<?php echo base_url(); ?>assets/rhyme/js/owl.carousel.min.js"></script>
<!--|Google Map|-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<!--|Fitvids|-->
<script src="<?php echo base_url(); ?>assets/rhyme/js/jquery.fitvids.js"></script>
<!--|Validate|-->
<script src="<?php echo base_url(); ?>assets/rhyme/js/jquery.validate.min.js"></script>
<!--|Ajaxchimp|-->
<script src="<?php echo base_url(); ?>assets/rhyme/js/jquery.ajaxchimp.min.js"></script>
<!--|Bootstrap|-->
<script src="<?php echo base_url(); ?>assets/rhyme/js/bootstrap.min.js"></script>
<!--|Init|-->
<script src="<?php echo base_url(); ?>assets/rhyme/js/init.js"></script>

<script>
    <?php 
        if ($_SESSION['message']!=null) {
            echo "alert('".$_SESSION['message']."');";
            echo "window.location.replace('".base_url()."');";
        }
    ?>
  $( document ).ready(function() {
    $('#exampleModal').modal('show');
  });
    


</script>

</body>
</html>