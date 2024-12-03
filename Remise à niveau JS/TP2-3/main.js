import { messageAnglais, messageFrancais } from './messages.js';
import { remplirTableauAleatoire, afficherTableau } from './tableau.js';

messageAnglais();
messageFrancais();

afficherTableau(remplirTableauAleatoire(10));
