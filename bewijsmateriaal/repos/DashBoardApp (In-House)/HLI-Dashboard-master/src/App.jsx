import React from "react";
import "./App.css";
import Weather from "./components/weather";
import Webstat from "./components/websitedata";

const App = () => {
  return (
    <>
      <div id="main-content">
        <div id="main-content-top">
          <div id="weather-widget">{<Weather />}</div>
        </div>
        <div id="main-content-bottom">
          <div id="websitedata-widget">{<Webstat />}</div>
        </div>
      </div>

    </>
  );
}


export default App;
