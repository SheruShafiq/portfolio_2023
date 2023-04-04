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
