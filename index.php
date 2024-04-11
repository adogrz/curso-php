<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializar una nueva sesión cURL; ch = cURL handle
$ch = curl_init(API_URL);

# Indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

# Deshabilitar la verificación SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

# Realizar la petición
$result = curl_exec($ch);

if (curl_errno($ch)) {
  echo 'Error:' . curl_error($ch);
} else {
  # Decodificar el JSON
  $data = json_decode($result, true);

  if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Decoding JSON has failed. The response: ' . $result;
  }
}

curl_close($ch);
?>

<head>
  <meta charset="UTF-8" />
  <title>La próxima película de Marvel</title>
  <meta name="description" content="La próxima película de Marvel" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link 
    rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" 
  />
</head>

<main>
  <section>
    <img
      src="<?= $data["poster_url"]; ?>" 
      width="200" 
      alt="Poster de <?= $data["title"]; ?>"
      style = "border-radius: 10px;"
    />
  </section>

  <hgroup>
    <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h2>
    <h3>Fecha de estreno: <?= $data["release_date"]; ?></h3>
    <p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
  </hgroup>
</main>

<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }

  section {
    display: flex;
    justify-content: center;
    text-align: center;
  }

  hgroup {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }
</style>