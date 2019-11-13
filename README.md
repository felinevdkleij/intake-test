# Intaketoets

Dit is de intaketoets voor Unit4 VerzuimSignaal junior developers. Hiermee willen we je niveau testen en kijken of deze voldoende is om een bijdrage te kunnen leveren aan onze code. Het is dan ook niet erg wanneer het je niet lukt een opdracht te voltooien. Daar kijken we wel doorheen.

We hebben een programmaatje geschreven waarmee een garage kan worden beheerd. Je kan inloggen als een gebruiker en zo klanten, auto’s en klussen beheren. De functionaliteit werkt, maar helaas zitten er in de code diverse fouten en gebreken. Aan jou de taak om deze fouten en gebreken te verhelpen.

# Wat te doen?
Maak een fork van het project naar je eigen GitHub account. Hier kan je je ontwikkelingen naartoe pushen. Zorg dat je commit messages goed beschrijven wat ze precies oplossen.

We hebben een aantal issues geopend in deze Repo voor grote zaken die opgelost moeten worden. Kijk naar de acceptatiecriteria wat er precies gedaan moet worden en zorg dat je je ontwikkeling goed test.

Daarnaast zitten er nog een aantal TODO's in de code zelf. Deze zijn niet verplicht, maar je kan deze oplossen naar eigen inzicht als je tijd over hebt.

Wat we vooral willen weten is WAAROM je bepaalde keuzes maakt. Zorg er daarom voor dat je je code goed becommentarieert. En bereid bent om er vragen over uit te leggen.

# Installatie
Je kan om dit project thuis te draaien gebruikmaken van bijvoorbeeld WAMP (https://bitnami.com/stack/wamp). Dit project draait op PHP 7. Je mag natuurlijk altijd zelf beslissen waarmee je host/ontwikkelt.

Dit project maakt gebruik van composer (https://getcomposer.org/) en NPM (https://www.npmjs.com/) om bepaalde packages op te halen.

De volgende dingen worden hiermee geïnstalleerd: PHPUnit, een unit-testing platform (https://phpunit.de/) Bootstrap, een frontend framework(https://getbootstrap.com/) JQuery, een JS framework (https://jquery.com/)

Je kan inloggen in het systeem met de naam jan en het wachtwoord apestaartje.

# Database
Je zal een MySQL database moeten starten. In de root van het project staat intake.sql. Dit kun je in een MySQL database inladen. In WAMP zit bijvoorbeeld een MySQL server ingebouwd.

In services/Database.sql staat op regel 15 een PDO database connection call. Pas de connectie-string aan waar nodig en vul je eigen username en password in.
