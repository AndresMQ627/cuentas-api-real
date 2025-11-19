import './login.css';
import { useState } from 'react';
export default function Login() {

const [email, setEmail] = useState("admin@gmail.com")
const [password, setPassword] = useState("123")

const submit = async (e) => {
    e.preventDefault();
    try {
      const res = await fetch("http://localhost:8000/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          email: email,
          password: password
        })
      });
  
      const data = await res.json(); // <-- AQUÍ EL CAMBIO
      console.log("respuesta:", data);
  
    } catch (err) {
      console.log(err);
    }
  };
  
  return (
    <section className="vh-100">
      <div className="container py-5 h-100">
        <div className="row d-flex align-items-center justify-content-center h-100">

          <div className="col-md-8 col-lg-7 col-xl-6">
            <img
              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
              className="img-fluid"
              alt="Phone"
            />
          </div>

          <div className="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form onSubmit={submit}>

            <h2 className="text-center mb-4">Login</h2>
              <div className="form-outline mb-4">
                <input
                value={email}
                onChange={(e)=>setEmail(e.target.value)}
                  type="email"
                  id="email"
                  className="form-control form-control-lg"
                />
                <label className="form-label" htmlFor="email">
                  Email address
                </label>
              </div>

              <div className="form-outline mb-4">
                <input
                value={password}
                onChange={(e)=>setPassword(e.target.value)}
                  type="password"
                  id="password"
                  className="form-control form-control-lg"
                />
                <label className="form-label" htmlFor="password">
                  Password
                </label>
              </div>

              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="form-check">
                  <input
                    className="form-check-input"
                    type="checkbox"
                    id="rememberMe"
                    defaultChecked
                  />
                  <label className="form-check-label" htmlFor="rememberMe">
                    Remember me
                  </label>
                </div>

                <a href="#!">Forgot password?</a>
              </div>

              <button
                type="submit"
                className="btn btn-primary btn-lg btn-block w-100"
              >
                Sign in
              </button>

              <div className="divider d-flex align-items-center my-4">
                <p className="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
              </div>

              <a
                className="btn btn-primary btn-lg btn-block w-100 mb-2"
                style={{ backgroundColor: "#3b5998" }}
                href="#!"
              >
                <i className="fab fa-facebook-f me-2"></i>
                Continue with Facebook
              </a>

              <a
                className="btn btn-primary btn-lg btn-block w-100"
                style={{ backgroundColor: "#55acee" }}
                href="#!"
              >
                <i className="fab fa-twitter me-2"></i>
                Continue with Twitter
              </a>

            </form>
          </div>

        </div>
      </div>
    </section>
  );
}
