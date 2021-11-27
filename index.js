import { userDataParse } from "./parse/parse.js";

// Первая таблица


const сlientDataOutputTable = add => {
      console.log(add);
    return `
    <tr>
        <td>${add.order.personinfo.surname}</td>
        <td>${add.order.personinfo.mobile_phone}</td>
        <td>${add.order.personinfo.tin}</td>
        <td>Обновление</th>
  </tr>`;
  };
  
  const firstTable = document.querySelector('.сolumnNames');

  const makeLine = userDataParse.map(сlientDataOutputTable)
  .join('');

  firstTable.insertAdjacentHTML('beforeend', makeLine);
  console.log(makeLine);


// Вторая таблица

  
  const objName = userDataParse.map(number => number.order.goods.good[0].name);
  console.log(objName);
  
  const objId = userDataParse.map(number => number.order.goods.good[0].id);
  console.log(objId);
  
  const objPrice = userDataParse.map(number => number.order.goods.good[0].price);
  console.log(objPrice);
  
  const objAmount = userDataParse.map(number => number.order.goods.good[0].amount);
  console.log(objAmount);
  
  
  
  const informationAboutOrder = customerOrder => {
        console.log(customerOrder);
        
      return `
      <tr>
          <th>${objName}</th>
          <th>${customerOrder.order.orderid} + ${objId}</th>
          <th>${objPrice}</th>
          <th>${objAmount}</th>
          <th>Обновление</th>
        </tr>`;
    };
    console.log(informationAboutOrder);
    
    const secondTable = document.querySelector('.table');
  
    const insertLines = userDataParse.map(informationAboutOrder)
    .join('');
  
    console.log(insertLines);
    secondTable.insertAdjacentHTML('beforeend', insertLines);
    console.log(insertLines);


// localStorage;


  localStorage.setItem('my-table', JSON.stringify(userDataParse));
  let saveData = localStorage.getItem('my-table');
  
  const parseData = JSON.parse(saveData);
  console.log(parseData);

  const tableDate = JSON.stringify(userDataParse);
  const oldDate = JSON.stringify(saveData);
  let updatedData = '';

  if (tableDate === oldDate) {
    updatedData = "Данные не обновились";
  } 
  updatedData = "Данные обновились";
