> Started writing and executing the component tests.

- Rendering the component: SUCCESSFUL
- Asserting if div with id="overlay" exists: TEST FAILED
- Reason: unknown
- Found the reason: The component wasn't being mounted before the cy.get function was being called.
- Test to assert if the div with id="overlay" exists: SUCCESSFUL
- The test to assert if the loading digits are correct: TEST FAILED
- Reason: was checking attributes instead of the text.
- Test to assert if the loading digits are correct: SUCCESSFUL

> Started writing and executing the e2e test.

- All the tests were SUCCESSFUL
