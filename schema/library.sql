CREATE TABLE book(
    isbn_no varchar(255) primary key not null,
    book_title varchar(255) not null,
    book_author varchar(255) not null,
    stock int not null,
    available int not null
);
 
CREATE TABLE librarian(
    librarian_id varchar(255) primary key not null,
    librarian_name varchar(255) not null,
    librarian_username varchar(255) not null,
    librarian_password varchar(255) not null
);
 
CREATE TABLE student(
    student_id varchar(255) primary key not null,
    student_name varchar(255) not null,
    student_roll varchar(255) not null,
    student_session varchar(255) not null,
    student_department varchar(255) not null,
    student_fine int not null
);
 
CREATE TABLE bookManagedBy(
    librarian_id varchar(255) not null,
    isbn_no varchar(255) not null,
    stock_date date not null,
    foreign key (librarian_id) references librarian(librarian_id) on delete cascade on update cascade,
    foreign key (isbn_no) references book(isbn_no) on delete cascade on update cascade
);
 
CREATE TABLE studentManagedBy(
    librarian_id varchar(255) not null,
    student_id varchar(255) not null,
    std_reg_date date not null,
    foreign key (librarian_id) references librarian(librarian_id) on delete cascade on update cascade,
    foreign key (student_id) references student(student_id) on delete cascade on update cascade
);
 
CREATE TABLE borrowedBy(
    isbn_no varchar(255) not null,
    student_id varchar(255) not null,
    issue_date date not null,
    due_date date not null,
    return_date date,
    foreign key (isbn_no) references book(isbn_no) on delete cascade on update cascade,
    foreign key (student_id) references student(student_id) on delete cascade on update cascade
);