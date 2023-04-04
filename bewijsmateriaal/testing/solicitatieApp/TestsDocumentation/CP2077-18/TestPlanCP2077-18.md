> **E2E Test Plan**

### **Scopes:**

This test plan covers the end-to-end testing of the ProcessView React component.

### **Goal**

To ensure that the ProcessView component functions as expected by verifying that all images are displayed correctly, the slider is responsive and the settings are working as intended.

### **Test Environment:**

- Browser: Chrome Version: 111.0.5563.111
- Operating System: Windows 10
- Screen resolution: 1920 x 1080
- React version: 17.0.2
- Cypress version: 8.3.0
- Dependencies: React-Slick

### **Test Approach:**

Use React Testing Library to test the rendering and functionality of the component.
Use Cypress to test the responsiveness and behavior of the slider.

### **Test Cases:**

Doesn't apply

> **Component Test Plan:**

### **Scopes:**

This component test plan covers the testing of the rendering and functionality of the ProcessView React component.

### **Goal:**

To ensure that the ProcessView component renders all images correctly, the slider works as intended, and the settings are correct.

### **Test Environment:**

- Browser: Chrome Version: 111.0.5563.111
- Operating System: Windows 10
- Screen resolution: 1920 x 1080
- React version: 17.0.2
- Cypress version: 8.3.0
- Dependencies: React-Slick

### **Test Approach:**

Render the component with different window widths and ensure that the gallery adjusts accordingly.
Ensure that all images are displayed correctly.
Test the functionality of the slider, including the autoplay and speech settings.
Test the responsiveness of the slider by dragging it with the mouse and swiping it on a touch device.
Verify that the center mode is working as intended.

### **Test Cases**

The component renders without errors.
The gallery adjusts to different window widths.
All images are displayed correctly.
The slider functions as expected, including the autoplay and speech settings.
The slider is responsive to user input, both with the mouse and touch devices.
The center mode is working as intended.

### **Place holder cypress test file:**

```js
describe("ProcessView component", () => {
  beforeEach(() => {
    cy.visit("/path/to/processview");
  });

  it("adjusts gallery width for different window widths", () => {
    cy.viewport(375, 667); // iPhone 6/7/8 viewport
    cy.get("#gallerView").should("have.css", "width", "560px");

    cy.viewport(1024, 768); // iPad landscape viewport
    cy.get("#gallerView").should("have.css", "width", "1900px");
  });

  it("displays all images correctly", () => {
    cy.get(".galleryImages").should("have.length", 21);
    cy.get(".galleryImages img").each((img, i) => {
      expect(img.attr("src")).to.equal(`../images/carousel/${(i % 3) + 1}.png`);
    });
  });

  it("functions as expected with slider settings", () => {
    cy.get(".slick-slider").should("exist");
    cy.get(".slick-center img").should("exist");

    cy.get(".slick-slider").trigger("mouseover");
    cy.get(".slick-pause").click();

    cy.get(".slick-slider").trigger("mouseover");
    cy.get(".slick-play").click();

    cy.get(".slick-slider").trigger("mouseover");
    cy.get(".slick-next").click();

    cy.get(".slick-slider").trigger("mouseover");
    cy.get(".slick-prev").click();
  });

  it("is responsive to user input", () => {
    cy.get(".slick-slider").trigger("mousedown", { clientX: 100 });
    cy.get(".slick-slider").trigger("mousemove", { clientX: 200 });
    cy.get(".slick-slider").trigger("mouseup");

    cy.get(".slick-slider").trigger("touchstart", {
      touches: [{ clientX: 100 }],
    });
    cy.get(".slick-slider").trigger("touchmove", {
      touches: [{ clientX: 200 }],
    });
    cy.get(".slick-slider").trigger("touchend");
  });
});
```
