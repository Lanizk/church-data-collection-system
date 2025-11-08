# Church Data Collection System

A centralized data collection and reporting system for churches under a main headquarters (HQ).  
This system helps churches track contributions, manage population data, generate accurate financial reports, and export data for analysis.


## 🎯 Purpose
Many churches face challenges in collecting contribution data from multiple branches and generating accurate reports.  
This system solves that problem by providing a **centralized platform** for:

- Tracking congregation population
- Recording contributions and donations
- Calculating totals and statistics automatically
- Generating both **graphical and tabular financial reports**
- Exporting data to Excel for offline use

Video Demo: https://www.linkedin.com/feed/update/urn:li:activity:7392990228203876352/ 

## 🛠 Features

### 📊 Data Management
- Input congregation population per church branch
- Record contributions per member
- Supports recurring and one-time donations
- Automatic calculation of totals, averages, and other key metrics

### 📈 Reporting
- Generate **financial reports** per church or consolidated across branches
- **Graphical visualization**: bar charts, pie charts, line graphs
- Export reports and contribution data to **Excel or CSV**
- Historical data tracking

### 🔒 Security & Permissions
- Role-based access: HQ administrators, branch managers, data entry clerks
- Data privacy: Each church can only view its own data

### 💻 Technology Stack
- Backend: Laravel / PHP
- Frontend: Blade templates, Bootstrap
- Database: MySQL 
- Exports: PhpSpreadsheet for Excel export
- Charts: Chart.js for graphical reporting
- Authentication: Laravel built-in authentication with role-based access

---

## 🚀 Installation / Setup

1. Clone the repository:
```bash
git clone https://github.com/yourusername/church-data-collection.git
cd church-data-collection
Install dependencies:

bash
Copy code
composer install
npm install
npm run build
Configure environment:

bash
Copy code
cp .env.example .env
Set your database credentials

Set your mail configuration if needed

Set any other API keys

Run migrations and seed initial data:

bash
Copy code
php artisan migrate --seed
Start the development server:

bash
Copy code
php artisan serve
Visit http://localhost:8000 in your browser

📂 Project Structure
php
Copy code
app/
├─ Http/
│  ├─ Controllers/         # Handles requests and business logic
│  └─ Middleware/          # Role-based access control
├─ Models/                 # Eloquent models
resources/
├─ views/                  # Blade templates for frontend
public/
├─ js/ and css/             # Scripts and styles
database/
├─ migrations/             # Table structure
└─ seeders/                # Sample data
📊 Screenshots / Demo
(Add screenshots of dashboards, graphs, and Excel export here)

🤝 Contributing
Fork the repo

Create your feature branch (git checkout -b feature/new-feature)

Commit your changes (git commit -m 'Add new feature')

Push to branch (git push origin feature/new-feature)

Open a Pull Request

📫 Contact
Developer: Allan Murimi

Email: allanmurimi96@gmail.com

LinkedIn: Allan Murimi

⚡ Key Benefits
Saves time for HQ and branch staff by automating calculations

Provides accurate and consolidated financial reports

Helps leadership make data-driven decisions

Easy export and sharing of contribution data








