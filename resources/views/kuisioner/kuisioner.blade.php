<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="widt=device-width, initial-scale=1.0 shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kilo Kopi Profile</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
            rel="stylesheet" />

        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <!-- Style -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/kprostyle.css" />
    </head>

    <body>
        <!-- Navbar Starts -->
        <nav class="navbar">
            <div class="navbar-logo">
                <a href="#" class="">Kilo<span>Kopi</span></a>
            </div>
            <div class="navbar-nav">
                <a class="scroll-link" href="home">Home</a>
            </div>

            <div class="navbar-extra">
                <a href="javascript:void(0)" id="hamburger-menu"><i data-feather="menu"></i></a>
            </div>
        </nav>
        <!-- Navbar Ends -->
        <!-- Main Sections Start -->
        <section class="hero" id="home">
            <main class="content">
                <h1>Silahkan isi survey untuk mendapatkan kode promo</h1>
                <p>syarat&ketentuan
                    wajib follow ig @kilokopi_bpn dan kirim bukti pada form
                </p>
            </main>
        </section>
        <section class="d-flex justify-content-center">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="d-flex justify-content-center mb-3">Isi Data Diri Anda</h1>
                    <form action="AddKuisioner" id="kuisioner" name="kuisioner" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="Nama" id="Nama" value=""
                                    style="width: 35rem;" required="" placeholder="Nama">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                <textarea class="form-control" id="Alamat" name="Alamat" style="width: 35rem;" placeholder="Alamat" rows="3"></textarea>
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Whatsapp</label>
                                <input type="text" class="form-control" name="NoWa" id="NoWa" value=""
                                    style="width: 35rem;" required="" placeholder="exp-087819023708">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                                <input type="text" class="form-control" name="Instagram" id="Instagram"
                                    value="" style="width: 35rem;" required="" placeholder="esp-@kilokopi.bpn">
                            </div>
                            <h2 class="d-flex justify-content-center mt-3 mb-3">Survey Kepuasan Kilokopi</h2>
                            @foreach ($quest as $p)
                                @if ($p->enabled == 1)
                                    @if ($p->id == 1)
                                        <div class="mt-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label">{{ $p->pertanyaan }}</label>
                                            <textarea class="form-control" name="Pertanyaan1" id="Pertanyaan1" value="" style="width: 35rem;" required=""
                                                placeholder="Jawaban Anda..." rows="3"></textarea>
                                        </div>
                                    @elseif($p->id == 2)
                                        <div class="mt-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label">{{ $p->pertanyaan }}</label>
                                            <textarea class="form-control" name="Pertanyaan2" id="Pertanyaan2" value="" style="width: 35rem;"
                                                required="" placeholder="Jawaban Anda..." rows="3"></textarea>
                                        </div>
                                    @endif
                                @endif
                            @endforeach

                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Bukti Follow Instagram
                                    @kilokopi_bpn</label>
                                <input class="form-control" style="width: 35rem;" type="file" name="poto"
                                    id="poto" accept="image/*">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-5 mt-3">
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </main>
            <section>
    </body>

    </html>
</DOCTYPE>
