/* User Details */
Create table Reg_User(
	User_ID char(5) not null,  /*null means empty */
	Fname varchar(50) not null,  
	Lname varchar(50) not null,
	Country varchar(30) not null,
	Email varchar(50) CHECK (Email LIKE '%_@_%._%') not null,
	Password varchar(30) not null,
	constraint User_PK PRIMARY KEY (User_ID)
);

/* Registered user phone details */
create table Reg_User_Phone (
	User_ID char(5) not null,
	Phone_No decimal(10, 0) not null,
	constraint User_Phone_PK PRIMARY KEY (User_ID),
	constraint User_Phone_FK FOREIGN KEY (User_ID) REFERENCES Reg_User
);

/* Admin Details */
create table Admin(
	Admin_ID char(5) not null,
	Fname varchar(50) not null,
	Lname varchar(50) not null,
	Email varchar(50) CHECK (Email LIKE '%_@_%._%') not null,
	Password varchar(30) not null,
	constraint Admin_PK PRIMARY KEY (Admin_ID)
);

/* Admin phone details */
create table Admin_Phone (
	Admin_ID char(5) not null,
	Phone_No decimal(10, 0) not null,
	constraint Admin_Phone_PK PRIMARY KEY (Admin_ID),
	constraint Admin_Phone_FK FOREIGN KEY (Admin_ID) REFERENCES Admin
);

/* Hotel Owner Details */
Create table Hotel_Owner(
	HO_ID char(5) not null,  /*Hotel Owner ID*/
	Fname varchar(50) not null,
	Lname varchar(50) not null,
	Email varchar(50) CHECK (Email LIKE '%_@_%._%') not null,
	Password varchar(30) not null,
	constraint HO_PK PRIMARY KEY (HO_ID)
);

/* Hotel Owner phone details */
create table Hotel_Owner_Phone (
	HO_ID char(5) not null,
	Phone_No decimal(10, 0) not null,
	constraint HO_Phone_PK PRIMARY KEY (HO_ID),
	constraint HO_Phone_FK FOREIGN KEY (HO_ID) REFERENCES Hotel_Owner
);

/* Hotel Manager Details */
create table Manager(
	M_ID char(3) not null, /*Manager ID*/
	Fname varchar(50) not null,
	Lname varchar(50) not null,
	Email varchar(50) CHECK (Email LIKE '%_@_%._%') not null,
	Password varchar(30) not null,
	constraint M_PK PRIMARY KEY (M_ID)
);

/* Manager phone details */
create table Manager_Phone (
	M_ID char(3) not null,
	Phone_No decimal(10, 0) not null,
	constraint M_Phone_PK PRIMARY KEY (M_ID),
	constraint M_Phone_FK FOREIGN KEY (M_ID) REFERENCES Manager
);

/* Hotel Details */
Create table Hotel(
	RegNo char(6) not null,
	HO_ID char(5) not null,
	M_ID char(3) not null,
	Name varchar(50) not null,
	H_type varchar(50) not null,  /*Hotel type*/
	Location varchar(50) not null,
	Avl_Rooms int not null,  /*Available rooms*/
	Facilities varchar(250) not null,
	Email varchar(50) CHECK (Email LIKE '%_@_%._%') not null,
	constraint Hotel_PK PRIMARY KEY (RegNo),
	constraint HotelOwner_FK FOREIGN KEY (HO_ID) REFERENCES Hotel_Owner(HO_ID),
	constraint Manager_FK FOREIGN KEY (M_ID) REFERENCES Manager(M_ID)
);

/* Hotel phone details */
create table Hotel_Phone (
	RegNo char(6) not null,
	Phone_No decimal(10, 0) not null,
	constraint Hotel_Phone_PK PRIMARY KEY (RegNo),
	constraint Hotel_Phone_FK FOREIGN KEY (RegNo) REFERENCES Hotel
);

/* Room Details */
create table Rooms(
	RegNo char(6) not null,
	Room_ID char(4) not null,
	R_type varchar(100) not null,  /*Room type*/
	Bedding varchar(100) not null,
	Price int not null,
	constraint Room_PK PRIMARY KEY (Room_ID),
	constraint Hotel_FK FOREIGN KEY (RegNo) REFERENCES Hotel(RegNo)

);

/* Reservation Details */
create table Reservation(
	Res_ID char(4) not null,  /*Reservation ID*/
	User_ID char(5) not null,
	Name varchar(50) not null,
	Email varchar(50) CHECK (Email LIKE '%_@_%._%') not null,
	Contact_No varchar(20) not null,
	Check_In date not null,
	Check_Out date not null,
	No_Adults int not null,
	No_child int not null,
	No_rooms int not null,
	constraint Reserve_PK PRIMARY KEY (Res_ID),
	constraint User_FK FOREIGN KEY (User_ID) REFERENCES Reg_User(User_ID)
);

/* Payment Details */
create table Payment(
	Res_ID char(4) not null,
	P_ID char(4) not null,  /*Payment ID*/
	P_Date date not null,  /*Payment date*/
	P_type varchar(25) not null,  /*Payment type*/
	Amount int not null,
	constraint Payment_PK PRIMARY KEY (P_ID),
	constraint Reserve_FK FOREIGN KEY (Res_ID) REFERENCES Reservation(Res_ID)
);

/* Review Details */
create table Review(
	Rv_ID char(4) not null,
	Msg varchar(250) not null,
);

/* Report Details */
create table Report(
	Rp_ID char(4) not null,
	M_ID char(3) not null,
	Rp_Type varchar(50) not null,
	Rp_Date date not null,
	constraint Report_PK PRIMARY KEY (Rp_ID)
);


/* Add Details to tables */

/* User table */
insert into Reg_User values('U0001', 'Emily', 'Johnson', 'United States', 'emily.johnson@gmail.com', 'P@ssw0rd1');
insert into Reg_User values('U0002', 'Daniel', 'Martinez', 'Mexico', 'daniel.martinez@yahoo.com', 'SecurePass123');
insert into Reg_User values('U0003', 'Sarah', 'Thompson', 'United Kingdom', 'sarah.thompson@outlook.com', 'Th0mps0n!');
insert into Reg_User values('U0004', 'Ashley', 'Lee', 'China', 'ashley.lee@gmail.com', 'L33Ashley');
insert into Reg_User values('U0005', 'Christopher', 'Kim', 'Russia', 'christopher.kim@example.com', 'K1mChri$');


/* Admin table */
insert into Admin values('A0001', 'Nuwan', 'Perera', 'nuwan.perera@gmail.com', 'Perera123!');
insert into Admin values('A0002', 'Thilini', 'Rajapakse', 'thilini.rajapakse@outlook.com', 'Raj@pakse456');


/* Hotel Owner table */
insert into Hotel_Owner values('HO001', 'Dilshan', 'Gunawardena', 'dilshan.gunawardena@yahoo.com', 'Dilsh@n2024');
insert into Hotel_Owner values('HO002', 'Priyantha', 'Silva', 'priyantha.silva@gmail.com', 'Silva@123');
insert into Hotel_Owner values('HO003', 'Chamara', 'Bandara', 'chamara.bandara@gmail.com', 'Bandara@2023');

/* Hotel Manager Details */
insert into Manager values('M01', 'Ishara', 'Silva', 'ishara.silva@gmail.com', 'Silva@456');
insert into Manager values('M02', 'Nadeesha', 'Fernando', 'nadeesha.fernando@yahoo.com', 'N@deesha789');
insert into Manager values('M03', 'Kavindu', 'Perera', 'kavindu.perera@outlook.com', 'PereraPwd!');
insert into Manager values('M04', 'Chaminda', 'Rajapaksa', 'chaminda.rajapaksa@example.com', 'Raj@1234');


/* hotel table */
insert into Hotel values('HR1001', 'HO001', 'M01', 'Emerald Bay Hotel', 'Luxury Hotel', 'Trincomalee, Eastern Province', 5, 'Swimming Pool, Car Park, Spa, Gym', 'contact@emeraldbayhotel.lk');
insert into Hotel values('HR1002', 'HO002', 'M02', 'Royal Lotus Resort', 'Resort', 'Negombo, Western Province', 2, 'Swimming Pool, Car Park', 'info@royallotusresort.lk');
insert into Hotel values('HR1003', 'HO002', 'M03', 'Sunset Seaview Lodge', 'Lodge', 'Galle, Southern Province', 3, 'Car Park', 'reservations@sunsetseaviewlodge.lk');
insert into Hotel values('HR1004', 'HO003', 'M04', 'Ceylon Crest Inn', 'Inn', 'Kandy, Central Province', 3, 'Swimming Pool, Car Park', 'bookings@ceyloncrestinn.com');


/* Room table */
insert into Rooms values('HR1001', 'R101', 'Executive Suite', '1 extra-large double bed', 39000);
insert into Rooms values('HR1001', 'R102', 'Premium Beachfront Room', '1 extra-large double bed and 1 single bed', 45000);
insert into Rooms values('HR1002', 'R201', ' Deluxe Ocean View Suite', '1 double bed', 35000);
insert into Rooms values('HR1002', 'R202', 'Standard Garden View Room', '1 single bed', 28000);
insert into Rooms values('HR1003', 'R301', 'Ocean View Suite', '1 double bed', 23000);
insert into Rooms values('HR1004', 'R401', 'Standard Double Room', '1 double bed', 18000);
insert into Rooms values('HR1004', 'R402', 'Family Room', '1 double bed and 1 single bed', 20000);


/* Reservation table */
insert into Reservation values('R101', 'U0001', 'Emily Johnson', 'emily.johnson@gmail.com', '+1 (555) 123-4567', '2024-05-04', '2024-05-06', 2, 2, 1);
insert into Reservation values('R202', 'U0003', 'Sarah Thompson', 'sarah.thompson@outlook.com', '+44 20 1234 5678', '2024-04-15', '2024-04-18', 2, 1, 1);


/* Payment table */
insert into Payment values('R101', 'P101', '2024-03-25', 'Visa', 78000);
insert into Payment values('R202', 'P102', '2024-03-28', 'MasterCard', 70000);


/* Review table */
insert into Review values('Rv01', 'Good Hotel and kind staff.');
insert into Review values('Rv02', 'Good facilities.');


/* Report table */
insert into Report values('Rp01', 'M01', 'Financial Report', '2024-02-25');
insert into Report values('Rp02', 'M01', 'Operational Report', '2024-03-25');
