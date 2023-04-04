import React from 'react'

const weatherStats = (props) => {
  const { title } = props
  const { value } = props

  return (
    <div className="precipitation">

      <span className="title">{title}</span>
      <span className="value">{value}</span>
      <div className="clear"></div>
    </div>
  )
}

export default weatherStats