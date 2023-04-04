> **E2E Test Plan**

### **Scopes:**

- The header should contain a logo that links to the landing page.
- The header should contain a navigation menu that includes the following items: Home, About Us, Services, Blog, and Contact Us.
- The navigation menu should be responsive and display a hamburger menu icon when viewed on smaller screens.
- Clicking on a navigation menu item should navigate to the corresponding page.

### **Goal**

The goal of this test is to ensure that the header component functions as expected and that users are able to navigate to the different pages of the website using the navigation menu.

### **Test Environment:**

- Browser: Chrome Version: 111.0.5563.111
- Operating System: Windows 10
- Screen resolution: 1920 x 1080
- React version: 17.0.2
- Cypress version: 8.3.0
- Dependencies: react-router-dom version 6.2.1

### **Test Approach:**

- The E2E test will use the Cypress testing framework to automate user actions and assertions.
- The test will be run on a local development environment.
- The test will simulate user interactions with the header component and verify that the expected behavior occurs.

### **Test Cases:**

- Verify that the logo is visible and links to the landing page.
- Verify that the navigation menu is visible and includes the Home, About Us, Services, Blog, and Contact Us items.
- Verify that the navigation menu displays a hamburger icon when viewed on smaller screens.
- Verify that clicking on a navigation menu item navigates to the corresponding page.

> **Component Test Plan:**

### **Scopes:**

- Test that the component renders without errors.
- Test that the logo and navigation elements are displayed.
- Test that the logo is clickable and redirects the user to the home page.
- Test that the navigation links are displayed and clickable.
- Test that the navigation links highlight when hovered over.
- Test that the navigation links highlight when the user is on the corresponding page.
- Test that the navigation menu collapses on smaller screen sizes.
- Test that the collapsed navigation menu is displayed when the hamburger icon is clicked.
- Test that the collapsed navigation menu links are displayed and clickable.
- Test that the collapsed navigation menu disappears when a link is clicked.

### **Goal:**

The goal of the tests is to ensure that the Header component renders correctly and its functionality works as expected.

### **Test Environment:**

The component will be tested in a React testing environment using Cypress.

### **Test Approach:**

The test approach will be to use unit testing to verify that the component renders correctly and its functionality works as expected.

### **Test Cases**

Test that the component renders without errors.
Test that the component matches its snapshot.
Unit Testing
Test that the logo and navigation elements are displayed.
Test that the logo is clickable and redirects the user to the home page.
Test that the navigation links are displayed and clickable.
Test that the navigation links highlight when hovered over.
Test that the navigation links highlight when the user is on the corresponding page.
Test that the navigation menu collapses on smaller screen sizes.
Test that the collapsed navigation menu is displayed when the hamburger icon is clicked.
Test that the collapsed navigation menu links are displayed and clickable.
Test that the collapsed navigation menu disappears when a link is clicked.

### **Place holder cypress test file:**

```js
describe("Header Component", () => {
  it("renders without errors", () => {
    cy.mount(<Header />);
  });

  it("matches snapshot", () => {
    cy.wrap(<Header />).toMatchSnapshot();
  });

  it("displays the logo and navigation elements", () => {
    cy.get(".logo").should("be.visible");
    cy.get(".navigation").should("be.visible");
  });

  it("logo is clickable and redirects the user to the home page", () => {
    cy.get(".logo").click();
    cy.url().should("include", "/");
  });

  it("navigation links are displayed and clickable", () => {
    cy.get(".navigation a")
      .should("have.length.at.least", 1)
      .each(($el) => {
        cy.wrap($el).should("be.visible").click();
        cy.url().should("include", $el.attr("href"));
      });
  });

  it("navigation links highlight when hovered over", () => {
    cy.get(".navigation a")
      .should("have.length.at.least", 1)
      .each(($el) => {
        cy.wrap($el)
          .trigger("mouseover")
          .should("have.css", "color", "rgb(255, 255, 255)");
      });
  });

  it("navigation links highlight when the user is on the corresponding page", () => {
    cy.get(".navigation a")
      .should("have.length.at.least", 1)
      .each(($el) => {
        cy.visit($el.attr("href"));
        cy.get(".navigation a.active")
          .should("have.attr", "href")
          .and("include", $el.attr("href"));
      });
  });

  it("navigation menu collapses on smaller screen sizes", () => {
    cy.viewport("iphone-5");
    cy.get(".menu-toggle").click();
    cy.get(".navigation").should("not.be.visible");
  });

  it("navigation menu expands and collapses when the menu button is clicked", () => {
    cy.viewport("iphone-5");
    cy.get(".menu-toggle").click();
    cy.get(".navigation").should("be.visible");
    cy.get(".menu-toggle").click();
    cy.get(".navigation").should("not.be.visible");
  });
});
```
