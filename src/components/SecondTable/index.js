




export const SecondTable = ({ generalOrder }) => {

  // const obj = generalOrder.map((item) => item.id)
  // console.log(obj);

  return (
    <table className="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Amount</th>
        </tr>
      </thead>
      <tbody>
        
          {
            generalOrder.map((item, idx) => {
              
              return (
                <tr key={idx}>
                <th scope="row" >{idx + 1}</th>
                  <td>{item.name}</td>
                  <td>{item.price}</td>
                  <td>{item.amount}</td>
                </tr>
              )
            })
          }
        
        
        {/* <tr>
          <th scope="row">1</th>
          <td>{first_name}</td>
          <td>{mobile_phone}</td>
          <td>{tin}</td>
        </tr> */}
      </tbody>
    </table>
  )
}