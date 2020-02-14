# Library-Management-System
## Requirements
  #### This system will keep book entry record, book issue and return record. Admin can make any query regarding a student issued or returned book, fine if return date expire, required book whether available or not.
## Planning
*	First of all a librarian can login to the panel using the username and password.
*	After logging in, Librarian can see several options. The options are: Issue book, active issued book, add book, search book.
*	**Issue Book**: In the page, Librarian can issue a book to a student. A student cannot have more than 3 active issued books. Librarian have to write the student id to specify a student. After specifying the student, Librarian can see if the student is eligible for the issue or not. If he is not eligible then Librarian cannot proceed further. The student is eligible if he has less than 3 active issued books. If the student is eligible then the librarian can issue book to the student. To issue a book, Librarian have to insert the book code, this will ensure the book availability to the inventory. If the book is available then the operation can be performed. The issued books has to be returned within 15 days. Otherwise for each days BDT 2 will be fined. After issuing the book, the book inventory will be updated.
*	**Fine Payment**: The fine BDT will be added to the student account if he does not pay during the return time. A student can pay his fine in Fine Payment page where the librarian need student id to specify the student and it will show the amount due of the student. The payment procedure will be done accordingly.
*	**Active Issued Book**: This is the page where all the active issued books would be displayed. Librarian can search using the student id or book id. Here librarian can receive the book from the student by clicking receive book. The will show the fine amount if there is any. The fine can be receive immediately or the librarian can skip this. After receiving the book, the book inventory will be updated. 
*	**Add Book**: The librarian can add book using this page. The librarian need to provide Book ID, Book name, book author, edition, number of books etc for the insertion to the database. A librarian can add existing book to update its inventory.  For adding existing book, the librarian have to insert book id to check whether the book is already in the bookshelf. If there is no book available with the book id then that ensures it's a new collection of book. The librarian adds the book accordingly.
*	**Search Book**: Using this page, a librarian can search a specific book using book name, book id, author etc. This will show the number of books available also. From this page, Librarian can be routed to the issue book page by clicking issue this book. Issue this book option will be enable if and only if the book is available.
## Tables For Database
* Student(student_id, student_name , student_roll, student_session);
* Librarian(librarian_id, librarian_name);
* Login_Credential(librarian_id, librarian_username, librarian_password);
* Book(book_id, book_name, book_author, book_edition);
* Issued_Book(student_id, book_id, issued_date, estimated_return_date, returned_date);
* Fine(student_id, amount);
* Department(department_id, department_name);
* Inventory(book_id, number_of_books);
* Student_Department(student_id, department_id);
## ER Diagram
<img src="https://i.imgur.com/panm18l.png" alt="ER Diagram">

## Database Schema

```sql
CREATE TABLE student(
    student_id varchar(255) primary key not null,
    student_name varchar(255) not null,
    student_roll varchar(255) not null,
    student_session varchar(255) not null
);
CREATE TABLE department(
    department_id varchar(255) primary key not null,
    department_name varchar(255) not null
);
CREATE TABLE librarian(
    librarian_id varchar(255) primary key not null,
    librarian_name varchar(255) not null    
);
CREATE TABLE book(
    book_id varchar(255) primary key not null,
    book_name varchar(255) not null, 
    book_author varchar(255) not null, 
    book_edition varchar(255) not null
);
CREATE TABLE student_department(
    student_id varchar(255) not null,
    department_id varchar(255) not null,
    foreign key (student_id) references student(student_id),
    foreign key (department_id) references department(department_id)
);
CREATE TABLE login_credential(
    librarian_id varchar(255) not null,
    librarian_username varchar(255) not null, 
    librarian_password varchar(255) not null, 
    foreign key (librarian_id) references librarian(librarian_id)
);
CREATE TABLE issued_book(
    book_id varchar(255) not null, 
    student_id varchar(255) not null, 
    issued_date varchar(255) not null, 
    estimated_return_date varchar(255) not null, 
    returned_date varchar(255), 
    foreign key (book_id) references book(book_id),
    foreign key (student_id) references student(student_id)
);
CREATE TABLE inventory(
    book_id varchar(255) not null, 
    number_of_books int not null,
    foreign key (book_id) references book(book_id)
);
CREATE TABLE fine(
    student_id varchar(255) not null, 
    amount int not null,
    foreign key (student_id) references student(student_id)
);
```

## Dummy Values

```sql
INSERT INTO student(student_id, student_name, student_roll, student_session) VALUES ('001A', 'Sazzad Hossain', '17081', '2016-17'), ('001B', 'Ahadul Islam', '17099', '2016-17'), ('001C', 'Saidur Rahman', '17090', '2016-17'), ('001D', 'Al-Hasan Rahman', '17083', '2016-17');

INSERT INTO department(department_id, department_name) VALUES ('001DEPT', 'CSE'), ('002DEPT', 'BBA'), ('003DEPT', 'ECE');

 INSERT INTO librarian(librarian_id, librarian_name) VALUES ('001LIB', 'Nusrat Jahan'),('002LIB', 'Halima Islam'), ('003LIB', 'Nur Muhammad');
 
 INSERT INTO book(book_id, book_name, book_author, book_edition) VALUES ('001BOOK', 'Software Engineering', 'Sommerville', '2nd'), ('002BOOK', 'Compiler Design Principles', 'Ullman and Aho', '2nd'), ('003BOOK', 'Introduction to Automata Theory', 'John E. Hopcroft', '3rd');
 
INSERT INTO student_department(department_id, student_id) VALUES ('001DEPT', '001A'),('002DEPT', '001B'), ('001DEPT', '001C'), ('003DEPT', '001D');

 INSERT INTO login_credential(librarian_id, librarian_username, librarian_password) VALUES ('001LIB', 'nusrat@library', 'admin123'), ('002LIB', 'halima@library', 'admin123'), ('003LIB', 'nur@library', 'admin123');
 
INSERT INTO issued_book(book_id, student_id, issued_date, estimated_return_date, returned_date) VALUES ('001BOOK', '001A', '14-02-2020', '29-02-2020', ''), ('001BOOK', '001B', '14-02-2020', '29-02-2020', ''), ('002BOOK', '001D', '14-02-2020', '29-02-2020', '');

INSERT INTO inventory(book_id, number_of_books) VALUES ('001BOOK', 15), ('002BOOK', 12), ('003BOOK', 5);

INSERT INTO fine(student_id, amount) VALUES ('001A', 150), ('001B', 120), ('001C', 50), ('001D', 50);
```
