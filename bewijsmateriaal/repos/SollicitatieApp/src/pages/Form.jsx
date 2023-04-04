import React from "react";
import "../App.css";
import Title from "../components/Title";
import Form from "../components/FormComponent";
import "../styles/FormPage.css";
import ProcessView from "../components/ProcessView";

function App() {
  return (
    <div id="formPageParent">
      {/* Page title */}
      <div id="titleApp">
        <Title titleText="Solliciteren" subText="Go for IT" />
      </div>

      {/* Carousel slider displaying images */}
      <ProcessView />

      {/* Form section */}
      <div id="formPage">
        <div id="FormComponent">
          <Form />
        </div>
      </div>
    </div>
  );
}

export default App;
