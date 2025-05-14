/* User Details */
CREATE TABLE Reg_User(
    User_ID int,
    Fname VARCHAR(50),
    Lname VARCHAR(50),
    Country VARCHAR(30),
    Email VARCHAR(50),
    Password VARCHAR(30),
    PRIMARY KEY (User_ID)
);

/* Registered user phone details */
CREATE TABLE Reg_User_Phone (
    User_ID int,
    Phone_No VARCHAR(20),
    PRIMARY KEY (User_ID, Phone_No)
);

/* Admin Details */
CREATE TABLE Admin(
    Admin_ID CHAR(5),
    Fname VARCHAR(50),
    Lname VARCHAR(50),
    Email VARCHAR(50),
    Password VARCHAR(30),
    PRIMARY KEY (Admin_ID)
);

/* Admin phone details */
CREATE TABLE Admin_Phone (
    Admin_ID CHAR(5),
    Phone_No VARCHAR(20),
    PRIMARY KEY (Admin_ID, Phone_No)
);

/* Hotel Owner Details */
CREATE TABLE Hotel_Owner(
    HO_ID CHAR(5), /*Hotel Owner ID*/
    Fname VARCHAR(50),
    Lname VARCHAR(50),
    Email VARCHAR(50),
    Password VARCHAR(30),
    PRIMARY KEY (HO_ID)
);

/* Hotel Owner phone details */
CREATE TABLE Hotel_Owner_Phone (
    HO_ID CHAR(5),
    Phone_No VARCHAR(20),
    PRIMARY KEY (HO_ID, Phone_No)
);

/* Hotel Manager Details */
CREATE TABLE Manager(
    M_ID CHAR(3), /*Manager ID*/
    HO_ID CHAR(5),
    Fname VARCHAR(50),
    Lname VARCHAR(50),
    Email VARCHAR(50),
    Password VARCHAR(30),
    PRIMARY KEY (M_ID)
);

/* Manager phone details */
CREATE TABLE Manager_Phone (
    M_ID CHAR(3),
    Phone_No VARCHAR(20),
    PRIMARY KEY (M_ID, Phone_No)
);

/* Hotel Details */
CREATE TABLE Hotel(
    RegNo CHAR(6),
    HO_ID CHAR(5),
    M_ID CHAR(3),
    Name VARCHAR(50),
    H_type VARCHAR(50), /*Hotel type*/
    Location VARCHAR(50),
    Avl_Rooms INT, /*Available rooms*/
    Facilities VARCHAR(250),
    Email VARCHAR(50),
    PRIMARY KEY (RegNo)
);

/* Hotel phone details */
CREATE TABLE Hotel_Phone (
    RegNo CHAR(6),
    Phone_No VARCHAR(20),
    PRIMARY KEY (RegNo, Phone_No)
);

/* Room Details */
CREATE TABLE Rooms(
    RegNo CHAR(6),
    Room_ID CHAR(4),
    R_type VARCHAR(100), /*Room type*/
    Bedding VARCHAR(100),
    Price INT,
    PRIMARY KEY (Room_ID)
);

/* Reservation Details */
CREATE TABLE Reservation(
    Res_ID CHAR(4), /*Reservation ID*/
    User_ID int,
    RegNo CHAR(6),
    Name VARCHAR(50),
    Email VARCHAR(50),
    Contact_No VARCHAR(20),
    Check_In DATE,
    Check_Out DATE,
    No_Adults INT,
    No_child INT,
    No_rooms INT,
    PRIMARY KEY (Res_ID)
);

/* Payment Details */
CREATE TABLE Payment(
    Res_ID CHAR(4),
    P_ID CHAR(4), /*Payment ID*/
    P_Date DATE, /*Payment date*/
    P_type VARCHAR(25), /*Payment type*/
    Amount INT,
    PRIMARY KEY (P_ID)
);



/* Add Details to tables */

/* User table */
/*
insert into Reg_User (User_ID, Fname, Lname, Country, Email, Password) values ('U0001', 'Emily', 'Johnson', 'United States', 'emily.johnson@gmail.com', 'P@ssw0rd1');
insert into Reg_User (User_ID, Fname, Lname, Country, Email, Password) values ('U0002', 'Daniel', 'Martinez', 'Mexico', 'daniel.martinez@yahoo.com', 'SecurePass123');
insert into Reg_User (User_ID, Fname, Lname, Country, Email, Password) values ('U0003', 'Sarah', 'Thompson', 'United Kingdom', 'sarah.thompson@outlook.com', 'Th0mps0n!');
insert into Reg_User (User_ID, Fname, Lname, Country, Email, Password) values ('U0004', 'Ashley', 'Lee', 'China', 'ashley.lee@gmail.com', 'L33Ashley');
insert into Reg_User (User_ID, Fname, Lname, Country, Email, Password) values ('U0005', 'Christopher', 'Kim', 'Russia', 'christopher.kim@example.com', 'K1mChri$');
*/

/* User Contact number table */
/*
insert into Reg_User_Phone (User_ID, Phone_No) values('U0001', '0712345678');
insert into Reg_User_Phone (User_ID, Phone_No) values('U0002', '0723456789');
insert into Reg_User_Phone (User_ID, Phone_No) values('U0003', '0734567890');
insert into Reg_User_Phone (User_ID, Phone_No) values('U0004', '0745678901');
insert into Reg_User_Phone (User_ID, Phone_No) values('U0005', '0756789012');
*/

/* Admin table */
insert into Admin (Admin_ID, Fname, Lname, Email, Password) values('A0001', 'Nuwan', 'Perera', 'nuwan.perera@gmail.com', 'Perera123!');
insert into Admin (Admin_ID, Fname, Lname, Email, Password) values('A0002', 'Thilini', 'Rajapakse', 'thilini.rajapakse@outlook.com', 'Raj@pakse456');

/* Admin contact number table */
insert into Admin_Phone (Admin_ID, Phone_No) values('A0001', '0767890123');
insert into Admin_Phone (Admin_ID, Phone_No) values('A0002', '0778901234');

/* Hotel Owner table */
insert into Hotel_Owner (HO_ID, Fname, Lname, Email, Password) values('HO001', 'Dilshan', 'Gunawardena', 'dilshan.gunawardena@yahoo.com', 'Dilsh@n2024');
insert into Hotel_Owner (HO_ID, Fname, Lname, Email, Password) values('HO002', 'Priyantha', 'Silva', 'priyantha.silva@gmail.com', 'Silva@123');
insert into Hotel_Owner (HO_ID, Fname, Lname, Email, Password) values('HO003', 'Chamara', 'Bandara', 'chamara.bandara@gmail.com', 'Bandara@2023');
insert into Hotel_Owner (HO_ID, Fname, Lname, Email, Password) values('HO004', 'Kamal', 'Fernando', 'kamal.fernando@gmail.com', 'F3rnand0K@m');

/* Hotel Owner contact number table */
insert into Hotel_Owner_Phone (HO_ID, Phone_No) values('HO001', '0789012345');
insert into Hotel_Owner_Phone (HO_ID, Phone_No) values('HO002', '0790123456');
insert into Hotel_Owner_Phone (HO_ID, Phone_No) values('HO003', '0701234567');
insert into Hotel_Owner_Phone (HO_ID, Phone_No) values('HO004', '0713456789');

/* Hotel Manager Details */
insert into Manager (M_ID, HO_ID, Fname, Lname, Email, Password) values('M01', 'HO001', 'Ishara', 'Silva', 'ishara.silva@gmail.com', 'Silva@456');
insert into Manager (M_ID, HO_ID, Fname, Lname, Email, Password) values('M02', 'HO002', 'Nadeesha', 'Fernando', 'nadeesha.fernando@yahoo.com', 'N@deesha789');
insert into Manager (M_ID, HO_ID, Fname, Lname, Email, Password) values('M03', 'HO002', 'Kavindu', 'Perera', 'kavindu.perera@outlook.com', 'PereraPwd!');
insert into Manager (M_ID, HO_ID, Fname, Lname, Email, Password) values('M04', 'HO003', 'Chaminda', 'Rajapaksa', 'chaminda.rajapaksa@example.com', 'Raj@1234');
insert into Manager (M_ID, HO_ID, Fname, Lname, Email, Password) values('M05', 'HO003', 'Sameera', 'Gunawardena', 'sameera.gunawardena@gmail.com', 'Gun@wardenaS');
insert into Manager (M_ID, HO_ID, Fname, Lname, Email, Password) values('M06', 'HO003', ' Nimal', 'Perera', 'nimal.perera@yahoo.com', 'Perera@123');
insert into Manager (M_ID, HO_ID, Fname, Lname, Email, Password) values('M07', 'HO004', 'Dilhani', 'Silva', 'dilhani.silva@outlook.com', 'SilvaDilhani#');
insert into Manager (M_ID, HO_ID, Fname, Lname, Email, Password) values('M08', 'HO004', 'Janith', 'Perera', 'janith.perera@outlook.com', 'Janith123@');

/* Hotel Manager contact number Details */
insert into Manager_Phone (M_ID, Phone_No) values('M01', '0712345678');
insert into Manager_Phone (M_ID, Phone_No) values('M02', '0723456789');
insert into Manager_Phone (M_ID, Phone_No) values('M03', '0734567890');
insert into Manager_Phone (M_ID, Phone_No) values('M04', '0745678901');
insert into Manager_Phone (M_ID, Phone_No) values('M05', '0766789012');
insert into Manager_Phone (M_ID, Phone_No) values('M06', '0771234567');
insert into Manager_Phone (M_ID, Phone_No) values('M07', '0734567890');
insert into Manager_Phone (M_ID, Phone_No) values('M08', '0745678901');

/* hotel table */
insert into Hotel (RegNo, HO_ID, M_ID, Name, H_type, Location, Avl_Rooms, Facilities, Email) values('HR1001', 'HO001', 'M01', 'Emerald Bay Hotel', 'Luxury Hotel', 'Trincomalee, Eastern Province', 5, 'Swimming Pool, Car Park, Spa, Gym', 'contact@emeraldbayhotel.lk');
insert into Hotel (RegNo, HO_ID, M_ID, Name, H_type, Location, Avl_Rooms, Facilities, Email) values('HR1002', 'HO002', 'M02', 'Royal Lotus Resort', 'Resort', 'Negombo, Western Province', 2, 'Swimming Pool, Car Park', 'info@royallotusresort.lk');
insert into Hotel (RegNo, HO_ID, M_ID, Name, H_type, Location, Avl_Rooms, Facilities, Email) values('HR1003', 'HO002', 'M03', 'Sunset Seaview Lodge', 'Lodge', 'Galle, Southern Province', 3, 'Car Park', 'reservations@sunsetseaviewlodge.lk');
insert into Hotel (RegNo, HO_ID, M_ID, Name, H_type, Location, Avl_Rooms, Facilities, Email) values('HR1004', 'HO003', 'M04', 'Ceylon Crest Inn', 'Inn', 'Kandy, Central Province', 3, 'Swimming Pool, Car Park', 'bookings@ceyloncrestinn.com');
insert into Hotel (RegNo, HO_ID, M_ID, Name, H_type, Location, Avl_Rooms, Facilities, Email) values('HR1005', 'HO003', 'M05', 'Paradise Palm Retreat', 'Resort', 'Ella, Uva Province', 4, 'Swimming Pool, Car Park, Spa', ' reservations@paradisepalmretreat.com');
insert into Hotel (RegNo, HO_ID, M_ID, Name, H_type, Location, Avl_Rooms, Facilities, Email) values('HR1006', 'HO003', 'M06', 'Sapphire Shores Hotel', 'Luxury Hotel', 'Arugam Bay, Eastern Province', 8, 'Swimming Pool, Car Park, Spa, Gym', 'enquiries@sapphireshoreshotel.com');
insert into Hotel (RegNo, HO_ID, M_ID, Name, H_type, Location, Avl_Rooms, Facilities, Email) values('HR1007', 'HO004', 'M07', 'Oceanic Breeze Resort', 'Resort', 'Galle, Southern Province', 5, 'Car Park, Swimming Pool, Spa', 'hello@oceanicbreezeresort.lk');
insert into Hotel (RegNo, HO_ID, M_ID, Name, H_type, Location, Avl_Rooms, Facilities, Email) values('HR1008', 'HO004', 'M08', 'Coconut Grove Inn', 'Inn', 'Galle, Southern Province', 4, 'Swimming Pool, Car Park', 'contact@coconutgrovehotel.lk');

/* hotel contact number table */
insert into Hotel_Phone (RegNo, Phone_No) values('HR1001', '0756789012');
insert into Hotel_Phone (RegNo, Phone_No) values('HR1002', '0767890123');
insert into Hotel_Phone (RegNo, Phone_No) values('HR1003', '0778901234');
insert into Hotel_Phone (RegNo, Phone_No) values('HR1004', '0789012345');
insert into Hotel_Phone (RegNo, Phone_No) values('HR1005', '0762543678');
insert into Hotel_Phone (RegNo, Phone_No) values('HR1006', '0766987012');
insert into Hotel_Phone (RegNo, Phone_No) values('HR1007', '0719032145');
insert into Hotel_Phone (RegNo, Phone_No) values('HR1008', '0770123654');

/* Room table */
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1001', 'R101', 'Executive Suite', '1 extra-large double bed', 39000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1001', 'R102', 'Premium Beachfront Room', '1 extra-large double bed and 1 single bed', 45000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1002', 'R201', ' Deluxe Ocean View Suite', '1 double bed', 35000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1002', 'R202', 'Standard Garden View Room', '1 single bed', 28000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1003', 'R301', 'Ocean View Suite', '1 double bed', 23000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1004', 'R401', 'Standard Double Room', '1 double bed', 18000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1004', 'R402', 'Family Room', '1 double bed and 1 single bed', 20000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1005', 'R501', 'Executive Suite', '1 extra-large double bed', 39000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1006', 'R601', 'Premium Beachfront Room', '1 extra-large double bed and 1 single bed', 45000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1007', 'R701', ' Deluxe Ocean View Suite', '1 double bed', 35000);
insert into Rooms (RegNo, Room_ID, R_type, Bedding, Price) values('HR1008', 'R802', 'Standard Garden View Room', '1 single bed', 28000);

/* Reservation table 
insert into Reservation (Res_ID,User_ID,Name,Email,Contact_No,Check_In,Check_Out,No_Adults,No_child,No_rooms) values('R101', '1', 'Emily Johnson', 'emily.johnson@gmail.com', '+1 (555) 123-4567', '2024-05-04', '2024-05-06', 2, 2, 1);
insert into Reservation (Res_ID,User_ID,Name,Email,Contact_No,Check_In,Check_Out,No_Adults,No_child,No_rooms) values('R202', 'U0003', 'Sarah Thompson', 'sarah.thompson@outlook.com', '+44 20 1234 5678', '2024-04-15', '2024-04-18', 2, 1, 1);
*/

/* Payment table 
insert into Payment values('R101', 'P101', '2024-03-25', 'Visa', 78000);
insert into Payment values('R202', 'P102', '2024-03-28', 'MasterCard', 70000);
*/
