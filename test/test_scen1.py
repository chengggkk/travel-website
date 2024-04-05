import pytest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import Options
import os
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import NoAlertPresentException

@pytest.fixture
def browser():
    options = Options()
    options.binary_location = os.environ.get("CHROME_BIN","C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe")
    driver = webdriver.Chrome(options=options)
    yield driver
    driver.quit()

def test_user_registration_and_travel_planning(browser):
    # Navigate to the application home page
    print("Step 1: Navigating to the application home page")
    browser.get('http://localhost/login.php')

    # Fill in the registration form
    print("Step 2: Filling in the registration form")
    browser.find_element(By.ID, 'address').send_keys('123')
    browser.find_element(By.ID, 'password').send_keys('123')
    browser.find_element(By.NAME, 'login').click()

    # Fill in the travel planning form
    print("Step 3: Filling in the travel planning form")
    start_date_input = WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.NAME, 'start_date')))
    browser.execute_script("arguments[0].setAttribute('value', '2024-05-01')", start_date_input)

    end_date_input = WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.NAME, 'end_date')))
    browser.execute_script("arguments[0].setAttribute('value', '2024-05-10')", end_date_input)

    travel_name_input = WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.NAME, 'travel_name')))
    travel_name_input.send_keys('Test Travel')

    # Navigate to the travel plan page
    print("Step 4: Navigating to the travel plan page")
    browser.find_element(By.ID, 'add-journey').click()

    # Close any alert that may appear
    print("Step 5: Closing any alert")
    try:
        alert = browser.switch_to.alert
        alert.accept()
    except NoAlertPresentException:
        pass

    # Navigate to arrangement
    print("Step 6: Navigating to arrangement")
    browser.find_element(By.NAME, 'gotoarr').click()

    # Fill in the arrival details
    print("Step 7: Filling in the arrival details")
    arr_date_input = WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.NAME, 'arr_date')))
    browser.execute_script("arguments[0].setAttribute('value', '2024-05-02')", arr_date_input)
    arr_time_input = WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.NAME, 'arr_time')))
    browser.execute_script("arguments[0].setAttribute('value', '10:00:00')", arr_time_input)
    arr_loca_input = WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.NAME, 'arr_locate')))
    arr_loca_input.send_keys('Eiffel Tower5 Av. Anatole France, 巴黎法國')

    # Submit the form
    print("Step 8: Submitting the form")
    browser.find_element(By.NAME, 'submit').click()
    print("Step 9:Close the alert")
        # Close any alert that may appear
    try:
        alert = browser.switch_to.alert
        alert.accept()
    except NoAlertPresentException:
        pass

    # Verify that the arrival details appear on the page
    print("Step 10: Verifying that the arrival details appear on the page")
    assert '2024-05-02' in browser.page_source
    assert '10:00:00' in browser.page_source
    assert 'Eiffel Tower5 Av. Anatole France, 巴黎法國' in browser.page_source
    

    print("test passed")