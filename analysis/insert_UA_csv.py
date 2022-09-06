import sys
from selenium import webdriver
from selenium.webdriver.chrome.options import Options

def read_csv(path: str, ignore_headers: bool = False):
	with open(path, 'r') as csv:
		res = []
		for line_number, line in enumerate(csv.readlines()):
			if ignore_headers and line_number == 0:
				continue
			else:
				res.append(line.strip().split(','))
	return res

def add_user_agent(user_agent):
	driver_path = "C:\\thesis\\chromedriver.exe"
	opts = Options()
	opts.add_argument("user-agent=" + user_agent)
	driver = webdriver.Chrome(driver_path, chrome_options=opts)
	driver.maximize_window()
	driver.get('https://mybrowserscore.com')
	score_button = driver.find_element_by_name("calcScore")
	score_button.click()
	sleep(3)
	driver.close()

csv_filename = str(sys.argv[1])
csv = read_csv(csv_filename)
print(csv)

for ua in csv:
	add_user_agent(str(ua))

print(str(len(csv) + " UAs were added to the database.")
