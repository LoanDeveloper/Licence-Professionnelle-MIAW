import React, { useContext, useEffect, useState } from 'react'

const SearchWord = (props) => {

  return <section className='searchWord'>
    <p className='searchWord__description'>"{props.name}"</p>
    <p className='searchWord__description'>a</p>
    <button onClick={() => props.isMore()} className='searchWord__button'>Plus</button>
    <button onClick={() => props.isLess()} className='searchWord__button'>Moins</button>
    <p className='searchWord__description'>de recherches que "{props.firstSearch}" ?</p>
  </section>
};

export default SearchWord;
