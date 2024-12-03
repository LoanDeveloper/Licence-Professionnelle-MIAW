import React from "react";
import styles from "./styles";

var Reservation = function Reservation(props) {
  console.log("Chargement du composant Reservation");	
  return (
    <div style={styles.container}>
      <h1 style={styles.title}>Reservation</h1>
      <p>Inserer ici les element UI pour la prise de reservation</p>
    </div>
  );
};

export default Reservation;
