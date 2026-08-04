# User Status List

## Table of Contents
* [Repository Contents](#repository-contents)
* [Task Overview](#task-overview)
* [Database Architecture](#database-architecture)
* [Project Features](#project-features)
* [File Descriptions](#file-descriptions)
* [Deployment & Setup on InfinityFree](#deployment--setup-on-infinityfree)
* [How to Run & Test](#how-to-run--test)
* [Expected Results](#expected-results)

---

## Repository Contents

* `index.php` – The main dynamic interface file containing the input form and responsive database output table with status toggle controls.
* `in.php` – PHP backend script that processes incoming form requests and inserts new user records into the MySQL database.
* `db.php` – Database connection script managing authentication credentials with the MySQL server.
* `README.md` – Main documentation file explaining project steps, architecture, and live deployment details.

---

## Task Overview

This task was developed as part of the **Smart Methods Training Program (July 2026)**.  
The primary objective is to design and build a functional dynamic web application using **HTML, CSS, PHP, and MySQL**. The system allows users to submit personal details (Name and Age) via a single-line form, stores the submitted entries into a database table, displays all records in a styled interactive table below the form, and enables real-time status toggling between `0` and `1` for each individual record. The fully integrated backend logic and database are deployed live via **InfinityFree**.

---

## Database Architecture

The MySQL database table `users` is structured with the following schema:

| Column Name | Data Type    | Constraints                  | Description                         |
| :---        | :---         | :---                         | :---                                |
| `id`        | INT          | PRIMARY KEY, AUTO_INCREMENT  | Unique record identifier            |
| `name`      | VARCHAR(100) | NOT NULL                     | User's submitted name               |
| `age`       | INT          | NOT NULL                     | User's submitted age                |
| `status`    | TINYINT(1)   | DEFAULT 0                    | Binary flag status (toggles 0 / 1) |

  ```sql
  CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT(1) DEFAULT 0
  );
 ```
---

## Project Features

* **Inline Single-Line Form:** Allows rapid user data entry for `Name` and `Age`.
* **Dynamic Table Rendering:** Automatically retrieves and displays all saved database entries.
* **Status Toggle Mechanism:** Features an instant `Toggle` button action per row to switch record status between `0` and `1`.
* **Modern Clean UI:** Custom-styled using CSS flexbox, responsive table elements, smooth hover state transitions, and clean typography.
* **Live Server Deployment:** Fully configured and hosted using InfinityFree online web server and remote MySQL database services.

---

## File Descriptions

* **`index.php`:** Serves as the web application entry point. Combines custom CSS UI design, HTML form rendering, database retrieval query processing, and inline status updating routing.
* **`in.php`:** Handles HTTP POST requests sent from the form, sanitizes the inputs, inserts a new user record into the database with default `status = 0`, and redirects back to the primary view.
* **`db.php`:** Establishes connection to the MySQL database engine using the `mysqli` driver with configured host credentials.

---

## Deployment & Setup on InfinityFree

1. **Account & Subdomain Setup:** Created a free hosting account and configured a custom subdomain on **InfinityFree**.
2. **Database Configuration:** Created a MySQL database instance using the **vPanel / MySQL Databases** management suite.
3. **Database Schema Creation:** Executed the table generation query using **phpMyAdmin** SQL execution interface.
4. **Environment Connection Update:** Updated connection parameters within `db.php` (`$host`, `$user`, `$pass`, `$dbname`) to mirror InfinityFree remote server credentials.
5. **File Upload:** Deployed `index.php`, `in.php`, and `db.php` directly into the `htdocs` root directory using InfinityFree's Online **File Manager**.

---

## How to Run & Test

1. Visit the live hosted URL: `https://user-status-database.infinityfreeapp.com/index.php`
2. **Add Record:** Enter a name into the **Name** input box, an age into the **Age** box, and click **Submit**.
3. **Verify Insertion:** Confirm that the newly created user appears instantly inside the table below with a default `Status` value of `0`.
4. **Test Toggle Action:** Click the **Toggle** button in the *Action* column of any record to switch its status dynamically from `0` to `1` (or `1` back to `0`).

---

## Expected Results

Upon accessing the live web page, users are greeted with a centered, styled user form and data table:

* Submitting new entries immediately updates the underlying MySQL table and displays the new row inside the UI table.
* Clicking the **Toggle** button reloads the page with updated status values (`0` $\leftrightarrow$ `1`) stored permanently inside the remote database server.

 <img width="609" height="344" alt="image" src="https://github.com/user-attachments/assets/78e2a522-8286-46cf-91f7-d2f1a5802482" />
