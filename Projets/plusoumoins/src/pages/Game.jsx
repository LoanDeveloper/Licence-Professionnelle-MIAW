import React, { useContext, useEffect, useState } from 'react'
import { AuthContext } from '../components/App';
import { Navigate, useNavigate, Link } from 'react-router-dom';

import SearchWord from '../components/SearchWord'
import FirstWord from '../components/FirstWord'

const Game = (props) => {
  const { googleSearchData, setGoogleSearchData, score, setScore } = useContext(AuthContext);
  const navigate = useNavigate();

  const [firstSearch, setFirstSearch] = useState()
  const [secondSearch, setSecondSearch] = useState()
  const [flashSearch, setFlashSearch] = useState()

  const [startedGame, setStartedGame] = useState(false)

  const removeObjectById = (idToRemove) => {
    setGoogleSearchData((prevGoogleSearchData) =>
      prevGoogleSearchData.filter((obj) => obj.id !== idToRemove)
    );
  };

  const removeSearch = () => {
    if (firstSearch && secondSearch) {
      removeObjectById(firstSearch.id)
      removeObjectById(secondSearch.id)
    }
  }

  const selectActualData = () => {
    if (googleSearchData && googleSearchData.length > 0) {
      const randomIndex = Math.floor(Math.random() * googleSearchData.length);
      const randomIndex2 = Math.floor(Math.random() * googleSearchData.length);

      if (score === 0 && startedGame === false) {
        setFirstSearch(googleSearchData[randomIndex])
        setStartedGame(true)
      } else if (score === 0 && startedGame) {
        setFirstSearch(secondSearch)
      }
      else {
        setFirstSearch(secondSearch)
      }
      setSecondSearch(googleSearchData[randomIndex !== randomIndex2 ? randomIndex2 : randomIndex2 - 1])

      removeSearch()
    } else {
      console.log("test refresh!")
    }
  }

  const isMore = () => {
    if (firstSearch && secondSearch && firstSearch.search <= secondSearch.search) {
      console.log("gagné !")
      selectActualData()
      setScore(score + 1)
    } else {
      console.log("perdu")
      navigate('/end')
    }
  }

  const isLess = () => {
    if (firstSearch && secondSearch && firstSearch.search >= secondSearch.search) {
      console.log("gagné !")
      selectActualData()
      setScore(score + 1)
    } else {
      console.log("perdu")
      navigate('/end')

    }
  }

  useEffect(() => {
    selectActualData()
  }, [])

  return <section className="gamePage">
    <Link to="/" className='logo'>
      <img src="./img/logo.png" alt="logo" className='' />
    </Link>

    <h1>Game</h1>

    <p>Score : {score}</p>

    <section className='game'>
      {firstSearch &&

        <FirstWord name={firstSearch.name} search={firstSearch.search.toLocaleString()} />

      }
      <p className='gamePage__versus'>VS</p>

      {firstSearch && secondSearch &&
        <SearchWord name={secondSearch.name} firstSearch={firstSearch.name} isLess={isLess} isMore={isMore} />
      }
    </section>



  </section>
};

export default Game;
