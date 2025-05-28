<!DOCTYPE html>

<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <title>Gästebuch</title>
  </head>
  <body>
    <h1>Hinterlassen Sie einen Kommentar!</h1>
    <p>Diese Seite wurde bereits 
        <?php 
          $counterDatei = 'counter.txt';
          if (!file_exists($counterDatei)) {
              file_put_contents($counterDatei, "0");
          }
          $counter = (int)file_get_contents($counterDatei);
          $counter++;
          file_put_contents($counterDatei, $counter);
          echo $counter;
        ?> 
        mal aufgerufen. </p>

    <p>Hier könnnen Sie uns Ihren Kommentar übermitteln:</p>
    <form action = "./index.php" method="POST">
        <input type="text" name="kommentar"> <br>
        <input type="submit" value="Absenden">
    </form>
    <?php 
      if (!empty($_POST['kommentar'])) {
      $kommentar = htmlspecialchars($_POST['kommentar']);
      echo "<p>Ihr Kommentar: $kommentar</p>";
      file_put_contents("comments.txt", $kommentar . PHP_EOL, FILE_APPEND);
      }
    ?>
    <h2>Bisherige Kommentare:</h2>
    <ul>
      <?php
        if (file_exists("comments.txt")) {
          $kommentare = file("comments.txt", FILE_IGNORE_NEW_LINES);
          foreach ($kommentare as $k) {
            echo "<li>" . htmlspecialchars($k) . "</li>";
          }
        }
      ?>
    </ul>
  </body>
</html>