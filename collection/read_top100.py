import csv

with open('inappuas_top100_mostseen.csv') as csv_file:
    reader = csv.DictReader(csv_file)
    line_count = 0
    full_uas = []
    os_names = []
    software_names = []
    for row in reader:
        if line_count == 0:
            print("Times seen -- User_agent -- Software_name -- Software_version -- OS name -- Last seen")
            line_count += 1
        else:
            print(row['times_seen'], "--", row['user_agent'], "--", row['software_name'], "--", row['software_version'], "--", row['operating_system_name'], "--", row['last_seen_at'])
            full_uas.append(row['user_agent'])

    for ua in full_uas:
        print(ua)
