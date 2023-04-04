> Started writing and executing the e2e tests.

- Rendering Keeps faling because there are multiple forms and the test is not accesing the correct one. I have to find a way to acces the correct form.
- Cypress has a function .first(). Moved the jsx so that the correct form can be accessed
- Can't test if the input field contains what's inputted because mui isn't supported in cypress. Still can confirm via manual testing
  the fields do infact contain what was typed in.
- Checking if the button changes states when clicked keeps failing. Reason: Was using cy.contains on the element. Fix: Use cy.get on the element.
- Navigation test works as expected.
- Manually tested if the correct information showed up in the email: ![PASS](https://via.placeholder.com/15/00ff00/000000?text=+) PASS
- All fields contain the data that was input. The email contains the correct information.
