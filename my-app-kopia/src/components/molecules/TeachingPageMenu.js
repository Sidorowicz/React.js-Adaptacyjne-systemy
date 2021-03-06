import React from "react";
import { IoMdCreate, IoMdBackspace, IoMdHome } from "react-icons/io";
import { motion } from "framer-motion";
import Logo from "../assets/Logo.png";

import { useHistory } from "react-router-dom";

import AccountMenu from "../atoms/AccountMenu";

const TeachingPageMenu = (props) => {
  const history = useHistory();

  const goBack = () => {
    history.goBack();
  };
  return (
    <>
      <div className="col-sm-auto bg-dark sticky-top ps-0 pe-0">
        <div className="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
          <a className="navbar-brand pt-0 pb-0 me-0" href="/">
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
                className="d-inline-block  mb-0"
              />
            </motion.div>
          </a>

          <ul className="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto  text-center justify-content-center w-100 align-items-center justify-content-md-center">
            <li className="nav-item">
              <a
                href="/newCourse"
                className="d-block p-3 link-light text-decoration-none"
                title=""
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                data-bs-original-title="Icon-only"
              >
                <IoMdCreate size={22} color="white" />
              </a>
            </li>
            <li className="nav-item">
              <a
                href="/teachingPage"
                className="d-block p-3 link-light text-decoration-none"
                title=""
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                data-bs-original-title="Icon-only"
              >
                <IoMdHome size={22} />
              </a>
            </li>
            <li className="nav-item">
              <div
                onClick={goBack}
                className="d-block p-3 link-light text-decoration-none"
                title=""
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                data-bs-original-title="Icon-only"
              >
                <IoMdBackspace size={22} />
              </div>
            </li>
          </ul>

          <AccountMenu nick={props.nick} />
        </div>
      </div>
    </>
  );
};

export default TeachingPageMenu;
