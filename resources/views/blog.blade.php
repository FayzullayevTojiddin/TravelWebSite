<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $blog_main['title'] }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href={{ asset('styles.css') }}>

  <style>
    body {
      background-color: black;
    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    .links::after{
      content: '';
      width: 70%;
      height: 2px;
      background-color: var(--title-color);
      position: absolute;
      left: 0;
      transition: .4s;
      bottom: -0.5rem;
    }
  </style>

</head>
<body>
  <header class="header" id="header">
      <nav class="nav contaienr">
        <a href="{{ route('index') }}" class="nav__logo">Travel</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
              <li class="nav__item">
                  <a href="{{ route('index') }}" class="nav__link">Home</a>
              </li>

              <li class="nav__item">
                  <a href="{{ route('index') }}#about" class="nav__link">About</a>
              </li>

              <li class="nav__item">
                  <a href="{{ route('index') }}#popular" class="nav__link">Popular</a>
              </li>

              <li class="nav__item">
                  <a href="{{ route('index') }}#explore" class="nav__link">Explore</a>
              </li>

              <li class="nav__item">
                  <a href="#" class="nav__link links">Blog</a>
              </li>
            </ul>

            <div class="nav__close" id="nav-close">
              <i class="ri-close-line"></i>
            </div>
        </div>
        <div class="nav__toggle" id="nav-toggle">
            <i class="ri-menu-line"></i>
        </div>
      </nav>
  </header>
    <!--=============== HEADER ===============-->

    <!--=============== SECTION ===============-->
    <section>
      <div class="container py-5">
        <div class="row">
    
          <!-- Chapdagi katta karta -->
          <div class="col-md-8 mt-5 big__image">
            <div class="card">
              @if (Str::startsWith($blog_main->media_type, 'video'))
                  <video class="card-img-top w-100" controls>
                      <source src="{{ Storage::url($blog_main->media_path) }}" alt="{{ $blog_main->title }}">
                      Sizning brauzeringiz ushbu videoni qo‘llab-quvvatlamaydi.
                  </video>
              @elseif (Str::startsWith($blog_main->media_type, 'image'))
                  <img src="{{ Storage::url($blog_main->media_path) }}" alt="{{ $blog_main->title }}" class="card-img-top w-100">
              @endif
              <div class="card-body">
                <h5 class="card-title">{{ $blog_main->title }}</h5>
                <p class="card-text">{{ $blog_main->description }}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Last updated {{ $blog_main->updated_at->diffForHumans() }}</small>
              </div>
            </div>
          </div>
    
          <!-- O'ngdagi kartalar ustma-ust -->
          <div class="col-md-4 mt-5">
            <div class="d-flex flex-column gap-3">
                @foreach ($blogs as $blog)
                    <div class="card">
                        @if (Str::startsWith($blog->media_type, 'video'))
                            <video class="card-img-top w-100" controls>
                                <source src="{{ Storage::url($blog->media_path) }}" type="video/mp4">
                                Sizning brauzeringiz ushbu videoni qo‘llab-quvvatlamaydi.
                            </video>
                        @elseif (Str::startsWith($blog->media_type, 'image'))
                          <img src="{{ Storage::url($blog->media_path) }}" alt="{{ $blog->title }}" class="card-img-top w-100">
                        @endif
        
                        <div class="card-body">
                          <a href="{{ route('blog.show', $blog->id) }}" class="nav__link text-black">
                            Blogga o‘tish
                         </a>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->content, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{ $blog->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        </div>
      </div>
    </section>
    <!--=============== SECTION ===============-->

  <!--========== SCROLL UP ==========-->
      <a href="#" class="scrollup" id="scroll-up">
         <i class="ri-arrow-up-line"></i>
      </a>

      <!--=============== SCROLLREVEAL ===============-->
      <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

      <!--=============== MAIN JS ===============-->
      <script src={{ asset('assets/js/main.js') }}></script>
</body>
</html>
