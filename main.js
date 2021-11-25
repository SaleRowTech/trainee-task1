let input = document.querySelector("input");



input.addEventListener("change", async e => {
    let file;

    file = e.target.files[0];

    let fileContent = await file.text(),
        jsonData = JSON.parse(fileContent);

    /* person */
    let person = jsonData.order.personinfo;

    for (let i in person) {

        personinfo = `<td><ul><li>ФИО:</li><li>Номер мобильного:</li><li>Идентификационный код</li></ul></td> \ 
                    <td><ul><li>${person.surname}  ${person.first_name}</li><li>${person.mobile_phone}</li><li>${person.tin}</li></ul></td>`;

        document.getElementById('person').innerHTML = `<tr>${personinfo}</tr>`;
    }

    

    /* items */
    let itemOrder = '',
        item = '',
        items = jsonData.order.goods.good;

    for (let i in items) {

        itemOrder = `<td>${jsonData.order.orderid}<br>${items[i].id}</td>`;

        item = `<td><ul><li>Название</li><li>цена</li><li>Количество</li></ul></td> \  
               <td><ul><li>${items[i].name}</li><li>${items[i].price}</li><li>${items[i].amount}</li></ul></td>`;

        document.getElementById('items').innerHTML += `<tr>${itemOrder + item}</tr>`;
    }

});
