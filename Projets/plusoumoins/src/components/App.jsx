import React, { useEffect, createContext, useState } from 'react'
import { BrowserRouter } from 'react-router-dom'
import { Routes, Route } from 'react-router'

import Home from '../pages/Home'
import Game from '../pages/Game'
import EndGame from '../pages/EndGame'


export const AuthContext = createContext();

const App = () => {
  const [googleSearchData, setGoogleSearchData] = useState();
  const [score, setScore] = useState(0);

  return (
    <AuthContext.Provider value={{ googleSearchData, setGoogleSearchData, score, setScore }}>
      <BrowserRouter>
        <Routes>
          <Route index element={<Home />} />
          <Route path="game" element={<Game />} />
          <Route path="end" element={<EndGame />} />
        </Routes>
      </BrowserRouter>
    </AuthContext.Provider>

  );
}

export default App