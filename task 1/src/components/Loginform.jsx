import React from 'react'
import './Loginform.css'
import { useState } from "react";

export const Loginform = () => {

    const [action, setAction] = useState("Login");
    const [confirmPassword, setConfirmPassword] = useState("");
    const [email, setEmail] = useState("");
    const [Password, setPassword] = useState("");
    const [Username, setUsername] = useState("");




      const handleLogin = () => {
        setAction("Login");
        setEmail("");
        setPassword("");
        setUsername("");
        setConfirmPassword("");  
      }
      
      const handleSignup = () => {
        setAction("Signup");
        setEmail("");
        setPassword("");
        setUsername("");
        setConfirmPassword("");
      }

  return (
    <div className="login">
        <div className="container">
        <div className="header">
            <div className="text">{action}</div>
            <div className="line"></div>
        </div>
        <div className="inputs">
            
            {action==="Login" ? <div></div> : <div className="input">
                <label htmlFor="">Username :</label>
                <input type="text" placeholder="Username" onChange={(event) => {setUsername(event.target.value);}}/>
            </div>}

            <div className="input">
                <label htmlFor="">Email :</label>
                <input type="email" placeholder="Email" onChange={(event) => {setEmail(event.target.value);}} />
            </div>
            <div className="input">
                <label htmlFor="">Password :</label>
                <input type="password" placeholder="Password" onChange={(event) => {setPassword(event.target.value);}}/>
            </div>

            {action==="Login" ?
            <div className="forgot-password"><span>forgot password</span></div> : <div className="input">
            <label htmlFor="">ConfirmPassword :</label>
            <input type="password" placeholder="Password" onChange={(event) => {setConfirmPassword(event.target.value);}}/>
        </div>
}

<div className="submitbtn">
<button type="button" className='submit'>Submit</button>
</div>
        </div>
        <div className="buttons">
        <div className={`submit ${action === "Login" ? "grey" : ""}`} onClick={handleLogin}>Login</div>
<div className={`submit ${action === "Signup" ? "grey" : ""}`} onClick={handleSignup}>Signup</div>
        </div>

    </div>
    </div>
  )
}
