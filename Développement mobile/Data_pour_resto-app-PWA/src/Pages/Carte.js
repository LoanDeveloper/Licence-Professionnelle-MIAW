import React from "react";
import styles from "./styles";
import Accordion from '@mui/material/Accordion';
import AccordionSummary from '@mui/material/AccordionSummary';
import AccordionDetails from '@mui/material/AccordionDetails';
import ExpandMoreIcon from '@mui/icons-material/ExpandMore';


var Carte = function Carte(props) {
  console.log("Chargement du composant Carte");	
  return (
    <div style={styles.container}>
      <h1 style={styles.title}>La Carte</h1>
      <p>Avec des elements de type "Accordeon (material UI)". A améliorer (style)</p>
	  <p>ou des elements de type "react-collapsible"</p>

		<h2>pizza</h2>
          <table
          data-role="table"
          id="antinea-table"
          data-mode="reflow"
          class="ui-responsive"
        >
          <thead>
            <tr>
              <th data-priority="1">Nom</th>
              <th data-priority="2"></th>
              <th data-priority="3">Recette</th>
              <th data-priority="4">Prix</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Marina</th>
              <td>
                <img alt="Marina" src="./images/pizza1.jpg" width="100" />
              </td>
              <td>tomate, ail, origan, huile d'olive</td>
              <td>9&nbsp;&euro;</td>
            </tr>
            <tr>
              <th>Reine</th>
              <td>
                <img alt="Reine" src="./images/reine.jpg" width="100" />
              </td>
              <td>tomate, mozzarella, jambon, champignon</td>
              <td>10&nbsp;&euro;</td>
            </tr>
            <tr>
              <th>Vegetarienne</th>
              <td>
                <img alt="Veget" src="./images/veget.jpg" width="100" />
              </td>
              <td>tomate, artichauts, brocolis</td>
              <td>10&nbsp;&euro;</td>
            </tr>
          </tbody>
        </table>
       
         <h2>Pates</h2>
        
          <p>Vous pouvez inventer du contenu pour mettre ici, mais ce n'est pas
          nécéssaire</p>
       
         <h2>Desserts</h2>
          <p>Vous pouvez inventer du contenu pour mettre ici, mais ce n'est pas
          nécéssaire{" "}</p>
      <br />
      <br />
      <p>Rajouter un champ permettant d'afficher le menu du jour</p>
    </div>
  );
};

export default Carte;
