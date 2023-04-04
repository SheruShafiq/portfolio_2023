import React from 'react'

const dayiconlabel = ({ day, temp }) => {
  return (
    <>
      <i className="day-icon" data-feather="sun"></i>
      <span className="day-name">{day}</span>
      <span className="day-temp">{temp}°C</span>
    </>
  )
}

export default dayiconlabel
