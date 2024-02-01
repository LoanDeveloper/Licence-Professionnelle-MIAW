import React, { useContext, useEffect, useState } from 'react'

const FirstWord = (props) => {

  return <section className='firstWord'>
    <p className='firstWord__name'>"{props.name}"</p>
    <p className='firstWord__description'>a</p>
    <p className='firstWord__description'>{props.search}</p>
    <p className='firstWord__description'>recherches mensuelles</p>
  </section>
};

export default FirstWord;
