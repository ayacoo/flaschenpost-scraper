# Was ist das hier?

Der Flaschenpost Scraper ist ein Übungsprojekt und holt sich die aktuellen Angebote/Empfehlungen von https://www.flaschenpost.de Es dient dazu die Themen Github, Packagist und Workflows besser kennen zu lernen. Wer möchte kann die Library beliebig erweitern/nutzen, ganz im Sinne von Open Source. Ein kommerzieller Einsatz müsste natürlich mit Flaschenpost geklärt werden! 

# Installation
`composer require ayacoo/flaschenpost-scraper`

und dann

`composer install`

# Beispiele
### Empfehlungen holen
```
use Ayacoo\Flaschenpost\Service\Crawler;

require_once '../vendor/autoload.php';

$crawler = new Crawler();
$products = $crawler->getRecommendations('50667');
echo json_encode($products);
```

# Tests ausführen
`vendor/bin/phpunit Tests`

# Mögliche Einsatzwecke
- Einbau in bestehende Webseiten
- selbstgebaute Infomailings mit den Angeboten
- Preisvergleich mit anderen Shops
- Datenquelle für Bots z.B. für Telegram

# TODO
- Parser für einzelne Seiten (nur Angebote oder komplette Seite)
- Filtermöglichkeiten für Kategorien oder Marken