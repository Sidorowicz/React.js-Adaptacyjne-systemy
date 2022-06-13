import React from "react";

function TakeQuiz({ quiz }) {
  return (
    <>
      <div>
        <div className="question-box mb-5 d-flex justify-content-center">
          <div className="questionchange" style={{ textAlign: "left" }}>
            <h1>{`Question: ${quiz.question}`}</h1>
            <br />

            <div>
              <input
                type="checkbox"
                className="option"
                color="primary"
                name={`${quiz.id}[0]`}
                value="A"
              />
              <span>{quiz.A}</span>
            </div>
            <div>
              <input
                type="checkbox"
                className="option"
                color="primary"
                name={`${quiz.id}[1]`}
                value="B"
              />
              <span>{quiz.B}</span>
            </div>
            <div>
              <input
                type="checkbox"
                className="option"
                color="primary"
                name={`${quiz.id}[2]`}
                value="C"
              />
              <span>{quiz.C}</span>
            </div>
            <div>
              <input
                type="checkbox"
                className="option"
                color="primary"
                name={`${quiz.id}[3]`}
                value="D"
              />
              <span>{quiz.D}</span>
            </div>
          </div>
          <br />
          <div className="buttons"></div>
        </div>
      </div>
    </>
  );
}

export default TakeQuiz;
