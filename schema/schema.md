1. librarian(<ins>**librarian_id**</ins>, librarian_name, librarian_username, librarian_password);
2. book(<ins>**isbn_no**</ins>, <ins>**librarian_id**</ins>, book_title, book_author, stock, available, stock_date); 
3. student(<ins>**librarian_id**</ins>, <ins>**student_id**</ins>, student_name, student_roll, student_session, student_department, student_fine, std_reg_date);
4. borrowedBy(<ins>**isbn_no**</ins>, <ins>**student_id**</ins>, issue_date, due_date, return_date);
