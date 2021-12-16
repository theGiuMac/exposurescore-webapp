Instructions for initial setup (running them overrides the current database state, so it is advised to first dump the main table (i.e. `agentstrings`) into a file using the exporting feature of phpmyadmin):

1) Log in on the homepage of phpmyadmin @ whatismyuseragent.xyz/phpmyadmin

2) Open the SQL query box and run the following query:
        CREATE DATABASE useragents;

3) Select the newly created database on the left of the phpmyadmin UI

3) Use the importing feature of phpmyadmin, and select the database.sql file, it contains:
      - Creation of all the tables
      - Insertion of attributes at seed database state
      - Insertion of seed dataset of parsed user agents (full User Agent strings are not included!)



This folder will contain different dumps of the database at different stages of collection, so that we keep track of a temporal reference for the newly added User Agent strings.
This will also help us in retrieving which UAs are coming from in-app browsers, as we are going to ask to use the website for in-app browsers only, for the duration of the research project.