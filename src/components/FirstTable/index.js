import './style.css'

export const FirstTable = ({ personInfo}) => {
  const { first_name, mobile_phone, tin} = personInfo
  return (
    <table className="table col">
      <thead>
        <tr>
          <th scope="col">О клиенте</th>
          <th scope="col">Name</th>
          <th scope="col">Mobile Phone</th>
          <th scope="col">TIN</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>{first_name}</td>
          <td>{mobile_phone}</td>
          <td>{tin}</td>
        </tr>
      </tbody>
    </table>
  )
}