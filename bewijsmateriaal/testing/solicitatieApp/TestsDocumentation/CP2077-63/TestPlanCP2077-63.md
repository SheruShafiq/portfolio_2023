> ## **E2E Test Plan**

### **Scopes:**

- The animation should be visible on the landing page of the website.
- While the animation is playing, the user should not be able to interact with the website.
- Once the animation is over the user should be able to interact with the website.
- Once the animation is over it should not be visible anymore.

### **Goal**

The goal of this test is to make sure that the loading screen is visible on the landing page of the website upon landing and that the user is not able to interact with the website while the animation is playing. Once the animation is over the user should be able to interact with the website and the loading screen should not be visible anymore.

### **Test Environment:**

- Browser: Chrome Version: 111.0.5563.111
- Operating System: Windows 10
- Screen resolution: 1920 x 1080
- React version: 17.0.2
- Cypress version: 8.3.0
- Dependencies: react-router-dom version 6.2.1, framer-motion version 4.1.17

### **Test Approach:**

- The E2E test will use the Cypress testing framework to automate user actions and assertions.
- The test will be run on a local development environment.

### **Test Cases:**

- Verify that the landing page contains a loading screen animation upon loading.
- Verify that the user cannot interact with the website while the animation is playing.
- Verify that the loading screen animation disappears once it is finished.
- Verify that the user is able to interact with the website once the animation is finished.
- Verify that the loading screen animation does not reappear during subsequent visits to the landing page.

> ## **Component Test Plan:**

- Component Under Test
- LoadingScreen component

### **Scopes:**

- Test that the component renders without errors.
- Test that the component's root element has an ID of "overlay".
- Progress bar is styled correctly
- Test that the component's count-up element has a delay of 0, an end value of 100, and a duration of 4 seconds.
- Test that the component's "Loaded" text is displayed.
- Test that the component unmounts without errors.

### **Goal:**

- The goal of the tests is to ensure that the LoadingScreen component renders correctly and displays the progress bar, count-up element, and "Loaded" text as expected.

### **Test Environment:**

- Browser: Chrome Version: 111.0.5563.111
- Operating System: Windows 10
- Screen resolution: 1920 x 1080
- React version: 17.0.2
- Cypress version: 8.3.0
- Dependencies: react-router-dom version 6.2.1, framer-motion version 4.1.17

### **Test Approach:**

- The test approach will be to use unit testing to verify that the component renders correctly and its functionality works as expected.

### **Test Cases**

- Test that the component renders without errors.
- Test that the component's root element has an ID of "overlay".
- Progress bar is styled correctly
- Test that the component's count-up element has a delay of 0, an end value of 100, and a duration of 4 seconds.
- Test that the component's "Loaded" text is displayed.
- Test that the component unmounts without errors.

> **Component Test Code:**

```js
/* eslint-disable no-undef */
import React from "react";
import LoadingScreen from "./LoadingScreen";

describe("LoadingScreen Component Test", () => {
  beforeEach(() => {
    cy.mount(<LoadingScreen />);
  });

  it("renders without errors", () => {
    cy.get("#overlay").should("exist");
  });

  it("has an ID of overlay", () => {
    cy.get("#overlay").should("exist");
  });

  it("Is styled correc", () => {
    cy.get("#loadLine").should("have.css", "height", "1px");
    cy.get("#loadLine").should(
      "have.css",
      "background-color",
      "rgb(255, 255, 255)"
    );
    cy.get("#loadLine").should("have.css", "transition-duration", "4s");
    cy.get("#loadLine").should("have.css", "margin-top", "20px");
    cy.get("#loadLine").should("have.css", "margin-bottom", "20px");
  });

  it("has a count-up element with with an end value of 100", () => {
    cy.wait(4000);
    cy.get("#count > span").should("have.text", "100");
  });

  it("displays 'Loaded' text", () => {
    cy.get("#textItem").should("have.text", "Loaded");
  });
});
```

> **e2e Test Code:**

```js
/* eslint-disable no-undef */

describe("LoadingScreen e2e Test", () => {
  beforeEach(() => {
    cy.visit("/");
  });
  it("should be visible on the landing page of the website", () => {
    cy.get("#overlay").should("be.visible");
  });

  it("should disable interaction with the website while the animation is playing", () => {
    cy.get("#overlay").should("be.visible");
    cy.get("#LandingParent").should("have.css", "pointer-events", "none");
  });

  it("should enable interaction with the website once the animation is over", () => {
    cy.get("#overlay").should("be.visible");
    cy.wait(5000); // Wait for the animation to complete
    cy.get("#LoadingScreenLanding").should(
      "have.css",
      "pointer-events",
      "auto"
    );
  });

  it("should not be visible anymore once the animation is over", () => {
    cy.get("#overlay").should("be.visible");
    cy.wait(5000); // Wait for the animation to complete
    cy.get("#overlay").should("not.be.visible");
  });
});
```
