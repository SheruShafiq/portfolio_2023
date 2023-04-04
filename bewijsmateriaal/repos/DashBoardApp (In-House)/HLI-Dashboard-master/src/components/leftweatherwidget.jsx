import React from 'react'


const WidgetRender = (props) => {
    const {dayName} = props
    const {currentDate} = props
    const {weatherData} = props
   
    return(
<div className="weather-side">
    <div className="weather-gradient"></div>
    <div className="date-container">
      <h2 className="date-dayname">{dayName}</h2>
      <span className="date-day">{currentDate}</span>
      <i className="location-icon" data-feather="map-pin"></i>
      <span className="location">{weatherData.liveweer[0].plaats}</span>
    </div>
    <div className="weather-container">
      <i className="weather-icon" data-feather="sun"></i>
      {<h1 className="weather-temp">{weatherData.liveweer[0].temp}°C</h1>}
      <h3 className="weather-desc">{weatherData.liveweer[0].samenv}</h3>
    </div>
  </div>
    )
}

export default WidgetRender