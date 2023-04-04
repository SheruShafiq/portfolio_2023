/* eslint-disable no-undef */
describe("Form Component e2e Test", () => {
  it("Renders the form correctly", () => {
    cy.visit("/");
    cy.wait(5000);
    cy.get("#buttonApp button").click();
    cy.get("form").should("exist");
    cy.get('input[type="submit"]').should("exist");
  });

  it("Allows input in form fields", () => {
    cy.visit("/");
    cy.wait(5000);
    cy.get("#buttonApp button").click();
    cy.get("form")
      .first()
      .within(() => {
        // Note that `solicitatiebrief-field` and `cv-upload-field` are file inputs, so we cannot check their values like we did for the other input fields.
        cy.get("#name-field").click();
        cy.get('input[name="name"]').type("John Doe");
        cy.get('input[name="date"]').type("2023-03-28");
        cy.get('input[name="email"]').type("john.doe@example.com");
        cy.get('input[name="tel"]').type("555-1234");
        cy.get('input[name="github"]').type("https://github.com/johndoe");
        cy.get('input[name="linkdin"]').type(
          "https://www.linkedin.com/in/johndoe"
        );
        cy.get('input[name="portfolio"]').type("https://www.johndoe.com");
        cy.get('input[name="Opleiding"]').type("Computer Science");
        cy.get('input[name="Hoe heb je ons gevonden?"]').type("Just cuz");
      });
  });

  it("Button changes state to loading on click", () => {
    cy.get("#submitForm").click();
    cy.get("#submitFormProcessing").should("exist");
    cy.wait(3000);
    cy.url().should("include", "/result");
  });

  it("Navigates to result page after loading is completed", () => {
    cy.wait(3000);
    cy.url().should("include", "/result");
  });
});
