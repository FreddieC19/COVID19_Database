drop database covidDB;
create database covidDB;

CREATE  TABLE VaccineCompany(
    CompanyName	VARCHAR(15) NOT NULL,
    Address VARCHAR(30),
    City VARCHAR(15),
    Province CHAR(2),
    PostalCode CHAR(6),
    PRIMARY KEY(CompanyName));
    
CREATE TABLE VaccinationSite(
    SiteAddress VARCHAR(20) NOT NULL,
    City VARCHAR(15),
    Province CHAR(2),
    PostalCode CHAR(6),
    SiteName VARCHAR(30),
    PRIMARY KEY(SiteName));

CREATE TABLE VaccineLot(
    LotNumber CHAR(6) NOT NULL,
    DateProduced DATE,
    ExpiryDate DATE,
    Producer VARCHAR(15),
    ShippedTo VARCHAR(30),
    NumDoses INT,
    PRIMARY KEY(LotNumber),
    FOREIGN KEY(ShippedTo) REFERENCES VaccinationSite(SiteName),
    FOREIGN KEY(Producer) REFERENCES VaccineCompany(CompanyName));
  
CREATE TABLE Patient(
    OHIPnumber CHAR(12) NOT NULL,
    PatientName VARCHAR(20),
    Birthday DATE,
    TimeReceived DATETIME(0),
    DosesReceived TINYINT(4),
    VaccineLotNum CHAR(6),
    PRIMARY KEY(OHIPnumber),
    FOREIGN KEY(VaccineLotNum) REFERENCES VaccineLot(LotNumber));
    
CREATE TABLE Spouse(
    OHIPnumber CHAR(12) NOT NULL,
    Name VARCHAR(20),
    PhoneNum CHAR(10),
    SpouseOHIP CHAR(12) NOT NULL,
    PRIMARY KEY(OHIPnumber, SpouseOHIP),
    FOREIGN KEY(SpouseOHIP) REFERENCES Patient(OHIPnumber));
    
CREATE TABLE MedicalPractice(
    PracticeName VARCHAR(35),
    PhoneNum VARCHAR(10),
	PRIMARY KEY(PracticeName));
    
CREATE TABLE HealthCareWorker(
    WorkerID VARCHAR(10) NOT NULL,
    Name VARCHAR(20),
    Credentials VARCHAR(10),
    DrOrRN CHAR(2) NOT NULL,
    SiteName VARCHAR(30) NOT NULL,
    PracticeName VARCHAR(35),
    PRIMARY KEY(WorkerID, SiteName),
    FOREIGN KEY(SiteName) REFERENCES VaccinationSite(SiteName),
    FOREIGN KEY(PracticeName) REFERENCES MedicalPractice(PracticeName));
    
insert into VaccineCompany values
("Moderna","345 Wellington St","Kingston","ON","K7L9R4"),
("Pfizer","444 Earl St","Belleville","ON","R5E3P7"),
("Astra Zeneca","23 Jimothy Blvd","Oshawa","ON","L9R3X8"),
("Johnson&Johnson","145 East Bindleton Way","Winnipeg","MB","M5D4E2");

insert into VaccinationSite values
("88 Cheadle St", "Ajax", "ON", "L1S7H3", "Don Cheadle Community Centre"),
("62 Birch St", "Whitby", "ON", "L1X8J4", "University of Whitby"),
("94 Alan Rd", "London", "ON", "N0L6H3", "Stinky Pete's Fun House"),
("233 Jumbo Dr", "Regina", "SK", "S0G4Y2", "Denny's"),
("921 Cranky Kong St", "Edmonton", "AB", "T5L8J2", "Donkey Kong Frozen Ape Centre"),
("36 Stinky Blvd", "Victoria", "BC", "V8P2X5", "Walter White's RV o' Fun");

insert into VaccineLot values
("AP3045","2021-05-09","2022-05-09","Moderna", "Don Cheadle Community Centre", 445),
("AP3046","2021-05-09","2022-05-09","Pfizer", "University of Whitby", 754),
("AP3047","2021-05-09","2022-05-09","Moderna", "Stinky Pete's Fun House", 823),
("LT6079","2021-05-27","2022-05-27","Pfizer", "Denny's", 326),
("LT6080","2021-05-27","2022-05-27","Astra Zeneca", "Donkey Kong Frozen Ape Centre", 932),
("LT6081","2021-05-27","2022-05-27","Johnson&Johnson", "Walter White's RV o' Fun", 523);

insert into Patient values
("1234567890YM","Gerald Burger","1960-07-09","2021-06-01 12:34:45", 2, "AP3045"),
("9571682495LV","Stinky Pete","1954-03-26","2021-06-02 15:11:39", 2, "AP3045"),
("4854132819JR","Manny Heffley","1899-11-23","2021-06-02 16:43:21", 1, "AP3046"),
("8452215567DF","Big Bird","1932-03-12","2021-06-03 09:04:21", 2, "AP3046"),
("3197556488DS","Funky Kong","2001-09-16","2021-06-02 11:23:24", 1, "AP3046"),
("4685279565RD","Joe Mama","1942-11-20","2021-06-02 12:11:52", 2, "AP3047");

insert into Spouse values
("4521288957ED", "Tina Burger", "4587423594", "1234567890YM"),
("9763123564RT", "Jeffrey Heffley", "4558431569", "4854132819JR"),
("1285674595PO", "Angelina Mama", "1257985315", "4685279565RD"),
("9758642157ED", "Musty Martha", "8475132645", "9571682495LV"),
("5218975312DF", "Smaller Bird", "7881122456", "8452215567DF"),
("9632415448PW", "Bluster Kong", "1384588497", "3197556488DS");


insert into MedicalPractice values
("Chipperton Family Physicians", "4589741257"),
("Darryl's Medical Clinic", "9764824361"),
("Steven's Even Better Medical Clinic", "9764824362"),
("Dan, Dan & Daniel Clinic", "2546841854"),
("Pingus and Friends Medical Services", "8114756821"),
("Kathy's Klinic", "4257886515");


insert into HealthCareWorker values
("45879589", "Darryl Philbin", "MD", "DR", "Don Cheadle Community Centre","Darryl's Medical Clinic"),
("45879590", "Steven Philbin", "MD", "DR", "Don Cheadle Community Centre", "Steven's Even Better Medical Clinic"),
("97682431", "Luigi Daniel", "MD", "DR", "Donkey Kong Frozen Ape Centre","Dan, Dan & Daniel Clinic"),
("51257952", "Mario Daniel", "BSN, RN", "RN", "Donkey Kong Frozen Ape Centre",NULL),
("57523484", "Robert Bowling", "MD", "DR", "University of Whitby","Chipperton Family Physicians"),
("87896415", "Anna Banana", "MD", "DR", "Stinky Pete's Fun House","Pingus and Friends Medical Services"),
("25884681", "Jimothy Griffins", "RN", "RN", "Denny's",NULL),
("65844681", "Cathy K. Kathy", "MD", "DR", "Walter White's RV o' Fun","Kathy's Klinic");