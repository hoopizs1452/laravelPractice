from ast import literal_eval
import requests
from bs4 import BeautifulSoup as bs

r = requests.get("https://coolpc.com.tw/evaluate.php")

soup = bs(r.text, "html.parser")
# title = soup.title
# print(title.string)

selects = soup.find("select", {"onchange":"cnt(12)"})
optgroups = selects.find("optgroup", {"label":"NVIDIA RTX3060-12G"})
#options1 = optgroups.find_all("option", {"value":{"142"}})
options1 = optgroups.find("option", {"value":{"141"}})
options2 = optgroups.find("option", {"value":{"165"}})
options = optgroups.find_all("option")
# print(options2.string)
characters = " ❤◆★"
ausus = []
giga = []
path = 'output.txt'
f = open(path, 'w')

for t in options:
    
    if t.string == options1.string:
        continue
    
    string = t.string
    string = ''.join(x for x in string if x not in characters)
    
    if string[0:2] == "華碩":
        print(string)

        f.write("%s" % string + '\n')
        
    
    if t.string == options2.string:
        break
f.close()