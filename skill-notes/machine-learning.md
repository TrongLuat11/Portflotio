---
title: "Machine Learning"
category: "AI & ML"
layout: "skill.njk"
---

# Machine Learning (AI & ML)

Việc áp dụng các thuật toán Machine Learning cơ bản giúp Data Analyst chuyển từ phân tích mô tả (Descriptive) sang phân tích dự đoán (Predictive), mang lại giá trị cao hơn cho doanh nghiệp.

### Các khái niệm cốt lõi

**1. Classification (Phân loại)**
Dự đoán một nhãn danh mục (Categorical) cho dữ liệu mới. Phổ biến nhất là Logistic Regression, Decision Trees.
```python
from sklearn.linear_model import LogisticRegression
clf = LogisticRegression()
clf.fit(X_train, y_train)
# Dự đoán khách hàng có Churn (rời bỏ) hay không (0 hoặc 1)
y_pred = clf.predict(X_test)
```

**2. Regression (Hồi quy)**
Dự đoán một giá trị liên tục (Continuous) dựa trên các biến độc lập.
```python
from sklearn.linear_model import LinearRegression
reg = LinearRegression()
reg.fit(X_train, y_train)
# Dự đoán doanh thu dựa trên ngân sách marketing
predicted_revenue = reg.predict(new_budget_data)
```

**3. NLP & Text Vectorization (Xử lý ngôn ngữ tự nhiên)**
Chuyển đổi văn bản thành các vector số (TF-IDF, CountVectorizer) để máy tính có thể hiểu và phân tích.
```python
from sklearn.feature_extraction.text import TfidfVectorizer
vectorizer = TfidfVectorizer(max_features=1000)
# Biến đổi đánh giá của khách hàng thành ma trận số
X_text = vectorizer.fit_transform(reviews_df['comment'])
```

**4. SVM (Support Vector Machines)**
Thuật toán mạnh mẽ dùng để tìm ranh giới phân chia tốt nhất (Hyperplane) giữa các nhóm dữ liệu phức tạp.
```python
from sklearn.svm import SVC
svm_model = SVC(kernel='linear')
svm_model.fit(X_train, y_train)
```

**5. Model Evaluation (Đánh giá mô hình)**
Sử dụng các ma trận nhầm lẫn (Confusion Matrix) và chỉ số (Accuracy, Precision, Recall, RMSE) để đo lường độ chính xác của mô hình.
```python
from sklearn.metrics import classification_report
print(classification_report(y_test, y_pred))
```

### Ứng dụng thực tế
- Phân tích cảm xúc (Sentiment Analysis) các bình luận của khách hàng trên MXH để đánh giá phản ứng về đợt ra mắt sản phẩm mới.
- Xây dựng mô hình phân loại (Classification) để dự đoán những khách hàng có nguy cơ cao hủy dịch vụ (Churn Prediction) trong 30 ngày tới.
- Phân cụm (Clustering) khách hàng thành các nhóm có hành vi mua sắm giống nhau để cá nhân hóa chiến dịch Marketing.
