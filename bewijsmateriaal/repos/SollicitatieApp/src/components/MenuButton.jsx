import React from "react";
import "../styles/MenuButtonStyles.css";

function MenuButton(props) {
  const handleClick = props.onchange;

  return (
    <>
      <div class="wrapper">
        <button
          id="menuEffect"
          class="pseudo-text-effect"
          data-after="Menu"
          onClick={handleClick}
        >
          <span id="menuButtonHeader" className="NavMenuItemNames">
            Menu
          </span>
        </button>
      </div>
    </>
  );
}

export default MenuButton;
