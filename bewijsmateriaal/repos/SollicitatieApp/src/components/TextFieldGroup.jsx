import React from "react";
import TextField from "@mui/material/TextField";

import "../styles/FormStyles.css";

function TextFieldGroup(props) {
  const { textFieldProps } = props;

  return (
    <>
      {textFieldProps.map((textField) => (
        <TextField
          key={textField.id}
          variant="standard"
          placeholder=""
          id="inputField"
          InputLabelProps={{
            style: { fontFamily: "Poppins", color: "white", fontSize: "20px" },
          }}
          inputProps={{
            style: {
              fontFamily: "Poppins",
              color: "white",
              marginTop: "1rem",
            },
          }}
          {...textField}
        />
      ))}
    </>
  );
}

export default TextFieldGroup;
