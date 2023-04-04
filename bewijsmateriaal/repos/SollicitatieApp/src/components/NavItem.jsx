import React from "react";
import "../styles/NavItemStyles.css";

function NavItem(props) {
  const { url, buttonText } = props;
  const handleButtonClick = (event) => {
    event.preventDefault();
    window.location.href = url;
  };
  return (
    <>
      <div class="wrapper2">
        <button
          id="menuEffect2"
          class="pseudo-text-effect2"
          data-after={buttonText}
          onClick={handleButtonClick}
        >
          <span id="NavItemHeader" className="NavMenuItemNames">
            {buttonText}
          </span>
        </button>
      </div>
    </>
  );
}

export default NavItem;
