import React from "react";
import styles from "./styles";

const Contact = function Contact(props) {
  console.log("Chargement du composant Contact");	
  return (
    <div style={styles.container}>
      <h1 style={styles.title}>Le restaurant Antinea</h1>
      <p>Ici info de contact et Geolocalisation + saisie de l'avis</p>
      <p>
        Type de restauration : Brasserie, pizzeria
        <br />
        Accessible aux personnes à mobilité réduite
        <br />
        WIFI disponible
        <br />
        Modes de payement : CB, Izly
      </p>
      <h2>Horaires</h2>
      <p>11h30-13h45</p>
      <h2>Acces</h2>
      <p>
        15 rue Vaux de Foletier 17000 LA ROCHELLE
        <br />
        Téléphone : 05.46.44.18.57
      </p>
    </div>
  );
};

export default Contact;
