import React, { useState } from "react";
import "../styles/NavMenuStyles.css";
import logo from "../images/logo.png";
import MenuButton from "./MenuButton";
import NavItem from "./NavItem";
function NavMenu() {
  // Define the state variable to keep track of the menu's open/closed state.
  const [isOpen, setIsOpen] = useState(false);

  // Toggle the menu's open/closed state.
  const handleToggle = () => {
    setIsOpen(!isOpen);
  };

  // Define an array of navigation links with their labels and URLs.
  const navLinks = [
    { id: 1, name: "Home", url: "https://headline-interactive.nl/" },
    { id: 2, name: "Cases", url: "https://headline-interactive.nl/cases/" },
    { id: 3, name: "Over ons", url: "https://headline-interactive.nl/about/" },
    {
      id: 4,
      name: "Vacatures",
      url: "https://headline-interactive.nl/werken-bij-hi/",
    },
    {
      id: 5,
      name: "Contact",
      url: "https://headline-interactive.nl/contact/",
    },
  ];

  // Render the menu with the navigation links.
  return (
    <>
      <MenuButton url="http://localhost:3000/" onchange={handleToggle} />

      <button className="button" id="menuDots" onClick={handleToggle}>
        ...
      </button>

      <nav className={`overlay-nav ${isOpen ? "open" : ""}`} id="NavMenu12">
        <button className="button" id="InmenuDots" onClick={handleToggle}>
          ...
        </button>
        {navLinks.map((navLink) => (
          <NavItem
            key={navLink.id}
            url={navLink.url}
            buttonText={navLink.name}
          />
        ))}
        <a href="https://headline-interactive.nl/">
          <img id="InmenuLogo" src={logo} alt="Logo" />
        </a>
      </nav>
    </>
  );
}

export default NavMenu;
