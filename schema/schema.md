1. book(<ins>**isbn_no**</ins>, book_title, book_author, stock, available);
2. librarian(<ins>**librarian_id**</ins>, librarian_name, librarian_username, librarian_password);
3. student(<ins>**student_id**</ins>, student_name, student_roll, student_session, student_department, student_fine);
4. bookManagedBy(<ins>**librarian_id**</ins>, <ins>**isbn_no**</ins>, stock_date);
5. studentManagedBy(<ins>**librarian_id**</ins>, <ins>**student_id**</ins>, std_reg_date);
6. borrowedBy(<ins>**isbn_no**</ins>, <ins>**student_id**</ins>, issue_date, due_date, return_date);
