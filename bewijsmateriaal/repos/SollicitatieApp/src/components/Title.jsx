import React from "react";
import PropTypes from "prop-types";
import "../styles/TitleStyles.css";

/**
 * Title component that displays a main title and sub-text.
 * @param {Object} props - Props for Title component.
 * @param {string} props.titleText - The main title text.
 * @param {string} props.subText - The sub-text.
 */
function Title(props) {
  const { titleText, subText } = props;

  return (
    <div className="title">
      <p id="titleSubText">{subText}</p>
      <h1 style={{ wordWrap: "break-word" }}>{titleText}</h1>
    </div>
  );
}

Title.propTypes = {
  titleText: PropTypes.string.isRequired,
  subText: PropTypes.string,
};

Title.defaultProps = {
  subText: "",
};

export default Title;
