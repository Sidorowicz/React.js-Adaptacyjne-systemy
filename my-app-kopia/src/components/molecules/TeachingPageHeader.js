import React from "react";
import { MdSearch } from "react-icons/md";

import { Link } from "react-router-dom";

const TeachingPageHeader = (props) => {
  const handleChange = (e) => {
    props.setSearch(e.target.value);
  };
  return (
    <>
      <div className="text-start">
        <h2>Kurs</h2>
      </div>
      <hr />
      <div className="row">
        <div className="col-6 col-md-4">
          <form className="form-inline">
            <div className="input-group w-75">
              <input
                type="text"
                className="form-control"
                id="inputShare"
                placeholder="Wyszukaj swoj kurs"
                onChange={handleChange}
              />
              <button type="submit" className="btn btn-dark ">
                <MdSearch />
              </button>
            </div>
          </form>
        </div>
        <div className="col-6 col-md-8 ">
          <Link
            to="/newCourse"
            className="btn btn-primary rounded-0 mr-auto float-end"
          >
            Nowy kurs
          </Link>
        </div>
      </div>
      <div></div>
    </>
  );
};

export default TeachingPageHeader;
