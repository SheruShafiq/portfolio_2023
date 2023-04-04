import React from 'react'

const projectsNameDropDown = (props) => {
  const { Projects } = props
  const { onChange } = props


  return (
    <div id="addwid">
      <select id="CoolBestStawberyOrange"
        onChange={onChange}
      >
        <option value="" id="selectOptions"> --Select Project--</option>
        {Projects.ProjectNames.map((result, key) => (
          <option value={key} key={key}>
            {result.name}
          </option>
        ))}
      </select>
    </div>
  )
}

export default projectsNameDropDown