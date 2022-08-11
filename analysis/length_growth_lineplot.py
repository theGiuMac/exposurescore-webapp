

import matplotlib.pyplot as plt

years = [2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022]

facebook_android_length = [182, 193, 204, 187, 189, 194, 195, 194, 196]
facebook_android_finalScores = [6.29, 6.29, 6.23, 6.23, 6.4, 6.4, 5.88, 5.88, 6.13]
facebook_android_relScores = [19.423, 19.423, 19.276, 19.276, 19.698, 19.698, 18.422, 18.422, 19.034]
facebook_android_cvssScores = [0, 0, 0, 0, 0, 0, 0, 0, 0]

facebook_ios_length = [252, 266, 266, 265, 262, 255, 259, 254, 244]
facebook_ios_finalScores = [6.3, 6.67, 6.53, 6.53, 6.53, 5.92, 5.92, 5.92, 6.17]
facebook_ios_relScores = [19.438, 20.358, 20.004, 20.004, 20.004, 18.528, 18.528, 18.528, 19.14]
facebook_ios_cvssScores = [6.9, 6.9, 4.3, 6.9, 6.9, 6.9, 6.9, 6.9, 6.9]

instagram_android_length = [98, 252, 259, 253, 253, 270, 273, 273, 284]
instagram_android_finalScores = [6.17, 6.74, 6.74, 6.74, 6.74, 6.74, 6.13, 6.13, 6.5]
instagram_android_relScores = [19.124, 20.505, 20.505, 20.505, 20.505, 20.505, 19.034, 19.034, 19.922]
instagram_android_cvssScores = [0, 0, 0, 0, 0, 0, 0, 0, 0]

instagram_ios_length = [72, 192, 200, 208, 217, 204, 204, 213, 202]
instagram_ios_finalScores = [6.78, 6.78, 6.78, 6.78, 6.78, 6.17, 6.17, 6.17, 6.17]
instagram_ios_relScores = [20.616, 20.616, 20.616, 20.616, 20.616, 19.14, 19.14, 19.14, 19.14]
instagram_ios_cvssScores = [0, 0, 0, 0, 0, 0, 0, 0, 0]

snapchat_android_length = [None, None, 64, 219, 220, 237, 223, 225, 230]
snapchat_android_finalScores = [None, None, 6.94, 6.74, 6.13, 6.13, 6.13, 7.39, 6.13]
snapchat_android_relScores = [None, None, 21, 20.505, 19.034, 19.034, 19.034, 22.099, 19.034]
snapchat_android_cvssScores = [None, None, 0, 0, 0, 0, 0, 0, 0]

snapchat_ios_length = [None, None, 46, 49, 145, 143, 163, 179, 176]
snapchat_ios_finalScores = [None, None, 6.99, 8.28, 6.78, 6.78, 7.43, 8.07, 6.17]
snapchat_ios_relScores = [None, None, 21.116, 24.269, 20.616, 20.616, 22.194, 23.758, 19.14]
snapchat_ios_cvssScores = [None, None, 0, 0, 0, 0, 6.6, 7.8, 0]

def createMultipleLinePlot(first, second, third, years, yLabel, title, offset):
    fig, ax = plt.subplots(figsize=(15, 8))
    ax.plot(years, first)
    ax.plot(years, second)
    ax.plot(years, third)
    plt.xlabel('Years')
    plt.ylabel(yLabel)
    plt.title(title)
    plt.legend(['Facebook', 'Instagram', 'Snapchat'])
    
    for index in range(len(facebook_android_length)):
        ax.text(years[index], first[index]+offset, first[index], size=12)
        ax.text(years[index], second[index]+offset, second[index], size=12)
        if index != 0 and index != 1:
            ax.text(years[index], third[index]+offset, third[index], size=12)
    plt.show()



createMultipleLinePlot(facebook_android_length, instagram_android_length, snapchat_android_length, years, "Length", "Length growth for Android apps (2014-2022)", 0.5)

createMultipleLinePlot(facebook_ios_length, instagram_ios_length, snapchat_ios_length, years, "Length", "Length growth for iOS apps (2014-2022)", 0.5)

createMultipleLinePlot(facebook_android_finalScores, instagram_android_finalScores, snapchat_android_finalScores, years, "Final exposure score", "Final exposure score growth for Android apps (2014-2022)", 0)

createMultipleLinePlot(facebook_ios_finalScores, instagram_ios_finalScores, snapchat_ios_finalScores, years, "Final exposure score", "Final exposure score growth for iOS apps (2014-2022)", 0)

createMultipleLinePlot(facebook_android_relScores, instagram_android_relScores, snapchat_android_relScores, years, "Relative exposure score", "Relative score growth for Android apps (2014-2022)", 0)

createMultipleLinePlot(facebook_ios_relScores, instagram_ios_relScores, snapchat_ios_relScores, years, "Relative exposure score", "Relative score growth for iOS apps (2014-2022)", 0)

createMultipleLinePlot(facebook_android_cvssScores, instagram_android_cvssScores, snapchat_android_cvssScores, years, "Cvss score", "Cvss score growth for Android apps (2014-2022)", 0)

createMultipleLinePlot(facebook_ios_cvssScores, instagram_ios_cvssScores, snapchat_ios_cvssScores, years, "Cvss score", "Cvss score growth for iOS apps (2014-2022)", 0)
