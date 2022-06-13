import React from "react";
import { Link } from "react-router-dom";

//logo
import Logo from ".././assets/Logo.png";

//motion
import { motion } from "framer-motion";

//style

import "../../App.css";

//components
import AccountMenu from "../atoms/AccountMenu";

const Menu = ({ setSearch, visible, nick, type, id }) => {
  const handleChange = (e) => {
    setSearch(e.target.value);
  };

  return (
    <>
      <nav className="navbar color-black navbar-expand-md pt-0 pb-0  fixed-top border shadow navbarColor">
        <a className="navbar-brand pt-0 pb-0" href="/">
          <motion.div
            whileHover={{ scale: 1.1, rotate: 20 }}
            whileTap={{
              scale: 0.8,
              rotate: -20,
              borderRadius: "5%",
            }}
          >
            <img
              src={Logo}
              width="50"
              height="50"
              alt="logo"
              className="d-inline-block ms-4 me-1 mb-0"
            />
          </motion.div>
        </a>
        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#mainmenu"
          aria-expanded="false"
          aria-controls="mainmenu"
          aria-label="przełacznik nawigacji"
        >
          <span className="navbar-toggler-icon"></span>
        </button>

        <div className="collapse navbar-collapse" id="mainmenu">
          <ul className="navbar-nav me-auto mb-2 mb-lg-0 mr-auto color-black">
            <div className="col-xl-12">
              {visible !== true ? (
                <div className="input-group ">
                  <input
                    className="form-control border-end border rounded-pill border-dark pp"
                    type="text"
                    id="example-search-input"
                    onChange={handleChange}
                  />
                </div>
              ) : (
                <></>
              )}
            </div>
          </ul>
          <div className="nav-item mr-auto">
            <Link to="/" className="nav-link text-black">
              Kursy
            </Link>
          </div>
          <div className="nav-item mr-2">
            <Link to="/teachingPage" className="nav-link text-black">
              Tryb nauczyciela
            </Link>
          </div>
          <AccountMenu nick={nick} type={type} id={id} />
        </div>
      </nav>
    </>
  );
};
export default Menu;
