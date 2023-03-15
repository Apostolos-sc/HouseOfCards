# House Of Cards
This project will an online environment for card game players to browse rules for many popular playing card games. Unlike similar card game websites, this platform will feature much more user interactivity. A website will provide users the ability to favorite card games they like, rate card games, and leave comments on a card games’ page.

# Overall System Architecture: 
The architecture of House of Cards will be a hybrid of the Model-View-Controller (MVC) and Command-and-Query Responsibility Segregation (CQRS) patterns. MVC architecture separates display components (view) from the data management logic (model) via an intermediary control layer. This allows for different views of the system to be established while remaining decoupled. 
CQRS architecture will be integrated with the control and the model layers of the system to perform tasks such as loading user-specific data, processing user requests, and syncing changes between the model and the view layers. Integration of CQRS and MVC will help create a loosely-coupled system that promotes maintainability and easier testing. A summary of these details is included below:
- MVC
    - Separates the frontend and the backend
    - Control layer facilitates communication between database and GUI
    - Allows different views of the system to be established
- CQRS
    - Command & Query Responsibility Segregation
    - Separation of read and write functionality
    - Read operations will include loading page/view data from the database, loading comments from the database, and loading user data. 
    - Write operations include updating the database with new user data, new comments, and edits to pages made by admins.

# User Interaction with the system:
The users go to our website and there is a User Interface that provides different functionalities for them. 
The following functionalities will be available to the users : 
- Users can search for different card games
- Users can read about rules and gameplay for card games available on the site
- Users can log in/ create an account to allows them to utilize the following features:
- Chatting in a forum/ leaving comments under game webpages
- Favorite different games and view a list of all favorite games 
- Rating games on a scale of 1-5
- View and edit account information
- Suggest edits for wiki articles via email to admin
- All users, whether or not they are logged in, can view forum chats and comments. 
- The system will also allow administrators to log in. 
- Administrators have access to all the same features as registered users, but they can additionally create new - game pages, edit information on existing pages and remove comments.
