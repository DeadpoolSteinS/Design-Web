import { useState } from 'react';
import './App.css';
import Form from './components/Form'
import Result from './components/Result'

function App() {
  const [result, setResult] = useState(false);
  const [data, setData] = useState({});

  const funcSetData = (nama, lahir, kelamin, hobi, agama, pesan) => {
    setData({
      name     : nama,
      born     : lahir,
      sex      : kelamin,
      hobby    : hobi,
      religion : agama,
      message  : pesan
    });
    setResult(true);
  }

  if(result == true){
    return (
      <div className="App">
        <h1>Biodata</h1>
        <Form setData={funcSetData}/>
        <Result data={data}/>
      </div>
    );
  }
  else{
    return (
      <div className="App">
        <h1>Biodata</h1>
        <Form setData={funcSetData}/>
      </div>
    );
  }
}

export default App;
