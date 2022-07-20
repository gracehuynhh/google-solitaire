<?php
function callAPI($method, $url, $data)
{
  $curl = curl_init();
  switch ($method) {
    case "POST":
      curl_setopt($curl, CURLOPT_POST, 1);
      if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
    case "PUT":
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
      if ($data)
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      break;
    default:
      if ($data)
        $url = sprintf("%s?%s", $url, http_build_query($data));
  }
  // OPTIONS:
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'APIKEY: 111111111111111111111',
    'Content-Type: application/json',
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  // EXECUTE:
  $result = curl_exec($curl);
  curl_close($curl);
  return $result;
}

$get_data = callAPI('GET', 'https://antrachhuynh.github.io/data.json', false);
$gamelist = json_decode($get_data, true);

?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <title>Google Solitaire</title>

  <meta name="description" content="Play the classic card game solitaire right in your browser, with no need to download anything." />
  <meta name="keywords" content="Play Google Solitaire Online" />
  <meta name="author" content="w3technic" />

  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://solitair.ee" />
  <meta property="og:site_name" content="Google Solitaire" />
  <meta property="og:title" content="Play Google Solitaire Online" />
  <meta property="og:description" content="Play the classic card game solitaire right in your browser, with no need to download anything." />
  <meta property="og:image" content="https://solitair.ee/thumb.jpeg" />
  <meta name="twitter:image:alt" content="Play Google Solitaire Online" />
  <meta name="twitter:card" content="summary_large_image" />

  <meta name="robots" content="all" />
  <meta name="revisit-after" content="7 days" />

  <link rel="canonical" href="https://solitair.ee" />
  <link rel="home" href="https://solitair.ee/" />
  <link rel=" shortcut icon" href="favicon.ico" />
  <link rel="icon" type="image/x-icon" sizes="16x16" href="favicon.ico" />
  <link rel="icon" type="image/png" sizes="180x180" href="images/180.png" />

  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-title" content="Google Solitaire" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/180.png" />

  <script type="text/javascript" src="js/solitaire_compiled.2.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Extended" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/default.css">
  <link rel="stylesheet" type="text/css" href="css/mobile_portrait.css" media="only screen and (orientation: portrait)">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/gracehuynhh/doodlejump/w3navigation.css" />
  <link rel="stylesheet" type="text/css" href="css/ipad.css" media="only screen and (min-width : 768px) and (max-width : 1024px)">

</head>

<body>
  <!-- Side Navigation -->
  <nav>
    <div id="side-navigation">

      <div id="menuToggle">
        <input type="checkbox" aria-label="Show or Hide Menu" id="checkbox1" />
        <span></span>
        <span></span>
        <span></span>

        <div id="menu-container">

          <div id="scrollable-container">

            <div id="left-column">
              <!-- Nav Success -->
              <ul id="menu1">
                <li style="text-align:center">
                  <h1>Google Solitaire </h1>
                </li>


                <?php foreach ($gamelist as $item) {
                  $url = $_SERVER['HTTP_HOST'];
                  $url_item = $item['link'];
                  $pos = strpos($url_item, $url);



                  if ($pos !== false) {
                    echo '<li class="active"><a href="' . $item['link'] . '" title="' . $item['description'] . '"><img alt="' . $item['description'] . '" class="lazy" data-src="' . $item['thumb'] . '" height="30px" width="30px"> ' . $item['name'] . '</li></a>';
                    continue;
                  } else {
                    echo '<li><a class="inactive" href="' . $item['link'] . '" title="' . $item['description'] . '"><img alt="' . $item['description'] . '" class="lazy" data-src="' . $item['thumb'] . '" height="30px" width="30px"> ' . $item['name'] . '</a></li>';
                  }
                }



                ?>




              </ul>
            </div>


            <div id="menu-bottom">
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Side Navigation -->
  <script>
    window.google = {};
    window.google.doodle = {};
    window.google.doodle.allMsgs = {
      "messages": ["Game title", "Mode selection", "Easy mode", "Hard mode", "Score of the current game", "Number of moves played in the game", "Undo last move", "Starts a new game", "Confirm dialog: to start a new game?", "After winning the game: play again?", "Share message", "Hint the user to share"],
      "translations": {
        "ne": {
          "ALL": ["", "\u0924\u092a\u093e\u0908\u0901\u0915\u094b \u0915\u0920\u093f\u0928\u093e\u0907\u0915\u094b \u0938\u094d\u0924\u0930 \u091b\u0928\u094c\u0902\u091f \u0917\u0930\u094d\u0928\u0941\u0939\u094b\u0938\u094d", "\u0938\u0930\u0932", "\u0915\u0920\u093f\u0928", "\u0905\u0919\u094d\u0915", "\u091a\u093e\u0932", "\u0905\u0928\u0921\u0942", "\u0928\u092f\u093e\u0901", "\u0928\u092f\u093e\u0901 \u0916\u0947\u0932 \u0938\u0941\u0930\u0942 \u0917\u0930\u094d\u0928\u0947 \u0939\u094b?", "\u092b\u0947\u0930\u093f \u0916\u0947\u0932\u094d\u0928\u0947 \u0939\u094b?", "Google \u0915\u094b \u0938\u094b\u0932\u094d\u091f\u093e\u092f\u0930 \u0916\u0947\u0932 \u091c\u093e\u0901\u091a \u0917\u0930\u094d\u0928\u0941\u0939\u094b\u0938\u094d", "\u0906\u0926\u093e\u0928 \u092a\u094d\u0930\u0926\u093e\u0928 \u0917\u0930\u094d\u0928\u0941\u0939\u094b\u0938\u094d:"]
        },
        "pt-PT": {
          "ALL": ["Google Solitaire", "N\u00edvel de dificuldade", "F\u00e1cil", "Dif\u00edcil", "Pontua\u00e7\u00e3o", "Movimentos", "Anular", "Novo", "Pretende come\u00e7ar um novo jogo?", "Pretende jogar novamente?", "Descubra o jogo de paci\u00eancia do Google!", "Partilhar:"]
        },
        "es-419": {
          "ALL": ["Solitario de Google", "Selecciona la dificultad", "F\u00e1cil", "Dif\u00edcil", "Puntuaci\u00f3n", "Movimientos", "Deshacer", "Nuevo", "\u00bfComenzar un juego nuevo?", "\u00bfVolver a jugar?", "\u00a1Prueba el solitario de Google!", "Compartir:"]
        },
        "my": {
          "ALL": ["", "\u1021\u1001\u1000\u103a\u1021\u1001\u1032\u1021\u1006\u1004\u1037\u103a\u1000\u102d\u102f \u101b\u103d\u1031\u1038\u1015\u102b", "\u101c\u103d\u101a\u103a\u1000\u1030", "\u1001\u1000\u103a\u1001\u1032", "\u101b\u1019\u103e\u1010\u103a", "\u1021\u101b\u103d\u103e\u1031\u1037", "\u1010\u1005\u103a\u1006\u1004\u1037\u103a\u1014\u1031\u102c\u1000\u103a\u1015\u103c\u1014\u103a\u101b\u1014\u103a", "\u1021\u101e\u1005\u103a", "\u1002\u102d\u1019\u103a\u1038\u1021\u101e\u1005\u103a \u1005\u1019\u101c\u102c\u1038", "\u1011\u1015\u103a\u1000\u1005\u102c\u1038\u1019\u101c\u102c\u1038\u104b", "Google \u104f \u1006\u102d\u102f\u101c\u1005\u103a\u1010\u101a\u103a\u1002\u102d\u1019\u103a\u1038\u1000\u102d\u102f \u1005\u1019\u103a\u1038\u1000\u103c\u100a\u1037\u103a\u1015\u102b\u104b", ""]
        },
        "ka": {
          "ALL": ["", "\u10d0\u10d8\u10e0\u10e9\u10d8\u10d4\u10d7 \u10e1\u10d8\u10e0\u10d7\u10e3\u10da\u10d4", "\u10db\u10d0\u10e0\u10e2\u10d8\u10d5\u10d8", "\u10e0\u10d7\u10e3\u10da\u10d8", "\u10e5\u10e3\u10da\u10d0", "\u10db\u10dd\u10eb\u10e0\u10d0\u10dd\u10d1\u10d4\u10d1\u10d8", "\u10db\u10dd\u10e5\u10db\u10d4\u10d3\u10d4\u10d1\u10d8\u10e1 \u10d2\u10d0\u10e3\u10e5\u10db\u10d4\u10d1\u10d0", "\u10d0\u10ee\u10d0\u10da\u10d8", "\u10d2\u10e1\u10e3\u10e0\u10d7 \u10d0\u10ee\u10d0\u10da\u10d8 \u10d7\u10d0\u10db\u10d0\u10e8\u10d8\u10e1 \u10d3\u10d0\u10ec\u10e7\u10d4\u10d1\u10d0?", "\u10d2\u10e1\u10e3\u10e0\u10d7 \u10ee\u10d4\u10da\u10d0\u10ee\u10da\u10d0 \u10d7\u10d0\u10db\u10d0\u10e8\u10d8?", "\u10d8\u10d7\u10d0\u10db\u10d0\u10e8\u10d4\u10d7 Google-\u10d8\u10e1 \u10e1\u10dd\u10da\u10d8\u10e2\u10d4\u10e0\u10d8!", "\u10d2\u10d0\u10d6\u10d8\u10d0\u10e0\u10d4\u10d1\u10d0:"]
        },
        "ca": {
          "ALL": ["Solitari de Google", "Tria la dificultat", "F\u00e0cil", "Dif\u00edcil", "Puntuaci\u00f3", "Moviments", "Desf\u00e9s", "Nova", "Vols comen\u00e7ar una partida nova?", "Vols jugar una altra partida?", "Prova el solitari de Google!", "Comparteix:"]
        },
        "ko": {
          "ALL": ["Google \uc194\ub9ac\ud14c\uc5b4", "\ub09c\uc774\ub3c4\uc120\ud0dd", "\uc26c\uc6c0", "\uc5b4\ub824\uc6c0", "\uc810\uc218", "\uc774\ub3d9 \uc218", "\uc2e4\ud589\ucde8\uc18c", "\uc0c8 \uac8c\uc784", "\uc0c8 \uac8c\uc784\uc744 \uc2dc\uc791\ud560\uae4c\uc694?\n", "\ub2e4\uc2dc \ud560\uae4c\uc694?\n", "Google \uc194\ub9ac\ud14c\uc5b4 \uce74\ub4dc \uac8c\uc784\uc744 \ud574 \ubcf4\uc138\uc694.\n", "\uacf5\uc720:"]
        },
        "am": {
          "ALL": ["Google \u1236\u120a\u1274\u12ed\u122d", "\u12e8\u12ad\u1265\u12f0\u1275 \u12f0\u1228\u1303\u12ce\u1295 \u12ed\u121d\u1228\u1321", "\u1240\u120b\u120d", "\u12a8\u1263\u12f5", "\u1290\u1325\u1265", "\u12a5\u1295\u1245\u1235\u1243\u1234\u12ce\u127d", "\u1240\u120d\u1265\u1235", "\u12a0\u12f2\u1235", "\u12a0\u12f2\u1235 \u1328\u12cb\u1273 \u12ed\u1300\u1218\u122d?", "\u12a5\u1295\u12f0\u1308\u1293 \u12ed\u132b\u12c8\u1271?", "\u12e8Google \u1236\u120a\u1274\u12ed\u122d \u1328\u12cb\u1273\u1295 \u12ed\u1218\u120d\u12a8\u1271!", "\u12eb\u130b\u1229:"]
        },
        "km": {
          "ALL": ["", "\u1787\u17d2\u179a\u17be\u179f\u179a\u17be\u179f\u1780\u1798\u17d2\u179a\u17b7\u178f\u179b\u17c6\u1794\u17b6\u1780", "\u1784\u17b6\u1799\u179f\u17d2\u179a\u17bd\u179b", "\u179b\u17c6\u1794\u17b6\u1780", "\u1796\u17b7\u1793\u17d2\u1791\u17bb\u1780", "\u179a\u17c6\u1780\u17b7\u179b", "\u1798\u17b7\u1793\u1792\u17d2\u179c\u17be\u179c\u17b7\u1789", "\u1790\u17d2\u1798\u17b8", "\u1785\u17b6\u1794\u17cb\u1795\u17d2\u178f\u17be\u1798\u17a0\u17d2\u1782\u17c1\u1798\u1790\u17d2\u1798\u17b8\u178a\u17c2\u179a\u1791\u17c1?", "\u179b\u17c1\u1784\u1798\u17d2\u178f\u1784\u1791\u17c0\u178f\u178a\u17c2\u179a\u1791\u17c1?", "\u1796\u17b7\u1793\u17b7\u178f\u17d2\u1799\u1798\u17be\u179b\u17a0\u17d2\u1782\u17c1\u1798\u1794\u17c0\u179a\u179a\u1794\u179f\u17cb Google!", "\u1785\u17c2\u1780\u179a\u17c6\u179b\u17c2\u1780\u17d6"]
        },
        "id": {
          "ALL": ["Google Solitaire", "Pilih tingkat kesulitan", "Mudah", "Sulit", "Skor", "Langkah", "Batalkan", "Baru", "Mulai game baru?", "Main lagi?", "Lihat game solitaire Google!", "Bagikan:"]
        },
        "ur": {
          "ALL": ["Google Solitaire", "\u06af\u06cc\u0645 \u06a9\u06cc \u0645\u0634\u06a9\u0644 \u06a9\u06cc \u0633\u0637\u062d \u06a9\u0627 \u0627\u0646\u062a\u062e\u0627\u0628 \u06a9\u0631\u06cc\u06ba", "\u0622\u0633\u0627\u0646", "\u0645\u0634\u06a9\u0644", "\u0627\u0633\u06a9\u0648\u0631", "\u0645\u0648\u0648\u0632", "\u06a9\u0627\u0644\u0639\u062f\u0645 \u06a9\u0631\u06cc\u06ba", "\u0646\u0626\u06cc", "\u0646\u0626\u06cc \u06af\u06cc\u0645 \u0634\u0631\u0648\u0639 \u06a9\u0631\u06cc\u06ba\u061f", "\u062f\u0648\u0628\u0627\u0631\u06c1 \u06a9\u06be\u06cc\u0644\u06cc\u06ba\u061f", "Google \u06a9\u06cc solitaire \u06af\u06cc\u0645 \u0686\u06cc\u06a9 \u06a9\u0631\u06cc\u06ba!", "\u0627\u0634\u062a\u0631\u0627\u06a9 \u06a9\u0631\u06cc\u06ba:"]
        },
        "sq-AL": {
          "ALL": ["", "Zgjidh v\u00ebshtir\u00ebsin\u00eb", "E leht\u00eb", "E v\u00ebshtir\u00eb", "Rezultati", "L\u00ebvizjet", "Zhb\u00ebje", "E re", "D\u00ebshiron t\u00eb nis\u00ebsh loj\u00eb t\u00eb re?", "D\u00ebshiron t\u00eb luash s\u00ebrish?", "Provo loj\u00ebn e solitarit t\u00eb Google!", "Ndaje:"]
        },
        "be": {
          "ALL": ["", "\u0412\u044b\u0431\u0435\u0440\u044b\u0446\u0435 \u045e\u0437\u0440\u043e\u0432\u0435\u043d\u044c \u0441\u043a\u043b\u0430\u0434\u0430\u043d\u0430\u0441\u0446\u0456", "\u041f\u0440\u043e\u0441\u0442\u044b", "\u0421\u043a\u043b\u0430\u0434\u0430\u043d\u044b", "\u041b\u0456\u043a", "\u0425\u0430\u0434\u044b", "\u0410\u0434\u0440\u0430\u0431\u0456\u0446\u044c", "\u041d\u043e\u0432\u0430\u044f \u0433\u0443\u043b\u044c\u043d\u044f", "\u041f\u0430\u0447\u0430\u0446\u044c \u043d\u043e\u0432\u0443\u044e \u0433\u0443\u043b\u044c\u043d\u044e?", "\u0417\u0433\u0443\u043b\u044f\u0446\u044c \u044f\u0448\u0447\u044d \u0440\u0430\u0437?", "\u0417\u0433\u0443\u043b\u044f\u0439\u0446\u0435 \u045e \u0441\u0430\u043b\u0456\u0446\u0451\u0440 \u0430\u0434 Google!", "\u0410\u0431\u0430\u0433\u0443\u043b\u0456\u0446\u044c:"]
        },
        "no": {
          "ALL": ["Google Kabal", "Velg vanskelighetsgrad", "Lett", "Vanskelig", "Poengsum", "Trekk", "Angre", "Nytt", "Vil du starte et nytt spill?", "Vil du spille igjen?", "Sjekk Googles kabal!", "Del:"]
        },
        "uk": {
          "ALL": ["Google \u041f\u0430\u0441\u044c\u044f\u043d\u0441", "\u0412\u0438\u0431\u0435\u0440\u0456\u0442\u044c \u0440\u0456\u0432\u0435\u043d\u044c \u0441\u043a\u043b\u0430\u0434\u043d\u043e\u0441\u0442\u0456", "\u041f\u0440\u043e\u0441\u0442\u0438\u0439", "\u0421\u043a\u043b\u0430\u0434\u043d\u0438\u0439", "\u0420\u0430\u0445\u0443\u043d\u043e\u043a", "\u0425\u043e\u0434\u0438", "\u0412\u0456\u0434\u043c\u0456\u043d\u0438\u0442\u0438", "\u041d\u043e\u0432\u0430 \u0433\u0440\u0430", "\u041f\u043e\u0447\u0430\u0442\u0438 \u043d\u043e\u0432\u0443 \u0433\u0440\u0443?", "\u0413\u0440\u0430\u0442\u0438 \u0449\u0435 \u0440\u0430\u0437?", "\u0417\u0456\u0433\u0440\u0430\u0439\u0442\u0435 \u0432 \u0433\u0440\u0443 \u0432\u0456\u0434 Google!", "\u041f\u043e\u0434\u0456\u043b\u0438\u0442\u0438\u0441\u044f:"]
        },
        "is": {
          "ALL": ["Google kapall", "Veldu erfi\u00f0leikastig", "Au\u00f0velt", "Erfitt", "Stig", "Leikir", "Afturkalla", "N\u00fdr", "Viltu byrja \u00e1 n\u00fdjum leik?", "Viltu spila aftur?", "Pr\u00f3fa\u00f0u kapalleik Google!", "Deila:"]
        },
        "fil": {
          "ALL": ["Google Solitaire", "Piliin ang iyong difficulty", "Madali", "Mahirap", "Score", "Mga Paggalaw", "I-undo", "Bago", "Magsimula ng bagong laro?", "Maglaro ulit?", "Tingnan ang larong solitaire ng Google!", "Ibahagi:"]
        },
        "it": {
          "ALL": ["Solitario Google", "Scegli il livello di difficolt\u00e0", "Facile", "Difficile", "Punteggio", "Mosse", "Annulla", "Nuovo", "Vuoi iniziare una nuova partita?", "Vuoi giocare ancora?", "Scopri il solitario di Google!", "Condividi:"]
        },
        "iw": {
          "ALL": ["Google", "\u05d1\u05d7\u05e8 \u05d0\u05ea \u05e8\u05de\u05ea \u05d4\u05e7\u05d5\u05e9\u05d9", "\u05e7\u05dc\u05d4", "\u05e7\u05e9\u05d4", "\u05e0\u05d9\u05e7\u05d5\u05d3", "\u05de\u05d4\u05dc\u05db\u05d9\u05dd", "\u05d1\u05d9\u05d8\u05d5\u05dc", "\u05d7\u05d3\u05e9", "\u05dc\u05d4\u05ea\u05d7\u05d9\u05dc \u05de\u05e9\u05d7\u05e7 \u05d7\u05d3\u05e9?", "\u05dc\u05e9\u05d7\u05e7 \u05e9\u05d5\u05d1?", "\u05d1\u05d5\u05d0 \u05dc\u05e0\u05e1\u05d5\u05ea \u05d0\u05ea \u05de\u05e9\u05d7\u05e7 \u05d4\u05e1\u05d5\u05dc\u05d9\u05d8\u05e8 \u05e9\u05dc Google!", "\u05e9\u05ea\u05e3:"]
        },
        "crs": {
          "ALL": ["", "Swazir ou difikilte", "Fasil", "Dir", "Skor", "Mouvman", "Refer", "Nouvo", "Komans en nouvo game?", "Zwe ankor?", "Tyek game soliter Google!", "Partaze"]
        },
        "el": {
          "ALL": ["\u03a0\u03b1\u03c3\u03b9\u03ad\u03bd\u03c4\u03b6\u03b1 Google", "\u0395\u03c0\u03b9\u03bb\u03ad\u03be\u03c4\u03b5 \u03b5\u03c0\u03af\u03c0\u03b5\u03b4\u03bf \u03b4\u03c5\u03c3\u03ba\u03bf\u03bb\u03af\u03b1\u03c2", "\u0395\u03cd\u03ba\u03bf\u03bb\u03bf", "\u0394\u03cd\u03c3\u03ba\u03bf\u03bb\u03bf", "\u0392\u03b1\u03b8\u03bc\u03bf\u03bb\u03bf\u03b3\u03af\u03b1", "\u039a\u03b9\u03bd\u03ae\u03c3\u03b5\u03b9\u03c2", "\u0391\u03bd\u03b1\u03af\u03c1\u03b5\u03c3\u03b7", "\u039d\u03ad\u03bf", "\u0398\u03ad\u03bb\u03b5\u03c4\u03b5 \u03bd\u03b1 \u03be\u03b5\u03ba\u03b9\u03bd\u03ae\u03c3\u03b5\u03c4\u03b5 \u03ba\u03b1\u03b9\u03bd\u03bf\u03cd\u03c1\u03b9\u03bf \u03c0\u03b1\u03b9\u03c7\u03bd\u03af\u03b4\u03b9;", "\u0398\u03ad\u03bb\u03b5\u03c4\u03b5 \u03bd\u03b1 \u03c0\u03b1\u03af\u03be\u03b5\u03c4\u03b5 \u03be\u03b1\u03bd\u03ac;", "\u0394\u03b5\u03af\u03c4\u03b5 \u03c4\u03bf \u03c0\u03b1\u03b9\u03c7\u03bd\u03af\u03b4\u03b9 \u03c0\u03b1\u03c3\u03b9\u03ad\u03bd\u03c4\u03b6\u03b1\u03c2 \u03c4\u03b7\u03c2 Google!", "\u039a\u03bf\u03b9\u03bd\u03bf\u03c0\u03bf\u03af\u03b7\u03c3\u03b7:"]
        },
        "en": {
          "ALL": ["Google Solitaire", "Choose your difficulty", "Easy ", "Hard", "Score", "Moves", "Undo", "New", "Start a new game?", "Play again?", "Check out Google's solitaire game!", "Share: "],
          "uk": ["Google Solitaire", "Choose your difficulty", "Easy ", "Hard", "Score", "Moves", "Undo", "New", "Start a new game?", "Play again?", "Check out Google's solitaire game!", ""]
        },
        "zu": {
          "ALL": ["I-Google Solitaire", "Khetha ubunzima bakho", "Okulula", "Okunzima", "Isikolo", "Ukunyakaza", "Hlehlisa", "Okusha", "Qala igeyimu entsha?", "Dlala futhi?", "Hlola igeyimu ye-solitaire ye-Google!", ""]
        },
        "ms": {
          "ALL": ["Google Solitaire", "Pilih tahap kesukaran", "Mudah", "Sukar", "Skor", "Gerakan", "Buat asal", "Baharu", "Mulakan permainan baharu?", "Main lagi?", "Cubalah permainan solitaire Google!", "Kongsi:"]
        },
        "af": {
          "ALL": ["Google Solitaire", "Kies jou moeilikheidsgraad", "Maklik", "Moeilik", "Telling", "Skuiwe", "Ontdoen", "Nuut", "Begin 'n nuwe beurt?", "Speel weer?", "Loer na Google se solitaire-speletjie!", "Deel:"]
        },
        "mn": {
          "ALL": ["", "\u0422\u04af\u0432\u0448\u043d\u0438\u0439 \u0441\u043e\u043d\u0433\u043e\u043b\u0442", "\u0425\u044f\u043b\u0431\u0430\u0440", "\u0425\u044d\u0446\u04af\u04af", "\u041e\u043d\u043e\u043e", "\u041d\u04af\u04af\u0434\u044d\u043b", "\u0411\u0443\u0446\u0430\u0430\u0445", "\u0428\u0438\u043d\u044d", "\u0428\u0438\u043d\u044d \u0442\u043e\u0433\u043b\u043e\u043e\u043c \u044d\u0445\u043b\u04af\u04af\u043b\u044d\u0445 \u04af\u04af?", "\u0414\u0430\u0445\u0438\u043d \u0442\u043e\u0433\u043b\u043e\u0445 \u0443\u0443?", "Google-\u043d solitaire \u0442\u043e\u0433\u043b\u043e\u043e\u043c\u044b\u0433 \u0441\u043e\u043d\u0438\u0440\u0445\u043e\u043d\u043e \u0443\u0443!", "\u0425\u0443\u0432\u0430\u0430\u043b\u0446\u0430\u0445:"]
        },
        "cs": {
          "ALL": ["Pasi\u00e1ns Google", "Vyberte obt\u00ed\u017enost", "Snadn\u00e9", "Obt\u00ed\u017en\u00e9", "Sk\u00f3re", "Tahy", "Vr\u00e1tit zp\u011bt", "Nov\u00e1 hra", "Zah\u00e1jit novou hru?", "Chcete hr\u00e1t znovu?", "Vyzkou\u0161ejte hru Solitaire od Googlu", "Sd\u00edlet:"]
        },
        "zh-CN": {
          "ALL": ["Google \u5355\u4eba\u7eb8\u724c", "\u9009\u62e9\u96be\u5ea6", "\u5bb9\u6613", "\u56f0\u96be", "\u5f97\u5206", "\u79fb\u52a8\u6b21\u6570", "\u64a4\u6d88", "\u65b0\u5f00\u4e00\u5c40", "\u8981\u65b0\u5f00\u4e00\u5c40\u5417\uff1f", "\u8981\u518d\u73a9\u4e00\u6b21\u5417\uff1f", "\u6765\u73a9 Google \u7684\u5355\u4eba\u7eb8\u724c\u6e38\u620f\u5427\uff01", "\u5206\u4eab\uff1a"]
        },
        "mg": {
          "ALL": ["", "Fidio ny hasarotanao", "Mora", "Sarotra", "Toko", "Kisaka", "Tsy atao indray", "Vaovao", "Hanomboka lalao vaovao ?", "Hamerina hilalao ?", "Zahao ny lalao samirerin'i Google !", "Zarao :"]
        },
        "ar": {
          "ALL": ["Google \u0633\u0648\u0644\u064a\u062a\u064a\u0631", "\u0627\u062e\u062a\u064a\u0627\u0631 \u0645\u0633\u062a\u0648\u0649 \u0627\u0644\u0635\u0639\u0648\u0628\u0629", "\u0633\u0647\u0644", "\u0635\u0639\u0628", "\u0627\u0644\u0646\u062a\u064a\u062c\u0629", "\u0627\u0644\u062d\u0631\u0643\u0627\u062a", "\u062a\u0631\u0627\u062c\u0639", "\u062c\u062f\u064a\u062f\u0629", "\u0647\u0644 \u062a\u0631\u064a\u062f \u0628\u062f\u0621 \u0644\u0639\u0628\u0629 \u062c\u062f\u064a\u062f\u0629\u061f", "\u0647\u0644 \u062a\u0631\u064a\u062f \u0627\u0644\u0644\u0639\u0628 \u0645\u0631\u0629 \u0623\u062e\u0631\u0649\u061f", "\u0627\u0637\u0644\u0639 \u0639\u0644\u0649 \u0644\u0639\u0628\u0629 \u0633\u0648\u0644\u064a\u062a\u064a\u0631 \u0641\u064a Google.", ""]
        },
        "kn": {
          "ALL": ["Google \u0cb8\u0cca\u0cb2\u0cbf\u0c9f\u0cc7\u0cb0\u0ccd", "\u0c95\u0ca0\u0cbf\u0ca3\u0ca4\u0cc6 \u0cb9\u0c82\u0ca4 \u0c86\u0caf\u0ccd\u0c95\u0cc6\u0cae\u0cbe\u0ca1\u0cbf", "\u0cb8\u0cc1\u0cb2\u0cad", "\u0c95\u0ca0\u0cbf\u0ca3", "\u0cb8\u0ccd\u0c95\u0ccb\u0cb0\u0ccd", "\u0ca8\u0ca1\u0cc6\u0c97\u0cb3\u0cc1", "\u0cb0\u0ca6\u0ccd\u0ca6\u0cc1\u0c97\u0cca\u0cb3\u0cbf\u0cb8\u0cbf", "\u0cb9\u0cca\u0cb8\u0ca4\u0cc1", "\u0cb9\u0cca\u0cb8 \u0c97\u0cc7\u0cae\u0ccd \u0caa\u0ccd\u0cb0\u0cbe\u0cb0\u0c82\u0cad\u0cbf\u0cb8\u0cac\u0cc7\u0c95\u0cc7?", "\u0caa\u0cc1\u0ca8\u0c83 \u0c86\u0ca1\u0cac\u0cc7\u0c95\u0cc7?", "Google \u0ca8 \u0cb8\u0cca\u0cb2\u0cbf\u0c9f\u0cc7\u0cb0\u0ccd \u0c97\u0cc7\u0cae\u0ccd \u0ca8\u0ccb\u0ca1\u0cbf!", ""]
        },
        "eu": {
          "ALL": ["Google  Bakar-jokoa", "Aukeratu zailtasun-maila", "Erraza", "Zaila", "Puntuazioa", "Mugimenduak", "Desegin", "Berria", "Beste partida bat hasi nahi duzu?", "Berriro jolastu nahi duzu?", "Probatu Google-ren bakar-jokoa!", "Partekatu: "]
        },
        "et": {
          "ALL": ["Google'i pasjanss", "Valige raskusaste", "Kerge", "Raske", "Tulemus", "K\u00e4igud", "V\u00f5ta tagasi", "Uus", "Kas soovite alustada uut m\u00e4ngu?", "Kas soovite uuesti m\u00e4ngida?", "Tutvuge Google'i pasjansim\u00e4nguga!", ""]
        },
        "ta": {
          "ALL": ["Google \u0b9a\u0bbe\u0bb2\u0bbf\u0b9f\u0bcd\u0b9f\u0bc7\u0bb0\u0bcd", "\u0b95\u0b9f\u0bbf\u0ba9\u0ba8\u0bbf\u0bb2\u0bc8\u0baf\u0bc8 \u0bae\u0bbe\u0bb1\u0bcd\u0bb1\u0bb5\u0bc1\u0bae\u0bcd", "\u0b8e\u0bb3\u0bbf\u0ba4\u0bc1", "\u0b95\u0b9f\u0bbf\u0ba9\u0bae\u0bcd", "\u0bb8\u0bcd\u0b95\u0bcb\u0bb0\u0bcd", "\u0ba8\u0b95\u0bb0\u0bcd\u0bb5\u0bc1\u0b95\u0bb3\u0bcd", "\u0b9a\u0bc6\u0baf\u0bb2\u0bcd\u0ba4\u0bb5\u0bbf\u0bb0\u0bcd", "\u0baa\u0bc1\u0ba4\u0bbf\u0baf \u0b95\u0bc7\u0bae\u0bcd", "\u0baa\u0bc1\u0ba4\u0bbf\u0baf \u0b95\u0bc7\u0bae\u0bc8\u0ba4\u0bcd \u0ba4\u0bca\u0b9f\u0b99\u0bcd\u0b95\u0bb5\u0bbe?", "\u0bae\u0bc0\u0ba3\u0bcd\u0b9f\u0bc1\u0bae\u0bcd \u0bb5\u0bbf\u0bb3\u0bc8\u0baf\u0bbe\u0b9f\u0bb5\u0bbe?", "Google \u0b87\u0ba9\u0bcd \u0b9a\u0bc0\u0b9f\u0bcd\u0b9f\u0bbe\u0b9f\u0bcd\u0b9f\u0ba4\u0bcd\u0ba4\u0bc8 \u0b86\u0b9f\u0bbf\u0baa\u0bcd \u0baa\u0bbe\u0bb0\u0bc1\u0b99\u0bcd\u0b95\u0bb3\u0bcd! ", "\u0baa\u0b95\u0bbf\u0bb0\u0bb5\u0bc1\u0bae\u0bcd:"]
        },
        "ru": {
          "ALL": ["Google \u041f\u0430\u0441\u044c\u044f\u043d\u0441", "\u0412\u044b\u0431\u0435\u0440\u0438\u0442\u0435 \u0443\u0440\u043e\u0432\u0435\u043d\u044c \u0441\u043b\u043e\u0436\u043d\u043e\u0441\u0442\u0438", "\u041f\u0440\u043e\u0441\u0442\u043e\u0439", "\u0421\u043b\u043e\u0436\u043d\u044b\u0439", "\u0421\u0447\u0435\u0442", "\u0425\u043e\u0434\u044b", "\u041e\u0442\u043c\u0435\u043d\u0438\u0442\u044c", "\u041d\u043e\u0432\u0430\u044f \u0438\u0433\u0440\u0430", "\u041d\u0430\u0447\u0430\u0442\u044c \u043d\u043e\u0432\u0443\u044e \u0438\u0433\u0440\u0443?", "\u0418\u0433\u0440\u0430\u0442\u044c \u0441\u043d\u043e\u0432\u0430?", "\u041f\u043e\u043f\u0440\u043e\u0431\u0443\u0439\u0442\u0435 \u043f\u0430\u0441\u044c\u044f\u043d\u0441 \u043e\u0442 Google!", "\u041f\u043e\u0434\u0435\u043b\u0438\u0442\u044c\u0441\u044f:"]
        },
        "gu": {
          "ALL": ["Google \u0ab8\u0ac9\u0ab2\u0abf\u0a9f\u0ac7\u0aaf\u0ab0", "\u0aae\u0ac1\u0ab6\u0acd\u0a95\u0ac7\u0ab2\u0ac0\u0aa8\u0ac1\u0a82 \u0ab8\u0acd\u0aa4\u0ab0 \u0aaa\u0ab8\u0a82\u0aa6 \u0a95\u0ab0\u0acb", "\u0ab8\u0ab0\u0ab3", "\u0aae\u0ac1\u0ab6\u0acd\u0a95\u0ac7\u0ab2", "\u0ab8\u0acd\u0a95\u0acb\u0ab0", "\u0a9a\u0abe\u0ab2", "\u0aaa\u0ac2\u0ab0\u0acd\u0ab5\u0ab5\u0aa4\u0acd \u0a95\u0ab0\u0acb", "\u0aa8\u0ab5\u0ac0", "\u0a8f\u0a95 \u0aa8\u0ab5\u0ac0 \u0ab0\u0aae\u0aa4 \u0ab6\u0ab0\u0ac2 \u0a95\u0ab0\u0ac0\u0a8f?", "\u0aab\u0ab0\u0ac0\u0aa5\u0ac0 \u0ab0\u0aae\u0ac0\u0a8f?", "Google \u0aa8\u0ac0 \u0ab8\u0ac9\u0ab2\u0abf\u0a9f\u0ac7\u0a85\u0ab0 \u0ab0\u0aae\u0aa4 \u0a9c\u0ac1\u0a93!", "\u0ab6\u0ac7\u0ab0 \u0a95\u0ab0\u0acb:"]
        },
        "nl": {
          "ALL": ["Google Patience", "Kies de moeilijkheidsgraad", "Makkelijk", "Moeilijk", "Score", "Verplaatsingen", "Ongedaan maken", "Nieuw", "Nieuw spel starten?", "Opnieuw spelen?", "Bekijk het patiencespel van Google", "Delen:"]
        },
        "ja": {
          "ALL": ["Google \u30bd\u30ea\u30c6\u30a3\u30a2", "\u96e3\u6613\u5ea6\u3092\u9078\u629e", "\u7c21\u5358", "\u96e3\u3057\u3044", "\u30b9\u30b3\u30a2", "\u79fb\u52d5\u56de\u6570", "\u5143\u306b\u623b\u3059", "\u65b0\u3057\u3044\u30b2\u30fc\u30e0", "\u65b0\u3057\u3044\u30b2\u30fc\u30e0\u3092\u958b\u59cb\u3057\u307e\u3059\u304b\uff1f", "\u3082\u3046\u4e00\u5ea6\u30d7\u30ec\u30a4\u3057\u307e\u3059\u304b\uff1f", "Google \u306e\u30bd\u30ea\u30c6\u30a3\u30a2 \u30b2\u30fc\u30e0\u3092\u8a66\u305d\u3046\uff01", "\u5171\u6709:"]
        },
        "hi": {
          "ALL": ["Google \u0938\u0949\u0932\u093f\u091f\u0947\u092f\u0930", "\u0905\u092a\u0928\u093e \u0915\u0920\u093f\u0928\u093e\u0908 \u0938\u094d\u0924\u0930 \u091a\u0941\u0928\u0947\u0902", "\u0906\u0938\u093e\u0928", "\u0915\u0920\u093f\u0928", "\u0938\u094d\u0915\u094b\u0930", "\u091a\u093e\u0932", "\u092a\u0942\u0930\u094d\u0935\u0935\u0924 \u0915\u0930\u0947\u0902", "\u0928\u092f\u093e", "\u0928\u092f\u093e \u0917\u0947\u092e \u0936\u0941\u0930\u0942 \u0915\u0930\u0947\u0902?", "\u092b\u093f\u0930 \u0938\u0947 \u0916\u0947\u0932\u0947\u0902\u0917\u0947?", "Google \u0915\u093e \u0938\u0949\u0932\u093f\u091f\u0947\u092f\u0930 \u0917\u0947\u092e \u0926\u0947\u0916\u0947\u0902!", "\u0936\u0947\u092f\u0930 \u0915\u0930\u0947\u0902:"]
        },
        "bn": {
          "ALL": ["Google Solitaire", "\u0995\u09a4\u099f\u09be \u0995\u09a0\u09bf\u09a8 \u09b2\u09c7\u09ad\u09c7\u09b2\u09c7 \u0996\u09c7\u09b2\u09ac\u09c7\u09a8 \u09a4\u09be \u09ac\u09be\u099b\u09c1\u09a8", "\u09b8\u09b9\u099c", "\u0995\u09a0\u09bf\u09a8", "\u09b8\u09cd\u0995\u09cb\u09b0", "\u099a\u09be\u09b2", "\u09aa\u09c2\u09b0\u09cd\u09ac\u09be\u09ac\u09b8\u09cd\u09a5\u09be", "\u09a8\u09a4\u09c1\u09a8", "\u098f\u0995\u099f\u09bf \u09a8\u09a4\u09c1\u09a8 \u0997\u09c7\u09ae \u09b6\u09c1\u09b0\u09c1 \u0995\u09b0\u09ac\u09c7\u09a8?", "\u0986\u09ac\u09be\u09b0 \u0996\u09c7\u09b2\u09ac\u09c7\u09a8?", "Google \u098f\u09b0 \u09b8\u09b2\u09bf\u099f\u09be\u09df\u09be\u09b0 \u0997\u09c7\u09ae \u0996\u09c7\u09b2\u09c7 \u09a6\u09c7\u0996\u09c1\u09a8!", "\u09b6\u09c7\u09df\u09be\u09b0 \u0995\u09b0\u09c1\u09a8: "]
        },
        "sr": {
          "ALL": ["Google \u043f\u0430\u0441\u0438\u0458\u0430\u043d\u0441", "\u0418\u0437\u0430\u0431\u0435\u0440\u0438\u0442\u0435 \u0442\u0435\u0436\u0438\u043d\u0443", "\u041b\u0430\u043a\u043e", "\u0422\u0435\u0448\u043a\u043e", "\u0420\u0435\u0437\u0443\u043b\u0442\u0430\u0442", "\u041f\u043e\u0442\u0435\u0437\u0438", "\u0412\u0440\u0430\u0442\u0438", "\u041d\u043e\u0432\u0430", "\u0416\u0435\u043b\u0438\u0442\u0435 \u043b\u0438 \u0434\u0430 \u0437\u0430\u043f\u043e\u0447\u043d\u0435\u0442\u0435 \u043d\u043e\u0432\u0443 \u0438\u0433\u0440\u0443?", "\u0416\u0435\u043b\u0438\u0442\u0435 \u043b\u0438 \u0434\u0430 \u0438\u0433\u0440\u0430\u0442\u0435 \u043f\u043e\u043d\u043e\u0432\u043e?", "\u0418\u0441\u043f\u0440\u043e\u0431\u0430\u0458\u0442\u0435 Google-\u043e\u0432 \u043f\u0430\u0441\u0438\u0458\u0430\u043d\u0441!", "\u0414\u0435\u043b\u0438\u0442\u0435:"]
        },
        "ro": {
          "ALL": ["Google Solitaire", "Alege\u021bi nivelul de dificultate", "U\u0219or", "Dificil", "Scor", "Mut\u0103ri", "Anula\u021bi", "Nou", "\u00cencepe\u021bi un joc nou?", "Juca\u021bi din nou?", "\u00cencerca\u021bi jocul solitaire de la Google!", "Trimite\u021bi:"]
        },
        "mr": {
          "ALL": ["Google \u0938\u0949\u0932\u093f\u091f\u0947\u092f\u0930", "\u0906\u092a\u0932\u094d\u092f\u093e \u0905\u0935\u0918\u0921\u0924\u0947\u091a\u093e \u0938\u094d\u0924\u0930 \u0928\u093f\u0935\u0921\u093e", "\u0938\u094b\u092a\u0947", "\u0905\u0935\u0918\u0921", "\u0917\u0941\u0923\u0938\u0902\u0916\u094d\u092f\u093e", "\u091a\u093e\u0932\u0940", "\u092a\u0942\u0930\u094d\u0935\u0935\u0924 \u0915\u0930\u093e", "\u0928\u0935\u0940\u0928", "\u090f\u0915 \u0928\u0935\u0940\u0928 \u0917\u0947\u092e \u0938\u0941\u0930\u0942 \u0915\u0930\u093e", "\u092a\u0941\u0928\u094d\u0939\u093e \u0916\u0947\u0933\u093e\u092f\u091a\u0947?", "Google \u091a\u093e \u0938\u0949\u0932\u093f\u091f\u0947\u092f\u0930 \u0917\u0947\u092e \u092a\u0939\u093e!", "\u0938\u093e\u092e\u093e\u092f\u093f\u0915 \u0915\u0930\u093e:"]
        },
        "te": {
          "ALL": ["Google \u0c38\u0c3e\u0c32\u0c3f\u0c1f\u0c48\u0c30\u0c4d", "\u0c2e\u0c40 \u0c15\u0c4d\u0c32\u0c3f\u0c37\u0c4d\u0c1f\u0c24\u0c28\u0c41 \u0c0e\u0c02\u0c1a\u0c41\u0c15\u0c4b\u0c02\u0c21\u0c3f", "\u0c38\u0c41\u0c32\u0c2d\u0c02", "\u0c15\u0c4d\u0c32\u0c3f\u0c37\u0c4d\u0c1f\u0c02", "\u0c38\u0c4d\u0c15\u0c4b\u0c30\u0c4d", "\u0c15\u0c26\u0c32\u0c3f\u0c15\u0c32\u0c41", "\u0c17\u0c24 \u0c15\u0c26\u0c32\u0c3f\u0c15 \u0c1a\u0c30\u0c4d\u0c2f \u0c30\u0c26\u0c4d\u0c26\u0c41 \u0c1a\u0c47\u0c2f\u0c3f", "\u0c15\u0c4a\u0c24\u0c4d\u0c24 \u0c17\u0c47\u0c2e\u0c4d\u200c\u0c28\u0c41 \u0c2a\u0c4d\u0c30\u0c3e\u0c30\u0c02\u0c2d\u0c3f\u0c38\u0c4d\u0c24\u0c41\u0c02\u0c26\u0c3f", "\u0c15\u0c4a\u0c24\u0c4d\u0c24 \u0c17\u0c47\u0c2e\u0c4d \u0c2a\u0c4d\u0c30\u0c3e\u0c30\u0c02\u0c2d\u0c3f\u0c02\u0c1a\u0c3e\u0c32\u0c3e?", "\u0c2e\u0c33\u0c4d\u0c32\u0c40 \u0c06\u0c21\u0c24\u0c3e\u0c30\u0c3e?", "Google \u0c38\u0c3e\u0c32\u0c3f\u0c1f\u0c48\u0c30\u0c4d \u0c17\u0c47\u0c2e\u0c4d \u0c1a\u0c42\u0c21\u0c02\u0c21\u0c3f!", "\u0c2d\u0c3e\u0c17\u0c38\u0c4d\u0c35\u0c3e\u0c2e\u0c4d\u0c2f\u0c02:"]
        },
        "de": {
          "ALL": ["Google Solit\u00e4r", "Schwierigkeitsstufe w\u00e4hlen", "Einfach", "Schwierig", "Punktzahl", "Z\u00fcge", "R\u00fcckg\u00e4ngig", "Neu", "Neues Spiel starten?", "Nochmal spielen?", "Jetzt das neue Spiel \"Solitaire\" von Google testen.", "Teilen:"],
          "ch": ["Google Solit\u00e4r", "Schwierigkeitsstufe w\u00e4hlen", "Einfach", "Schwierig", "Punktzahl", "Z\u00fcge", "R\u00fcckg\u00e4ngig", "Neu", "Neues Spiel starten?", "Nochmal spielen?", "Jetzt das neue Spiel \"Solitaire\" von Google testen.", "Teilen:"]
        },
        "tr": {
          "ALL": ["Google Solitaire", "Zorluk d\u00fczeyini se\u00e7in", "Kolay", "Zor", "Skor", "Hareket Say\u0131s\u0131", "Geri Al", "Yeni", "Yeni oyun ba\u015flat\u0131ls\u0131n m\u0131?", "Tekrar oynamak istiyor musunuz?", "Google'\u0131n solitaire oyununa g\u00f6z at\u0131n!", "Payla\u015f:"]
        },
        "tn": {
          "ALL": ["", "Tlhopha bothata jwa gago", "Go bonolo", "Go thata", "Dino", "motsamao", "Dirolola ", " Nt\u0161ha", "Simolola motshameko o mosha", "tshameka gape?", "Bona motshameko wa Google wa solitaire!", "Tlhakanela:"]
        },
        "pa": {
          "ALL": ["", "\u0a06\u0a2a\u0a23\u0a3e \u0a14\u0a16\u0a3f\u0a06\u0a08 \u0a2a\u0a71\u0a27\u0a30 \u0a1a\u0a41\u0a23\u0a4b", "\u0a38\u0a4c\u0a16\u0a3e", "\u0a14\u0a16\u0a3e", "\u0a05\u0a70\u0a15", "\u0a38\u0a48\u0a28\u0a24\u0a3e\u0a02", "\u0a05\u0a23\u0a15\u0a40\u0a24\u0a3e \u0a15\u0a30\u0a4b", "\u0a28\u0a35\u0a40\u0a02", "\u0a15\u0a40 \u0a07\u0a71\u0a15 \u0a28\u0a35\u0a40\u0a02 \u0a17\u0a47\u0a2e \u0a38\u0a3c\u0a41\u0a30\u0a42 \u0a15\u0a30\u0a28\u0a40 \u0a39\u0a48?", "\u0a15\u0a40 \u0a26\u0a41\u0a2c\u0a3e\u0a30\u0a3e \u0a16\u0a47\u0a21\u0a23\u0a40 \u0a39\u0a48?", "Google \u0a26\u0a40 \u0a38\u0a4b\u0a32\u0a40\u0a1f\u0a47\u0a05\u0a30 \u0a17\u0a47\u0a2e \u0a16\u0a47\u0a21\u0a4b!", "\u0a38\u0a3e\u0a02\u0a1d\u0a3e \u0a15\u0a30\u0a4b:"]
        },
        "th": {
          "ALL": ["Google Solitaire", "\u0e40\u0e25\u0e37\u0e2d\u0e01\u0e23\u0e30\u0e14\u0e31\u0e1a\u0e04\u0e27\u0e32\u0e21\u0e22\u0e32\u0e01", "\u0e07\u0e48\u0e32\u0e22", "\u0e22\u0e32\u0e01", "\u0e04\u0e30\u0e41\u0e19\u0e19", "\u0e08\u0e33\u0e19\u0e27\u0e19\u0e04\u0e23\u0e31\u0e49\u0e07\u0e17\u0e35\u0e48\u0e40\u0e14\u0e34\u0e19", "\u0e40\u0e25\u0e34\u0e01\u0e17\u0e33", "\u0e40\u0e23\u0e34\u0e48\u0e21\u0e43\u0e2b\u0e21\u0e48", "\u0e40\u0e23\u0e34\u0e48\u0e21\u0e40\u0e01\u0e21\u0e43\u0e2b\u0e21\u0e48\u0e43\u0e0a\u0e48\u0e44\u0e2b\u0e21", "\u0e40\u0e25\u0e48\u0e19\u0e43\u0e2b\u0e21\u0e48\u0e43\u0e0a\u0e48\u0e44\u0e2b\u0e21", "\u0e25\u0e2d\u0e07\u0e40\u0e25\u0e48\u0e19\u0e40\u0e01\u0e21 solitaire \u0e02\u0e2d\u0e07 Google!", "\u0e41\u0e0a\u0e23\u0e4c:"]
        },
        "ml": {
          "ALL": ["Google \u0d38\u0d4b\u0d33\u0d3f\u0d31\u0d4d\u0d31\u0d46\u0d2f\u0d7c", "\u0d21\u0d3f\u0d2b\u0d3f\u0d15\u0d4d\u0d15\u0d7d\u0d1f\u0d4d\u0d1f\u0d3f \u0d32\u0d46\u0d35\u0d7d \u0d24\u0d3f\u0d30\u0d1e\u0d4d\u0d1e\u0d46\u0d1f\u0d41\u0d15\u0d4d\u0d15\u0d41\u0d15", "\u0d32\u0d33\u0d3f\u0d24\u0d02", "\u0d38\u0d19\u0d4d\u0d15\u0d40\u0d7c\u0d23\u0d4d\u0d23\u0d02", "\u0d38\u0d4d\u0d15\u0d4b\u0d7c", "\u0d28\u0d40\u0d15\u0d4d\u0d15\u0d19\u0d4d\u0d19\u0d7e", "\u0d2a\u0d34\u0d2f\u0d2a\u0d1f\u0d3f\u0d2f\u0d3e\u0d15\u0d4d\u0d15\u0d41\u0d15", "\u0d2a\u0d41\u0d24\u0d3f\u0d2f\u0d24\u0d4d", "\u0d2a\u0d41\u0d24\u0d3f\u0d2f\u0d4a\u0d30\u0d41 \u0d17\u0d46\u0d2f\u0d3f\u0d02 \u0d06\u0d30\u0d02\u0d2d\u0d3f\u0d15\u0d4d\u0d15\u0d23\u0d4b?", "\u0d35\u0d40\u0d23\u0d4d\u0d1f\u0d41\u0d02 \u0d15\u0d33\u0d3f\u0d15\u0d4d\u0d15\u0d23\u0d4b?", "Google-\u0d28\u0d4d\u0d31\u0d46 \u0d38\u0d4b\u0d33\u0d3f\u0d31\u0d4d\u0d31\u0d46\u0d7c \u0d17\u0d46\u0d2f\u0d3f\u0d02 \u0d15\u0d33\u0d3f\u0d1a\u0d4d\u0d1a\u0d41\u0d28\u0d4b\u0d15\u0d4d\u0d15\u0d42!", "\u0d2a\u0d19\u0d4d\u0d15\u0d3f\u0d1f\u0d41\u0d15:"]
        },
        "hr": {
          "ALL": ["Google pasijans", "Odaberite te\u017einu", "Lako", "Te\u0161ko", "Rezultat", "Potezi", "Poni\u0161ti", "Novo", "\u017delite li pokrenuti novu igru?", "\u017delite li igrati ponovo?", "Isprobajte Googleov pasijans!", ""]
        },
        "zh-TW": {
          "ALL": ["Google \u63a5\u9f8d", "\u9078\u64c7\u96e3\u5ea6", "\u5bb9\u6613", "\u56f0\u96e3", "\u5f97\u5206", "\u79fb\u52d5\u6b21\u6578", "\u5fa9\u539f", "\u65b0\u724c\u5c40", "\u958b\u59cb\u65b0\u724c\u5c40\u55ce\uff1f", "\u518d\u73a9\u4e00\u5c40\uff1f", "\u5feb\u4f86\u73a9 Google \u7684\u64b2\u514b\u724c\u63a5\u9f8d\uff01", "\u5206\u4eab\uff1a"]
        },
        "vi": {
          "ALL": ["Google Solitaire", "Ch\u1ecdn \u0111\u1ed9 kh\u00f3 c\u1ee7a b\u1ea1n", "D\u1ec5", "Kh\u00f3", "\u0110i\u1ec3m s\u1ed1", "L\u01b0\u1ee3t \u0111i", "Ho\u00e0n t\u00e1c", "M\u1edbi", "B\u1eaft \u0111\u1ea7u v\u00e1n m\u1edbi?", "Ch\u01a1i l\u1ea1i?", "H\u00e3y xem qua tr\u00f2 ch\u01a1i x\u1ebfp b\u00e0i c\u1ee7a Google!", "Chia s\u1ebb:"]
        },
        "pl": {
          "ALL": ["Pasjans Google", "Wybierz poziom trudno\u015bci", "\u0141atwy", "Trudny", "Wynik", "Liczba ruch\u00f3w", "Cofnij", "Nowa gra", "Chcesz zacz\u0105\u0107 now\u0105 gr\u0119?", "Jeszcze raz?", "Zagraj w pasjansa Google!", "Udost\u0119pnij:"]
        },
        "hu": {
          "ALL": ["Google-paszi\u00e1nsz", "Neh\u00e9zs\u00e9gi szint", "K\u00f6nny\u0171", "Neh\u00e9z", "Pontsz\u00e1m", "L\u00e9p\u00e9sek", "Visszavon\u00e1s", "\u00daj j\u00e1t\u00e9k", "Elind\u00edtasz egy \u00faj j\u00e1t\u00e9kot?", "M\u00e9g egy k\u00f6r?", "Pr\u00f3b\u00e1ld ki a Google paszi\u00e1nsz\u00e1t!", "Megoszt\u00e1s:"]
        },
        "lv": {
          "ALL": ["Google pasjanss", "Izv\u0113lieties sare\u017e\u0123\u012bt\u012bbas l\u012bmeni", "Viegls", "Gr\u016bts", "Rezult\u0101ts", "G\u0101jieni", "Atsaukt", "Jauna sp\u0113le", "Vai s\u0101kt jaunu sp\u0113li?", "Vai sp\u0113l\u0113t v\u0113lreiz?", "Skatiet Google pied\u0101v\u0101to pasjansa sp\u0113li!", "Kop\u012bgot:"]
        },
        "so": {
          "ALL": ["", "Dooro dhibaatadaada", "Fudud", " Adag", "Dhibcaha", "Dhaqaaqa", "Ka noqo", "Cusub", "Bilow ciyaar cusub", "Ciyaar mar labbaad", "Eeg ciyaarta Google solitaire", "Wadaag"]
        },
        "lt": {
          "ALL": ["\u201eGoogle\u201c pasjansas", "Pasirinkite sud\u0117tingum\u0105", "Lengva", "Sunku", "Rezultatas", "Veiksmai", "Anuliuoti", "Naujas", "Prad\u0117ti nauj\u0105 \u017eaidim\u0105?", "\u017daisti dar kart\u0105?", "I\u0161bandykite \u201eGoogle\u201c pasjanso \u017eaidim\u0105!", "Bendrinti:"]
        },
        "sl": {
          "ALL": ["Google Pasjansa", "Izberite te\u017eavnost", "Lahko", "Te\u017eko", "Rezultat", "Poteze", "Razveljavi", "Nova igra", "Ali \u017eelite za\u010deti novo igro?", "Ali \u017eelite igrati znova?", "Preskusite Googlovo igro pasjanse. ", "Delite z drugimi:"]
        },
        "sk": {
          "ALL": ["Pasians Google", "Vyberte n\u00e1ro\u010dnos\u0165", "\u013dahk\u00e9", "\u0164a\u017ek\u00e9", "Sk\u00f3re", "\u0164ahy", "Vr\u00e1ti\u0165 sp\u00e4\u0165", "Nov\u00e1 hra", "Chcete za\u010da\u0165 nov\u00fa hru?", "Chcete hra\u0165 znova?", "Vysk\u00fa\u0161ajte hru Solitaire od Googlu", "Zdie\u013ea\u0165:"]
        },
        "fa": {
          "ALL": ["Google Solitaire", "\u0627\u0646\u062a\u062e\u0627\u0628 \u0633\u0637\u062d \u062f\u0634\u0648\u0627\u0631\u06cc", "\u0622\u0633\u0627\u0646", "\u0633\u062e\u062a", "\u0627\u0645\u062a\u06cc\u0627\u0632", "\u062d\u0631\u06a9\u062a", "\u0648\u0627\u06af\u0631\u062f", "\u062c\u062f\u06cc\u062f", "\u0628\u0627\u0632\u06cc \u062c\u062f\u06cc\u062f\u06cc \u0634\u0631\u0648\u0639 \u0645\u06cc\u200c\u06a9\u0646\u06cc\u062f\u061f", "\u062f\u0648\u0628\u0627\u0631\u0647 \u0628\u0627\u0632\u06cc \u0645\u06cc\u200c\u06a9\u0646\u06cc\u062f\u061f", "\u0628\u0627\u0632\u06cc solitaire \u0631\u0627 \u062f\u0631 Google \u0627\u0645\u062a\u062d\u0627\u0646 \u06a9\u0646\u06cc\u062f!", ""]
        },
        "si": {
          "ALL": ["", "\u0d94\u0db6\u0dda \u0daf\u0dd4\u0dc2\u0dca\u0d9a\u0dbb\u0dad\u0dcf\u0dc0 \u0dad\u0ddd\u0dbb\u0db1\u0dca\u0db1", "\u0db4\u0dc4\u0dc3\u0dd4", "\u0d85\u0dc3\u0dd3\u0dbb\u0dd4", "\u0dbd\u0d9a\u0dd4\u0dab", "\u0d9c\u0dd9\u0db1 \u0dba\u0dcf\u0db8\u0dca", "\u0db4\u0dc3\u0dd4\u0d9c\u0db8\u0db1\u0dba", "\u0db1\u0dc0", "\u0db1\u0dc0 \u0d9a\u0dca\u200d\u0dbb\u0dd3\u0da9\u0dcf\u0dc0\u0d9a\u0dca \u0d85\u0dbb\u0db9\u0db1\u0dc0\u0dcf \u0daf?", "\u0db1\u0dd0\u0dc0\u0dad \u0d9a\u0dca\u200d\u0dbb\u0dd3\u0da9\u0dcf \u0d9a\u0dbb\u0db1\u0dc0\u0dcf \u0daf?", "Google \u0dc4\u0dd2 \u0dc3\u0ddc\u0dbd\u0dd2\u0da7\u0dd9\u0dba\u0dcf\u0dbb\u0dca \u0d9a\u0dca\u200d\u0dbb\u0dd3\u0da9\u0dcf\u0dc0 \u0db4\u0dbb\u0dd3\u0d9a\u0dca\u0dc2\u0dcf \u0d9a\u0dbb \u0db6\u0dbd\u0db1\u0dca\u0db1!", "\u0db6\u0dd9\u0daf\u0dcf\u0d9c\u0db1\u0dca\u0db1:"]
        },
        "pt-BR": {
          "ALL": ["Jogo Paci\u00eancia do Google", "Escolha o n\u00edvel de dificuldade", "F\u00e1cil", "Dif\u00edcil", "Pontua\u00e7\u00e3o", "Movimentos", "Desfazer", "Novo", "Come\u00e7ar um novo jogo?", "Jogar novamente?", "Confira o jogo Paci\u00eancia do Google!", "Compartilhar:"]
        },
        "bs": {
          "ALL": ["", "Odaberite te\u017einu", "Lako", "Te\u0161ko", "Rezultat", "Potezi", "Poni\u0161ti", "Nova partija", "\u017delite li pokrenuti novu partiju?", "\u017delite li igrati ponovo?", "Provjerite Googleov pasijans!", "Podijeli:"]
        },
        "fi": {
          "ALL": ["Google Solitaire", "Valitse vaikeustaso", "Helppo", "Vaikea", "Pisteet", "Siirrot", "Peru", "Uusi", "Aloitetaanko uusi peli?", "Pelataanko uudestaan?", "Kokeile Googlen uutta pasianssia!", "Jaa:"]
        },
        "da": {
          "ALL": ["Google Kabale", "V\u00e6lg sv\u00e6rhedsgrad", "Nem", "Sv\u00e6r", "Score", "Tr\u00e6k", "Fortryd", "Nyt", "Vil du starte et nyt spil?", "Vil du spille igen?", "Pr\u00f8v Googles kabalespil", "Del:"]
        },
        "lo": {
          "ALL": ["", "\u0ec0\u0ea5\u0eb7\u0ead\u0e81\u0ea5\u0eb0\u0e94\u0eb1\u0e9a\u0e84\u0ea7\u0eb2\u0ea1\u0e8d\u0eb2\u0e81\u0e87\u0ec8\u0eb2\u0e8d\u0e82\u0ead\u0e87\u0e97\u0ec8\u0eb2\u0e99", "\u0e87\u0ec8\u0eb2\u0e8d", "\u0e8d\u0eb2\u0e81", "\u0e84\u0eb0\u0ec1\u0e99\u0e99", "\u0e8d\u0ec9\u0eb2\u0e8d", "\u0e8d\u0ebb\u0e81\u0ec0\u0ea5\u0eb5\u0e81", "\u0ec0\u0ea5\u0eb5\u0ec8\u0ea1\u0ec0\u0e81\u0ea1\u0ec3\u0edd\u0ec8", "\u0ec0\u0ea5\u0eb5\u0ec8\u0ea1\u0e95\u0ebb\u0ec9\u0e99\u0ec0\u0e81\u0ea1\u0ec3\u0edd\u0ec8\u0e9a\u0ecd?", "\u0eab\u0ebc\u0eb4\u0ec9\u0e99\u0ead\u0eb5\u0e81\u0e9a\u0ecd\u0ec8?", "\u0ea5\u0ead\u0e87\u0eab\u0ebc\u0eb4\u0ec9\u0e99\u0ec0\u0e81\u0ea1\u0ec4\u0e9e\u0ec9\u0e82\u0ead\u0e87 Google \u0ec0\u0e9a\u0eb4\u0ec8\u0e87!", "\u0ec1\u0e9a\u0ec8\u0e87\u0e9b\u0eb1\u0e99:"]
        },
        "es": {
          "ALL": ["Google Solitaire", "Selecciona la dificultad", "F\u00e1cil", "Dif\u00edcil", "Puntuaci\u00f3n", "Movimientos", "Deshacer", "Nueva", "\u00bfQuieres empezar una partida nueva?", "\u00bfQuieres jugar otra partida?", "Prueba el solitario de Google", "Compartir:"]
        },
        "fr": {
          "ALL": ["Solitaire Google", "Niveau de difficult\u00e9", "Facile", "Difficile", "Score", "D\u00e9placements", "Annuler", "Nouveau", "Lancer une nouvelle partie ?", "Rejouer ?", "D\u00e9couvrez le jeu de solitaire de Google !", "Partager :"]
        },
        "sw": {
          "ALL": ["Google Solitaire", "Chagua kiwango cha ugumu unachotaka kucheza", "Rahisi", "Ngumu", "Alama", "Hatua", "Tendua", "Mpya", "Ungependa kuanza mchezo mpya?", "Ungependa kucheza tena?", "Kagua mchezo wa solitaire kutoka Google!", "Shiriki:"]
        },
        "sv": {
          "ALL": ["Google Patiens", "V\u00e4lj sv\u00e5righetsgrad", "L\u00e4tt", "Sv\u00e5r", "Po\u00e4ng", "Drag", "\u00c5ngra", "Nytt", "Vill du starta ett nytt spel?", "Vill du spela igen?", "Kolla in Googles patiens!", "Dela:"]
        },
        "mk": {
          "ALL": ["", "\u0418\u0437\u0431\u0435\u0440\u0435\u0442\u0435 \u043d\u0438\u0432\u043e \u043d\u0430 \u0442\u0435\u0436\u0438\u043d\u0430", "\u041b\u0435\u0441\u043d\u043e", "\u0422\u0435\u0448\u043a\u043e", "\u0420\u0435\u0437\u0443\u043b\u0442\u0430\u0442", "\u041f\u043e\u0442\u0435\u0437\u0438", "\u0412\u0440\u0430\u0442\u0438", "\u041d\u043e\u0432\u0430 \u0438\u0433\u0440\u0430", "\u0414\u0430 \u0437\u0430\u043f\u043e\u0447\u043d\u0435 \u043d\u043e\u0432\u0430 \u0438\u0433\u0440\u0430?", "\u0418\u0433\u0440\u0430\u0458\u0442\u0435 \u043f\u043e\u0432\u0442\u043e\u0440\u043d\u043e?", "\u041f\u0440\u043e\u0431\u0430\u0458\u0442\u0435 \u0458\u0430 \u0438\u0433\u0440\u0430\u0442\u0430 \u043f\u0430\u0441\u0438\u0458\u0430\u043d\u0441 \u043d\u0430 Google!", "\u0421\u043f\u043e\u0434\u0435\u043b\u0435\u0442\u0435:"]
        },
        "gl": {
          "ALL": ["Solitario de Google", "Selecciona a dificultade", "F\u00e1cil", "Dif\u00edcil", "Puntuaci\u00f3n", "Movementos", "Desfacer", "Novo", "Queres comezar un xogo novo?", "Queres xogar de novo?", "Proba o solitario de Google", ""]
        },
        "bg": {
          "ALL": ["Google \u041f\u0430\u0441\u0438\u0430\u043d\u0441", "\u0418\u0437\u0431\u0435\u0440\u0435\u0442\u0435 \u043d\u0438\u0432\u043e \u043d\u0430 \u0442\u0440\u0443\u0434\u043d\u043e\u0441\u0442", "\u041b\u0435\u0441\u043d\u043e", "\u0422\u0440\u0443\u0434\u043d\u043e", "\u0420\u0435\u0437\u0443\u043b\u0442\u0430\u0442", "\u0425\u043e\u0434\u043e\u0432\u0435", "\u041e\u0442\u043c\u044f\u043d\u0430", "\u041d\u043e\u0432\u0430", "\u0418\u0441\u043a\u0430\u0442\u0435 \u043b\u0438 \u0434\u0430 \u0437\u0430\u043f\u043e\u0447\u043d\u0435\u0442\u0435 \u043d\u043e\u0432\u0430 \u0438\u0433\u0440\u0430?", "\u0418\u0441\u043a\u0430\u0442\u0435 \u043b\u0438 \u0434\u0430 \u0438\u0433\u0440\u0430\u0435\u0442\u0435 \u043e\u0442\u043d\u043e\u0432\u043e?", "\u0420\u0430\u0437\u0433\u043b\u0435\u0434\u0430\u0439\u0442\u0435 \u043f\u0430\u0441\u0438\u0430\u043d\u0441\u0438\u0442\u0435 \u043e\u0442 Google!", "\u0421\u043f\u043e\u0434\u0435\u043b\u044f\u043d\u0435:"]
        }
      }
    };
  </script>

  <div id="solitaire-waiting-hint">
    <svg class="spinner" width="64px" height="64px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
      <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
  </div>
  <div id="solitaire">
    <!-- BEGIN solitaire HTML CODE -->
    <div id="solitaire-topbar" class="border-box">
      <div class="flex-div">
        <div id="solitaire-mode"> </div>
      </div>
      <div id="solitaire-scorebar" class="flex-div">
        <span class="item" id="solitaire-timer"></span>
        <div class="flex-div">
          <span class="title">Score</span>
          <span class="item" id="solitaire-score"></span>
        </div>

        <div id="solitaire-scorebar-move" class="flex-div">
          <span class="title">Moves</span>
          <span class="item" id="solitaire-move">24</span>
        </div>
      </div>

      <div class="flex-div">
        <div id="solitaire-volume">
          <i id="solitaire-volume-up" class="material-icons-extended"> &#xE050; </i>
          <i id="solitaire-volume-off" style="display:none" class="material-icons-extended"> &#xE04F; </i>
        </div>

        <i id="solitaire-close" class="material-icons-extended"> &#xE5CD; </i>
      </div>
    </div>

    <div id="solitaire-scorebar-sidebar" class="border-box">
      <div class="button" id="solitaire-undo-side-button">
        <i class="material-icons-extended solitaire-scorebar-icons"> &#xE166; </i>
        UNDO
      </div>
      <div class="button" id="solitaire-new-game-side-button">
        <i class="material-icons-extended solitaire-scorebar-icons"> &#xE885; </i>
        NEW
      </div>
    </div>
    <div id="solitaire-container">
      <div id="solitaire-board">
      </div>
    </div>
    <div id="solitaire-mode-dialog" class="solitaire-dialog">
      <div class="place_center">
        <div class="container" id="solitaire-mode-dialog-container">
          <div class="hint">
            <div id="solitaire-dialog-hint" style="width:120px"></div>
            <i id="solitaire-mode-dialog-close" class="close-button material-icons-extended"> &#xE14C; </i>
          </div>
          <div class="option-bar">
            <div class="option" id="solitaire-easy-button">
              <span>EASY</span>
            </div>
            <div class="option" id="solitaire-hard-button">
              <span>HARD</span>
            </div>
          </div>
        </div>
        <div id="solitaire-dialog-share" class="flex-div flex-center">
          <span> Share: </span>
        </div>
      </div>
    </div>
    <div id="solitaire-final-dialog">
      <div id="solitaire-final-dialog-container" class="place_center">
        <div id="ribbon-cards"></div>
        <img id="ribbon-img" src="images/ribbon_no_text.png" />
        <div id="ribbon-body" class="blue-box">
          <div id="ribbon-text" class="place_center">
            <div class="ribbon-char">YOU</div>
            <div class="ribbon-char">WIN</div>
            <div class="ribbon-char">!</div>
          </div>
        </div>
      </div>
      <!-- END solitaire HTML CODE -->

      <script>
        // Appends ?hl=zh_CN or #hl=zh_CN to the URL to change hl flag.
        window.google.doodle.hl = 'en';
        gws.lrfactory.solitaire.start();
      </script>
      <script>
        // Set the options globally
        // to make LazyLoad self-initialize
        window.lazyLoadOptions = {
          // Your custom settings go here
        };
      </script>
      <script defer src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.1/dist/lazyload.min.js"></script>

      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6271f5abca80cec0"></script>
    </div>

</body>

</html>