---
title: "Web Scraping"
category: "Xử lý dữ liệu"
layout: "skill.njk"
---

# Web Scraping

Web Scraping là kỹ thuật thu thập dữ liệu tự động từ các trang web, cực kỳ hữu ích khi cần lấy nguồn dữ liệu ngoài (External Data) mà hệ thống không cung cấp sẵn API.

### Các khái niệm cốt lõi

**1. Phân tích cú pháp HTML với BeautifulSoup**
Thư viện Python nhẹ và cực nhanh dùng để bóc tách dữ liệu từ các thẻ HTML tĩnh bằng cách sử dụng class, id hoặc cấu trúc DOM.
```python
from bs4 import BeautifulSoup
import requests
html = requests.get('https://example.com/products').text
soup = BeautifulSoup(html, 'html.parser')
# Lấy danh sách tên sản phẩm
titles = [tag.text for tag in soup.find_all('h2', class_='product-title')]
```

**2. Tương tác trình duyệt tự động với Selenium**
Sử dụng khi trang web tải dữ liệu động bằng JavaScript (SPA) hoặc yêu cầu thao tác click, cuộn trang, đăng nhập.
```python
from selenium import webdriver
driver = webdriver.Chrome()
driver.get('https://example.com/login')
# Tự động điền form và click
driver.find_element("id", "username").send_keys("my_user")
driver.find_element("id", "submit_btn").click()
```

**3. Bắt gói tin API (Network Interception)**
Thay vì cào HTML, tìm kiếm các API ngầm (XHR/Fetch) mà trang web gọi phía sau trong tab Network (DevTools) để lấy trực tiếp dữ liệu JSON sạch.
```python
import requests
# Gọi trực tiếp API ẩn tìm được từ Network Tab
res = requests.get('https://example.com/api/v1/data?page=1')
data_json = res.json()
```

**4. Xử lý phân trang (Pagination)**
Kỹ thuật viết vòng lặp để thu thập dữ liệu qua nhiều trang (page 1, 2, 3...) cho đến khi hết dữ liệu.
```python
all_data = []
for page in range(1, 10):
    res = requests.get(f'https://example.com/items?page={page}')
    all_data.extend(res.json()['items'])
```

**5. Tránh bị chặn (Anti-Scraping Bypass)**
Sử dụng headers giả (User-Agent), proxies, hoặc thời gian nghỉ ngẫu nhiên (sleep) để tránh bị server nhận diện là bot và block IP.
```python
import time, random
headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'}
res = requests.get('https://example.com', headers=headers)
time.sleep(random.uniform(1.5, 3.0)) # Nghỉ ngẫu nhiên
```

### Ứng dụng thực tế
- Thu thập giá bán và thông tin sản phẩm của đối thủ cạnh tranh trên Shopee/Tiki mỗi ngày để xây dựng bảng theo dõi giá (Price Tracker).
- Cào tin tức bài viết từ các trang tài chính kinh tế để làm nguồn dữ liệu đầu vào cho mô hình dự đoán Sentiment Analysis (Cảm xúc thị trường).
- Thu thập danh sách hàng ngàn review của người dùng về app trên Google Play/App Store để phân tích các tính năng bị phàn nàn nhiều nhất.
