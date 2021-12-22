from itertools import groupby
from statistics import mean

def computeAvgScoresByBrowser(info_array):
    scores_by_browser = [[row[0], row[4], row[5]] for row in info_array]
    scores_by_browser.sort(key = lambda x: x[0])
    browser_group_scores = groupby(scores_by_browser, lambda x: x[0])
    avgScores_by_browser = []
    for key, group in browser_group_scores:
        groupList = list(group)
        rel_scores = [el[1] for el in groupList]
        cvss_scores = [el[2] for el in groupList]
        total_scores = [el[1] + el[2] for el in groupList]
        avgScores_by_browser.append([key, round(mean(rel_scores), 3),
                                          round(mean(cvss_scores), 3),
                                          round(mean(total_scores), 3)])
    return avgScores_by_browser

def computeAvgLengthByBrowser(info_array):
    length_by_browser = [ [row[0], row[6]] for row in info_array]
    length_by_browser.sort(key = lambda x: x[0])
    browser_group_length = groupby(length_by_browser, lambda x: x[0])
    avgLength_by_browser = [[key, round(mean(map(lambda x: x[1], list(group))), 3)] for key, group in browser_group_length]
    return avgLength_by_browser

def computeAvgLengthByVersion(info_array, browserName):
    length_by_version = [ [row[1], row[6]] for row in info_array if row[0] == browserName]
    length_by_version.sort(key = lambda x: x[0])
    version_group_length = groupby(length_by_version, lambda x: x[0])
    avgLength_by_version = [[key, round(mean(map(lambda x: x[1], list(group))), 3)] for key, group in version_group_length]
    return avgLength_by_version

def computeAvgScoresByVersion(info_array, browserName):
    scores_by_version = [ [row[1], row[4], row[5]] for row in info_array if row[0] == browserName]
    scores_by_version.sort(key = lambda x: x[0])
    version_group_scores = groupby(scores_by_version, lambda x: x[0])
    avgScores_by_version = []
    for key, group in version_group_scores:
        groupList = list(group)
        rel_scores = [el[1] for el in groupList]
        cvss_scores = [el[2] for el in groupList]
        total_scores = [el[1] + el[2] for el in groupList]
        avgScores_by_version.append([key, round(mean(rel_scores), 3),
                                          round(mean(cvss_scores), 3),
                                          round(mean(total_scores), 3)])
    return avgScores_by_version





    pass
