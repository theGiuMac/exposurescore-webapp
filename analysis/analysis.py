# ----------------- CSV INPUT SECTION -----------------
import pandas as pd
import sys

csvFile = str(sys.argv[1])
df = pd.read_csv(csvFile + ".csv", header=None)
pd.set_option('display.max_colwidth', None)

# ----------------- DATA ORGANIZATION SECTION -----------------

# Store the full UAs separately:
full_uas = df[58]
full_uas.columns = ['fullUA']

# Store: browser, 
#        version, 
#        num of exposed attributes, 
#        unnormalized relative score,
#        normalized relative score, 
#        cvss score, 
#        times seen
info_subset = df[[17, 20, 48, 49, 50, 51, 59, 60]]
info_subset.columns = ['BrowserName', 'Version', '#ExposedAttributes', 'Unnormalized', 'Normalized', 'CVSS', 'Length', 'TimesSeen']

# Here we can modify a single attribute cell, if it has not been detected
# by the PHP get_browser() parser function, by specifying row and column
row = 0
column = 'Version'
if csvFile == "instagramVersions":
    info_subset.at[row, column] = "216"
    info_subset.at[1, 'Version'] = "216"
    info_subset.at[2, 'Version'] = "215"
    info_subset.at[3, 'Version'] = "215"
    info_subset.at[4, 'Version'] = "215"
    info_subset.at[5, 'Version'] = "214"
    info_subset.at[6, 'Version'] = "214"
    info_subset.at[7, 'Version'] = "215"
    info_subset.at[8, 'Version'] = "215"
    info_subset.at[9, 'Version'] = "200"
    info_subset.at[10, 'Version'] = "175"
    info_subset.at[11, 'Version'] = "175"
    info_subset.at[12, 'Version'] = "175"
    info_subset.at[13, 'Version'] = "150"
    info_subset.at[14, 'Version'] = "150"
    info_subset.at[15, 'Version'] = "100"
    info_subset.at[16, 'Version'] = "100"
    info_subset.at[17, 'Version'] = "50"
    info_subset.at[18, 'Version'] = "50"

# ----------------- DATA ARRAYS SECTION -----------------

from arrays import computeAvgLengthByBrowser, computeAvgScoresByBrowser
from arrays import computeAvgLengthByVersion, computeAvgScoresByVersion

# Create numpy array of rows dataframe, then create list of lists where
# each element is a unique browser's name and either the UA length or 
# the three means of the three types of scores
info_array = info_subset.to_numpy()
avgLength_by_browser = computeAvgLengthByBrowser(info_array)   # browsername - length
avgScores_by_browser = computeAvgScoresByBrowser(info_array)   # browsername - rel - cvss - tot

# For each browser, create a list of lists where each list is a Version and either
# the length or the three types of scores
browserNames = list(set([x[0] for x in info_array]))
print(browserNames, "\n\n")
avgLength_by_version_list = []
avgScores_by_version_list = []
for browserName in browserNames:
    avgLength_by_version = computeAvgLengthByVersion(info_array, browserName)
    avgScores_by_version = computeAvgScoresByVersion(info_array, browserName)
    avgLength_by_version_list.append(avgLength_by_version)
    avgScores_by_version_list.append(avgScores_by_version)

# ----------------- BARPLOTS SECTION -----------------

from plots import showBarPlot, showLinePlot

showBarPlot(avgLength_by_browser, "length")    # BarPlot lengths
showBarPlot(avgScores_by_browser, "scores")                # BarPlots for 3 scores
showBarPlot(avgScores_by_browser, "scores", "cvss")
showBarPlot(avgScores_by_browser, "scores", "relative")

for idx, browserName in enumerate(browserNames):
    showLinePlot(avgLength_by_version_list[idx], "length", browserName)
    showLinePlot(avgScores_by_version_list[idx], "scores", browserName)
    showLinePlot(avgScores_by_version_list[idx], "scores", browserName, "cvss")
    showLinePlot(avgScores_by_version_list[idx], "scores", browserName, "relative")