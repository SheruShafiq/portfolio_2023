> **E2E Test Plan**

### **Scopes:**

- The component should display a checkmark when a form has been submitted successfully.
- The component should display an error message when an error occurs during form submission.

### **Goal**

The goal of this test is to ensure that the Succesful component functions as expected and displays the appropriate content based on the form submission status.

### **Test Environment:**

Browser: Chrome Version: 111.0.5563.111
Operating System: Windows 10
Screen resolution: 1920 x 1080
React version: 17.0.2
Testing library: Cypress version 27.4.5

### **Test Approach:**

- The E2E test will use the Cypress testing framework to render the Succesful component and verify that the expected content is displayed based on the form submission status.
- The test will be run on a local development environment.

### **Test Cases:**

- Verify that the component displays the checkmark icon when the error prop is falsy.
- Verify that the component displays the error message when the error prop is truthy.

> **Component Test Plan:**

### **Scopes:**

- Test that the component renders without errors.
- Test that the component displays the appropriate content based on the error prop value.

### **Goal:**

Browser: Chrome Version: 111.0.5563.111
Operating System: Windows 10
Screen resolution: 1920 x 1080
React version: 17.0.2
Testing library: Cypress version 27.4.5

### **Test Environment:**

The component will be tested in a React testing environment using Cypress.

### **Test Approach:**

- The component tests will use the Jest testing framework to render the Succesful component and verify that the appropriate content is displayed based on the error prop value.
- The test will be run on a local development environment.

### **Test Cases**

- Verify that the component renders without errors.
- Verify that the component displays the checkmark icon when the error prop is falsy.
- Verify that the component displays the error message when the error prop is truthy.

### **Place holder cypress test file:**

```js
import React from "react";
import { shallow } from "enzyme";
import Succesful from "./Succesful";
import Title from "../components/Title";
import Error from "../components/Error";

describe("Succesful Component", () => {
  it("renders without errors", () => {
    shallow(<Succesful />);
  });

  it("displays the success message when error is false", () => {
    const wrapper = shallow(<Succesful error={false} />);
    expect(wrapper.find(Title).prop("titleText")).toEqual("Verzonden");
    expect(wrapper.find("#checkMark")).toHaveLength(1);
  });

  it("displays the error message when error is true", () => {
    const wrapper = shallow(<Succesful error={true} />);
    expect(wrapper.find(Error)).toHaveLength(1);
  });
});
```
