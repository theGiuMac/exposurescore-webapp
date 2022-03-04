This folder contains the code for running an analysis on .csv dumps of the databases: the .csv filename is provided as a command line argument to the analysis.py script.

The script creates two kinds of plots so far: barplots of length and all three different scores by browser name and lineplots of length and the three scores by versions of a single browser.

At the moment, the plots need to be manually saved for later usage.

To do:
1) Fix parsing of versions for in-app browsers' UAs
2) Boxplots of in-app vs native
3) Distributions of length and scores for all in-app UAs
4) Statistics for length and scores: mean, Jaccard Index (similarity between sets) 