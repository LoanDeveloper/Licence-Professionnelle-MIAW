import React from "react";
import styles from "./styles";

const Galerie = function Galerie(props) {

  console.log("Chargement du composant Galerie");
  
  return (
    <div style={styles.container}>
      <h1 style={styles.title}>Galerie</h1>
      <p>Inserer ici un carrousel d'images</p>
    </div>
  );
};

export default Galerie;
