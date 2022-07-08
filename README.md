# diavox_grading_system_exam

1. git clone -b master https://github.com/melchor09/diavox_grading_system_exam.git
2. run command "composer install" for vendor
3. run command "npm install"
4. run command "npm run dev"
5. run command "php artisan serve"
6. import MySQL DB


Credentials
**Super Admin**
username: superadmin@gmail.com
password: superadmin
__________________________________

**teacher:**
username: merson@gmail.com
password: 1111

username: angel@gmail.com
password: 1111
__________________________________

**Student:**
username: mikko@gmail.com
password: 1111

username: marjon@gmail.com
password: 1111

username: jasper@gmail.com
password: 1111
__________________________________


Functionality
profile management (laravel jetstream)

Super Admin:
- Upon login, must be redirected to admin page.
- Should be able to view list of subjects and users.
- Must be able to Add New Subjects.
- Must be able to Add New Users. Should only be able to add “Teacher” or “Student” role.
- 
Teacher:
- Upon login, must be redirected to grading page.
- Should be able to update the grades of students.
- Create a form that accepts inputs for student, subject and grade.
- If the record exists, update the grade, otherwise, insert new grade.
- 
Student:
- Upon login, must be redirected to grades page.
- Must only be able to view grades of his/her own.





