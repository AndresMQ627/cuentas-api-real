import Sidebar from '../layouts/Sidebar'
import Header from '../layouts/Header'
import {Outlet} from 'react-router-dom'
function Dashboard() { 
  return (
    <>
<div className="d-flex">
    
    <Sidebar/>

    <div className="content-area flex-grow-1">

       <Header/>
       <Outlet/>
        

    </div>
</div>
    </>
  )
}

export default Dashboard
