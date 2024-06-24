# Project Description: 


Our clients operate in the real estate sector, managing multiple buildings within their accounts. We need to provide a tool that allows our owners to create tasks for their teams to perform within each building and add comments to their tasks for tracking progress.. These tasks should be assignable to any team member and have statuses such as Open, In Progress, Completed, or Rejected. 


## Technical Requirements: 


- Develop an application using Laravel 10 with REST architecture. ✓
- Implement GET endpoint for listing tasks of a building along with their comments. ✓
- Implement POST endpoint for creating a new task. ✓
- Implement POST endpoint for creating a new comment for a task. ✓
- Define the payload structure for task and comment creation, considering necessary relationships and information for possible filters. ✓
- Implement filtering functionality, considering at least three filters such as date range of creation and assigned user, or task status and the building it belongs to. ✓


## Expected Deliverables: 


- Provide the application in a public GitHub repository 
- Include migrations for table construction. 
- Organize code with clear separation of responsibilities. 
- Implement unit tests to ensure code reliability. 
- Provide detailed installation instructions in the readme. 
- Ensure adherence to coding standards, specifically PSR-12.

 

## Bonus: 


- Containerize the application using Docker. 
- Type methods and parameters for improved code clarity. 
- Include descriptive PHPDoc in the methods.



## Installation Instructions:


- The folder contains a file called Up.sh that will install the entire environment. Run the command inside the laravel folder
```
chmod +x up.sh
chmod +x migrate.sh

./up.sh
./migrate.sh
```
- After running the command it will bring up laravel on port 8000, with the database, migrations and seeds

- Inside the folder contains the file Proprli.postman_collection.json which has the import of routes to test in postman