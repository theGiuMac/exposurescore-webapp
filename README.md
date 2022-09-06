This is the codebase for the LAMP web application hosted at [mybrowserscore.com](https://mybrowserscore.com).

This folder contains all the PHP and JavaScript code required for the web application to run, while the deployment is handled
by the web hosting company Hetzner [hetzner.de](https://hetzner.de).

The legacy codebase has been refactored but preserves its initial structure, here is a short description for the main files:
-index.php: this is the homepage of the web app, it's written in raw HTML with insertions of php that take care of the score
            calculation, retrieval of the user's user-agent string and layout organization.
-admingGUI.php: this is the admin homepage which is used for updating the information about the attributes, adding new 
            user-agent strings and updating the cvss scores crawled from the NVD.
-analytics.php: this file is the additional page used for showing interactive graphs over the database hosted by the web app,
            as of now there are two graphs and they use the JavaScript framework Chart.Js.

The refactoring has involved divide and conquer in terms of separation of concerns across files and functions (e.g. the different
cases for calculating a score have been divided into four different functions), isolation of code portions according to the
single responsibility principle and updates on deprecated functions.

The analysis scripts written in Python used to create plots on .csv dumps of the database have been moved to the analysis folder 
and the .sql files containing the initial database and the final one are contained in the sql folder, they both have README files of their own.
