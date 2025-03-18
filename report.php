<?php include "handy_methods.php"?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend2</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div id="container">
        <?php include "header.php"?>
        <section>

            <article>
                <h2>Rapport för kursprojekt</h2>

                <p>Backend-Programmerings kursen var definitivt mer avancerad än föregående kurser. PHP har lite konstig syntax på flera olika platser (troligen på grund av åldern) och är inte lika tydligt då man läser koden.
                Om man skriver PHP i Visual Studio Code fungerar inte vissa features, d.v.s ingen autocompletion, inga suggestions, ingen autoformatering etc. Det var också mer klurigt eftersom allting på sidan generas av PHP, vilket gör det betydligt mer krävande att skapa en logisk struktur för sidan. <br><br>
                Kursen har annars varit helt intressant men ett klagomål är att båda projekten är skapade för teams på 2 utan något alternativ som är specifikt skapat för ett scenario där man arbetar ensam.
                Jag skulle ha föredragit endast ett stort projekt under hela kursen, istället för 2 mindre projekt. På det sättet får man mera tid att arbeta med det, och det ger en bättre förståelse av helheten, åtminstone för mig.
                För den här uppgiften utförde jag 9/10 delmoment, med endast content management (CMS) ofärdigt och andra delmoment på olika nivåer, med vissa som var relativt enkla att slutföra helt och hållet medan andra saknar mer avancerad funtionalitet.
                Likes/Dislikes skulle ha fungerat bättre med en till table i databasen på samma sätt som kommentarer, men SESSION() ger grundläggande funktionalitet. Admin funktionaliteten kräver att man skapar en till "view_profiles.php" och "model_profiles" för admin/moderator UI och funktionalitet vilket blev för krångligt.<br><br>
                Fokuset i kursen var uppenbarligen inte frontend eller CSS, så jag använde minimal tid på detta; nästan all arbetstid gick till att implementera funktionalitet och det tekniska aspektet.
                Jag gjorde däremot lite ytterst grundläggande styling, med vissa röd/grönfärgade meddelanden för errors eller framgångsrik input, samt extra (inte i instruktionerna) User Experience element som en redirect från login och registreringssidan om man redan är inloggad.
                De bästa delarna av kursen var de delmoment som inkluderade databasen, till exempel att hämta information från den, ändra variabler i den via användar-input etc.
                De sämsta eller tråkigaste delarna var att försöka förstå vissa rader av PHP kod i de situationer där syntaxen inte liknar JavaScript eller något annat språk.<br><br>
                Trots att alla delmoment inte är implementerade 100% så anser jag att kursen gav mig en grundläggande förståelse i PHP och hur språket fungerar, vissa populära eller användbara metoder, samt viktiga delar av språkets syntax.
                </p>
            </article>

        </section>

    </div>

</body>

</html>