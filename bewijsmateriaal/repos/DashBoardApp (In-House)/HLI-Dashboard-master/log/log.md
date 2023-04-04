# MVP:
Create a Dashboard that retrieves live active user count from Google Analytics and shows them on the screen in Realtime alongside a weather widget with live weather prediction.
## Expected Time:
4 weeks.
## Time Taken:
2.5 Weeks.

### [Oct 12th]
Started with building the basis of weather API, given the widget style of the app and most of the application being utilized on the Client side, I decided to use React. Did some research on available free use API and with the help of Martijn Verhaaf, decided on using [https://weerlive.nl/api/].
### [Oct 13th] 
Got used to working with React and got my first response from the API successfully
### [Oct 15th] 
Finished weather widget alongside styling that updates the weather, forecast and the icons in real-time.
### [Oct 16th]
Settled up the dashboard while adding the weather app as a component to the dashboard in a widget style format.
### [Oct 17th]
Started working on G-Analytics API and searching on how to work with it whilst building a base template body for the two states. Learning how O-Auth works and trying to integrate it in the react App.
### [Oct 18th] 
Presumably done with the API component but it didn’t work due to Auth errors, continued debugging
### [Oct 20th] 
Failing to make progress because of not having an understanding of how authorization works. Learning to work with Authentication methods and how to send auth tokens in API fetch requests.
### [Oct 21st]
The API finally allows the request through with a 200, the issue was not sending the token back properly, it was supposed to be sent with a bear-token in the API fetch request header after O-Auth was successful.
### [Oct 24th]
It once again doesn’t work, and I have no clue why. It worked the evening before the week and now it doesn’t with a not enough access rights error.
### [Oct 26th]
Somehow the scopes that were being sent along the request originally were not there, and because of the original being a snippet I had no idea what were they and why did they work before. Now with the scopes in, it works perfectly fine again. Also, the API being used was Google’s universal API that newer projects don’t use so another component was built for the newer GA4 compatibility for user to pick from regardless of which API their project is on. 
Finished [Oct 26th]
Some final minor changes were made with styling and documentation etc. The was also installed locally on a PC to startup and shutdown every working day automatically to function as a Dashboard.
### [Feb 4]
Started working on a security patch due to updated Google policies(move to GA4) alongside some code effeciency changes(sub components, and reducing redundant code)
### [Feb 6]
Released the patch for both comapny exclusive and public version.
