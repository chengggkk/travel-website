import pytest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.options import Options
import os

@pytest.fixture
def browser():
    options = Options()
    options.binary_location = os.environ.get("CHROME_BIN")
    driver = webdriver.Chrome(options=options)
    yield driver
    driver.quit()

def test_user_registration_and_travel_planning(browser):
    # Navigate to the application home page
    browser.get('http://localhost/login.php')

    # Fill in the registration form
    browser.find_element_by_name('address').send_keys('123')
    browser.find_element_by_name('password').send_keys('123')
    browser.find_element_by_name('login').click()

    # Fill in the travel planning form
    browser.find_element_by_name('start_date').send_keys('2024-05-01')
    browser.find_element_by_name('end_date').send_keys('2024-05-10')
    browser.find_element_by_name('travel_name').send_keys('Test Travel')
    browser.find_element_by_name('submit').click()

    # Verify that the travel plan appears on the index page
    assert '2024-05-01' in browser.page_source
    assert '2024-05-10' in browser.page_source
    assert 'Test Travel' in browser.page_source

    # Navigate to the travel plan page
    browser.find_element_by_id('gotoarr').click()

    # Fill in the arrival details
    browser.find_element_by_name('arr_date').send_keys('2024-05-02')
    browser.find_element_by_name('arr_time').send_keys('10 AM')
    browser.find_element_by_name('arr_loca').send_keys('Eiffel Tower5 Av. Anatole France, 巴黎法國')
    browser.find_element_by_name('submit').click()

    # Verify that the arrival details appear on the page
    assert '2022-01-02' in browser.page_source
    assert '10 AM' in browser.page_source
    assert 'Eiffel Tower5 Av. Anatole France, 巴黎法國' in browser.page_source