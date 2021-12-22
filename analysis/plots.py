import matplotlib.pyplot as plt

def showBarPlot(browser_attribute_list_2d, attributeName, mode="total"):
    fig = plt.figure()
    ax = fig.add_subplot(111)
    ax.margins(0.5, 0.5)
    xs = [x[0] for x in browser_attribute_list_2d]
    if attributeName == "length":
        ys = [round(x[1], 2) for x in browser_attribute_list_2d]
        ax.bar(xs, ys, width=0.75, color='blue')
    elif attributeName == "scores":
        if mode == "total":
            ys = [round(x[3], 2) for x in browser_attribute_list_2d]
        elif mode == "cvss":
            ys = [round(x[2], 2) for x in browser_attribute_list_2d]
        elif mode == "relative":
            ys = [round(x[1], 2) for x in browser_attribute_list_2d]
        ax.bar(xs, ys, width=0.75, color='red')
    for i, v in enumerate(ys):
        if attributeName == "length":
            plt.text(x=i-0.15, y=v+1.5, s=str(v), color='black', fontweight='bold')
        elif attributeName == "scores":
            plt.text(x=i-0.15, y=v+0.10, s=str(v), color='black', fontweight='bold')
    ax.set_xticks(xs)
    ax.set_xticklabels(xs)
    # Print according to passed attribute
    if attributeName == "length":
        plt.title("Average length (in #chars) of in-app browser User Agent by App")
        plt.ylabel("Length")
    elif attributeName == "scores":
        if mode == "total":
            plt.title("Average total score of in-app browser User Agent by App")
            plt.ylabel("Total exposure score")
        elif mode == "cvss":
            plt.title("Average cvss score of in-app browser User Agent by App")
            plt.ylabel("CVSS score")
        elif mode == "relative":
            plt.title("Average relative score of in-app browser User Agent by App")
            plt.ylabel("Relative score")
    plt.show()

def showLinePlot(browser_attribute_list, attributeName, browserName, mode="total"):
    fig = plt.figure()
    ax = fig.add_subplot(111)
    ax.margins(0.1, 0.1)
    xs = [x[0] for x in browser_attribute_list]  # Versions
    xticks = range(10, len(xs)*10+1, 10)
    if attributeName == "length":
        ys = [round(x[1], 2) for x in browser_attribute_list]
        ax.plot(xticks, ys, 'bo-')
    elif attributeName == "scores":
        if mode == "total":
            ys = [round(x[3], 2) for x in browser_attribute_list]
        elif mode == "cvss":
            ys = [round(x[2], 2) for x in browser_attribute_list]
        elif mode == "relative":
            ys = [round(x[1], 2) for x in browser_attribute_list]
        ax.plot(xticks, ys, 'ro-')
    for x, y in zip(xticks, ys):
        label = "{:.2f}".format(y)
        plt.annotate(label, (x,y), textcoords="offset points", xytext=(0,10), ha='center', size=6)
    ax.set_xticks(xticks)
    ax.set_xticklabels(xs)
    # Print according to passed attribute
    if attributeName == "length":
        plt.title("Lengths (in #chars) of " + str(browserName) + " User Agent over different Version")
        plt.ylabel("Length")
    elif attributeName == "scores":
        if mode == "total":
            plt.title("Total scores of " + str(browserName) + " User Agent over differnt Version")
            plt.ylabel("Total exposure score")
        elif mode == "cvss":
            plt.title("Average cvss score of " + str(browserName) + " User Agent over different Version")
            plt.ylabel("CVSS score")
        elif mode == "relative":
            plt.title("Average relative score of " + str(browserName) + " User Agent over different Version")
            plt.ylabel("Relative score")
    plt.show()