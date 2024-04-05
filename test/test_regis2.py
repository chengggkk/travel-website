# # tests/test_registration_scenario2.py

# import pytest
# from selenium import webdriver
# from selenium.webdriver.common.by import By
# from selenium.webdriver.support.ui import WebDriverWait
# from selenium.webdriver.support import expected_conditions as EC

# @pytest.fixture
# def browser():
#     driver = webdriver.Chrome()
#     yield driver
#     driver.quit()

# def test_existing_user_registration_scenario(browser):
#     # Given
#     browser.get("http://localhost/register.php")
#     assert "Register Page" in browser.title

#     # When
#     # Simulate having an existing account and not logged in
#     WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "address"))).send_keys("a123")
#     WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "password"))).send_keys("a123")
#     WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "name"))).send_keys("a123")
#     WebDriverWait(browser, 10).until(EC.presence_of_element_located((By.ID, "email"))).send_keys("a123@gmail.com")

#     # Then
#     # Click the complete registration button
#     WebDriverWait(browser, 30).until(EC.element_to_be_clickable((By.ID, "regis-check"))).click()

#     # Assert system prompts that the customer already has an account
#     error_message = WebDriverWait(browser, 30).until(EC.text_to_be_present_in_element((By.ID, "error_message"), "已有帳號"))
#     assert error_message

    
# if __name__ == "__main__":
#     pytest.main()
