# from selenium import webdriver
# from selenium.webdriver.common.by import By
# from selenium.webdriver.support.ui import WebDriverWait
# from selenium.webdriver.support import expected_conditions as EC

# class TestLoginScenario:

#     @classmethod
#     def setup_class(cls):
#         cls.driver = webdriver.Chrome()  
#         cls.driver.get("http://localhost/login.php")  

#     @classmethod
#     def teardown_class(cls):
#         cls.driver.quit()

#     def test_successful_login(self):
#         # Given 旅客已經有帳號 
#         # 請自行填寫相關程式碼，例如登入前的準備動作或相依的測試程式
        
#         # 設置帳號和密碼
#         address = "123"
#         password = "123"
        
#         # When 旅客點擊登入按鈕
#         from selenium.common.exceptions import TimeoutException

#         try:
#             WebDriverWait(self.driver, 30).until(EC.element_to_be_clickable((By.ID, "login"))).click()
#         except TimeoutException:
#             print("The login button was not clickable within 30 seconds.")        
#         # 輸入帳號和密碼
#         address_field = self.driver.find_element(By.ID, "address")
#         address_field.send_keys(address)
        
#         password_field = self.driver.find_element(By.ID, "password")
#         password_field.send_keys(password)

#         # Then 系統允許旅客登入
#         # And 進入首頁
#         from selenium.common.exceptions import TimeoutException

#         try:
#             WebDriverWait(self.driver, 30).until(EC.element_to_be_clickable((By.ID, "login"))).click()
#         except TimeoutException:
#             print("The login button was not clickable within 30 seconds.")
        
#         assert self.driver.current_url == "http://localhost/index.php", "Login failed or not redirected to homepage"


# # 執行測試
# if __name__ == "__main__":
#     import pytest
#     pytest.main()
