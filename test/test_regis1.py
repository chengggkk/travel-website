import pytest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

@pytest.fixture
def browser():
    driver = webdriver.Chrome()
    yield driver
    driver.quit()

def test_new_user_registration_scenario(browser):
    # Given
    print("Step 1: Opening login page")
    browser.get("http://localhost/login.php")
    assert "Login Page" in browser.title

    print("Step 2: Entering address and password")
    WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "address"))).send_keys("new_address")
    WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "password"))).send_keys("new_password")

    print("Step 3: Clicking login button")
    WebDriverWait(browser, 30).until(EC.element_to_be_clickable((By.ID, "login"))).click()

    print("Step 4: Waiting for error message")
    error_message = WebDriverWait(browser, 30).until(EC.text_to_be_present_in_element((By.ID, "accountno"), "無此帳號"))

    print("Step 5: Verifying error message")
    assert error_message

    print("Step 6: Clicking register button")
    WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "regis"))).click()

    # When
    # Go to register.php and input address, password, name, email
    print("Step 7: Entering address, password, name, and email")
    WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "address"))).send_keys("new_address")
    WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "password"))).send_keys("new_password")
    WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "name"))).send_keys("new_name")
    WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "email"))).send_keys("new_email@gmail.com")
    WebDriverWait(browser, 30).until(EC.element_to_be_clickable((By.ID, "regis-check"))).click()

    # Then
    assert "Enter your address, password, name, and email to register" in browser.page_source
    assert WebDriverWait(browser, 30).until(EC.presence_of_element_located((By.ID, "regis-check")))

    # Assert that we are back on the login page
    assert "login.php" in browser.current_url

if __name__ == "__main__":
    pytest.main()