This folder contains the code for running an analysis on .csv dumps of the databases: the .csv filename is provided 
as a command line argument to the analysis.py script.

The script creates two kinds of plots: barplots of length and all three different scores by browser name and 
lineplots of length and the three scores by versions of a single browser.

Finally, we have a Python script that, using the Selenium browser automation framework, simulates a Chrome browser, modifies the
user-agent string with the ones from a .csv input file and access our deployes web application to simulate the clicking of the
button and trigger the addition of the user-agent to the existing database.
In order for the insertion to run, the latest version of the Chrome Webdriver has to be downloaded: [Chrome drivers repository](https://https://chromedriver.chromium.org/downloads).

