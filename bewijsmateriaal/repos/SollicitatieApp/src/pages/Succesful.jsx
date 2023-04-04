import React from "react";
import "../styles/Succesful.css";
import Title from "../components/Title";
import "../App.css";
import Error from "../components/Error";

// The component to show a success message
function Succesful({ error }) {
  // If there is an error, show the Error component instead
  if (error) {
    return <Error />;
  }

  // Otherwise, show the success message with a checkmark icon
  return (
    <div id="resultParent">
      {/* The title */}
      <div id="titleApp">
        <Title titleText="Verzonden" subText="Die is binnen" />
      </div>
      {/* The checkmark icon */}
      <div id="checkMark">
        <svg
          className="checkmark"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 52 52"
        >
          <circle
            className="checkmark__circle"
            cx="26"
            cy="26"
            r="25"
            fill="none"
          />
          <path
            className="checkmark__check"
            fill="none"
            d="M14.1 27.2l7.1 7.2 16.7-16.8"
          />
        </svg>
      </div>
    </div>
  );
}

export default Succesful;
