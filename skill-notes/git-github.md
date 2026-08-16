---
title: "Git/GitHub"
category: "Công cụ"
layout: "skill.njk"
---

# Git / GitHub

Git và GitHub là hệ thống quản lý phiên bản (Version Control) không thể thiếu, giúp Data Analyst lưu trữ code an toàn, theo dõi lịch sử chỉnh sửa và làm việc nhóm hiệu quả.

### Các khái niệm cốt lõi

**1. Khởi tạo & Lưu trạng thái (Commit)**
Lưu lại một "bản chụp" (snapshot) của mã nguồn tại một thời điểm, đi kèm với lời nhắn (message) giải thích những gì đã thay đổi.
```bash
git add data_cleaning.py
git commit -m "feat: Thêm tính năng loại bỏ giá trị null"
```

**2. Quản lý nhánh (Branching)**
Tạo các nhánh làm việc độc lập để thử nghiệm tính năng mới hoặc sửa lỗi mà không làm ảnh hưởng đến mã nguồn chính (main branch).
```bash
git checkout -b feature/eda-dashboard
# Làm việc trên nhánh mới...
```

**3. Hợp nhất code (Merging & Pull Requests)**
Kết hợp các thay đổi từ nhánh phụ về nhánh chính. Trên GitHub, việc này thường đi kèm với Pull Request (PR) để team review code trước khi gộp.
```bash
git checkout main
git merge feature/eda-dashboard
```

**4. Xử lý xung đột (Conflict Resolution)**
Giải quyết tình huống khi hai người cùng chỉnh sửa vào một dòng code. Git sẽ đánh dấu xung đột để lập trình viên tự quyết định giữ lại đoạn code nào.
```bash
# Khi pull bị conflict, mở file bị lỗi sửa thủ công, sau đó:
git add <file_da_sua>
git commit -m "fix: Resolve merge conflicts in script.py"
```

**5. Kho lưu trữ từ xa (Remote Repositories)**
Đồng bộ hóa code từ máy tính cá nhân (local) lên máy chủ GitHub (remote) để lưu trữ và chia sẻ.
```bash
git push origin main
git pull origin main
```

### Ứng dụng thực tế
- Quản lý phiên bản cho các script SQL/Python phức tạp: dễ dàng quay lại phiên bản (rollback) của tuần trước nếu script mới chạy ra số liệu sai.
- Phối hợp với Data Engineer: Đẩy script phân tích lên GitHub qua Pull Request để Data Engineer review và tích hợp vào Data Pipeline của công ty.
- Xây dựng Portfolio cá nhân: Đóng gói các Data Project thành các repository public trên GitHub, viết README chi tiết để trình bày kỹ năng với nhà tuyển dụng.
