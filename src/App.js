import React from "react";
import { useState, useEffect } from "react/cjs/react.development";
import data from './index.json'

import {FirstTable} from './components/FirstTable'
import { SecondTable } from "./components/SecondTable";
// import getData from './data'

const App = () => {
  const [newData,] = useState([data])
  const [update, setUpdate] = useState('')

  const personInfo = newData[0].order.personinfo
  const generalOrder = newData[0].order.goods.good

  localStorage.setItem('data', JSON.stringify(newData))
  let getLocalData = JSON.parse(localStorage.getItem('data'))

  useEffect(() => {
    const stringData = JSON.stringify(newData)
    const getOldData = JSON.stringify(getLocalData)
    let updateStateData = ''

    if (stringData === getOldData) {
      updateStateData = 'Данные не обновлялись'
    }
    setUpdate(updateStateData)
  }, [newData, getLocalData])

  return (
    <div>
      <FirstTable personInfo={personInfo} />
      <SecondTable generalOrder={generalOrder} />
      {
        update ? update : "Данные изменились"
      }
    </div>
  );
}

export default App;
