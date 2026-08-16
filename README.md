# 📊 Portfolio — Lê Trần Trọng Luật | Data Analyst

> Website portfolio cá nhân giới thiệu kỹ năng, dự án và lộ trình học Data Analyst.

🔗 **Live:** [https://trongluat11.github.io/Portflotio/](https://trongluat11.github.io/Portflotio/)

## ✨ Tính năng

- 🌗 **Dark Mode** — Chuyển đổi sáng/tối, lưu trạng thái
- 📱 **Responsive** — Hiển thị tốt trên mọi thiết bị
- 🎨 **Animations** — Hiệu ứng fade-in, blob, shimmer
- 📚 **Sổ tay kiến thức** — Modal chi tiết cho từng kỹ năng (Python, SQL, Excel)
- 🗺️ **Lộ trình học** — Roadmap Data Analyst theo mô hình Agile
- 📄 **SEO** — Meta tags, Open Graph, semantic HTML

## 🛠️ Công nghệ

| Thành phần | Công nghệ |
|---|---|
| HTML | Semantic HTML5 |
| CSS | TailwindCSS (CDN) + Custom CSS |
| JavaScript | Vanilla JS (Intersection Observer, LocalStorage) |
| Font | Inter, JetBrains Mono (Google Fonts) |
| Icons | Lucide Icons |
| Charts | Chart.js |
| Deploy | GitHub Pages + GitHub Actions |

## 📁 Cấu trúc

```
├── index.html          ← Trang portfolio chính
├── css/style.css       ← CSS tùy chỉnh
├── js/script.js        ← JavaScript (dark mode, animations, modal)
├── images/             ← Hình ảnh
├── favicon.ico
├── robots.txt
└── .github/workflows/  ← GitHub Actions deploy
```

## 🚀 Chạy local

Mở file `index.html` trực tiếp trên trình duyệt, hoặc:

```bash
# Dùng Python simple server
python3 -m http.server 8080

# Hoặc dùng npx
npx serve .
```

Truy cập: `http://localhost:8080`

## 📦 Deploy

Website tự động deploy lên GitHub Pages mỗi khi push code lên branch `main`.

---

© 2024 Lê Trần Trọng Luật — Built with ❤️
