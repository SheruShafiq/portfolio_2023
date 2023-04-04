import "./websitedata.css";
import React, { useState } from "react";
import Projects from "./sites.json";
import { useGoogleLogin } from "@react-oauth/google";
import ProjectsNameDropDown from "./projectsNameDropDown";
import WidgetRender from "./WidgetRender";

const Websitedata = () => {
  const [selectedOptions, setSelectedOptions] = useState(Array(5).fill(""));
  const [ResponseToken, setResponseToken] = useState("");
  const [loggedin, setloggedin] = useState(false);

  const login = useGoogleLogin({
    select_account: false,
    onSuccess: async (response) => {
      try {
        setResponseToken(response.access_token);
        setloggedin(true);
      } catch (err) {
        console.error(err);
      }
    },
    scope: "https://www.googleapis.com/auth/analytics.readonly",
    options: "loginAuthCodeFlow"
  });

  const handleProjectDropdownChange = (index) => (e) =>
    setSelectedOptions((options) => {
      const newOptions = [...options];
      newOptions[index] = Projects["ProjectNames"][e.target.value];
      return newOptions;
    });

  return (
    <div className="wrapper">
      {!loggedin ? (
        <>
          {Array(5)
            .fill("")
            .map((_, index) => (
              <ProjectsNameDropDown
                key={index}
                onChange={handleProjectDropdownChange(index)}
                Projects={Projects}
              />
            ))}
        </>
      ) : (
        <>
          {selectedOptions.map((data, index) => (
            <WidgetRender
              key={index}
              data={data}
              ResponseToken={ResponseToken}
            />
          ))}
        </>
      )}

      {!loggedin && (
        <button id="submit" onClick={login}>
          Continue with Google
        </button>
      )}
    </div>
  );
};

export default Websitedata;
