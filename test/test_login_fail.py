# from selenium import webdriver
# from selenium.webdriver.support.ui import WebDriverWait
# from selenium.webdriver.support import expected_conditions as EC
# from selenium.webdriver.common.by import By

# class TestLoginfail:
#     @classmethod
#     def setup_class(cls):
#         cls.driver = webdriver.Chrome()  
#         cls.driver.get("http://localhost/login.php")  

#     def test_login_fail(self):
#         # Given the user has an account
#         username = "123"
#         incorrect_password = "wrong_password"

#         # When the user enters their username and an incorrect password
#         WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "address"))).send_keys(username)
#         WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "password"))).send_keys(incorrect_password)
#         WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "login"))).click()

#         # Then the system should display an error message
#         from selenium.common.exceptions import TimeoutException

#         try:
#             # When the user enters their username and an incorrect password
#             WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.ID, "username"))).send_keys(username)
#         except TimeoutException:
#             print("The element with the ID 'username' was not found within 30 seconds.")

# if __name__ == "__main__":
#     import pytest
#     pytest.main()
