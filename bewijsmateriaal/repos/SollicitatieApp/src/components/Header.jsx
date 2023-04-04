// Import necessary libraries and files
import React from "react";
import logo from "../images/logo.png";
import Nav from "./NavMenu";
import "../styles/HeaderStyles.css";

// Define the Header component
function Header() {
  return (
    <div id="header">
      {/* Render the logo and link it to the homepage */}
      <a href="https://headline-interactive.nl/">
        <img id="logo" src={logo} alt="Logo" />
      </a>

      {/* Render the navigation menu */}
      <div id="menu">
        <Nav />
      </div>
    </div>
  );
}

// Export the Header component for use in other parts of the application
export default Header;
