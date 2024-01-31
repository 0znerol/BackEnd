<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div>
      <?php
        setlocale(LC_TIME, 'it_IT.UTF8');
        echo "Today is " . date("Y/m/d") . "<br>";
      ?>
      
    </div>
    <div>
      <?php
      $serieA = [
          "Juventus" => ["Buffon", "Chiellini", "Ronaldo"],
          "Inter" => ["Handanovic", "Lukaku", "Barella"],
          "Milan" => ["Pulisic", "Leao", "Giroud"],
          "Verona" => ["Noslin", "Henry", "Silva"],
      ];
      foreach ($serieA as $team => $players) {
          echo "<h4>Squadra: $team</h4><br>";
          echo "Formazione:<br>";
          foreach ($players as $player) {
              echo "$player<br>";
          }
          echo "<br>";
      }
      ?>
    </div>
    <div>
      <?php
        $matches = [
            "Match 1" => [
                "Juventus" => $serieA["Juventus"],
                "Inter" => $serieA["Inter"],
            ],
            "Match 2" => [
              "Milan" => $serieA["Milan"],
              "Verona" => $serieA["Verona"],
          ],
            // Aggiungi altre partite qui
        ];

        foreach ($matches as $match => $teams) {
            echo "Partita: $match<br>";
            foreach ($teams as $team => $players) {
                echo "Squadra: $team<br>";
                echo "Formazione:<br>";
                foreach ($players as $player) {
                    echo "$player<br>";
                }
                echo "<br>";
            }
        }
      ?>
    </div>
  </body>
</html>
