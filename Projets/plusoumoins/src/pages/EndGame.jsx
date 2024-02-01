import React, { useContext, useEffect } from 'react'
import { AuthContext } from '../components/App';
import { Navigate, useLocation, useNavigate, Link } from 'react-router-dom';

const Home = (props) => {
  const { googleSearchData, setGoogleSearchData, score, setScore } = useContext(AuthContext);
  const navigate = useNavigate();


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

  const handleRealoadGame = () => {
    setScore(0)
    navigate('/game')
  }

  return <main className='endGame'>

    <Link to="/" className='logo'>
      <img src="./img/logo.png" alt="logo" className='' />
    </Link>

    <h1 className='endGame__title'>Perdu !</h1>

    <p className='endGame__description'>Ton score est de : {score}</p>

    <button onClick={() => { handleRealoadGame() }}>Rejouer</button>
  </main>
};

export default Home;
