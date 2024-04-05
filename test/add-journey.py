from behave import when, then
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

@when('點擊新增旅程按鈕')
def step_when_user_clicks_add_journey(context):
    # Code to click the add journey button
    WebDriverWait(context.browser, 10).until(EC.element_to_be_clickable((By.ID, "add-journey-button"))).click()

    # Set start date, end date, and travel name
    WebDriverWait(context.browser, 10).until(EC.presence_of_element_located((By.ID, "start-date"))).send_keys("2024-05-01")
    WebDriverWait(context.browser, 10).until(EC.presence_of_element_located((By.ID, "end-date"))).send_keys("2024-05-31")
    WebDriverWait(context.browser, 10).until(EC.presence_of_element_located((By.ID, "travel-name"))).send_keys("My Journey")

    # Click the add journey button
    WebDriverWait(context.browser, 10).until(EC.element_to_be_clickable((By.ID, "add-journey-submit"))).click()

@then('在網頁中找到以上資訊')
def step_then_find_info_on_webpage(context):
    # Assert that the information is found on the webpage
    assert "2024-05-01" in context.browser.page_source
    assert "2024-05-31" in context.browser.page_source
    assert "My Journey" in context.browser.page_source
    
if __name__ == "__main__":
    pytest.main()