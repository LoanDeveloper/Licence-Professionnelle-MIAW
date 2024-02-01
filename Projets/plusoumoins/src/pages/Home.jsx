import React, { useContext, useEffect } from 'react'
import { AuthContext } from '../components/App';
import { Navigate, useLocation, useNavigate } from 'react-router-dom';

const Home = () => {
  const { googleSearchData, setGoogleSearchData } = useContext(AuthContext);
  const navigate = useNavigate();

  const handleStart = () => {
    return navigate("/game")
  }

  useEffect(() => {
    fetch("/api/googleSearchData")
      .then((response) => response.json())
      .then((data) => {
        setGoogleSearchData(data)
      })
      .catch((error) =>
        console.error("Erreur lors de la récupération des données: ", error)
      );
  }, [])

  return <main className='homePage'>
    <img src="./img/logo.png" alt="logo" className='logo' />
    <h1 className='homePage__title'>PLUS ou MOINS</h1>
    <p className='homePage__description'>Quel terme est le plus recherché sur Google ?</p>
    <p className='homePage__description'>Devine quel terme ou expression est le plus recherché sur Google à l'aide des boutons Plus et Moins</p>
    <p className='homePage__description'>Obtiens un maximum de bonnes réponses consécutives.</p>

    <button onClick={() => handleStart()} className='homePage__button'>Jouer</button>
  </main>
};

export default Home;
