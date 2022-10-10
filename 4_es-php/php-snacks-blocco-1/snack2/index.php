<?php
  $ads = [
    [
        'image_path' => 'https://conversionsciences.com/wp-content/uploads/2019/04/example-of-emotional-logical-appeal-on-persuasive-copy.jpg',
        'link' => 'https://www.google.com',
        'is_active' => true,
    ],
    [
        'image_path' => 'https://previews.123rf.com/images/hstrongart/hstrongart1612/hstrongart161200121/68060446-anuncios-de-cepillos-de-dientes-el%C3%A9ctricos-modo-diferente-de-este-producto-con-blanco-modelo-de-diente.jpg',
        'link' => 'https://www.facebook.com',
        'is_active' => true,
    ],
    [
        'image_path' => 'https://thumbs.dreamstime.com/z/back-to-school-sale-background-chalkboard-sale-percentages-marketing-poster-color-pencils-96751666.jpg',
        'link' => 'https://codepen.io',
        'is_active' => false,
    ],
    [
        'image_path' => 'https://foodsecurityfoodjustice.files.wordpress.com/2016/11/beyond-the-omlette-1.jpg',
        'link' => 'https://laravel.com',
        'is_active' => false,
    ],
    [
        'image_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRniLfGdFLxVOUoEwYC9WeRIrfZInB74_80IV8yMnANx3HTZYoQ',
        'link' => 'https://www.php.net',
        'is_active' => true,
    ],

];

// Bonus
foreach ($ads as $ad) {
    $ad['is_active'] = true;
}

$rand1 = array_rand($ads);
$rand2 = array_rand($ads);

while ($rand2 == $rand1) {
    $rand2 = array_rand($ads);
}

$ad[$rand1]['is_active'] = false;
$ad[$rand2]['is_active'] = false;
//

$usableAds = array_filter($ads, function ($ad) {
    return $ad['is_active'];
});

$randAdsIndex = array_rand($usableAds);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    main {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    img {
      width: 30%;
    }

    a {
      background-color: lime;
      display: inline-block;
      padding: .5rem 1rem;
      border-radius: 1rem;
      text-decoration: none;
      color: black;

      font-weight: bold;
      font-family: sans-serif;
    }

  </style>
</head>
<body>
  <main>
    <img src="<?php echo $ads[$randAdsIndex]['image_path'] ?>" alt="" > <br>
    <p><a href="<?php echo $ads[$randAdsIndex]['link']; ?>" > Visita il sito</a></p>
  </main>
</body>
</html>
