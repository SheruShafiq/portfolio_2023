import React, { useEffect, useState } from "react";
import "../styles/LoadingScreenStyles.css";
import CountUp from "react-countup";

function LoadingScreen() {
  // Define the state variable to keep track of the width of the loading line.
  const [width, setWidth] = useState(2);

  useEffect(() => {
    // Set the width to 60 after 0ms.
    const timer = setTimeout(() => {
      setWidth(60);
    }, 0);

    // Clear the timer when the component unmounts.
    return () => clearTimeout(timer);
  }, []);

  // Style for the loading line.
  const lineStyle = {
    height: "1px",
    width: `${width}%`,
    backgroundColor: "white",
    transition: "width 4s",
    marginTop: "20px",
    marginBottom: "20px",
  };

  // Render the loading screen with a CountUp component to show progress.
  return (
    <div id="overlay">
      <div id="count">
        <CountUp delay={0} end={100} duration={4} />
      </div>
      <div id="loadLine" style={lineStyle}></div>
      <p id="textItem">Loaded</p>
    </div>
  );
}

export default LoadingScreen;
