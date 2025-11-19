import './App.css'
import {Router,Route,Routes, BrowserRouter} from 'react-router-dom'
import Home from './views/Home'
import Login from './views/Login'
import Dashboard from './views/Dashboard'
import Users from './views/Users'

export default function App(){
  return(
    <>
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Home />}/>
        <Route path="/Login" element={<Login/>}/>
        <Route path='/admin' element={<Dashboard/>}>
          <Route index element={<Home/>}/>
          <Route path='Users' element={<Users/>}/>
          </Route>
      </Routes>
    </BrowserRouter>
    </>
  )
}