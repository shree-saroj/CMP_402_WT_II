

create database dbWebTechII

use dbWebTechII

create table tbl_addressbook(
PkId bigint primary key auto_increment,
FirstName varchar(150),
Designation varchar(500),
Address text,
City varchar(100),
State varchar(50),
EmailId varchar(200) UNIQUE
)

GO

DELIMITER $$

CREATE PROCEDURE sp_addUpdateddressBook(
    IN p_id INT,
    IN p_FirstName VARCHAR(150),
    IN p_Designation VARCHAR(500),
    IN p_Address TEXT,
    IN p_City VARCHAR(100),
    IN p_State VARCHAR(50),
    IN p_EmailId VARCHAR(200)
)
BEGIN
    IF p_id = 0 THEN
        INSERT INTO tbl_addressbook (
            FirstName,
            Designation,
            Address,
            City,
            State,
            EmailId
        ) VALUES (
            p_FirstName,
            p_Designation,
            p_Address,
            p_City,
            p_State,
            p_EmailId
        );
    ELSE
        UPDATE tbl_addressbook
        SET
            FirstName = p_FirstName,
            Designation = p_Designation,
            Address = p_Address,
            City = p_City,
            State = p_State,
            EmailId = p_EmailId
        WHERE PkId = p_id;
    END IF;
END$$

DELIMITER ;



DELIMITER $$

CREATE PROCEDURE sp_getAllAddressBook()
BEGIN
    SELECT * FROM tbl_addressbook;
END$$

DELIMITER ;

GO;

DELIMITER $$

CREATE PROCEDURE sp_deleteAddressBook(
    IN p_Id INT
)
BEGIN
    DELETE FROM tbl_addressbook WHERE PkId = p_Id;
END$$

DELIMITER ;