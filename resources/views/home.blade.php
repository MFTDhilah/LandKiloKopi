<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="widt=device-width, initial-scale=1.0" />
        <title>Kilo Kopi Profile</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
            rel="stylesheet" />

        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons"></script>

        <!-- Style -->
        <link rel="stylesheet" href="css/kprostyle.css" />
    </head>

    <body>
        <!-- Navbar Starts -->
        <nav class="navbar">
            <div class="navbar-logo">
                <a href="#" class="">Kilo<span>Kopi</span></a>
            </div>
            <div class="navbar-nav">
                <a class="scroll-link" href="#home">Home</a>
                <a class="scroll-link" href="#menu">Product</a>
                <a class="scroll-link" href="#contact">Contact</a>
            </div>

            <div class="navbar-extra">
                <a href="javascript:void(0)" id="hamburger-menu"><i data-feather="menu"></i></a>
            </div>
        </nav>
        <!-- Navbar Ends -->

        <!-- Main Sections Start -->
        <section class="hero" id="home">
            <main class="content">
                <h1>Kilokopi</h1>
                <p>Selamat datang di website profile kami</p>
            </main>
        </section>
        <!-- Main Sections End -->

        <section id="about" class="about">
            <h2><span>Tentang</span> Kami</h2>

            <div class="row">
                <div class="about-img">
                    <img src="img/about-us.jpg" alt="Tentang Kami" />
                </div>
                @if (isset($about))
                    @foreach ($about as $about)
                        @if ($about->enabled == 1)
                            <div class="content">
                                <h3>{{ $about->judul }}</h3>
                                <p>
                                    {{ $about->isi }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </section>

        {{-- Our Promos --}}
        <section id="menu" class="menu">
            <h2><span>Promo</span> Kami</h2>
            <div class="row">
                @if (isset($promo))
                    @foreach ($promo as $promo)
                        @if ($promo->enabled == 1)
                            <div class="menu-card">
                                {!! $promo->image !!}
                                {!! $promo->description !!}
                                <h3 class="menu-card-title">- {{ $promo->title }} -</h3>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <h2><a href="kuisioner"> Claim Kode Promo Kamu Disini</a></h2>
        </section>

        {{-- Our Menu --}}

        <!-- Menu Section Start -->
        <section id="menu" class="menu">
            <h2><span>Menu</span> Kami</h2>
            <div class="row">
                @if (isset($menu))
                    @foreach ($menu as $menu)
                        @if ($menu->enabled == 1)
                            <div class="menu-card">
                                <div>
                                    {!! $menu->image !!}
                                    <h3 class="menu-card-title">- {{ $menu->title }} -</h3>
                                    <p style="font-size:16px"> {{ $menu->description }} </p><br>
                                    <strong class="menu-card-price">Rp. {{ number_format($menu->price) }}</strong>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </section>
        <!-- Menu Section End -->

        <!-- Contact Section Start -->
        <section id="contact" class="contact">
            <h2><span>Kontak</span> Kami</h2>
            @forelse ($contact as $contact)
                <div class="container-row">
                    <div>
                        <h3>Phone</h3>
                        <h3>{{ $contact->telepon }}</h3>
                    </div>
                    <div>
                        <h3>Open Hours</h3>
                        <h3>{{ $contact->jam_operasional }}</h3>
                    </div>
                    <div>
                        <h3>Address</h3>
                        <h3>{{ $contact->alamat }}</h3>
                    </div>
                </div>
                <div class="row">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.822677878356!2d116.8842081!3d-1.1914791!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1497cad8de225%3A0xd4f4e0a05de1352a!2sKilo%20Kopi!5e0!3m2!1sen!2sid!4v1698243445720!5m2!1sen!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="map"></iframe>

                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak Ada Data</td>
                    </tr>
            @endforelse

            </div>
        </section>

        <!-- Icons -->
        <script>
            feather.replace();
        </script>

        <!-- Javascript -->
        <script src="js/kproscript.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                var speed = 500;
                var hash = window.location.hash;
                if ($("hash").length) scrollToId(hash, speed);

                $(".scroll-link").click(function(e) {
                    e.preventDefault();
                    var id = $(this).attr("href");
                    if ($(id).length) scrollToId(id, speed);
                });
            });

            function scrollToId(id, speed) {
                var offset = 70;
                var obj = $(id).offset();
                var targetOffset = obj.top - offset;
                $("html, body").animate({
                    scrollTop: targetOffset
                }, speed);
            }
        </script>
        <footer>
            <div class="socials">
                <a href="#"><i data-feather="instagram"></i></a>
                <a href="#"><i data-feather="twitter"></i></a>
                <a href="#"><i data-feather="facebook"></i></a>
            </div>

            <div class="links">
                <a class="scroll-link" href="#home">Home</a>
                <a class="scroll-link" href="#menu">Product</a>
                <a class="scroll-link" href="#contact">Contact</a>
                <a class="" href="/login">Login</a>
            </div>

            <div class="credit">
                <p>Copyright <a href="">KiloKopi</a>. | &copy; 2023.</p>
            </div>
        </footer>
    </body>

    </html>
</DOCTYPE>
