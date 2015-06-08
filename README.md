We will be using this same code base to do all of our work as feature branches
Each module will be a feature branch we will merge them all up and then into develop
Eventually into master so we have a working code base for the team sort of like an organic code snippets library.

This way we all practice the various aspects of branching, merging, etc. that we would normally do on a project.

When your done with your branch for the week do a pull request to develop add me to the pull request and everyone else on the team.

Then on tuesdays we will look at everyones work and discuss it.

Eventually the work will all get merged in and we will have a working module to go off of.

Let me know if your have any struggles or concerns I am happy to help you get setup

# Project Setup #

This will be the same as a standard setup.
Create newbietuesdays.com
Clone the DB
Copy resources/config/local.xml.dev to newbietuesdays.com/htdocs/app/etc/local.xml

Run: new-vhost newbietuesdays.com newbietuesdays.dev
Add to /etc/hosts
Restart Apache

Then from the CLS_Dev/sample-data directory copy the Community 1.9 Sample Data to your local machine
Open that zip file
Copy the contents of media/ to newbietuesdays.com/htdocs/media/
Copy the contents of skin/ to newbietuesdays.com/htdocs/skin/

Create a database called: newbietuesdays_mage_dev
Import the sql file in the sample data to that database
Then navigate to newbietuesdays.dev 
Viola you will see the site setup and ready to run

Use MR to create an Admin account

**## For Development ##**
Branch off of develop 
Make your branch feature/your_name/order_export
