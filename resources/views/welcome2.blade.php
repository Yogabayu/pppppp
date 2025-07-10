@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Online portfolio for {{ $profile->name }} - Yoga Bayu Anggana Pratama" />
    <meta name="keywords"
        content="portfolio, {{ $profile->name }}, Yoga Bayu Anggana Pratama, web development, fullstack dev" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Portfolio - {{ $profile->name }}" />
    <meta property="og:description"
        content="Explore the online portfolio of {{ $profile->name }} - Yoga Bayu Anggana Pratama" />
    <meta property="og:image" content="{{ asset('storage/' . $profile->photo1) }}" />
    <!-- Add the URL to an image relevant to your portfolio -->
    <meta property="og:url" content="{{ url('/') }}" />
    <meta name="og:site_name" content="Portofolio" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Portfolio - {{ $profile->name }}" />
    <meta name="twitter:description"
        content="Explore the online portfolio of {{ $profile->name }} - Yoga Bayu Anggana Pratama" />
    <meta name="twitter:image" content="{{ asset('storage/' . $profile->photo1) }}" />
    <!-- Add the URL to an image relevant to your portfolio -->

    <title>Portfolio - {{ $profile->name }}</title>

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon-y.png') }}" type="image/x-icon" />

    <link href="{{ asset('assets/img/favicon-y.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}" />

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.3/purify.min.js"></script>
</head>

<body>
    <!--
    - #MAIN
  -->

    <main>
        <!--
      - #SIDEBAR
    -->

        <aside class="sidebar" data-sidebar>
            <div class="sidebar-info">
                <figure class="avatar-box">
                    <img src="{{ Storage::url($profile->photo2) }}" alt="{{ $profile->name }}" />
                </figure>

                <div class="info-content">
                    <h1 class="name" title="{{ $profile->name }}">{{ $profile->name }}</h1>

                    <p class="title">Fullstack developer</p>
                </div>

                <button class="info_more-btn" data-sidebar-btn>
                    <span>Show Contacts</span>

                    <ion-icon name="chevron-down"></ion-icon>
                </button>
            </div>

            <div class="sidebar-info_more">
                <div class="separator"></div>

                <ul class="contacts-list">
                    <li class="contact-item">
                        <div class="icon-box">
                            <ion-icon name="mail-outline"></ion-icon>
                        </div>

                        <div class="contact-info">
                            <p class="contact-title">Email</p>

                            <a href="mailto:{{ $profile->user->email }}"
                                class="contact-link">{{ $profile->user->email }}</a>
                        </div>
                    </li>
                    <li class="contact-item">
                        <div class="icon-box">
                            <ion-icon name="earth-outline"></ion-icon>
                        </div>

                        <div class="contact-info">
                            <p class="contact-title">Website</p>

                            <a href="{{ $profile->website }}" class="contact-link"
                                target="_blank">{{ $profile->website }}</a>
                        </div>
                    </li>

                    <li class="contact-item">
                        <div class="icon-box">
                            <ion-icon name="phone-portrait-outline"></ion-icon>
                        </div>

                        <div class="contact-info">
                            <p class="contact-title">Phone</p>

                            <a href="tel:{{ $profile->telp }}" class="contact-link">{{ $profile->telp }}</a>
                        </div>
                    </li>

                    <li class="contact-item">
                        <div class="icon-box">
                            <ion-icon name="location-outline"></ion-icon>
                        </div>

                        <div class="contact-info">
                            <p class="contact-title">Location</p>

                            <address>{{ $profile->address }}</address>
                        </div>
                    </li>
                </ul>

                <div class="separator"></div>

                <ul class="social-list">
                    <li class="social-item">
                        <a href="{{ $profile->facebook }}" class="social-link" target="_blank">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    <li class="social-item">
                        <a href="{{ $profile->linkedin }}" class="social-link" target="_blank">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>

                    <li class="social-item">
                        <a href="{{ $profile->instagram }}" class="social-link" target="_blank">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!--
      - #main-content
    -->

        <div class="main-content">
            <!--
        - #NAVBAR
      -->

            <nav class="navbar">
                <ul class="navbar-list">
                    <li class="navbar-item">
                        <button class="navbar-link active" data-nav-link>About</button>
                    </li>

                    <li class="navbar-item">
                        <button class="navbar-link" data-nav-link>Resume</button>
                    </li>

                    <li class="navbar-item">
                        <button class="navbar-link" data-nav-link>Portfolio</button>
                    </li>

                    <li class="navbar-item">
                        <button class="navbar-link" data-nav-link>Contact</button>
                    </li>
                </ul>
            </nav>

            <!--
        - #ABOUT
      -->

            <article class="about active" data-page="about">
                <header>
                    <h2 class="h2 article-title">About me</h2>
                </header>

                <section class="about-text">
                    {{-- <p> --}}
                    {!! $profile->desc !!}
                    {{-- </p> --}}
                </section>

                <!--
          - service
        -->

                <section class="service">
                    <h3 class="h3 service-title">What i'm doing</h3>

                    <ul class="service-list">
                        <li class="service-item">
                            <div class="service-icon-box">
                                <img src="{{ asset('assets/images/icon-design.svg') }}" alt="design icon"
                                    width="40" />
                            </div>

                            <div class="service-content-box">
                                <h4 class="h4 service-item-title">IoT Development</h4>

                                <p class="service-item-text">
                                    Build solutions for Internet of Things.
                                </p>
                            </div>
                        </li>

                        <li class="service-item">
                            <div class="service-icon-box">
                                <img src="{{ asset('assets/images/icon-dev.svg') }}" alt="Web development icon"
                                    width="40" />
                            </div>

                            <div class="service-content-box">
                                <h4 class="h4 service-item-title">Web development</h4>

                                <p class="service-item-text">
                                    High-quality development of sites at the professional level.
                                </p>
                            </div>
                        </li>

                        <li class="service-item">
                            <div class="service-icon-box">
                                <img src="{{ asset('assets/images/icon-app.svg') }}" alt="mobile app icon"
                                    width="40" />
                            </div>

                            <div class="service-content-box">
                                <h4 class="h4 service-item-title">Mobile apps</h4>

                                <p class="service-item-text">
                                    Professional development of applications for iOS and
                                    Android.
                                </p>
                            </div>
                        </li>

                        <li class="service-item">
                            <div class="service-icon-box">
                                <img src="{{ asset('assets/images/cpu.png') }}" alt="camera icon" width="40" />
                            </div>

                            <div class="service-content-box">
                                <h4 class="h4 service-item-title">Electronics Technician</h4>

                                <p class="service-item-text">
                                    Maintain and repair electronic devices.
                                </p>
                            </div>
                        </li>
                    </ul>
                </section>

                <!--
          - testimonials
        -->

                <section class="testimonials">
                    <h3 class="h3 testimonials-title">Testimonials</h3>

                    <ul class="testimonials-list has-scrollbar">
                        @foreach ($reviews as $review)
                            <li class="testimonials-item">
                                <div class="content-card" data-testimonials-item>
                                    <figure class="testimonials-avatar-box">
                                        <img src="{{ asset('assets/images/avatar-1.png') }}"
                                            alt="{{ $review->name }}" width="60" data-testimonials-avatar />
                                    </figure>

                                    <h4 class="h4 testimonials-item-title" data-testimonials-title>
                                        {{ $review->name }} @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                    </h4>

                                    <div class="testimonials-text" data-testimonials-text>
                                        <p>
                                            {{ $review->message }}
                                        </p>
                                    </div>

                                    <div
                                        style="margin-top: 1.25rem; display: flex; align-items: center; justify-content: center">
                                        @if ($review->photo)
                                            <img src="{{ Storage::url($review->photo) }}" alt="{{ $review->name }}"
                                                style="max-width: 20vw;border-radius:0.5rem" />
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>

                <!--
          - testimonials modal
        -->

                <div class="modal-container" data-modal-container>
                    <div class="overlay" data-overlay></div>

                    <section class="testimonials-modal">
                        <button class="modal-close-btn" data-modal-close-btn>
                            <ion-icon name="close-outline"></ion-icon>
                        </button>

                        <div class="modal-img-wrapper">
                            <figure class="modal-avatar-box">
                                <img src="{{ asset('assets/images/avatar-1.png') }}" alt="Daniel lewis"
                                    width="80" data-modal-img />
                            </figure>

                            <img src="{{ asset('assets/images/icon-quote.png') }}" alt="quote icon" />
                        </div>

                        <div class="modal-content">
                            <h4 class="h3 modal-title" data-modal-title>Daniel lewis</h4>

                            <time datetime="2021-06-14">14 June, 2021</time>

                            <div data-modal-text>
                                <p>
                                    Richard was hired to create a corporate identity. We were
                                    very pleased with the work done. She has a lot of experience
                                    and is very concerned about the needs of client. Lorem ipsum
                                    dolor sit amet, ullamcous cididt consectetur adipiscing
                                    elit, seds do et eiusmod tempor incididunt ut laborels
                                    dolore magnarels alia.
                                </p>
                            </div>
                        </div>
                    </section>
                </div>

                <!--
          - clients
        -->

                {{-- <section class="clients">
            <h3 class="h3 clients-title">Clients</h3>

            <ul class="clients-list has-scrollbar">
              <li class="clients-item">
                <a href="#">
                  <img
                    src="./assets/images/logo-1-color.png"
                    alt="client logo"
                  />
                </a>
              </li>

              <li class="clients-item">
                <a href="#">
                  <img
                    src="./assets/images/logo-2-color.png"
                    alt="client logo"
                  />
                </a>
              </li>

              <li class="clients-item">
                <a href="#">
                  <img
                    src="./assets/images/logo-3-color.png"
                    alt="client logo"
                  />
                </a>
              </li>

              <li class="clients-item">
                <a href="#">
                  <img
                    src="./assets/images/logo-4-color.png"
                    alt="client logo"
                  />
                </a>
              </li>

              <li class="clients-item">
                <a href="#">
                  <img
                    src="./assets/images/logo-5-color.png"
                    alt="client logo"
                  />
                </a>
              </li>

              <li class="clients-item">
                <a href="#">
                  <img
                    src="./assets/images/logo-6-color.png"
                    alt="client logo"
                  />
                </a>
              </li>
            </ul>
          </section> --}}
            </article>

            <!--
        - #RESUME
      -->

            <article class="resume" data-page="resume">
                <header>
                    <h2 class="h2 article-title">Resume</h2>
                </header>

                <section class="timeline">
                    <div class="title-wrapper">
                        <div class="icon-box">
                            <ion-icon name="book-outline"></ion-icon>
                        </div>

                        <h3 class="h3">Education</h3>
                    </div>

                    <ol class="timeline-list">
                        @foreach ($edus as $edu)
                            <li class="timeline-item">
                                <h4 class="h4 timeline-item-title">
                                    {{ $edu->sekolah }} | {{ $edu->jurusan }}
                                </h4>

                                <span>{{ \Carbon\Carbon::parse($edu->start)->format('Y') }} -
                                    {{ \Carbon\Carbon::parse($edu->end)->format('Y') }}</span>

                                <p class="timeline-text">
                                    {!! $edu->desc !!}
                                </p>
                            </li>
                        @endforeach

                    </ol>
                </section>

                <section class="timeline">
                    <div class="title-wrapper">
                        <div class="icon-box">
                            <ion-icon name="book-outline"></ion-icon>
                        </div>

                        <h3 class="h3">Internship Experience</h3>
                    </div>

                    <ol class="timeline-list">
                        @foreach ($apships as $ap)
                            <li class="timeline-item">
                                <h4 class="h4 timeline-item-title">{{ $ap->office }} | {{ $ap->position }}</h4>

                                <span> {{ \Carbon\Carbon::parse($ap->start)->format('F Y') }} -
                                    @if ($ap->end)
                                        {{ \Carbon\Carbon::parse($ap->end)->format('F Y') }}
                                    @else
                                        Sekarang
                                    @endif
                                </span>
                                <p class="timeline-text">
                                    {!! $ap->desc !!}
                                </p>
                            </li>
                        @endforeach
                    </ol>
                </section>

                <section class="timeline">
                    <div class="title-wrapper">
                        <div class="icon-box">
                            <ion-icon name="book-outline"></ion-icon>
                        </div>

                        <h3 class="h3">Work Experience</h3>
                    </div>

                    <ol class="timeline-list">
                        @foreach ($works as $wo)
                            <li class="timeline-item">
                                <h4 class="h4 timeline-item-title">{{ $wo->office }} | {{ $wo->position }}</h4>

                                <span> {{ \Carbon\Carbon::parse($wo->start)->format('F Y') }} -
                                    @if ($ap->end)
                                        {{ \Carbon\Carbon::parse($wo->end)->format('F Y') }}
                                    @else
                                        Sekarang
                                    @endif
                                </span>

                                <p class="timeline-text">
                                    {!! $wo->desc !!}
                                </p>
                            </li>
                        @endforeach
                    </ol>
                </section>

                <section class="skill">
                    <h3 class="h3 skills-title">My skills</h3>
                    <div class="d-flex skills-container content-card">
                        <div class="skills-row"
                            style="display: flex ;
                                    flex-wrap: wrap;
                                    justify-content: space-between;
                                    gap: 1.25rem;">
                            @foreach ($skills as $skill)
                                <div class="skill-item">
                                    <img src="{{ $skill->icon }}" alt="{{ $skill->name }}" class="skill-icon"
                                        style="width: 3.75rem; height: 3.75rem; ">
                                    <p class="skill-name" style="color:grey;margin-top: .625rem">{{ $skill->name }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </article>

            <!--
        - #PORTFOLIO
      -->

            <article class="portfolio" data-page="portfolio">
                <header>
                    <h2 class="h2 article-title">Portfolio</h2>
                </header>

                <section class="projects">

                    <ul class="project-list">
                        @foreach ($projects as $project)
                            <li class="project-item active">
                                <a href="#" data-project-id="{{ $project->id }}"
                                    data-project-title="{{ $project->title }}"
                                    data-project-photo="{{ Storage::url('photos/project/') . $project->photo }}"
                                    data-project-desc="{{ json_encode($project->long_desc) }}">
                                    <figure class="project-img">
                                        <div class="project-item-icon-box">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </div>
                                        <img src="{{ Storage::url('photos/project/') . $project->photo }}"
                                            alt="{{ $project->title }}" loading="lazy"
                                            style="width: 100%; height: 12rem;" />
                                    </figure>
                                    <h3 class="project-title">{{ $project->title }}</h3>
                                    <p class="project-category">{{ $project->short_desc }}</p>
                                </a>
                            </li>
                        @endforeach


                    </ul>

                    {{-- modal --}}
                    <div id="projectModal" class="modal">
                        <div class="modal-content">
                            <h2 id="modalTitle"></h2>
                            <img id="modalImage" src="" alt="" />
                            <div id="modalDescription"></div>
                        </div>
                    </div>
                </section>
            </article>


            <!--
        - #BLOG
      -->

            {{-- <article class="blog" data-page="blog">
                <header>
                    <h2 class="h2 article-title">Blog</h2>
                </header>

                <section class="blog-posts">
                    <ul class="blog-posts-list">
                        <li class="blog-post-item">
                            <a href="#">
                                <figure class="blog-banner-box">
                                    <img src="./assets/images/blog-1.jpg" alt="Design conferences in 2022"
                                        loading="lazy" />
                                </figure>

                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p class="blog-category">Design</p>

                                        <span class="dot"></span>

                                        <time datetime="2022-02-23">Fab 23, 2022</time>
                                    </div>

                                    <h3 class="h3 blog-item-title">
                                        Design conferences in 2022
                                    </h3>

                                    <p class="blog-text">
                                        Veritatis et quasi architecto beatae vitae dicta sunt,
                                        explicabo.
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="blog-post-item">
                            <a href="#">
                                <figure class="blog-banner-box">
                                    <img src="./assets/images/blog-2.jpg" alt="Best fonts every designer"
                                        loading="lazy" />
                                </figure>

                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p class="blog-category">Design</p>

                                        <span class="dot"></span>

                                        <time datetime="2022-02-23">Fab 23, 2022</time>
                                    </div>

                                    <h3 class="h3 blog-item-title">
                                        Best fonts every designer
                                    </h3>

                                    <p class="blog-text">
                                        Sed ut perspiciatis, nam libero tempore, cum soluta nobis
                                        est eligendi.
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="blog-post-item">
                            <a href="#">
                                <figure class="blog-banner-box">
                                    <img src="./assets/images/blog-3.jpg" alt="Design digest #80" loading="lazy" />
                                </figure>

                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p class="blog-category">Design</p>

                                        <span class="dot"></span>

                                        <time datetime="2022-02-23">Fab 23, 2022</time>
                                    </div>

                                    <h3 class="h3 blog-item-title">Design digest #80</h3>

                                    <p class="blog-text">
                                        Excepteur sint occaecat cupidatat no proident, quis
                                        nostrum exercitationem ullam corporis suscipit.
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="blog-post-item">
                            <a href="#">
                                <figure class="blog-banner-box">
                                    <img src="./assets/images/blog-4.jpg" alt="UI interactions of the week"
                                        loading="lazy" />
                                </figure>

                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p class="blog-category">Design</p>

                                        <span class="dot"></span>

                                        <time datetime="2022-02-23">Fab 23, 2022</time>
                                    </div>

                                    <h3 class="h3 blog-item-title">
                                        UI interactions of the week
                                    </h3>

                                    <p class="blog-text">
                                        Enim ad minim veniam, consectetur adipiscing elit, quis
                                        nostrud exercitation ullamco laboris nisi.
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="blog-post-item">
                            <a href="#">
                                <figure class="blog-banner-box">
                                    <img src="./assets/images/blog-5.jpg" alt="The forgotten art of spacing"
                                        loading="lazy" />
                                </figure>

                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p class="blog-category">Design</p>

                                        <span class="dot"></span>

                                        <time datetime="2022-02-23">Fab 23, 2022</time>
                                    </div>

                                    <h3 class="h3 blog-item-title">
                                        The forgotten art of spacing
                                    </h3>

                                    <p class="blog-text">
                                        Maxime placeat, sed do eiusmod tempor incididunt ut labore
                                        et dolore magna aliqua.
                                    </p>
                                </div>
                            </a>
                        </li>

                        <li class="blog-post-item">
                            <a href="#">
                                <figure class="blog-banner-box">
                                    <img src="./assets/images/blog-6.jpg" alt="Design digest #79" loading="lazy" />
                                </figure>

                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p class="blog-category">Design</p>

                                        <span class="dot"></span>

                                        <time datetime="2022-02-23">Fab 23, 2022</time>
                                    </div>

                                    <h3 class="h3 blog-item-title">Design digest #79</h3>

                                    <p class="blog-text">
                                        Optio cumque nihil impedit uo minus quod maxime placeat,
                                        velit esse cillum.
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </section>
            </article> --}}

            <!--
        - #CONTACT
      -->

            <article class="contact" data-page="contact">
                <header>
                    <h2 class="h2 article-title">Contact</h2>
                </header>

                <section class="mapbox" data-mapbox>
                    <figure>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d718.8245296770816!2d111.41060941461708!3d-8.047657740591285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79738aa04563f1%3A0xea4950097d3e05df!2syogabayuap.com!5e0!3m2!1sid!2sid!4v1721407746565!5m2!1sid!2sid"
                            width="400" height="300" loading="lazy"></iframe>
                    </figure>
                </section>

                <section class="contact-form">
                    <h3 class="h3 form-title">Contact Form</h3>

                    <form action="{{ route('contactme') }}" class="form" method="post" data-form>
                        @csrf
                        <div class="input-wrapper">
                            <input type="text" name="name" class="form-input" placeholder="Full name"
                                data-rule="minlen:4" required data-form-input />

                            <input type="email" name="email" class="form-input" placeholder="Email address"
                                required data-form-input />
                        </div>

                        <textarea name="message" class="form-input" placeholder="Your Message" required data-form-input></textarea>

                        <button class="form-btn" type="submit" disabled data-form-btn>
                            <ion-icon name="paper-plane"></ion-icon>
                            <span>Send Message</span>
                        </button>
                    </form>
                </section>
            </article>
        </div>
    </main>

    <!--
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
