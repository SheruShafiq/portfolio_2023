> **E2E Test Plan:**

### **Scopes:**

- The form is rendered correctly
- Form fields are interactable
- Form fields can take some form of input
- When you click the submit button, the button is disabled and a loading indicator is displayed
- When loading is completed you are navigated to the result page

### **Goal**

- The goal of this E2E test is to ensure that the website's contact form is working as intended and that users can successfully submit their information and receive a confirmation message.

### **Test Environment:**

- Browser: Chrome Version: 111.0.5563.111
- Operating System: Windows 10
- Screen resolution: 1920 x 1080
- React version: 17.0.2
- Cypress version: 8.3.0
- Dependencies: emailjs-com version 3.2.0, material-ui version 4.12.3

### **Test Approach:**

The E2E test will use the Cypress testing framework to automate user actions and assertions.
The test will be run on a local development environment.
Test data will be generated using a mock API service provided by the Cypress Engine.

### **Test Cases:**

- Verify that the website loads successfully and all elements are visible.
- Fill out the contact form with valid data and submit it.
- Verify that a success message is displayed indicating that the message was sent successfully.
- Verify that an email is sent to the website owner with the submitted message details.
- Fill out the contact form with invalid data and submit it.
- Verify that an error message is displayed indicating that the form submission failed.
- Verify that no email is sent when the form submission fails.
- Verify that the loading indicator is displayed during the form submission process.
- Verify that the navigation to the confirmation page is working as expected.
- Verify that the email is sent to the correct email address.
- Verify that the email contains the exact information that was submitted.

> **Component Test Plan:**

### **Scopes:**

- Check if the TextField component is rendered properly for all the form fields
- Verify if the TextField components have the correct properties such as id, type, name, label, sx, etc.
- Verify if the TextField components can handle user inputs correctly
- Check if the handleButtonClick function is called when the submit button is clicked
- Test if the sendEmail function is called when the form is submitted
- Check if the emailjs.sendForm method is called with the correct parameters
- Test if the navigate function is called with the correct parameters after the form submission is completed
- Verify if the loading and error states are updated correctly

### **Goal:**

    The goal of this test plan is to ensure that the Contact Us form component is functioning as expected and meeting the requirements of the user story.

### **Test Environment:**

- Browser: Chrome Version: 111.0.5563.111
- Operating System: Windows 10
- Screen resolution: 1920 x 1080
- React version: 17.0.2
- Cypress version: 8.3.0
- Dependencies: emailjs-com version 3.2.0, material-ui version 4.12.3

### **Test Approach:**

- The test approach will involve simulating user interactions with the Contact Us form component and verifying the expected behavior using Cypress test assertions. The tests will be automated and run in a headless browser.

### **Test Cases**

- Test that all form fields are rendered properly and have the correct attributes such as id, type, name, label, and sx.
- Test that user inputs are handled correctly and the values are updated in the form state.
- Test that the form submission is successful and an email is sent when all fields are filled correctly and the submit button is clicked.
- Test that the loading indicator is displayed while the email is being sent and disappears once the email is sent.
- Test that the error message is displayed when an error occurs during the submission process.
- Test that the navigation to the result page is working as expected after the email is sent successfully.
- Test that the handleButtonClick function is called when the submit button is clicked.
- Test that the sendEmail function is called with the correct parameters when the form is submitted.
- Test that the emailjs.sendForm method is called with the correct parameters when the form is submitted.
- Test that the navigate function is called with the correct parameters after the form submission is completed.
- Test that the loading and error states are updated correctly.

### **Place holder cypress test file:**

```js
describe("Solicitatie Form", () => {
  beforeEach(() => {
    // Navigate to the Contact Us page
    cy.visit("/contact-us");
  });

  it("renders form fields", () => {
    // Test that all form fields are rendered properly
  });

  it("handles user inputs correctly", () => {
    // Test that user inputs are handled correctly
  });

  it("submits form successfully", () => {
    // Test that the form submission is successful and an email is sent when all fields are filled correctly and the submit button is clicked
  });

  it("displays loading indicator", () => {
    // Test that the loading indicator is displayed while the email is being sent and disappears once the email is sent
  });

  it("displays error message", () => {
    // Test that the error message is displayed when an error occurs during the submission process
  });

  it("navigates to result page", () => {
    // Test that the navigation to the result page is working as expected after the email is sent successfully
  });
});
```
