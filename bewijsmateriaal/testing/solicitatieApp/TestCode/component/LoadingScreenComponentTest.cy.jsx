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
