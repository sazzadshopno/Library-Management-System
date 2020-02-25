INSERT INTO
    `book` (
        `isbn_no`,
        `book_title`,
        `book_author`,
        `stock`,
        `available`
    )
VALUES
    (
        '1011',
        'Computer Fundamentals',
        'Pradeep K. Sinha',
        '15',
        '15'
    ),
    (
        '1012',
        'Programming In ANSI C',
        'E. Balagurusamy',
        '15',
        '15'
    ),
    (
        '1014',
        'Introductory Circuit Analysis',
        'Boyelsted',
        '15',
        '15'
    ),
    (
        '1015',
        'Differential Calculus',
        'Dr. Abdul Matin',
        '15',
        '15'
    ),
    (
        '1021',
        'Data Structure & Algorithm',
        'Sartaj Sahani',
        '15',
        '15'
    ),
    (
        '1023',
        'Physics Part-II',
        'David Halliday',
        '15',
        '15'
    ),
    (
        '10251',
        'Integral Calculus',
        'Dr. Abdul Matin',
        '15',
        '15'
    ),
    (
        '10252',
        'Differential Equation',
        'Dr. Abdul Matin',
        '15',
        '15'
    ),
    (
        '1026',
        'An Introduction To Statistics',
        'M. Nurul Islam',
        '15',
        '15'
    ),
    (
        '1027',
        "Discrete Mathmatics And It's Application",
        'K. H. Rosen',
        '15',
        '15'
    );

INSERT INTO
    `student` (
        `student_id`,
        `student_name`,
        `student_roll`,
        `student_session`,
        `student_department`,
        `student_fine`
    )
VALUES
    (
        'CSE24_STD037',
        'Amin Uddin Abed',
        '17037',
        '2016-17',
        'CSE',
        '0'
    ),
    (
        'CSE24_STD081',
        'Sazzad Hossain',
        '17081',
        '2016-17',
        'CSE',
        '0'
    ),
    (
        'CSE24_STD083',
        'Al Hasan Rahman',
        '17083',
        '2016-17',
        'CSE',
        '0'
    ),
    (
        'CSE24_STD084',
        'Saiful Islam',
        '17084',
        '2016-17',
        'CSE',
        '0'
    ),
    (
        'CSE24_STD090',
        'Saidul Rahman',
        '17090',
        '2016-17',
        'CSE',
        '0'
    );

INSERT INTO
    `librarian` (
        `librarian_id`,
        `librarian_name`,
        `librarian_username`,
        `librarian_password`
    )
VALUES
    (
        'LIB_001',
        'Abdul Karim',
        'LIB_001_ADMIN',
        'ISTISTIST'
    ),
    (
        'LIB_002',
        'Sahadat Hasan',
        'LIB_002_ADMIN',
        'ISTISTIST'
    );

INSERT INTO
    `studentmanagedby` (`librarian_id`, `student_id`, `std_reg_date`)
VALUES
    ('LIB_001', 'CSE24_STD037', '2020-02-25'),
    ('LIB_001', 'CSE24_STD081', '2020-02-25'),
    ('LIB_002', 'CSE24_STD083', '2020-02-25'),
    ('LIB_001', 'CSE24_STD084', '2020-02-25'),
    ('LIB_002', 'CSE24_STD090', '2020-02-25');

INSERT INTO
    `bookmanagedby` (`librarian_id`, `isbn_no`, `stock_date`)
VALUES
    ('LIB_001', '1011', '2020-02-25'),
    ('LIB_001', '1012', '2020-02-25'),
    ('LIB_002', '1014', '2020-02-25'),
    ('LIB_001', '1015', '2020-02-25'),
    ('LIB_002', '1021', '2020-02-25'),
    ('LIB_002', '1023', '2020-02-25'),
    ('LIB_001', '10251', '2020-02-25'),
    ('LIB_001', '10252', '2020-02-25'),
    ('LIB_001', '1026', '2020-02-25'),
    ('LIB_001', '1027', '2020-02-25');