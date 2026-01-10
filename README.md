# Atalian Russia — Corporate Website  
**Bilingual Laravel Project · Real-world deployment · Anti-spam case**

---

## 🇷🇺 О проекте

Корпоративный сайт Atalian Russia, разработанный как замена устаревшему решению.  
Проект ориентирован на **понятную структуру, безопасность форм и SEO**, без перегруза интерфейса и без зависимости от сторонних антиспам-сервисов.

Сайт является **билингвальным (RU / EN)** и используется в продакшене.

---

## 🇬🇧 About the project

Corporate website for Atalian Russia, built to replace a legacy solution.  
The focus is on **clear structure, form security, SEO readiness**, and a clean UX — without heavy third-party dependencies.

The website is **fully bilingual (RU / EN)** and deployed in production.

---

## 🎯 Goals / Задачи

**RU**
- Обновить визуал и структуру сайта  
- Реализовать безопасные формы без CAPTCHA  
- Подготовить сайт к поисковой индексации  
- Обеспечить поддержку двух языков  

**EN**
- Replace outdated website structure  
- Implement spam-resistant forms without CAPTCHA  
- Ensure SEO readiness  
- Support bilingual content (RU / EN)

---

## 🧠 Key Case: Anti-Spam Without CAPTCHA

### Problem  
После деплоя сайт начал получать автоматический спам:
- SEO-рассылки
- случайные строки
- бессмысленные сообщения
- попытки HTML / link injection  

CAPTCHA была осознанно исключена — из-за UX и корпоративного контекста.

---

### Solution  
Реализована **многоуровневая серверная антиспам-логика**:

- Honeypot field
- Form timing validation
- Link & HTML detection
- Random / gibberish text detection
- Short meaningless message filtering
- Suspicious email pattern checks

Все проверки выполняются **до сохранения данных**.

---

### Result  

- 📉 Спам практически исчез (0–2 попытки в день → 0)
- 🧑‍💻 Реальные пользователи не сталкиваются с CAPTCHA
- 🛡️ Формы устойчивы к базовым ботам и скриптам
- 📊 Поведение подтверждено продакшен-трафиком

---

## 🛠️ Tech Stack

- **Backend:** Laravel  
- **Frontend:** Blade, CSS  
- **Database:** SQLite  
- **Maps:** Yandex Maps API  
- **Localization:** Laravel i18n  

---


## 🚀 Deployment Notes

- Production deployment
- Live traffic tested
- Active post-deploy monitoring
- Continuous improvements based on real data

