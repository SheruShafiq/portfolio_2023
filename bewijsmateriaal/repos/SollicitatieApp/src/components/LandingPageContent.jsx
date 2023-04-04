// Import React and CSS styles
import React from "react";
import "../styles/LandingPageContentStyles.css";

// Define the LandingPageContent component
function LandingPageContent() {
  return (
    // Wrap all the content in a parent div with ID parentContent
    <div id="parentContent">
      {/* First paragraph */}
      <div>
        <p id="textBase">
          Ben jij een backend programmeur met overzicht? Kun jij al voor je zien
          dat jouw code een rol speelt in de handen van een eindgebruiker? Heb
          je bovendien ervaring met PHP frameworks zoals Laravel en kun je
          overweg met het optimaliseren van bestaande code en databases? Dan
          willen we graag met je praten over een baan bij ons.
        </p>
      </div>
      {/* Second paragraph */}
      <div>
        <p id="textBase">
          De eindgebruiker die wij met onze code bedienen is een mens van vlees
          en bloed, die dankzij jouw ingenieuze oplossing zonder gedoe een
          betaald-parkeer-sessie start ergens in Zweden. Of het is een site
          bezoeker van een publieke omroep die geheel AVG-proof zijn
          persoonlijke cookievoorkeuren instelt. Of het is een inkoper van een
          mega groot warenhuis, die ziet dat zijn net ontvangen levering niet
          alleen de magazijnvoorraad heeft geactualiseerd, maar ook de
          productpagina’s van de webwinkel heeft bijgewerkt met de juiste maten,
          kleuren en aantallen.
        </p>
      </div>
      {/* Third paragraph */}
      <div>
        <p id="textBase">
          Onze klanten leggen grote opdrachten bij ons neer, omdat ze vertrouwen
          op de expertise bij al onze mensen. Dankzij developers als jij kunnen
          wij als HI dit vertrouwen waarmaken. Developers die goede PHP-code
          schrijven met behulp van de modernste frameworks en en passant hun
          collega’s van frontend ontlasten door wat tips en tricks te geven.
          Teamspelers dus, die graag de beste code opleveren.
        </p>
      </div>
      {/* Fourth paragraph */}
      <div>
        <strong id="secondaryTitle">Dit ben jij</strong>
        php Copy code
        <ul>
          <li id="textBase">
            Jij wilt elke week iets nieuws leren en deelt dat graag met je
            collega’s.
          </li>
          <li id="textBase">Je houdt van programmeren.</li>
          <li id="textBase">
            Je vindt het leuk om dit samen te doen, en je wilt graag met het
            team mooie code opleveren die werkt.
          </li>
        </ul>
      </div>
      {/* Fifth paragraph */}
      <div>
        <strong id="secondaryTitle">Dit kun je bij ons</strong>

        <ul>
          <li id="textBase">
            Geweldige backends, web apps en integraties met externe API’s
            creëren en daarin het verschil maken.
          </li>
          <li id="textBase">
            Werken met PHP, scripttalen en CMS-en als WordPress en Magento.
          </li>
          <li id="textBase">
            Werken in een bedrijf met ambitieuze doelen, waarin de klant
            centraal staat.
          </li>
          <li id="textBase">
            Werken op kantoor en thuis in een frequentie die jij prettig vindt.
          </li>
          <li id="textBase">Werken met een goede laptop. (Mac/PC)</li>
        </ul>
      </div>
      <div>
        <strong id="secondaryTitle">Dit verwachten we van je</strong>

        <ul>
          <li id="textBase">PHP kent geen geheimen meer voor je.</li>
          <li id="textBase">Het liefst heb je ook ervaring met VueJS.</li>
          <li id="textBase">
            Je hebt een opleiding voltooid op het gebied van IT of
            computerwetenschappen.
          </li>
          <li id="textBase">Je hebt ervaring met het werken in een team.</li>
          <li id="textBase">
            Je bent communicatief vaardig en kunt je ideeën goed overbrengen.
          </li>
          <li id="textBase">
            Je bent een teamspeler en je bent bereid om je collega’s te helpen.
          </li>
        </ul>
      </div>
    </div>
  );
}

export default LandingPageContent;
