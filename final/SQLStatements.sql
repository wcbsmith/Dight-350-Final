START TRANSACTION;

CREATE TABLE task_importance_levels
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    importance VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE task_status_options
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    status VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE task_urgency_levels 
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    urgency VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE users 
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    user VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NUll,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE task_summary
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    description VARCHAR(500), 
    due_date DATETIME,
    importance_id INT(10) UNSIGNED DEFAULT NULL,
    urgency_id INT(10) UNSIGNED DEFAULT NULL,
    user_id INT(10) UNSIGNED DEFAULT NULL,
    status_id INT(10) UNSIGNED DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (importance_id)
        REFERENCES task_importance_levels(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    FOREIGN KEY (urgency_id)
        REFERENCES task_urgency_levels(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    FOREIGN KEY (status_id)
        REFERENCES task_status_options(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE task_summary 
ADD status VARCHAR(50) NOT NULL;

COMMIT;
        
        
INSERT INTO users (user, password) VALUES ("caleb", "iamadmin!"), ("clara", "iamadminswife!"), ("gus", "iampuppy!");

INSERT INTO task_status_options (status) VALUES ("complete"), ("in progress");

INSERT INTO task_urgency_levels (urgency) VALUES ("Urgent"), ("Not-Urgent");

INSERT INTO task_importance_levels (importance) VALUES ("Important"), ("Not-Important");

INSERT INTO task_summary (description, due_date, importance_id, urgency_id, user_id, status) VALUES ("Get Claire his medicine","2018-04-27 16:00:00",1,2,1,1), ("Pick up Clara's like it","2018-04-28 11:00:00",1,2,2,1), ("Take pictures with Clara","2018-04-28 17:30:00",1,1,3,1), ("Pick up Clara's locket","2018-05-02 15:20:11",2,2,2,1), ("Bring my passport","2018-05-15 09:00:00",1,2,3,2), ("Call Health center","2018-09-04 10:30:00",2,2,2,1), ("Contact Chris","2018-09-04 17:00:00",1,1,2,2), ("Email Josh Whirlpool","2018-09-12 08:00:00",1,1,1,1), ("Turn in capstone artifacts","2018-09-18 16:15:00",1,2,3,2), ("Email Dr. Hawkes","2018-09-18 16:30:00",2,2,1,1), ("Email for club logo","2018-09-19 10:00:00",1,1,3,2), ("Email professors invite","2018-09-19 10:00:00",2,1,1,1), ("Talk about cruise control","2018-09-21 07:00:00",2,2,3,1), ("Prepare for general conference","2018-09-30 16:00:00",1,1,3,2), ("Email Brother Hawks","2018-10-02 10:00:00",2,2,2,1), ("Email SME editor","2018-10-02 14:00:00",2,1,2,1), ("Kahn academy statistics","2018-10-02 17:00:00",2,1,3,2), ("Take chairs","2018-10-14 08:00:00",1,2,3,1), ("Talk to sprint","2018-10-31 11:30:00",2,1,1,2), ("Do the proper assignment","2018-11-05 18:00:00",1,1,2,2), ("Bring gorilla glue","2018-11-06 07:00:00",2,2,2,2), ("Text Clara about movie","2018-11-27 11:45:00",2,2,3,1), ("Email SME Club","2018-11-28 16:00:00",2,1,1,2), ("Buy White elephant gift","2018-11-30 19:00:00",1,2,3,1), ("Bring bread for the sacrament","2018-12-08 12:00:00",2,2,1,1), ("Email Ken and Tera","2018-12-10 09:00:00",1,2,2,1), ("Email Amy","2018-12-10 09:00:00",2,1,3,2), ("Send SME email","2019-01-08 12:30:00",2,2,1,2), ("Reserve racquetball court for 7:00 PM","2019-01-25 10:00:00",2,1,2,2), ("Grab cable and drive bay","2019-02-08 16:00:00",1,1,3,2), ("Take Music 202 exam","2019-02-21 22:00:00",2,2,1,1), ("Remind Clara to take medicine","2019-02-24 21:00:00",1,2,2,1), ("Call Allstate","2019-03-29 12:00:00",2,1,2,1), ("Pick up SME Chord","2019-04-17 08:00:00",2,1,2,2), ("Call/Talk. To Sarah",NULL,2,2,3,2), ("Plan camping trip",NULL,2,2,3,2), ("Email president",NULL,2,1,1,2), ("Turn in Josh's application",NULL,2,2,1,1), ("Email Club about Whirlpool",NULL,2,2,1,1), ("Work on grandpa’s journal",NULL,1,2,1,2), ("Finish HW 7",NULL,2,1,2,2), ("Emal Magelby",NULL,2,2,1,1), ("Help Jennifer move",NULL,1,2,3,1), ("Do laundry",NULL,1,1,1,2), ("Take the car in",NULL,1,1,3,1), ("Write Letter To Rebekah",NULL,1,1,1,1), ("Find a date for Saturday",NULL,2,2,2,1), ("Write one page for Automation",NULL,1,2,3,1), ("Email Jenny",NULL,1,2,2,1), ("Start tool design project",NULL,1,1,3,1), ("Bring home watermelon",NULL,1,2,1,2), ("Make extra meals freeze then",NULL,2,1,1,1), ("Pay Rent",NULL,2,2,1,2), ("Capstone class prep assignment",NULL,2,1,2,2), ("Account",NULL,1,2,3,2), ("Do Data analysis quiz",NULL,1,1,1,1), ("HW 10",NULL,2,1,3,2), ("Tel Kara",NULL,1,2,1,2), ("Take the bike into rocky mountain cycle cancel",NULL,1,1,3,1), ("Monday reading Rel 200",NULL,1,2,1,1), ("Preworkout Meal",NULL,1,1,3,2), ("Fold laundry",NULL,2,2,1,2), ("Email graduation packet to advisement office",NULL,2,1,3,2), ("Buy foam core!!",NULL,1,2,1,2), ("Fill out all assignments in to dos",NULL,2,2,3,2), ("Meal 1",NULL,2,2,1,2), ("Clean house",NULL,2,1,1,2), ("Find O sheet music",NULL,1,1,1,1), ("Post workout Meal",NULL,1,2,3,1), ("Meal 1",NULL,2,1,1,2), ("Email BD",NULL,1,2,2,2), ("Pay Rent",NULL,2,1,3,2), ("Leave by 8:15",NULL,1,1,3,2), ("Check the window",NULL,2,2,3,1), ("Send networking invites",NULL,2,2,2,2), ("Call Eric",NULL,2,2,1,2), ("Look salt lake choral artists",NULL,1,2,3,1), ("Check Nice apt addressa",NULL,1,1,3,2), ("Pay Rent",NULL,1,2,2,2), ("Email doctorly",NULL,2,1,3,2), ("Email Dr. Howell",NULL,2,1,1,2), ("Call Pearson lumber",NULL,1,2,1,2), ("Program 1-2 hrs",NULL,2,2,1,2), ("Finish application",NULL,2,1,3,2), ("Do 3 pages of Econ he",NULL,1,1,3,1), ("Measure the trunk",NULL,1,1,1,2), ("Make banana muffins",NULL,2,2,1,2), ("MFG 440 Video",NULL,2,2,2,2), ("Post workout Meal",NULL,2,2,3,2), ("MFG 440 Video",NULL,2,2,3,2), ("MFG 440 Video",NULL,1,2,1,1), ("Email health center",NULL,2,2,3,1), ("Call mom",NULL,2,2,2,1), ("Email Grandpa",NULL,2,1,1,1), ("Look up tools/ingredients for concrete planters",NULL,1,1,3,1), ("MFG 440 Video",NULL,2,2,3,2), ("Meal 3",NULL,1,2,2,1), ("Pray to recognize my guilt before God. I.e.ask to know what I should change...",NULL,2,1,2,2), ("Write out goals",NULL,1,1,3,1);

SELECT  task_summary.id, 
        task_summary.description, 
        task_summary.due_date,
        task_summary.urgency_id as urgency_id,
        task_urgency_levels.urgency as urgency,
        task_summary.importance_id as importance_id,
        task_importance_levels.importance as importance,
        task_summary.user_id as user_id,
        users.user as name,
        users.password as password,
        task_summary.status_id as status_id, 
        task_status_options.status as task_status 
        FROM task_summary
JOIN users ON task_summary.user_id=users.id
JOIN task_urgency_levels ON task_summary.urgency_id=task_urgency_levels.id
JOIN task_importance_levels ON task_summary.importance_id=task_importance_levels.id
JOIN task_status_options ON task_summary.status_id=task_status_options.id
ORDER BY task_summary.id;

