<?php
require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

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

</body>

</html>