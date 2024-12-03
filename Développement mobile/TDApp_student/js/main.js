// main.js

document.addEventListener('DOMContentLoaded', function () {
  // Fonction pour calculer la différence entre deux dates
  function differenceEntreDeuxDates(date1, date2) {
    const dateObj1 = new Date(date1);
    const dateObj2 = new Date(date2);
    const differenceEnMillisecondes = Math.abs(dateObj1 - dateObj2);
    const differenceEnJours = differenceEnMillisecondes / (1000 * 60 * 60 * 24);
    return differenceEnJours;
  }

  // Fonction pour gérer le clic sur le bouton de calcul
  document.getElementById('b_calcul').addEventListener('click', function () {
    // @ts-ignore
    const startDate = document.getElementById('sdate').value;
    const endDate = document.getElementById('edate').value;

    // Vérifier si les deux champs de date sont remplis
    if (startDate && endDate) {
      const difference = differenceEntreDeuxDates(startDate, endDate);

      // Mettre à jour l'affichage du résultat sans virgules
      document.getElementById('result-value').textContent =
        difference.toFixed(0) + ' jours';
    } else {
      alert('Veuillez remplir les deux champs de date.');
    }
  });
});
