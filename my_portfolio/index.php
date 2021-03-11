<?php
    $page_title = "Mahmoud Hamde";
    $img_skills = "img/skills/";
    $img_portfolio = "img/work/";
    $js_plugins = "js/plugins/";
    $css_plugins = "css/plugins/";
    // Check If User Coming From A Request 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      // Assign Variables
      $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
      $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
  
      // Creating Array Of Errors
      $formErrors = array();
      if (strlen($user) <= 5) { 
        $formErrors[] = '<strong> Oh snap! </strong> User Must Be Larger Than 5 charcters';
      }
      if (strlen($msg) < 10) {
        $formErrors[] = '<strong> Oh snap! </strong> Message Can\'t be Less Than 10 charcters';
      }
  
      // If No Error Send The Message To Mail
      $subject = "Mail From '$user'";
      $to = "mahmoudhammad423@gmail.com";
      $headers = "MIME-VERSION: 1.0" . "\r\n";
      $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers ="Form: <$mail> \r\n";
      if (empty($formErrors)) {
        mail('$to, $subject, $msg, $headers');
        $user   = '';
        $mail   = '';
        $cell   = '';
        $msg  = '';
      }
    }
  ?>
  <!DOCTYPE <!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="theme-color" content="#ed7263">
      <title><?php echo $page_title ?> | Portfolio</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo $css_plugins ?>bootstrap.min.css">
        <!-- Lato Font -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,900i" rel="stylesheet">
        <!-- Fontawesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- AOS -->
        <link rel="stylesheet" href="<?php echo $css_plugins ?>aos.css">
        <!-- Animate -->
        <link rel="stylesheet" href="<?php echo $css_plugins ?>animate.css">
        <!-- BxSlider -->
        <link rel="stylesheet" href="<?php echo $css_plugins ?>jquery.bxslider.min.css">
        <!-- Favicon -->
        <link rel="icon" href="img/m-logo.png" type="image/png"/>
        <!--    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>-->
        <!-- Lightbox Gallery -->
        <link rel="stylesheet" href="<?php echo $css_plugins ?>lightbox.css">
        <!-- EmojiOneArea -->
        <link rel="stylesheet" href="<?php echo $css_plugins ?>emojionearea.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css">
          <!-- Style Sheet -->
          <!-- <link rel="stylesheet" href="css/style.css"> -->
      <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />
  </head>
  <body class="overflow">
      <!-- Start Header -->
    <header>
          <div class="demo">
              <div class="content">
                 <div id="large-header" class="large-header">
                    <canvas id="demo-canvas"></canvas>
                    <div class="logo">
                        <img src="img/m-logo.png" alt="Logo Image">
                    </div>
                    <h1 class="main-title"><span class="thin">Welcome</span></h1>
                    <div id="text-header"></div>
                 </div>
                 <div class="v-card wow fadeInDown">
                     <div class="card-img">
                          <a href="img/my-profile.jpeg" data-lightbox="roadstrip">
                              <img src="img/my-profile.jpeg" alt="V-Card Image">
                         </a>
                     </div>
                     <div class="card-body">
                         <div class="card-header">
                             <h4 class="title">
                                 Mahmoud Hammad
                             </h4>
                             <p class="desc">
                                  Engineer and software developer
                             </p>
                         </div>
                         <div class="card-content">
                             <P class="desc">
                                  Hello! My name is Mahmoud Hamde Hammad and I'm Web Developer. I have experience in developing a real-time web applications, complex front-end and back-end management systems, social platform applications. All my projects based on and PHP5 in conjunction with other modern web technologies.
                             </P>
                             <ul class="social list-unstyled">
                                 <li>
                                     <i class="fa fa-envelope"></i>
                                     <p>mahmoudhammad423@gmail.com</p>
                                 </li>
                                 <li>
                                     <i class="fa fa-map-marker"></i>
                                     <p>Al-Saf Helwan</p>
                                 </li>
                                 <li>
                                     <i class="fa fa-mobile"></i>
                                      <p>
                                     0111 189 3717
                                     -
                                     0100 446 0433 <img class="whats" src="img/whats.png">
                                     </p>
                                 </li>
                             </ul>
                             <div class="cv wow fadeInDown">
                              <h2>
                                Download my Cv: 
                                <a href="files/Mahmoud-Hammad-Cv.pdf" class="fa fa-file-pdf-o" download="Mahmoud Hammad-Cv" target="_blank"></a>
                              </h2>
                            </div>
                         </div>
                     </div>
                 </div>
              </div>
           </div>
      </header>
      <!-- /end header -->
  
      <!-- Start Empty-->
      <div class="empty"></div>
      <!-- /end empty-->
  
      <!-- Start About Me-->
      <section class="about-me">
          <div class="header">
              <h3 class="title">
                  About Me
              </h3>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="aboutMe-box">
                          <div class="aboutMe-img">
                              <div class="overlay-fixed"></div>
                              <img src="img/about-me.png" alt="About Me Image">
                          </div>
                          <div class="desc">
                              <p class="p1">
                                  Hello! My name is Mahmoud Hamde Hammad and I'm Web Developer. I have experience in developing a real-time web applications, complex front-end and back-end management systems, social platform applications. All my projects based on and PHP5 in conjunction with other modern web technologies. PHP (native PHP, Laravel), MySQL, jQuery, SASS, HTML5, CSS3, Basic Knowledge in( Angular.js/React.js )are used. While developing an application I always keep in mind SEO optimization and social integration. Furthermore, I'm trying to make my code as clean as possible. In addition, I can convert designs to high quality, cross-browser compatible HTML5/CSS3 markup
                              </p>
                              <p class="p2"> 
                                  I seeking for a Good long term career opportunity in a respectful company that will enhance and develop my future career. Developing clear, effective and accurate documents for tailored software packages. I have 2 years experience in front end and 8 months in backend and ability to learn new skills Interesting in being Great Programmer in Web. Hope to make apps to help people to make their life easie . now I’m learning Ionic .
                              </p>
                              <a href="#" class="more-text text-right">Read More <i class="fa fa-arrow-right"></i></a>
                              <a href="#" class="back text-right"><i class="fa fa-arrow-left"></i> Back</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- /end about me-->
  
      <!-- Start My Skills -->
      <section class="my-skills">
          <div class="header">
              <h3 class="title">
                  My Skills
              </h3>
          </div>
          <div class="container">
              <div class="row">
              <div class="col-md-4">
                      <div class="box text-center wow fadeInDown php">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>php.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  PHP
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">80%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown oop">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>oop.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  OOP
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">70%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="70"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown laravel">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>laravel.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  LARAVEL(MVC)
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">85%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="85"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown mysql">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>mysql.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  MYSQL
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">77%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="77"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown postger">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>postgresql.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  POSTGRESQL
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">70%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="70"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown git">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>git.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  GIT VERSION CONTROL
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">70%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="70"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown html">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>html.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  HTML & HTML5
                              </h4>
                          </div>
                          <!-- Progress Box -->
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">100%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="100"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown css">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>css3.jpg" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  CSS & CSS3
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">95%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="95"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown bootstrap">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>bootstrap.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  BOOTSTRAP & BOOTSTRAP4
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">93%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="93"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown materialize">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>materialize.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  MATERIALIZE
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">93%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="93"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown sass">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>sass.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  SASS
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">77%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="77"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown javascript">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>javascript.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  JAVASCRIPT
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">90%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="90"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown jquery">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>jquery.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  JQUERY
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">90%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="90"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown gulp">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>gulp.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  GULP
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">80%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown gulp">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>pug.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  PUG
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">80%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown react">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>react.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  REACT.JS
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">60%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="60"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown vue">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>vue.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  VUE.JS
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">85%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="85"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown angular">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>angular.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  ANGULAR & ANGULAR4
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">60%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="50"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown ajax">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>ajax.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  AJAX
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">80%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown es6">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>es6.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  ECMASCRIPT6 "ES6"
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">70%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="70"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="box text-center wow fadeInDown photoshop">
                          <div class="box-img">
                              <img src="<?php echo $img_skills ?>photoshop.png" alt="HTML Icon">
                          </div>
                          <div class="box-header">
                              <h4 class="title">
                                  PHOTOSHOP
                              </h4>
                          </div>
                          <div class="progress-box wow fadeInDown">
                              <h5><span class="color-heading pull-right">50%</span></h5>
                              <div class="progress">
                                  <div class="progress-bar bg-color-base" role="progressbar" data-width="50"></div>
                              </div>
                          </div>
                          <div class="box-desc">
                              <p> is simply dummy text of the printing and typesetting industry.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- /end my skills -->
  
      <!-- Start Portfolio -->
      <section class="portfolio popup-gallery">
          <div class="header">
              <h3 class="title">
                  Portfolio
              </h3>
          </div>
          <div class="container">
              <div class="col-lg-12 lay">
                  <div class="col-lg-4">
                      <div class="img wow fadeInDown">
                          <div class="overlay">
                          <a href="<?php echo $img_portfolio ?>slider-1.png" class="fa fa-eye" data-lightbox="roadtrip"></a>
                          <a href="http://novochem.net" class="fa fa-link" target="_blank"></a>
                          </div>
                          <img src="<?php echo $img_portfolio ?>slider-1.png">
                      </div>
                      </div>
                      <div class="col-lg-4">
                      <div class="img wow fadeInDown" data-wow-delay="0.3s">
                          <div class="overlay">
                          <a href="<?php echo $img_portfolio ?>slider-7.png" class="fa fa-eye" data-lightbox="roadtrip"></a>
                          <a href="http://oes.inspire.eg/" class="fa fa-link" target="_blank"></a>
                          </div>
                          <img src="<?php echo $img_portfolio ?>slider-7.png">
                      </div>
                      </div>
                      <div class="col-lg-4">
                      <div class="img wow fadeInDown" data-wow-delay="0.6s">
                          <div class="overlay">
                          <a href="<?php echo $img_portfolio ?>slider-3.png" class="fa fa-eye" data-lightbox="roadtrip"></a>
                          <a href="https://banan.academy/" class="fa fa-link" target="_blank"></a>
                          </div>
                          <img src="<?php echo $img_portfolio ?>slider-3.png">
                      </div>
                      </div>
                      <div class="col-lg-4">
                      <div class="img wow fadeInDown">
                          <div class="overlay">
                          <a href="<?php echo $img_portfolio ?>slider-4.png" class="fa fa-eye" data-lightbox="roadtrip"></a>
                          <a href="http://novochem.net" class="fa fa-link" target="_blank"></a>
                          </div>
                          <img src="<?php echo $img_portfolio ?>slider-4.png">
                      </div>
                      </div>
                      <div class="col-lg-4">
                      <div class="img wow fadeInDown" data-wow-delay="0.3s">
                          <div class="overlay">
                          <a href="<?php echo $img_portfolio ?>slider-9.png" class="fa fa-eye" data-lightbox="roadtrip"></a>
                          <a href="http://lcetschool.com/" class="fa fa-link" target="_blank"></a>
                          </div>
                          <img src="<?php echo $img_portfolio ?>slider-9.png">
                      </div>
                      </div>
                      <div class="col-lg-4">
                      <div class="img wow fadeInDown" data-wow-delay="0.6s">
                          <div class="overlay">
                          <a href="<?php echo $img_portfolio ?>slider-6.png" class="fa fa-eye" data-lightbox="roadtrip"></a>
                          <a href="http://staging.fastkood.com/" class="fa fa-link" target="_blank"></a>
                          </div>
                          <img src="<?php echo $img_portfolio ?>slider-6.png">
                      </div>
                      </div>
                  </div>
                  </div>
      </section>
      <!-- /end portfolio -->
  
      <!-- Start Footer -->
    <footer class="footer">
          <section class="contact-me">
              <div class="header">
                  <h4 class="title">
                      Contact Me
                  </h4>
              </div>
              <div class="container">
              <div class="info">
                  <div class="row">
                  <div class="col-lg-6 col-sm-12">
                      <div class="logo  wow fadeInLeft" >
                      <a href="#">
                          <img src="img/m-logo.png" class="img-responsive" data-value="head">
                      </a>
                      </div>
                      <div class="describe  wow fadeInDown" >
                      <p>
                          I seeking for a Good long term career opportunity in a respectful company that will enhance and develop my future career. Developing clear, effective and accurate documents for tailored software packages. I have 2 years experience in front end and 8 months in backend and ability to learn new skills Interesting in being Great Programmer in Web. Hope to make apps to help people to make their life easie " now i learning ionic "
                          <div class="signature pull-right">
                          <h5>
                              signature :- 
                          </h5>
                          <span>
                              Mahmoud Hammad
                          </span>
                          </div>
                      </p>
                      </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                      <div class="clearfix"></div>
                      <div class="row">
                      <div class="col-lg-10 col-lg-offset-2">
                          <div class="contact-head">
                          </div>
                          <form id="contact" class="form-contact wow fadeInDown"  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" ">
                          <?php if (! empty($formErrors)) { ?>
                          <div class="alert alert-danger alert-dismissible" role="start">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                              <?php
                              foreach ($formErrors as $error) {
                                  echo $error . '<br/>';
                              }
                              ?>
                          </div>
                          <?php } ?>
                          <?php if (isset($success)) {
                              echo $success;
                          } ?>
                          <div class="form-group">
                              <input
                              class="username form-control" 
                              type="text" 
                              name="username" 
                              placeholder="Type Your Name"
                              value="<?php if (isset($user)) { echo $user; }?>">
                              <i class="fa fa-user fa-fw"></i>
                              <span class="asterisx"></span>
                              <span class="fa fa-check"></span>
                              <div class="alert alert-danger alert-dismissible custom-alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              <strong> Oh snap! </strong> Your Name Must Be Larger Than 5 charcters
                              </div>
                          </div>
                          <div class="form-group">
                              <input
                              id="tip_email" 
                              class="email form-control" 
                              type="email" 
                              name="email" 
                              placeholder="E-mail"
                              value="<?php if (isset($mail)) { echo $mail; }?>">
                              <i class="fa fa-envelope fa-fw"></i>
                              <span class="asterisx textarea"></span>
                              <span class="fa fa-check textarea"></span>
                              <div class="alert alert-danger alert-dismissible custom-alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              <strong> Oh snap! </strong> Put Your E-mail
                              </div>
                          </div>
                          <div class="form-group">
                              <input 
                              class="phone form-control" 
                              type="text" 
                              name="cellphone" 
                              placeholder="Type Your Phone"
                              value="<?php if (isset($cell)) { echo $cell; }?>">
                              <i class="fa fa-phone fa-fw"></i>
                              <span class="asterisx"></span>
                              <span class="fa fa-check"></span>
                              <div class="alert alert-danger alert-dismissible custom-alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              <strong> Oh snap! </strong> Type Your Phone
                              </div>
                          </div>
  
                          <div class="form-group">
                              <textarea 
                              class="message form-control"
                              name="message" 
                              rows="4"
                              placeholder="Type Your Message:"><?php if (isset($msg)) { echo $msg; }?></textarea>
                              <span class="asterisx textarea"></span>
                              <span id="check" class="fa fa-check textarea"></span>
                              <div class="alert alert-danger alert-dismissible custom-alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong> Oh snap! </strong> Message Can't be Less Than 10 charcters
                              </div>
                          </div>
                          <div class="btn-submit">
                              <input 
                              id="btn-submit" 
                              class="btn btn-info btn-block" 
                              type="submit" 
                              name="submit" 
                              value="Send Message"
                              onsubmit="submitajaxform();">
                              <span class="before"></span>
                              <span class="after"></span>
                          </div>
                          <input 
                              type="hidden" 
                              id="ad_id" 
                              name="ad_id" />
                          </form>
                      </div>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </section>
    </footer>
    <!-- Start Copyright -->
  
    <!-- Start Copyright -->
    <div class="copyright">
      <div class="container">
        <div class="row">
        <div class="col-lg-6 col-sm-6">
          <p>
            Made with
            <i id="heart" class="fa fa-heart animated Pulse"></i>
            by
            <strong>
              <a href="https://www.facebook.com/mahmoud.h.hammad.1" target="_blank">
                Mahmoud Hammad
              </a>
            </strong>
          </p>
        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="social">
            <ul class="social-icon list-unstyled">
              <li>
                <a href="https://www.facebook.com/mahmoud.h.hammad.1" target="_blank">
                  <i class="fa fa-facebook"></i>
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/MahmoudHammad93" target="_blank">
                  <i class="fa fa-twitter"></i>
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="https://myaccount.google.com/?utm_source=OGB&utm_medium=act&pli=1" target="_blank">
                  <i class="fa fa-google-plus-square"></i>
                  <i class="fa fa-google-plus-square"></i>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/in/mahmoud-hammad-29a3ab15a/" target="_blank">
                  <i class="fa fa-linkedin"></i>
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
              <li>
                <a href="https://codepen.io/mahmoud_hammad93/" target="_blank">
                  <i class="fa fa-codepen"></i>
                  <i class="fa fa-codepen"></i>
                </a>
              </li>
              <li>
                <a href="https://github.com/Mahmoudhammad93" target="_blank">
                  <i class="fa fa-github"></i>
                  <i class="fa fa-github"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- End Copyright -->
    <!--Start Scroll To Top-->
    <div id="scroll-top">
      <a href="#" data-value="hom">
        <i class="fa fa-angle-up fa-2x"></i>
      </a>
    </div>
    <!--End Scroll To Top-->
    <!-- Start Loading Page -->
    <div id="loading-page" class="loading-page">
      <div class="sk-circle">
        <div class="sk-circle1 sk-child"></div>
        <div class="sk-circle2 sk-child"></div>
        <div class="sk-circle3 sk-child"></div>
        <div class="sk-circle4 sk-child"></div>
        <div class="sk-circle5 sk-child"></div>
        <div class="sk-circle6 sk-child"></div>
        <div class="sk-circle7 sk-child"></div>
        <div class="sk-circle8 sk-child"></div>
        <div class="sk-circle9 sk-child"></div>
        <div class="sk-circle10 sk-child"></div>
        <div class="sk-circle11 sk-child"></div>
        <div class="sk-circle12 sk-child"></div>
      </div>
      <div class="text-holder text-center">
        <h3>Mahmoud Hammad</h3>
        <h6>Engineer and software developer</h6>
      </div>
    </div>
    <!-- End Loading Page -->
  <!-- JQuery -->
  <script src="<?php echo $js_plugins ?>jquery-3.2.1.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo $js_plugins ?>bootstrap.min.js"></script>
  <!-- Lightbox -->
  <script src="<?php echo $js_plugins ?>lightbox.js"></script>
  <!-- BxSlider -->
  <script src="<?php echo $js_plugins ?>jquery.bxslider.min.js"></script>
  <!-- AOS -->
  <script src="<?php echo $js_plugins ?>aos.js"></script>
  <!-- WOW -->
  <script src="<?php echo $js_plugins ?>wow.js"></script>
  <!-- Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- EmojiOneArea -->
  <script src="<?php echo $js_plugins ?>emojionearea.min.js"></script>
      <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/TweenLite.min.js"></script>
      <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/EasePack.min.js"></script>
      <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/demo.js"></script>
      <script src="js/main.js"></script>
  </body>
  </html>