// Import necessary libraries and files
import React from "react";
import Title from "./Title";
import "../styles/Succesful.css";
import "../styles/ErrorPage.css";

// Define the Error component
function Error() {
  return (
    <div id="resultParent">
      {/* Render the title of the page */}
      <div id="titleApp">
        <Title titleText="Error..." subText="Probeer opnieuw" />
      </div>
      arduino Copy code
      {/* Render the error animation */}
      <div className="demo1">
        <div className="ui-error">
          <svg viewBox="0 0 87 87" version="1.1">
            <g
              id="Page-1"
              stroke="none"
              strokeWidth="1"
              fill="none"
              fillRule="evenodd"
            >
              <g id="Group-2" transform="translate(2.000000, 2.000000)">
                {/* Render the main circle */}
                <circle
                  id="Oval-2"
                  stroke="black"
                  strokeWidth="0.1"
                  cx="41.5"
                  cy="41.5"
                  r="41.5"
                />

                {/* Render the animated circle */}
                <circle
                  className="ui-error-circle"
                  stroke="white"
                  strokeWidth="0.5"
                  cx="41.5"
                  cy="41.5"
                  r="41.5"
                />

                {/* Render the X shape */}
                <path
                  className="ui-error-line1"
                  d="M22.244224,22 L60.4279902,60.1837662"
                  id="Line"
                  stroke="black"
                  strokeWidth="2"
                  strokeLinecap="square"
                />
                <path
                  className="ui-error-line2"
                  d="M60.755776,21 L23.244224,59.8443492"
                  id="Line"
                  stroke="black"
                  strokeWidth="2"
                  strokeLinecap="square"
                />
              </g>
            </g>
          </svg>
        </div>
      </div>
    </div>
  );
}

// Export the Error component for use in other parts of the application
export default Error;
