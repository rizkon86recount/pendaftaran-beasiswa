<?php
require 'functions.php';
$result = mysqli_query($conn, "SELECT * FROM beasiswa");
// apakah ada parameter link page yang dikirimkan
// jika ada variabel link page akan diisi dari parameter tersebut
if (isset($_GET['link_page'])) {
    $link_page = $_GET['link_page'];
} else {
    $link_page = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- bagian navbar -->
    <section>
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class=" container-fluid">
                    <a class="navbar-brand fw-bold text-primary" href="index.php">Pendaftaran Beasiswa</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active fw-bold text-primary" aria-current="page" href="index.php">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <!-- navbar end -->
    <section>
        <div class="container">
            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?= SetLinkPage("1", $link_page); ?>" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#beasiswa" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pilihan Beasiswa</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?= SetLinkPage("2", $link_page); ?>" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#daftar" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Daftar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?= SetLinkPage("3", $link_page); ?>" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#hasil" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Hasil</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade <?= SetContentPage("1", $link_page); ?>" id="beasiswa" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="section-menu">
                        <p>Beasiswa berdasarkan bidang studi atau jurusan studi adalah sumber pendanaan yang diberikan kepada mahasiswa yang memilih untuk mengejar gelar dalam bidang studi tertentu yang dianggap relevan dengan misi atau tujuan pendanaan yang ditetapkan oleh pemberi beasiswa, dengan harapan bahwa mereka akan menjadi kontributor berpengaruh dalam bidang tersebut.</p>
                        <ol>
                            <li>
                                <h5>Beasiswa Akademik</h5>
                                <p>Beasiswa akademik merupakan bantuan finansial yang diberikan kepada mahasiswa yang telah menunjukkan prestasi akademik yang luar biasa. Ini adalah peluang untuk mahasiswa yang berdedikasi dan berprestasi tinggi dalam studi mereka. Beasiswa ini ditujukan untuk membantu mahasiswa mencapai potensi penuh mereka dalam pendidikan.</p>
                                <p>Persyaratan untuk mendapatkan beasiswa ini adalah:</p>
                                <ul>
                                    <li>
                                        <p>Prestasi akademik yang sangat baik selama kuliah.</p>
                                    </li>
                                    <li>
                                        <p>Motivasi dan komitmen untuk mengejar keunggulan akademik.</p>
                                    </li>
                                    <li>
                                        <p>Kepemimpinan dan partisipasi dalam kegiatan akademik ekstrakurikuler.</p>
                                    </li>
                                </ul>
                                <p>Ini adalah kesempatan langka untuk mendapatkan bantuan finansial yang dapat membantu mewujudkan impian akademik Anda. Jangan lewatkan kesempatan ini!</p>
                                <a class="btn btn-primary mb-4" href="index.php?link_page=2&jenis_beasiswa=akademik">Daftar Sekarang</a>
                            </li>
                            <li>
                                <h5>Beasiswa Non Akademik</h5>
                                <p>Beasiswa non-akademik adalah bentuk dukungan finansial yang diberikan kepada mahasiswa yang telah menunjukkan keahlian dan prestasi di luar lingkup akademik. Ini adalah kesempatan bagi mereka yang berdedikasi dalam kegiatan ekstrakurikuler, sukarela, atau memiliki bakat khusus.</p>
                                <p>Persyaratan untuk mendapatkan beasiswa ini adalah:</p>
                                <ul>
                                    <li>
                                        <p>Pengalaman dan prestasi yang signifikan dalam kegiatan non-akademik.</p>
                                    </li>
                                    <li>
                                        <p>Komitmen untuk berkontribusi positif pada komunitas atau masyarakat.</p>
                                    </li>
                                    <li>
                                        <p>Bakat khusus atau prestasi dalam bidang tertentu.</p>
                                    </li>
                                </ul>
                                <p>Ini adalah kesempatan unik untuk mendapatkan dukungan finansial untuk pengembangan bakat dan minat Anda di luar akademik. Jangan lewatkan kesempatan ini!</p>
                                <a class="btn btn-primary mb-4" href="index.php?link_page=2&jenis_beasiswa=non_akademik">Daftar Sekarang</a>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="tab-pane fade <?= SetContentPage("2", $link_page); ?>" id="daftar" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="section-menu">
                        <h4>Form Pendaftaran</h4>
                        <form action="addPendaftar.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Masukan Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Masukan Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="hp" placeholder="Masukan No hp" name="hp" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="semester" name="semester" required>
                                        <?php
                                        for ($i = 1; $i <= 8; $i++) {

                                        ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <?php
                            $minValue = 2.9;
                            $maxValue = 3.4;
                            $ipk = round(generateIpk($minValue, $maxValue), 1);
                            ?>

                            <div class="mb-3 row">
                                <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ipk" placeholder="Masukan No hp" name="ipk" value="<?= $ipk ?>" required readonly>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="beasiswa" class="col-sm-2 col-form-label">Beasiswa</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="beasiswa" name="beasiswa" required <?= SetDisable($ipk); ?>>
                                        <option value="akademik" <?= SetBeasiswa("akademik", $jenis_beasiswa); ?>>Akademik</option>
                                        <option value="nonAkadamik" <?= SetBeasiswa("non_akademik", $jenis_beasiswa); ?>>Non Akademik</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="upload_file">Choose File</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="customFile" name="berkas" required <?= SetDisable($ipk); ?>>
                                </div>
                            </div>

                            <input class="btn btn-primary btn-lg" type="submit" value="Daftar" <?= SetDisable($ipk); ?>>

                            <a class="btn btn-warning btn-lg" href="index.php?link_page=2">Batal</a>

                        </form>
                    </div>
                </div>

                <div class="tab-pane fade <?= SetContentPage("3", $link_page); ?>" id="hasil" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    <div class="section-menu">
                        <h4 class="fw-bold text-primary mb-4">List Pendaftar</h4>

                        <?php
                        while ($user_data = mysqli_fetch_array($result)) {

                        ?>
                            <div class="row grid-item border border-3">
                                <div class="col-md-3 col-lg-4">
                                    <img class="img-fluid mt-4" width="140px" src="uploads/<?= $user_data['berkas']; ?>" alt="">
                                </div>
                                <div class="col-md-9 col-lg-8">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                                            <h4 class="fs-5 fw-normal">Nama:</h4>
                                            <h5 class="fs-6 font-monospace"><?= $user_data['nama']; ?></h5>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                                            <h4 class="fs-5 fw-normal">Email:</h4>
                                            <h5 class="fs-6 font-monospace"><?= $user_data['email']; ?></h5>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                                            <h4 class="fs-5 fw-normal">No Handphone:</h4>
                                            <h5 class="fs-6 font-monospace"><?= $user_data['hp']; ?></h5>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                                            <h4 class="fs-5 fw-normal">Semester:</h4>
                                            <h5 class="fs-6 font-monospace"><?= $user_data['semester']; ?></h5>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                                            <h4 class="fs-5 fw-normal">IPK:</h4>
                                            <h5 class="fs-6 font-monospace"><?= $user_data['ipk']; ?></h5>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                                            <h4 class="fs-5 fw-normal">Beasiswa:</h4>
                                            <h5 class="fs-6 font-monospace"><?= $user_data['beasiswa']; ?></h5>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                                            <h4 class="fs-5 fw-normal">Status:</h4>
                                            <h5 class="fs-6 font-monospace"><?= $user_data['status']; ?></h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>