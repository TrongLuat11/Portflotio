---
title: "SQL"
category: "Ngôn ngữ truy vấn"
layout: "skill.njk"
---

# SQL (Structured Query Language)

SQL là ngôn ngữ nền tảng và bắt buộc để trích xuất, tổng hợp và xử lý dữ liệu trực tiếp từ các hệ quản trị cơ sở dữ liệu quan hệ (RDBMS) trước khi đưa vào phân tích.

### Các khái niệm cốt lõi

**1. CRUD Operations**
Các thao tác cơ bản nhất để tương tác với dữ liệu: Create (Tạo), Read (Đọc/Truy vấn), Update (Cập nhật), Delete (Xóa).
```sql
SELECT customer_id, first_name, last_name
FROM customers
WHERE active = 1
ORDER BY created_at DESC;
```

**2. Joins (Kết nối bảng)**
Kết hợp dữ liệu từ hai hay nhiều bảng khác nhau dựa trên các khóa liên kết (Primary Key / Foreign Key).
```sql
SELECT o.order_id, c.customer_name
FROM orders o
LEFT JOIN customers c ON o.customer_id = c.id;
```

**3. Aggregations & Grouping (Tổng hợp dữ liệu)**
Sử dụng các hàm như `SUM`, `COUNT`, `AVG` kết hợp với `GROUP BY` để thống kê dữ liệu theo từng nhóm.
```sql
SELECT category, COUNT(product_id) as total_products, SUM(sales) as revenue
FROM sales_data
GROUP BY category
HAVING SUM(sales) > 50000;
```

**4. Window Functions**
Thực hiện các phép tính toán trên một "cửa sổ" dữ liệu có liên quan đến dòng hiện tại (VD: tính số thứ tự, lũy kế, so sánh tháng trước) mà không làm mất chi tiết dòng.
```sql
SELECT employee_name, department, salary,
       RANK() OVER(PARTITION BY department ORDER BY salary DESC) as dept_rank
FROM employees;
```

**5. CTE (Common Table Expressions)**
Tạo các bảng tạm thời trong câu lệnh truy vấn để giúp code dễ đọc, dễ bảo trì và xử lý các logic phức tạp từng bước một.
```sql
WITH HighValueCustomers AS (
    SELECT customer_id, SUM(amount) as total
    FROM payments GROUP BY customer_id HAVING SUM(amount) > 1000
)
SELECT * FROM HighValueCustomers;
```

### Ứng dụng thực tế
- Trích xuất lịch sử mua hàng của toàn bộ khách hàng trong quý 3 để phục vụ chiến dịch Retargeting.
- Tính toán Retention Rate (tỷ lệ giữ chân khách hàng) theo từng Cohort (nhóm tháng đăng ký) bằng Window Functions.
- Xây dựng các view tổng hợp (Materialized Views) làm nguồn dữ liệu đầu vào cho các Dashboard BI (Tableau, PowerBI).
