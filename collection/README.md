This folder contains the code for adding all the user agent strings contained in a .csv file to the web application's database.

In order to run the script, both Python3 and the selenium package have to be installed on the local machine. For installing selenium, you can use the pip package manager and run the following command in a shell:

pip install selenium

There is one variable that need to be properly configured: driver_path, which is the path on the local machine to the Chrome driver associated with the installed Chrome version (for downloading the appropriate driver, please see: https://chromedriver.chromium.org/downloads), required by the selenium api.

Currently, the Chrome driver for version 96.0 is configured.

To run the following script, simply run the following command in a shell and provide the .csv filename as a command line argument:

python3 insert_UA_csv.py "inappUAs.csv"