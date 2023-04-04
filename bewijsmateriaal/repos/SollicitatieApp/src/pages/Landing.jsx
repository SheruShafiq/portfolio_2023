import React, { useEffect } from "react";
import "../App.css";
import Title from "../components/Title";
import LandingPageContent from "../components/LandingPageContent";
import Button from "../components/Button";
import { useNavigate } from "react-router-dom";
import "../styles/LandingPageRoute.css";
import LoadingScreen from "../components/LoadingScreen";

function LandingPage() {
  // Disable scrolling on mount
  useEffect(() => {
    window.scrollTo(0, 0);
    document.body.style.overflow = "hidden";

    // Enable scrolling after 3 seconds
    const timeoutId = setTimeout(() => {
      document.body.style.overflow = "auto";
    }, 3000);

    // Clear the timeout when the component unmounts to avoid memory leaks
    return () => clearTimeout(timeoutId);
  }, []);

  const navigate = useNavigate();

  const handleButtonClick = () => {
    navigate("/form");
  };

  return (
    <>
      {/* Show a loading screen while the app is loading */}
      <div id="LoadingScreenLanding">
        <LoadingScreen />
      </div>

      <div id="LandingParent">
        <div id="landingPage">
          <div id="titleApp">
            <Title
              titleText="Stagair Backend Developer"
              subText="Stage bij HI"
            />
          </div>
          <div id="mainContent">
            <LandingPageContent />
            <div id="buttonApp">
              <Button
                buttonText="Geïnteresseerd?"
                onClick={handleButtonClick}
              />
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default LandingPage;
