<?php
// curl_setopt($ch, CURLOPT_URL, 'https://api.themoviedb.org/3/movie/550?api_key=1f54bd990f1cdfb230adb312546d765d');
const API_URL = 'https://www.whenisthenextmcufilm.com/api';
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
if ($response) {
    $response = json_decode($response, true);
}
curl_close($ch);
?>

<head>
    <meta charset="UTF-8">
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
    <section>
        <img src="<?= $response['poster_url']; ?>" alt="Poster de <?= $response['title']; ?>" width="300">
    </section>
    <hgroup>
        <h2><?= $response['title']; ?> se estrena en <?= $response['days_until']; ?> días</h2>
        <p>Fecha de estreno: <?= date('d-m-Y', strtotime($response['release_date'])) ?> </p>
        <p>¿Qué sigue después? <?= $response['following_production']['title']; ?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body {
        display: grid;
        place-content: center;
    }

    img {
        border-radius: 16px;
        margin: 0 auto;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
        flex-direction: column;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>