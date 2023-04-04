import React from 'react'
import Ga4 from "./formga4";
import Ua from "./form";

const WidgetRender = (props) => {
  const { data } = props
  const { ResponseToken } = props

  console.log(data)

  return (
    (data["type"] === "ua" ? (
      <Ua data={data} response={ResponseToken}></Ua>
    ) : (
      <Ga4 data={data} response={ResponseToken}></Ga4>
    ))


  )
}

export default WidgetRender