<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== BOOTSTARP 5 ===============-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!--=============== BOOTSTARP 5 ===============-->

      <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href='assets/img/favicon.png' type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href='styles.css'>

      <title>{{ $title_site }}</title>
   </head>
   <body>
      <!--==================== HEADER ====================-->
      <header class="header" id="header">
         <nav class="nav contaienr">
            <div>
               <a href="#" class="nav__logo">Travel</a>
            </div>

            <div>
               <div class="nav__menu" id="nav-menu">
                  <ul class="nav__list">
                     <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Asosiy</a>
                     </li>
   
                     <li class="nav__item">
                        <a href="#about" class="nav__link">Haqida</a>
                     </li>
   
                     <li class="nav__item">
                        <a href="#popular" class="nav__link">Mashhur</a>
                     </li>
   
                     <li class="nav__item">
                        <a href="#explore" class="nav__link">Tadqiq</a>
                     </li>
   
                     <li class="nav__item">
                        <a href="{{ route('blogs') }}" class="nav__link">Blog</a>
                     </li>
                  </ul>
   
                  <div class="nav__close" id="nav-close">
                     <i class="ri-close-line"></i>
                  </div>
               </div>
            </div>

            <div>
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line"></i>
               </div>
            </div>
         </nav>
      </header>
      <!--==================== /HEADER ====================-->

      <!--==================== MAIN ====================-->
      <main class="main">
            <section class="home section" id="home">
               <img src="assets/img/home-bg.jpg" alt="image" class="home__bg">
   
               <div class="home__shadow"></div>
               <div class="home__container container grid">
                  <div class="home__data">
                     <h3 class="home__subtitle">Sayohat dunyosiga xush kelibsiz!</h3>
   
                     <h1 class="home__title">Dunyoni<br>O'rganing</h1>
   
                     <p class="home__description">Dunyo bo'ylab sayohat qiling, yangi joylarni kashf eting — jannat makon orollar, hayratlanarli tog'lar va yana ko'p boshqalar sizni kutmoqda. Sayohatingizni hoziroq boshlang!"
                     </p>
   
                     <a href="travel contact/index.html" target="_blank" class="button">Sayohatingizni boshlang
                        <i class="ri-arrow-right-line"></i>
                     </a>
                  </div>
   
                  <div class="home__cards grid">
                     <article class="home__card">
                        <img src="assets/img/home-trees.jpg" alt="" class="home__card-img">
                        <h3 class="home__card-title">Xorvatiya</h3>
                        <div class="home__card-shadow"></div>
                     </article>
   
                     <article class="home__card">
                        <img src="assets/img/home-lake.jpg" alt="" class="home__card-img">
                        <h3 class="home__card-title">Islandiya</h3>
                        <div class="home__card-shadow"></div>
                     </article>
   
                     <article class="home__card">
                        <img src="assets/img/home-mountain.jpg" alt="" class="home__card-img">
                        <h3 class="home__card-title">Italiya</h3>
                        <div class="home__card-shadow"></div>
                     </article>
   
                     <article class="home__card">
                        <img src="assets/img/home-beach.jpg" alt="" class="home__card-img">
                        <h3 class="home__card-title">Ispaniya</h3>
                        <div class="home__card-shadow"></div>
                     </article>
                  </div>
               </div>
            </section>
            <!--==================== /HOME ====================-->
   
            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
               <div class="about__container container grid">
                  <div class="about__data">
                     <h2 class="section__title">
                        Batafsil ma'lumot <br>
                        Sayohat haqida
                     </h2>
   
                     <p class="about__description">Sayohat — bu bir joydan boshqa joyga borish, yangi joylarni ko‘rish,    madaniyatlar bilan tanishish va yangi tajribalar orttirish jarayonidir.
                        U nafaqat dam olish, balki o‘rganish, ruhiy yangilanish va dunyoqarashni kengaytirish vositasi hamdir.
                     </p>
                     
                     <a href="#" class="button">
                        Sayohat bilan tanishing 
                        <i class="ri-arrow-right-line"></i>
                     </a>
                  </div>
   
                  <div class="about__image">
                     <img src="assets/img/about-beach.jpg" alt="" class="about__img">
                     <div class="about__shadow"></div>
                  </div>
               </div>
            </section>
            <!--==================== /ABOUT ====================-->
   
            <!--==================== POPULAR ====================-->
            <section class="popular section" id="popular">
               <h2 class="section__title">
                  Dunyo go‘zalliklarini <br> ko‘rib zavqlaning
               </h2>
   
               <div class="popular__container container grid">
                  <article class="popular__card">
                     <div class="popular__image">
                        <img src="assets/img/popular-mountain.jpg" alt="" class="popular__img">
                        <div class="popular__shadow"></div>
                     </div>
   
                     <h2 class="popular__title">
                        Logan tog'i
                     </h2>
   
                     <div class="popular__location">
                        <i class="ri-map-pin-line"></i>
                        <span>Kanada</span>
                     </div>
                  </article>
   
                  <article class="popular__card">
                     <div class="popular__image">
                        <img src="assets/img/popular-forest.jpg" alt="" class="popular__img">
                        <div class="popular__shadow"></div>
                     </div>
   
                     <h2 class="popular__title">
                        Spike o'rmoni
                     </h2>
   
                     <div class="popular__location">
                        <i class="ri-map-pin-line"></i>
                        <span>Irland</span>
                     </div>
                  </article>
   
                  <article class="popular__card">
                     <div class="popular__image">
                        <img src="assets/img/popular-lake.jpg" alt="" class="popular__img">
                        <div class="popular__shadow"></div>
                     </div>
   
                     <h2 class="popular__title">
                        Garda ko'li
                     </h2>
   
                     <div class="popular__location">
                        <i class="ri-map-pin-line"></i>
                        <span>Italiya</span>
                     </div>
                  </article>
               </div>
            </section>
            <!--==================== /POPULAR ====================-->
            
            <!--==================== EXPLORE ====================-->
            <section class="explore section" id="explore">
               <div class="explore__container">
                  <div class="explore__image">
                     <img src="assets/img/explore-beach.jpg" alt="" class="explore__img">
                     <div class="explore__shadow"></div>
                  </div>
   
                  <div class="explore__content container grid">
                     <div class="explore__data">
                        <h2 class="section__title">
                           Dunyoning eng ajoyib <br> maskanlarini o‘rganing
                        </h2>
                        
                        <p class="explore__description">
                           Orollar va boshqa jannatmakon joylarni o‘rganish — bu dunyo bo‘ylab sayohatning eng unutilmas va hayratlanarli qismlaridan biridir.
                        </p>  
                     </div>
   
                     <div class="explore__user">
                        <img src="assets/img/explore-perfil.png" alt="" class="explore__perfil">
                        <span class="explore__name">Ziyodullo Ko't</span>
                     </div>
                  </div>
               </div>
            </section>
            <!--==================== /EXPLORE ====================-->
            
            <!--==================== JOIN ====================-->
            <section class="join section">
               <div class="join__container conatainer grid">
                  <div class="join__data">
                     <h3 class="section__title">
                        Sayohatingini <br>
                        Shu yerda boshlang
                     </h3>
   
                     <form id="contactForm" class="join__form">       
                        <div class="container">
                           <div class="row row-cols-1 gy-3">
                             <div class="col">
                                 <input type="text" name="full_name" placeholder="Ismingizni kiriting" class="join__input form-control" required>
                              </div>
                              <div class="col">
                                 <input type="tel" name="phone_number" placeholder="Telefon raqam" class="join__input form-control" required>
                              </div>
                              <div class="col">
                                 <input type="email" name="email" placeholder="Email kiriting" class="join__input form-control" required>
                              </div>
                           </div>
                         </div>
                        
                        <button class="join__button button" type="submit">
                           Obuna Bo'ling!
                           <i class="ri-arrow-right-line"></i>
                        </button>
                     </form>
   
                     <div id="successMessage" style="display:none; color: green; margin-top: 10px;">
                         ✅ Xabaringiz muvaffaqiyatli yuborildi!
                     </div>
   
                     <script>
                     document.getElementById('contactForm')
                        .addEventListener('submit', function(e) {
                           e.preventDefault();
                  
                              const form = e.target;
                              const formData = new FormData(form);
                  
                              fetch('/send-contact', {
                                 method: 'POST',
                                 headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                 },
                                 body: formData
                              })
                              .then(response => {
                                  if (response.ok) {
                                  console.log(response)
                                      document.getElementById('successMessage').style.display = 'block';
                                      form.reset();
                                  } else {
                                      alert("❌ Xatolik yuz berdi, keyinroq urinib ko‘ring.");
                                  }
                              })
                              .catch(error => {
                                  console.error('Error:', error);
                                  alert("❌ Server bilan bog‘lanib bo‘lmadi.");
                              });
                        });
                     </script>
                  </div>
   
                  <div class="join__image">
                     <img src="assets/img/join-island.jpg" alt="" class="join__img">
                     <div class="join__shadow"></div>
                  </div>
               </div>
            </section>
         </main>
   
         <!--==================== FOOTER ====================-->
         <footer class="footer">
            <div class="footer__container container grid">
               <div class="footer__content grid">
                  <div>
                     <a href="#" class="footer__logo">Travel</a>
   
                     <p class="footer__description">
                        Biz bilan sayohat qiling va kashf qiling <br>
                        cheksiz dunyo.
                     </p>
                  </div>
               
                  <div>
                        <h3 class="footer__title">Haqida</h3>
      
                        <ul class="footer__links">
                           <li>
                              <a href="#" class="footer__link">Biz haqimizda</a>
                           </li>
      
                           <li>
                              <a href="#" class="footer__link">Xususiyatlari</a>
                           </li>
      
                           <li>
                              <a href="#" class="footer__link">Yangiliklar va Blog</a>
                           </li>
                        </ul>
                  </div>
   
                  <div>
                        <h3 class="footer__title">Kompaniya</h3>
   
                        <ul class="footer__links">
                           <li>
                              <a href="#" class="footer__link">Tez-tez so'raladigan savollar</a>
                           </li>
      
                           <li>
                              <a href="#" class="footer__link">Tarix</a>
                           </li>
      
                           <li>
                              <a href="#" class="footer__link">Guvohlar</a>
                           </li>
                        </ul>
                  </div>
   
                  <div>
                        <h3 class="footer__title">Aloqa</h3>
   
                        <ul class="footer__links">
                           <li>
                              <a href="#" class="footer__link">Call Center</a>
                           </li>
      
                           <li>
                              <a href="#" class="footer__link">Qo'llab-quvvatlash markazi</a>
                           </li>
      
                           <li>
                              <a href="#" class="footer__link">Biz bilan bog'lanish</a>
                           </li>
                        </ul>
                  </div>
   
                  <div>
                        <h3 class="footer__title">Qo'llab-quvvatlash</h3>
   
                        <ul class="footer__links">
                           <li>
                              <a href="#" class="footer__link">Maxfiylik siyosati</a>
                           </li>
      
                           <li>
                              <a href="#" class="footer__link">Shartlar va xizmatlar</a>
                           </li>
      
                           <li>
                              <a href="#" class="footer__link">To'lovlar</a>
                           </li>
                        </ul>
                  </div>
               </div>
               <hr style="margin-top: 5rem;">
               <div class="footer__group">
                  <div class="footer__social">
                     <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                        <i class="ri-facebook-line"></i>
                     </a>
   
                     <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                        <i class="ri-instagram-line"></i>
                     </a>
   
                     <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                        <i class="ri-twitter-line"></i>
                     </a>
   
                     <a href="https://www.youtube.com/" target="_blank" class="footer__social-link">
                        <i class="ri-youtube-line"></i>
                     </a>
                  </div>
   
                  <span class="footer__copy">
                     &#169; Sayt yaratuvchisi: GO GLOBAL IT
                  </span>
               </div>
            </div>
         </footer>

      <!--========== SCROLL UP ==========-->
      <a href="#" class="scrollup" id="scroll-up">
         <i class="ri-arrow-up-line"></i>
      </a>

      <!--=============== SCROLLREVEAL ===============-->
      <script src="assets/js/scrollreveal.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
   </body>
</html>