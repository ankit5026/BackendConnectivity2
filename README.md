1️⃣ Open WSL (Ubuntu) and start MySQL and Apache: sudo service mysql start && sudo service apache2 start.

2️⃣ Navigate to Apache root directory: cd /var/www/html/ and open VS Code: code ..

3️⃣ Create necessary PHP files (db_connect.php, index.php, process.php).

4️⃣ Set permissions to avoid issues: sudo chmod -R 777 /var/www/html/.

5️⃣ Open MySQL: mysql -u root -p, create a database (testdb), and a table (user_details).

6️⃣ Open http://localhost/checkingBackendConnectivity/index.php in your browser, enter details, and submit.

7️⃣ Verify stored data: mysql -u root -p, then USE testdb; followed by SELECT * FROM user_details;.

8️⃣ Restart services if needed: sudo service apache2 restart && sudo service mysql restart.

Input form


![11](https://github.com/user-attachments/assets/d9ed3340-c2b3-4e21-9340-037b9af6a973)
![2](https://github.com/user-attachments/assets/69f114fc-c576-492a-b447-b6cd7400060f)
Seeing deta by clicking see details button

![33](https://github.com/user-attachments/assets/ebb4bd18-e409-4844-85fc-b97ed8fe2d05)
we can see the information of the user
![44](https://github.com/user-attachments/assets/994b8d79-f11e-462a-bb75-57867c5a7fe4)
It will be visible in mysql too
![5](https://github.com/user-attachments/assets/ef41bd12-bf9f-41ae-9e91-97857524145a)




