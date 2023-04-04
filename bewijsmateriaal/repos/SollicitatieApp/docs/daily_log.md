> ## **13/02/2023**

- Explained my boss how the examination works and submited "headline_proposal.md" document that contains the expected amount
  of time and resources required for the company in order to do this project.
- Created a Git Repository for this project
- Setting up daily plan for all the sprints in order to make sure that all the necassary data and proof is collected. And the project is done in the way that is expected by the client and examination board.

> ## **24/02/2023**

- Boss proposed the idea of making a website for the company aimed towards anyone who wishes to do an internship at the company. The website will contain all the information about the company, the internship and a form to submit an application.
- Idea was accepted
- Schedueled in meetings in accordance with the project plan

> ## **27/02/2023**

- Created a document with all the key questions that will be asked during the kickoff meeting with the client.

> ## **06/03/2023**

- Succefully conducted the kickoff meeting with the client.
- Noted all the requests and requirements that the client has for the project.
- Completed all UML Diagrams and submitted them to the client for approval.
- Succesfully approved all diagrans.
- Created a prototype of the website's mobile version using Figma, submitted it for approval.

> ## **07/03/2023**

- Recieved feedback on mobile version's Figma from our Lead Designer Erwin
- Worked off most of the feedback and submitted the updated version for approval.
- Recieved a couple more minor changes that were approved.
- Created a new project in Jira for the website.
- Populated the backlog with user stories based off of the kickoff meeting and organized them into sprints and epics.
- Created a day by day scheduel for the next two sprints.
- Updated the questionaire for the next sprints meeting due to privacy and content concerns.
- Created the desktop design in Figma and submitted it for approval.

> ## **08/03/2023**

- Recieved feedback on desktop version's Figma from our Lead Designer Erwin
- Worked off most of the feedback and submitted the updated version for approval.
- Started researching mailing APIs for react
- Tried SendGrid, NodeMailer and emailJs
- Setteled on emailJs due to simpilcity and ease of use
- Tested the API and it works

> ## **09/03/2023**

- Planned the next meeting in with the client
- Updated the plan with some extra questions for the meeting
- Continued working on the desktop design in Figma, improving on the feedback
- Submitted the design for approval

> ## **13/03/2023**

- Desktop design approved.
- Started working on the mobile design
- Updated the Jira board
- Created the landing page
- Created a dynamic button component that accepts text as props (Lacks functionality)
- Created a dynamic title component that accepts text as props (Not tested yet)
- Created the header component
- Implemented the LandingPage content (as per client's request, currently using the same content as the parent website facatuur)

> ## **14/03/2023**

- Created the application form page
- Created an image carousel component
- Custom animations were glitching on mobile, switched to react-slideshow-image library
- Optimized the carousel for mobile
- Fixed the header not being fixed on application form page (error was due to z-index)
- Created custom input components for the form

> ## **15/03/2023**

- Custom made input components weren't working so implemented and customized Material UI's input components
- Updated the API to use the new input components
- Encountered a premium subscription wall for attatchments on the emailJs API
- Tested the API and it works
- Updated the Jira board and user stories
- Decided to screenshot my daily VSCode activity and upload it to the repository as a proof of work

> ## **20/03/2023**

- Delayed Sprint meeting due to client availability
- Implemented routing for better navigation
- Routing kept the scroll from previous page,
  created a custom hook to reset the scroll on page change
- Created the result page with two states, success and error
- Navigation is very stiff and sudden, implemented a fade transition (will be replaced with the loading transition)
- Implemented desktop styling for all the pages in accordance with the Figma design
- Removed the carousel as it was causing bugs in the desktop version.
- Styled the error and success page in accordance with the Figma design
- Implemented react slick in both mobile and desktop version for the carosoul(in progress)

> ## **21/03/2023**

- Succesfully implemented React Carosoul in both mobile and desktop version
- Created a navigation menue in accordance with the parent website
- Styled the navigation menue for both mobile and desktop version
- Encountered an error hover isn't working correctly and the menu animation doesn't lock the scroll
- Implemented position: fixed to fix the scroll issue, still implemented a scroll lock for first second using useEffect just in case
- Created a loading screen component that is displayed while the first page is loading
- Implemented the loading screen in the app and synced it's animation with the landing page animation
- Re configured the header in accordance with the new nav menu.
- Tested the build version on my own phone
- Updated the Jira Board and screenshotted the discord activity
- Contacted the client to schedule the next meeting
- Finished the second sprint and started the third sprint

> ## **23/03/2023**

- Client reported some styling errors on their end (Screenshots in clientReport folder)
- Fixed the styling errors and tested them on build
- submitted the build to the client for approval

> ## **24/03/2023**

- Setted up testing envoirnment for e2e and unit testing in Cypress
- Setting up documentation and tests for the application
- Completed the documentation for the loadingScreen Component

> ## **27/03/2023**

- Continuing to work on the documentation and tests
- Completed the list of all the issues that will be tested
- Writing test plan for each of them.
- Succesfully component tested the loading screen component
- Sucessfully e2e tested the loading screen component
- Documented both tests
- Documented all the components
- Generated a general readme for the project
- Refactored the title component

  > ## **28/03/2023**

- Succesfully demo'ed the project to the client
- Noted down their feedback and forwarded it to the production team
- Completed testing and documenting all the core components
- Fixed hover and transition bug on landing page
- Fixed and updated Header and navigation bugs
- Updated Jira board
- Uplaoded videoProves
- That concludes this project.
