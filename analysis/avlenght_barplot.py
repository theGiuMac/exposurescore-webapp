
import pandas as pd
import matplotlib.pyplot as plt
import numpy as np

androidX = [193, 243, 198, 174, 165, 111, 180]
iOSX = [252, 189, 121, 125, 140, 137, 133]
indexes = np.arange(7)
width = 0.35

fig, ax = plt.subplots(figsize=(15,8))
bars = ax.bar(indexes, androidX, 0.35)
bars2 = ax.bar(indexes + width, iOSX, 0.35)

ax.bar_label(bars)
ax.bar_label(bars2)
plt.title("Average length by App and OS")
plt.xlabel("App name")
plt.ylabel("Length")
ax.set_xticks(indexes + width / 3)
ax.set_xticklabels(("Facebook", "Instagram", "Snapchat", "LinkedIn", "Pinterest", "Telegram", "Twitter"))
plt.show()
