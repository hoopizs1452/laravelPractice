import string
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support import expected_conditions as ec
from selenium.webdriver.common.by import By
from selenium import webdriver
import time

options = Options()
options.add_argument('user-agent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36"')
options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')
options.add_argument('--headless')
options.add_argument('window-size=1920x3000')
options.add_argument('--disable-gpu')
options.add_argument('--hide-scrollbars')
options.add_argument('blink-settings=imagesEnabled=false')
options.add_experimental_option('excludeSwitches', ['enable-automation'])
options.add_argument("--disable-notifications")

browser = webdriver.Chrome(chrome_options=options) #'/usr/bin/chromedriver', 
browser.get("https://coolpc.com.tw/evaluate.php")

ActionChains(browser).move_by_offset(200, 100).click().perform()

characters = " ❤◆★"
# path = 'output.txt'
# f = open(path, 'w')

for optionValue in range(121, 145):
    value = "//select[@name='n12']/optgroup[@label='NVIDIA RTX3060-12G']/option[@value='" + str(optionValue) + "']"
    check = browser.find_element(by=By.XPATH, value=value)
    if check.is_displayed() & check.is_enabled():#ec.element_to_be_clickable(check)
        string = check.text
        string = ''.join(x for x in string if x not in characters)
        print(string)

# time.sleep(3)

# f.close()
browser.close()
