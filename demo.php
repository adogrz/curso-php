<?php
$name = 'Adonay';
$isDev = true;
$age = 22;
$isOld = $age > 40;

// if ($isOld) {
//   echo "<h2>Eres viejo, lo siento 😅</h2>";
// } else {
//   echo "<h2>Eres joven, disfruta la vida ✨</h2>";
// }

define('LOGO_URL', 'https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg');

$output = "Hola $name, con una edad de $age 🚀";
$outputAge = match (true) {
  $age < 2    => "Eres un bebé, $name 🍼",
  $age < 10   => "Eres un niño, $name 👦",
  $age < 18   => "Eres un adolescente, $name 👨‍🎓",
  $age === 18 => "Eres mayor de edad, $name 🍻",
  $age < 30   => "Eres un adulto joven, $name 👨‍💼",
  default     => "Eres un adulto, $name 👴"
};

$bestLanguages = ["PHP", "JavaScript", "Python", "Java", "C#"];
$bestLanguages[] = "Ruby";
$bestLanguages[] = "Go";

$person = [
  "name" => "Adonay",
  "age" => 22,
  "isDev" => true
];

$person["name"] = "José";
$person["isOld"] = $person["age"] > 40;
?>

<ul>
  <?php foreach ($bestLanguages as $key => $language) : ?>
    <li><?= $key . " " . $language ?></li>
  <?php endforeach; ?>
</ul>

<h2><?= $outputAge ?></h2>

<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="200">
<h1>
  <?= $output ?>
</h1>

<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }
</style>