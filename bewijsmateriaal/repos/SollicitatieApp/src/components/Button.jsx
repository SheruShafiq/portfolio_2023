// Import the React library and ButtonStyles.css file
import React from "react";
import "../styles/ButtonStyles.css";

// Define the Button component using the spread operator to pass in any number of props
function Button(...props) {
  // Extract the "buttonText" and "onClick" props from the props object
  const buttonText = props[0].buttonText;
  const onClick = props[0].onClick;

  // Render the component with a div container with id "parentButton"
  // and a button element with id "submitComponent" and onClick handler
  return (
    <div id="parentButton">
      <button id="submitComponent" onClick={onClick}>
        {buttonText}
      </button>
    </div>
  );
}

// Export the Button component for use in other parts of the application
export default Button;
