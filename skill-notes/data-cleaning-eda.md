---
title: "Data Cleaning & EDA"
category: "Xử lý dữ liệu"
layout: "skill.njk"
---

# Data Cleaning & EDA (Exploratory Data Analysis)

Quá trình làm sạch dữ liệu và phân tích khám phá (EDA) là bước tối quan trọng chiếm 70-80% thời gian của Data Analyst, nhằm đảm bảo chất lượng dữ liệu và tìm ra những insights ban đầu.

### Các khái niệm cốt lõi

**1. Missing Value Imputation (Xử lý dữ liệu thiếu)**
Xác định và điền các giá trị trống (NaN/NULL) bằng các phương pháp thống kê (Mean, Median, Mode) hoặc mô hình học máy.
```python
# Điền giá trị tuổi bị thiếu bằng Median (Trung vị)
df['age'].fillna(df['age'].median(), inplace=True)
```

**2. Outlier Detection (Phát hiện điểm bất thường)**
Nhận diện các giá trị ngoại lai có thể làm méo mó kết quả phân tích bằng phương pháp IQR (Interquartile Range) hoặc Z-score.
```python
Q1 = df['revenue'].quantile(0.25)
Q3 = df['revenue'].quantile(0.75)
IQR = Q3 - Q1
# Lọc bỏ outlier
df_clean = df[(df['revenue'] >= Q1 - 1.5*IQR) & (df['revenue'] <= Q3 + 1.5*IQR)]
```

**3. Data Validation & Formatting (Kiểm chuẩn định dạng)**
Ép kiểu dữ liệu (casting) và chuẩn hóa chuỗi (VD: viết hoa, xóa khoảng trắng) để đảm bảo tính đồng nhất.
```python
# Chuyển đổi chuỗi ngày tháng sang datetime object
df['order_date'] = pd.to_datetime(df['order_date'], format='%Y-%m-%d')
# Xóa khoảng trắng thừa trong tên
df['name'] = df['name'].str.strip().str.title()
```

**4. Univariate Analysis (Phân tích đơn biến)**
Khảo sát sự phân phối của từng biến số độc lập (dùng Histogram, Boxplot, Countplot) để hiểu đặc điểm của biến đó.
```python
# Vẽ biểu đồ phân phối tần suất của một biến Categorical
df['customer_segment'].value_counts().plot(kind='bar')
```

**5. Bivariate & Multivariate Analysis (Phân tích đa biến)**
Khám phá mối tương quan giữa hai hay nhiều biến (VD: Tương quan giữa Chi phí quảng cáo và Doanh thu).
```python
# Vẽ ma trận tương quan heatmap
import seaborn as sns
sns.heatmap(df.corr(), annot=True, cmap='coolwarm')
```

### Ứng dụng thực tế
- Phát hiện và xử lý hàng nghìn dòng dữ liệu bị lỗi định dạng ngày tháng do lỗi từ hệ thống nhập liệu CRM.
- Khám phá ra rằng 80% doanh thu đến từ nhóm khách hàng độ tuổi 25-34 thông qua việc vẽ biểu đồ phân phối.
- Xóa bỏ các đơn hàng spam/test (outliers cực lớn) trước khi tính toán giá trị trung bình đơn hàng (AOV).
