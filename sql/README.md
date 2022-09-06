Instructions for initial setup (running them overrides the current database state, so it is advised to first dump the 
main table (i.e. `agentstrings`) into a file using the exporting feature of phpmyadmin):

1) Log in on the homepage of phpmyadmin @ [mybrowserscore.com/phpmyadmin](https://mybrowserscore.com/phpmyadmin)

2) Open the SQL query box and run the following query:
        CREATE DATABASE useragents;

3) Select the newly created database on the left of the phpmyadmin UI

3) Use the importing feature of phpmyadmin, and select the database.sql file, it contains:
      - Creation of all the tables
      - Insertion of attributes at seed database state
      - Insertion of seed dataset of parsed user agents (full User Agent strings are not included!)

   Alternatively, the useragents.sql contains all updated rows until the new in-app browsers including their versions
   and updated attribute table.

