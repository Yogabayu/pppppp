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

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon-y.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <style>
        .wrapper-card {
            display: table;
            height: 100%;
            width: 100%;
        }

        .container-fostrap-card {
            display: table-cell;
            padding: 1em;
            text-align: center;
            vertical-align: middle;
        }

        .fostrap-logo-card {
            width: 100px;
            margin-bottom: 15px
        }

        h1.heading-card {
            color: #fff;
            font-size: 1.15em;
            font-weight: 900;
            margin: 0 0 0.5em;
            color: #505050;
        }

        @media (min-width: 450px) {
            h1.heading-card {
                font-size: 3.55em;
            }
        }

        @media (min-width: 760px) {
            h1.heading-card {
                font-size: 3.05em;
            }
        }

        @media (min-width: 900px) {
            h1.heading-card {
                font-size: 3.25em;
                margin: 0 0 0.3em;
            }
        }

        .card {
            display: block;
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            transition: box-shadow .25s;
        }

        .card:hover {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .img-card {
            width: 100%;
            height: 200px;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            display: block;
            overflow: hidden;
        }

        .img-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all .25s ease;
        }

        .card-content-card {
            padding: 15px;
            text-align: left;
        }

        .card-title-card {
            margin-top: 0px;
            font-weight: 700;
            font-size: 1.65em;
        }

        .card-title-card a {
            color: #000;
            text-decoration: none !important;
        }

        .card-read-more-card {
            border-top: 1px solid #D4D4D4;
        }

        .card-read-more-card a {
            text-decoration: none !important;
            padding: 10px;
            font-weight: 600;
            text-transform: uppercase
        }
    </style>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    {{-- <style>
        #hero {
            width: 100%;
            height: 100vh;
            background: url("{{ asset('storage/' . $profile->photo1) }}") top right no-repeat;
            background-size: cover;
            position: relative;
        }
    </style> --}}

    {{-- <script src="form.js"></script> --}}
</head>

<body>
    <!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none">
        <i class="icofont-navigation-menu"></i>
    </button>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">
        <nav class="nav-menu">
            <ul>
                <li class="active">
                    <a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a>
                </li>
                <li>
                    <a href="#about"><i class="bx bx-user"></i> <span>Tentang Saya</span></a>
                </li>
                <li>
                    <a href="#skills"><i class="bx bx-book-content"></i> <span>Skill</span></a>
                </li>
                <li>
                    <a href="#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a>
                </li>
                <li>
                    <a href="#portfolio"><i class="bx bx-book-content"></i> <span>Portofolio</span></a>
                </li>
                {{-- <li>
                    <a href="#services"><i class="bx bx-server"></i> <span>Keterampilan</span></a>
                </li> --}}
                <li>
                    <a href="#contact"><i class="bx bx-envelope"></i> <span>Kontak</span></a>
                </li>
            </ul>
        </nav>
        <!-- .nav-menu -->
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center"
        style="width: 100%; height: 100vh; background: url('{{ asset('storage/' . $profile->photo1) }}') top right no-repeat; background-size: cover; position: relative;">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <h1>{{ $profile->name }}</h1>
            <p>
                Saya Seorang
                <span class="typed" data-typed-items="Freelancer, Teknisi, Designer, Developer"></span>
            </p>
            <div class="social-links">
                <a href="{{ $profile->twitter }}" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
                <a href="{{ $profile->facebook }}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
                <a href="{{ $profile->instagram }}" class="instagram" target="_blank"><i
                        class="bx bxl-instagram"></i></a>
                <a href="{{ $profile->linkedin }}" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Tentang Saya</h2>
                    <p>
                        {!! $profile->desc !!}
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-4 text-center">
                        <img src="{{ asset('storage/' . $profile->photo2) }}" class="img-fluid" alt="photo profile"
                            style="max-width: 80%; max-height: 80%; border-radius: 5%;" />
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content">
                        <h3>Data Diri:</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li>
                                        <i class="icofont-rounded-right"></i>
                                        <strong>Website:</strong> {{ $profile->website }}
                                    </li>
                                    <li>
                                        <i class="icofont-rounded-right"></i>
                                        <strong>Nomor Telepon:</strong> 0{{ $profile->telp }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li>
                                        <i class="icofont-rounded-right"></i>
                                        <strong>Email:</strong> {{ $profile->user->email }}
                                    </li>
                                    <li>
                                        <i class="icofont-rounded-right"></i>
                                        <strong>Freelance:</strong>
                                        @if ($profile->freelance == 1)
                                            Available
                                        @else
                                            Not-Available
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <p>
                            Saya memiliki kemampuan untuk beradaptasi dengan lingkungan
                            kerja, dapat berkomunikasi dengan baik, menerima kritik yang
                            membangun, dan senang untuk terus belajar . Saya siap bekerja
                            untuk perusahaan, baik secara individu maupun sebagai tim.
                        </p> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Skills Section ======= -->
        <section id="skills" class="skills section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Skills</h2>
                </div>

                <div class="col skills-content" style="margin-left: 7%">
                    <div class="row justify-content-center">
                        @foreach ($skills as $skill)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <img src="{{ $skill->icon }}" alt="{{ $skill->name }}" width="60"
                                    height="60" />
                                <p class="skill-name">{{ $skill->name }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Skills Section -->

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Resume</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="resume-title">Pendidikan</h3>
                        @foreach ($edus as $edu)
                            <div class="resume-item">
                                <h4>{{ $edu->jurusan }}</h4>
                                <h5>{{ \Carbon\Carbon::parse($edu->start)->format('F Y') }} -
                                    {{ \Carbon\Carbon::parse($edu->end)->format('F Y') }}</h5>
                                <p><em>{{ $edu->sekolah }}</em></p>
                                <p>
                                    {!! $edu->desc !!}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-lg-6">
                        <h3 class="resume-title">Pengalaman Magang</h3>
                        @foreach ($apships as $ap)
                            <div class="resume-item">
                                <h4>{{ $ap->position }}</h4>
                                <h5>
                                    {{ \Carbon\Carbon::parse($ap->start)->format('F Y') }} -
                                    @if ($ap->end)
                                        {{ \Carbon\Carbon::parse($ap->end)->format('F Y') }}
                                    @else
                                        Sekarang
                                    @endif
                                </h5>
                                <p><em>{{ $ap->office }} </em></p>
                                <p>
                                    <em>
                                        {!! $ap->desc !!}
                                    </em>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <h3 class="resume-title">Pengalaman Kerja</h3>
                        @foreach ($works as $wo)
                            <div class="resume-item">
                                <h4>{{ $wo->position }}</h4>
                                <h5>
                                    {{ \Carbon\Carbon::parse($wo->start)->format('F Y') }} -
                                    @if ($ap->end)
                                        {{ \Carbon\Carbon::parse($wo->end)->format('F Y') }}
                                    @else
                                        Sekarang
                                    @endif
                                </h5>
                                <p><em>{{ $wo->office }} </em></p>
                                <p>
                                    <em>
                                        {!! $wo->desc !!}
                                    </em>
                                </p>
                            </div>
                        @endforeach
                        {{-- <div class="resume-item">
                            <h4>Teknisi Jaringan</h4>
                            <h5>Januari 2021 - Sekarang</h5>
                            <p><em>Di RSUD Kertosono </em></p>
                            <ul>
                                <li><i>Troubleshooting</i> dan Pengembangan Sistem Jaringan</li>
                                <li>Melakukan Pengembangan Website</li>
                                <li><i>Troubleshooting Hardware</i></li>
                            </ul>
                        </div>
                        <div class="resume-item">
                            <h4>Freelance Penulis tutorial dan Materi IT</h4>
                            <h5>Oktober 2020 - Desember 2020</h5>
                            <p><em>Bekerja Secara Online </em></p>
                            <ul>
                                <li>Membuat Tutorial Materi HTML, JavaScript, CSS, PHP</li>
                                <li>
                                    Mendiskusikan dan mapping section baru dari daftar code yang
                                    akan dimaskukkan di web
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- End Resume Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Portofolio</h2>
                    <p>Beberapa Koleksi Dari Hasil Saya selama ini</p>
                </div>
                <section class="wrapper-card">
                    <div class="container-fostrap-card">
                        <div class="content-card">
                            <div class="container">
                                <div class="row">
                                    @foreach ($projects as $project)
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="card">
                                                <a class="img-card" href="#">
                                                    <img
                                                        src="{{ asset('storage/photos/project/' . $project->photo) }}" />
                                                </a>
                                                <div class="card-content-card">
                                                    <h4 class="card-title-card">
                                                        <a href="#">
                                                            {{ $project->title }}
                                                        </a>
                                                    </h4>
                                                    <p class="">
                                                        {{ $project->short_desc }}
                                                    </p>
                                                </div>
                                                {{-- <div class="card-read-more-card">
                                                    <button type="button" class="btn btn-link btn-block"
                                                        data-toggle="modal"
                                                        data-target="#modalProject{{ $project->id }}">
                                                        Read More
                                                    </button>
                                                </div> --}}
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        {{-- <div class="modal fade" id="modalProject{{ $project->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true" data-backdrop="false">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Detail
                                                            Project {{ $project->title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <img class="img-fluid"
                                                                        alt="{{ $project->title }}"
                                                                        src="{{ asset('storage/photos/project/' . $project->photo) }}"  />
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h4>{{ $project->title }}</h4>
                                                                    <div style="text-align: justify;">
                                                                        {!! $project->long_desc !!}
                                                                    </div>
                                                                    @if ($project->link)
                                                                        <a href="{{ $project->link }}"
                                                                            class="btn btn-primary"
                                                                            target="_blank">Lihat Item</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!-- Modal -->
                                        <!-- Modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalProject{{ $project->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true" data-backdrop="false">
                                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-wrap" id="exampleModalLongTitle">
                                                            {{ $project->title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <!-- Ganti 'container' dengan 'container-fluid' -->
                                                            <div class="row">
                                                                <div class="col-12 col-md-6">
                                                                    <!-- Ganti 'col-md-6' dengan 'col-12 col-md-6' -->
                                                                    <img class="img-fluid"
                                                                        alt="{{ $project->title }}"
                                                                        src="{{ asset('storage/photos/project/' . $project->photo) }}" />
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <!-- Ganti 'col-md-6' dengan 'col-12 col-md-6' -->
                                                                    <div style="text-align: justify;">
                                                                        {!! $project->long_desc !!}
                                                                    </div>
                                                                    @if ($project->link)
                                                                        <a href="{{ $project->link }}"
                                                                            class="btn btn-primary"
                                                                            target="_blank">Lihat Item</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <!-- End Portfolio Section -->

        <!-- ======= Services Section ======= -->
        {{-- <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>keterampilan</h2>
                </div>

                <div class="row">
                    @foreach ($softskills as $soft)
                        @php
                            $colors = ['blue', 'orange', 'yellow', 'green', 'red'];

                            $randomColor = $colors[array_rand($colors)];
                        @endphp
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                            data-aos-delay="100">
                            <div class="icon-box iconbox-{{ $randomColor }}">
                                <div class="icon">
                                    <svg width="100" height="100" viewBox="0 0 600 600"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                            d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813">
                                        </path>
                                    </svg>
                                    {!! $soft->icon !!}
                                </div>
                                <h4><a href="#">{{ $soft->softskill }}</a></h4>
                                <p>
                                    {{ $soft->short_desc }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
        <!-- End Services Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Kontak</h2>
                </div>

                <div class="row mt-1">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>
                                    {{ $profile->address }}
                                </p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $profile->user->email }}</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Telp:</h4>
                                <p>0{{ $profile->telp }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contactme') }}" method="post" role="form"
                            class="php-email-form">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nama" data-rule="minlen:4"
                                        data-msg="Masukkan Nama anda disini" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email" data-rule="email"
                                        data-msg="Masukkan email anda disini" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Silahkan Tulis Disini"
                                    placeholder="Pesan"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                @if (session('error'))
                                    <div class="error-message">
                                        {{ session('error') }}
                                    </div>
                                @else
                                    <div class="sent-message">
                                        Your message has been sent. Thank you!
                                    </div>
                                @endif

                            </div>
                            <div class="text-center">
                                <button type="submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>{{ $profile->name }}</h3>
            <p>Always Go Beyond</p>
            <div class="social-links">
                <a href="{{ $profile->twitter }}" class="twitter" target="_blank">
                    <i class="bx bxl-twitter"></i>
                </a>
                <a href="{{ $profile->facebook }}" class="facebook" target="_blank">
                    <i class="bx bxl-facebook"></i>
                </a>
                <a href="{{ $profile->instagram }}" class="instagram" target="_blank">
                    <i class="bx bxl-instagram"></i>
                </a>
                <a href="{{ $profile->linkedin }}" class="linkedin" target="_blank">
                    <i class="bx bxl-linkedin"></i>
                </a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>YogaBayuAp</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by
                <a href="https://www.instagram.com/yogabayu.ap" target="_blank">Yoga Bayu Anggana Pratama</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
