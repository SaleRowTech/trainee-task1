export default class dataClass {
  data = [
    {
      "order": {
        "orderid": "800787247",
        "bareme_code": "5120",
        "term_of_loan": "6",
        "goods": {
          "good": [
            {
              "id": "718684",
              "name": "Бассейн надувной One Two Fun, бирюзовый, 262х175х51 см",
              "price": "650",
              "amount": "1",
              "classificationid": "2532",
              "classificationname": "Отдых на открытом воздухе"
            },
            {
              "id": "645488",
              "name": "Welcome пакет (Карта Лояльности)",
              "price": "456",
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
    }
  ]

  getData() {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        resolve(this.data)
        reject(new Error("Something is wrong"))
        console.log("data", this.data);
      }, 4700)
    })
  }
}