export const textFieldProps = [
  { id: "name-field", type: "text", name: "name", label: "Naam" },
  {
    id: "date-field",
    type: "date",
    name: "date",
    label: "Geboortedatum",
    focused: true,
    sx: {
      "& .MuiInputBase-input": {
        textAlignLast: "center",
      },

      width: "100%",
      marginTop: "2rem",
      color: "white",
      "& .MuiInput-underline:after": {
        borderBottomColor: " rgb(255,255,255, 0.1)",
        borderBottomWidth: "1px",
      },
      "& .MuiInput-underline:before": {
        borderBottomWidth: "1px",
        borderBottomColor: " rgb(255,255,255, 0.3)",
      },
    },
    InputLabelProps: {
      style: { fontFamily: "Poppins", color: "white", fontSize: "20px" },
    },
    inputProps: {
      style: {
        fontFamily: "Poppins",
        color: "white",
        marginTop: "1rem",
      },
    },
  },
  { id: "email-field", type: "email", name: "email", label: "Email" },
  { id: "tel-field", type: "tel", name: "tel", label: "Telefoon" },
  { id: "github-field", type: "url", name: "github", label: "GitHub" },
  { id: "linkdin-field", type: "url", name: "linkdin", label: "Linkdin" },
  {
    id: "portfolio-field",
    type: "url",
    name: "portfolio",
    label: "Portfolio website",
  },
  {
    id: "opleiding-field",
    type: "text",
    name: "Opleiding",
    label: "Opleiding",
  },
  {
    id: "solicitatiebrief-field",
    type: "file",
    name: "Solicitatie brief",
    label: "Solicitatie brief",
    sx: {
      "& .MuiInputBase-input": {
        textAlignLast: "end",
      },
      width: "100%",
      marginTop: "1rem",
      color: "white",
      "& .MuiInput-underline:after": {
        borderBottomColor: " rgb(255,255,255, 0.1)",
        borderBottomWidth: "1px",
      },
      "& .MuiInput-underline:before": {
        borderBottomWidth: "1px",
        borderBottomColor: " rgb(255,255,255, 0.3)",
      },
    },
  },
  {
    id: "cv-upload-field",
    type: "file",
    name: "CV uploaden",
    label: "CV uploaden",
    sx: {
      "& .MuiInputBase-input": {
        textAlignLast: "end",
      },
      width: "100%",
      marginTop: "1rem",
      color: "white",
      "& .MuiInput-underline:after": {
        borderBottomColor: " rgb(255,255,255, 0.1)",
        borderBottomWidth: "1px",
      },
      "& .MuiInput-underline:before": {
        borderBottomWidth: "1px",
        borderBottomColor: " rgb(255,255,255, 0.3)",
      },
    },
  },
  {
    id: "found-us-field",
    type: "textarea",
    name: "Hoe heb je ons gevonden?",
    label: "Hoe heb je ons gevonden?",
  },
];
