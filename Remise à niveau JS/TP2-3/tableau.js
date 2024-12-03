export function remplirTableauAleatoire(taille) {
  const tableau = [];
  for (let i = 0; i < taille; i += 1) {
    const nombreAleatoire = Math.floor(Math.random() * 100);
    tableau.push(nombreAleatoire);
  }
  return tableau;
}

export function afficherTableau(tableau) {
  console.log(tableau.join(', '));
}
