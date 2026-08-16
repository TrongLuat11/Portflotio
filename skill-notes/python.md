---
title: "Python"
category: "Ngôn ngữ lập trình"
layout: "skill.njk"
---

# Python

Python là ngôn ngữ lập trình cốt lõi dành cho Data Analyst, cung cấp hệ sinh thái thư viện đa dạng để làm sạch, phân tích và trực quan hóa dữ liệu một cách linh hoạt.

### Các khái niệm cốt lõi

**1. Data Manipulation với Pandas**
Pandas cung cấp cấu trúc dữ liệu DataFrame giúp thao tác, biến đổi và tổng hợp dữ liệu dạng bảng mạnh mẽ.
```python
import pandas as pd
df = pd.read_csv('data.csv')
# Lọc khách hàng VIP
vip_df = df[df['total_spend'] > 1000]
```

**2. Tính toán mảng với NumPy**
NumPy tối ưu hóa các phép toán số học và xử lý ma trận dữ liệu lớn cực kỳ nhanh chóng.
```python
import numpy as np
prices = np.array([10.5, 20.0, 15.75])
# Tính tổng và trung bình
total, avg = np.sum(prices), np.mean(prices)
```

**3. Data Visualization với Matplotlib & Seaborn**
Hai thư viện chuẩn mực để vẽ biểu đồ, từ cơ bản (bar chart, line chart) đến thống kê phức tạp (violin plot, heatmap).
```python
import seaborn as sns
import matplotlib.pyplot as plt
sns.scatterplot(data=df, x='age', y='income')
plt.title('Tương quan Tuổi và Thu nhập')
```

**4. Machine Learning cơ bản với Scikit-learn**
Cung cấp các công cụ chuẩn hóa dữ liệu, chia tập train/test và các thuật toán dự đoán cơ bản.
```python
from sklearn.model_selection import train_test_split
# Chia tập dữ liệu 80/20
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2)
```

**5. Web Scraping**
Thu thập dữ liệu từ các trang web (HTML) biến thành dữ liệu có cấu trúc khi không có sẵn API.
```python
from bs4 import BeautifulSoup
import requests
html = requests.get('https://example.com').text
soup = BeautifulSoup(html, 'html.parser')
```

### Ứng dụng thực tế
- Tự động hóa quy trình ETL (Extract, Transform, Load) dữ liệu từ nhiều file Excel rời rạc thành một database chuẩn.
- Phân tích khám phá (EDA) để tìm ra chân dung khách hàng tiềm năng dựa trên lịch sử giao dịch.
- Thu thập giá đối thủ cạnh tranh từ các trang thương mại điện tử hàng ngày.
