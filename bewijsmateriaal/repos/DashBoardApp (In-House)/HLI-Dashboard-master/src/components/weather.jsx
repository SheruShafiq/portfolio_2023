import axios from "axios";
import React, { useEffect, useState } from "react";
import "../components/weather.css";
import giffyLoad from "../assets/loading-gif.gif";
import LeftWeatherWidget from "./leftweatherwidget";
import RightWeatherWidget from "./rightweatherwidget";

const Weather = () => {
  const [weatherData, setWeatherData] = useState({});
  const [isLoading, setLoading] = useState(true);

  useEffect(() => {
    const fetchWeatherData = async () => {
      const response = await axios.get(
        "https://weerlive.nl/api/json-data-10min.php?key=3932a19976&locatie=Hilversum"
      );
      setWeatherData(response.data);
      setLoading(false);
    };
    fetchWeatherData();
    const interval = setInterval(() => fetchWeatherData(), 50000);
    return () => clearInterval(interval);
  }, []);

  const currentDate = new Date();
  const monthNames = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];
  const dateOptions = { weekday: "long" };
  const dayName = currentDate.toLocaleDateString("en-US", dateOptions);
  const dayNum = currentDate.getDate();
  const month = monthNames[currentDate.getMonth()];
  const year = currentDate.getFullYear();
  const displayDate = `${dayNum} ${month} ${year}`;

  const getNextDate = (offset) => {
    const date = new Date();
    date.setDate(date.getDate() + offset);
    return date;
  };

  const dateOption = { weekday: "short" };
  const dayNameToday = currentDate.toLocaleDateString("en-US", dateOption);
  const dayNameTomorrow = getNextDate(1).toLocaleDateString("en-US", dateOption);
  const dayNameDayAfterTomorrow = getNextDate(2).toLocaleDateString("en-US", dateOption);



  if (isLoading) {
    return (
      <div id="sunDiv">
        <img id="loading" src={giffyLoad} alt="" />
      </div>
    );
  }
  return (
    <div className="container">
      
      <LeftWeatherWidget
        weatherData={weatherData}
        dayName={dayName}
        displayDate={displayDate}
      />
      <RightWeatherWidget 
        weatherData={weatherData}
        dayNameToday={dayNameToday}
        dayNameTomorrow={dayNameTomorrow}
        dayNameDayAfterTomorrow={dayNameDayAfterTomorrow}
      />
    </div>
  );
};

export default Weather;
