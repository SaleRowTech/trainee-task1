const saveUserData = [{"order": {
    "orderid": "800787247",
    "bareme_code": "5120",
    "term_of_loan": "6",
    "goods": {
      "good": [
        {
          "id": "718684",
          "name": "Бассейн надувной\n                One Two Fun, бирюзовый, 262х175х51\n                см\n            ",
          "price": "650",
          "amount": "1",
          "classificationid": "2532",
          "classificationname": "Отдых на открытом\n                воздухе\n            "
        },
        {
          "id": "645488",
          "name": "Welcome пакет (Карта Лояльности)",
          "price": "1",
          "amount": "1",
          "classificationid": "2592",
          "classificationname": "Телефоны и аксессуары"
        }
      ]
    },
    "personinfo": {
      "surname": "Тест",
      "first_name": "Тест",
      "patronymic_name": "Тест",
      "tin": "1111111111",
      "birthday": "1900-11-11",
      "mobile_phone": "0000000000"
    }
  }

}];

const userData = JSON.stringify(saveUserData);
export const userDataParse = JSON.parse(userData);

console.log(userDataParse);
