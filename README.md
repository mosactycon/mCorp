# mCorp – PHP & MySQL Web Application (XAMPP)

This is a legacy PHP web application built with **PHP + MySQL** and originally developed using **XAMPP**.   
This website showcasing the CRUD features.   
The project has been updated to run correctly on modern PHP versions.

## 🚀 How to Run (Local Setup)

### 1️⃣ Install XAMPP
Download from:  
https://www.apachefriends.org

Start the following services from **XAMPP Control Panel**:
- ✅ Apache
- ✅ MySQL
<img width="300" alt="image" src="https://github.com/user-attachments/assets/6a0b4387-ffff-4a95-9c2b-6074db152f87" />

---

### 2️⃣ Place Project Files
Copy the "mCorp" folder into: 

C:\xampp\htdocs

### 3️⃣ Create the database:
Open your browser and go to:
http://localhost/phpmyadmin/

Create the database with name: mcorp_database

Create the tables with SQL query:

CREATE TABLE liketable (
  id_project INT,
  liker_username VARCHAR(255),
  like_count INT
);

CREATE TABLE usertable (
  nama VARCHAR(255),
  email VARCHAR(255),
  kota VARCHAR(255),
  username VARCHAR(255),
  password VARCHAR(255)
);

CREATE TABLE usercorp (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  password VARCHAR(255),
  nama_project VARCHAR(255),
  deskripsi_project VARCHAR(255),
  kategori_project VARCHAR(255),
  harga_project VARCHAR(255),
  preview_project VARCHAR(255),
  jumlah_like INT
);

---

### 4️⃣ Access the Website

Open your browser and go to:
http://localhost/mCorp/

If there is no index.php, use:
http://localhost/mCorp/home.php

This project was originally written for older PHP versions.
It has been updated to be compatible with modern PHP (7.4+ / 8.x).

Key fixes include:

Removing invalid count(null) usage

Handling strict type checks

Improving database validation

---

### 5️⃣ Preview

<img width="500" alt="Main Page" src="https://github.com/user-attachments/assets/a0c6de38-4c23-46a6-af72-bf6b73097fce" />

<img width="500" alt="Main Page Project Post" src="https://github.com/user-attachments/assets/290560e3-aa7c-41e0-b178-8ae201776ecd" />

<img width="500" alt="Footer" src="https://github.com/user-attachments/assets/8f435c21-1d9e-448a-bd66-e2ad459493cc" />

<img width="500" alt="Sign In" src="https://github.com/user-attachments/assets/29cccbe2-2913-4e9e-b2bd-073c41c2a1bd" />

<img width="500" alt="Sign Up" src="https://github.com/user-attachments/assets/ccb19bf8-3c37-4a15-a663-403262cde8bc" />

<img width="500" alt="Post Detail" src="https://github.com/user-attachments/assets/20340f0d-a9ce-496b-bace-6eeff862f7ee" />

<img width="500" alt="Post Detail (2)" src="https://github.com/user-attachments/assets/655c1360-5f2a-4d4e-b5bb-4eda9b099cda" />

<img width="500" alt="Project List" src="https://github.com/user-attachments/assets/1cc9a26f-2e2b-4780-87bf-896266949331" />

<img width="500" alt="Add Project" src="https://github.com/user-attachments/assets/4731e986-54f8-480f-9495-65b5909e22c1" />

<img width="500" alt="Edit Project" src="https://github.com/user-attachments/assets/a7378c5c-77f9-419d-87bb-edfbb66f5e9b" />

<img width="500" alt="Pop Up Window" src="https://github.com/user-attachments/assets/85f2fa57-adf4-4ee0-871e-bc78bd66845b" />

<img width="500" alt="Database" src="https://github.com/user-attachments/assets/fe2ff8f7-e0e7-4649-b6af-69d5114a8d5d" />

<img width="500" alt="Table 1" src="https://github.com/user-attachments/assets/adc62967-15b6-43e5-9f04-154583163ddd" />

<img width="500" alt="Table 2" src="https://github.com/user-attachments/assets/1772e5e1-07ae-492f-a13c-6e2ac4d72bea" />

<img width="500" alt="Table 3" src="https://github.com/user-attachments/assets/43a0b3fe-0179-4f0d-99e7-01000b61bca6" />

