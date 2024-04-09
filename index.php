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
        <img src="<?= $response['following_production']['poster_url']; ?>" alt="Poster de <?= $response['following_production']['title']; ?>" width="300">
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
        position: relative;
        display: flex;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        transition: all 0.3s ease;
    }

    section img:first-child {
        /* box-shadow: 0 60px 60px -60px rgba(0, 30, 255, 0.5); */
        border-radius: 16px;
        object-fit: cover;
        /* width: 100%; */
    }

    section img:last-child {
        position: absolute;
        width: 200px;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        transform: translateY(25%);
        transition: .3s ease;
        opacity: 0;
    }

    section:hover {
        transform:
            perspective(250px) rotateX(10deg) translateY(-5%) translateZ(0);
    }

    section::before {
        content: '';
        position: absolute;
        bottom: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: all 0.3s ease;
    }

    section:hover::before {
        opacity: 1;
    }

    section:hover img:last-child {
        opacity: 1;
        transform: translateY(10%);
    }

    /* section:hover  {
        transform: translateY(0);
        opacity: 1;
    } */

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        padding-top: 4%;
    }
</style>