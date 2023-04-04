import { useEffect } from "react";
import { useLocation } from "react-router-dom";

/**
 * Component that scrolls to the top of the page when the route changes.
 */
export default function ScrollToTop() {
  const { pathname } = useLocation();

  useEffect(() => {
    // Select the root element to scroll into view
    const rootElement = document.querySelector("#root");

    // Scroll to the root element with smooth behavior and a duration of 500ms
    rootElement.scrollIntoView({
      behavior: "smooth",
      duration: 500,
    });
  }, [pathname]);

  // This component doesn't render anything, so it returns null
  return null;
}
