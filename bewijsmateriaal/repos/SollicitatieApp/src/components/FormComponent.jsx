import React, { useState } from "react";
import emailjs from "emailjs/browser";
import "../styles/FormStyles.css";
import TextField from "@mui/material/TextField";
import { useNavigate } from "react-router-dom";
import CountUp from "react-countup";
import { textFieldProps } from "./textfieldProps";

// Component to handle the contact form
function FormComponent() {
  const navigate = useNavigate();
  const [error, setError] = useState(""); // state to handle error messages
  const [isLoading, setIsLoading] = useState(false); // state to handle loading status
  const handleButtonClick = () => {}; // function to handle the button click event
  // Function to handle the form submit event

  const handleFormSubmit = async (e) => {
    e.preventDefault(); // prevent the default form submission
    setIsLoading(true); // set loading to true
    try {
      // use emailjs to send the email
      await emailjs.sendForm(
        process.env.REACT_APP_EMAILJS_SERVICE_ID,
        process.env.REACT_APP_EMAILJS_TEMPLATE_ID,
        e.target,
        process.env.REACT_APP_EMAILJS_USER_ID
      );
      // wait for 3 seconds to simulate delay
      await new Promise((resolve) => setTimeout(resolve, 3000));
      console.log("Email sent");
      setIsLoading(false); // set loading to false
      navigate("/result", { error: error }); // navigate to the result page
    } catch (error) {
      setError(error); // set the error message
      navigate("/result", { error: error }); // navigate to the result page
    }
  };
  const sendEmail = async (e) => {
    e.preventDefault();
    setIsLoading(true);
    try {
      await emailjs.sendForm(
        "service_nh0au8c",
        "template_k07o36l",
        e.target,
        "WaOT6BUTbyQbhGR8B"
      );
      await new Promise((resolve) => setTimeout(resolve, 3000)); // 3 sec
      console.log("Email sent");
      setIsLoading(false);
      setError("error");
      navigate("/result", { error: error });
    } catch (error) {
      setError(error);
      navigate("/result", { error: error });
    }
  };
  // Divide the text fields into two equal halves
  const half = Math.ceil(textFieldProps.length / 2);
  const textFieldPropsIn = textFieldProps;
  // Render the component
  return (
    <>
      <div className="FormDesktop">
        <form className="contact__form" onSubmit={handleFormSubmit}>
          <div id="firstHalf">
            {/* Render the first half of the text fields */}
            {textFieldProps.slice(0, half).map((textField) => (
              <TextField
                key={textField.id}
                variant="standard"
                placeholder=""
                id="inputField"
                InputLabelProps={{
                  style: { fontFamily: "Poppins", color: "white" },
                }}
                inputProps={{
                  style: {
                    fontFamily: "Poppins",
                    color: "white",
                    marginTop: "0.5rem",
                  },
                }}
                sx={{
                  input: { color: "white" },
                  width: "768px",
                  marginTop: "1rem",
                  color: "white",
                  "& .MuiInput-underline:after": {
                    borderBottomColor: "rgb(255, 255, 255, 0.3)",
                    borderBottomWidth: "1px",
                  },
                  "& .MuiInput-underline:before": {
                    borderBottomWidth: "1px",
                    borderBottomColor: "rgb(255, 255, 255, 0.3)",
                  },
                }}
                {...textField}
              />
            ))}
          </div>
          <div id="secondHalf">
            {/* Render the second half of the text fields */}
            {textFieldProps.slice(half).map((textField) => (
              <TextField
                key={textField.id}
                variant="standard"
                placeholder=""
                InputLabelProps={{
                  style: { fontFamily: "Poppins", color: "white" },
                }}
                inputProps={{
                  style: {
                    fontFamily: "Poppins",
                    color: "white",
                    marginTop: "0.5rem",
                  },
                }}
                sx={{
                  input: { color: "white" },
                  width: "768px",

                  marginTop: "1rem",
                  color: "white",
                  "& .MuiInput-underline:after": {
                    borderBottomColor: " rgb(255,255,255, 0.3)",
                    borderBottomWidth: "1px",
                  },
                  "& .MuiInput-underline:before": {
                    borderBottomWidth: "1px",
                    borderBottomColor: " rgb(255,255,255, 0.3)",
                  },
                }}
                {...textField}
              />
            ))}
          </div>
          <div id="secondHalf">
            {textFieldPropsIn.slice(half).map((textField) => (
              <TextField
                // x
                key={textField.id}
                variant="standard"
                placeholder=""
                InputLabelProps={{
                  style: { fontFamily: "Poppins", color: "white" },
                }}
                inputProps={{
                  style: {
                    fontFamily: "Poppins",
                    color: "white",
                    marginTop: "0.5rem",
                  },
                }}
                sx={{
                  input: { color: "white" },
                  width: "768px",
                  marginTop: "1rem",
                  color: "white",
                  "& .MuiInput-underline:after": {
                    borderBottomColor: " rgb(255,255,255, 0.3)",
                    borderBottomWidth: "1px",
                  },
                  "& .MuiInput-underline:before": {
                    borderBottomWidth: "1px",
                    borderBottomColor: " rgb(255,255,255, 0.3)",
                  },
                }}
                {...textField}
              />
            ))}
            {/* These are the submit buttons that switch depending on the state */}
            <div id="inputFields">
              <input
                type="submit"
                value="Verzenden"
                id="submitForm"
                onClick={handleButtonClick}
              />
              {isLoading ? (
                <div id="submitFormProcessing">
                  <CountUp delay={1} end={100} />
                  <p> % </p>
                </div>
              ) : null}
            </div>
          </div>
        </form>
      </div>
      <div className="FormMobile">
        <form className="contact__form" onSubmit={sendEmail}>
          {textFieldPropsIn.map((textField) => (
            <TextField
              // x
              key={textField.id}
              variant="standard"
              placeholder=""
              InputLabelProps={{
                style: { fontFamily: "Poppins", color: "white" },
              }}
              inputProps={{
                style: {
                  fontFamily: "Poppins",
                  color: "white",
                  marginTop: "0.5rem",
                },
              }}
              sx={{
                input: { color: "white" },
                width: "100%",
                marginTop: "1rem",
                color: "white",
                "& .MuiInput-underline:after": {
                  borderBottomColor: " rgb(255,255,255, 0.3)",
                  borderBottomWidth: "1px",
                },
                "& .MuiInput-underline:before": {
                  borderBottomWidth: "1px",
                  borderBottomColor: " rgb(255,255,255, 0.3)",
                },
              }}
              {...textField}
            />
          ))}
          <div id="inputFields">
            <input
              type="submit"
              value="Verzenden"
              id="submitForm"
              onClick={handleButtonClick}
            />
            {isLoading ? (
              <div id="submitFormProcessing">
                <CountUp delay={1} end={100} />
                <p> % </p>
              </div>
            ) : null}
          </div>
        </form>
      </div>
    </>
  );
}

export default FormComponent;
