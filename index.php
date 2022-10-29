<?php
/* 
kelompok 3
- Galih Titis Bagus Catry
- Galang Wijaya
- Rafa putra
- Anandha Army Antassa
- Tio Ramadhani
- Aza Faiz Hamdani
*/
$url = "https://berita-indo-api.vercel.app/v1/cnn-news";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
curl_close($ch);
$data = json_decode($res, true);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>News UTS API Kelompok 3</title>
</head>

<body>
    <h1 class="text-center">Berita CNN</h1>
    <div class="container">
        <div class="row">
            <?php
            $i = 0;
            foreach ($data['data'] as $key => $value) if ($i < 30) { ?>
                <div class="col-sm-4 col-lg-4">
                    <div class="card my-3">
                        <img src="<?= $value['image']['large'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?= $value['link'] ?>" style="text-decoration: none;"><?= $value['title'] ?></a></h5>
                            <p class="card-text"><?= substr($value['contentSnippet'], 0, 133) . "..." ?></p>
                            <a href="<?= $value['link'] ?>" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php $i += 1;
            }
            ?>
        </div>
    </div>
</body>

</html>
