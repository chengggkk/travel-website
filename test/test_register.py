from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By

class register:
    @classmethod
    def setup_class(cls):
        cls.driver = webdriver.Chrome()  
        cls.driver.get("http://localhost/login.php")  

    def test_login_fail(self):
        # Given the user has an account
        username = "nonexistent_username"
        incorrect_password = "wrong_password"

        # When the user enters their username and an incorrect password
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "address"))).send_keys(username)
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "password"))).send_keys(incorrect_password)
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "login"))).click()

        # Then the system should display an error message
        error_message = WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "無此帳號"))).text
        assert error_message == "無此帳號"

        # Click on the register button
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "regis"))).click()

        # Go to register.php and input address, password, name, email
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "address"))).send_keys("new_address")
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "password"))).send_keys("new_password")
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "name"))).send_keys("new_name")
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "email"))).send_keys("new_email")

        # Click on the register check button
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "regis-check"))).click()

        # Assert that we are back on the login page
        assert "login.php" in self.driver.current_url
if __name__ == "__main__":
    import pytest
    pytest.main()
