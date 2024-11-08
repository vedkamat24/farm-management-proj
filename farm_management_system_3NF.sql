CREATE DATABASE fms_3nf;
USE fms_3nf;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

-- Admin Table
CREATE TABLE `admin` (
  `username` VARCHAR(50) PRIMARY KEY,
  `password` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- Employee Table
CREATE TABLE `employee` (
  `eid` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(10) NOT NULL,
  `salary` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employee` (`name`, `email`, `phone`, `salary`) VALUES
('Ashok', 'ashok@gmail.com', '9900000001', 500),
('Arun', 'arun@gmail.com', '9900000002', 600),
('Dinesh', 'dinesh@gmail.com', '9900000003', 700);

-- Plant Table
CREATE TABLE `plant` (
  `plant_id` VARCHAR(10) PRIMARY KEY,
  `plant_name` VARCHAR(20) NOT NULL,
  `plant_type` VARCHAR(20),
  `soil_type` VARCHAR(20)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `plant` (`plant_id`, `plant_name`, `plant_type`, `soil_type`) VALUES
("P001", "Tomato", "Food crop", "Red loam soil"),
("P002", "Sugarcane", "Food crop", "Black soil"),
("P003", "Paddy", "Feed and Food crop", "Alluvium soil");

-- Medicine Table
CREATE TABLE `medicine` (
  `med_id` VARCHAR(10) PRIMARY KEY,
  `med_name` VARCHAR(20) NOT NULL,
  `med_type` VARCHAR(20),
  `med_cost` VARCHAR(20)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `medicine` (`med_id`, `med_name`, `med_type`, `med_cost`) VALUES
("M001", "Tafaban", "Insecticide", "450rs/l"),
("M002", "Fame", "Insecticide", "600rs/30ml"),
("M003", "Sectin", "Fungicide", "450rs/100g");

-- Plant_Assignment Table (Relates employees to plants and assigns a specific medicine)
CREATE TABLE `plant_assignment` (
  `assignment_id` INT PRIMARY KEY AUTO_INCREMENT,
  `eid` INT NOT NULL,
  `plant_id` VARCHAR(10) NOT NULL,
  `med_id` VARCHAR(10) NOT NULL,
  FOREIGN KEY (`eid`) REFERENCES `employee`(`eid`) ON DELETE CASCADE,
  FOREIGN KEY (`plant_id`) REFERENCES `plant`(`plant_id`) ON DELETE CASCADE,
  FOREIGN KEY (`med_id`) REFERENCES `medicine`(`med_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `plant_assignment` (`eid`, `plant_id`, `med_id`) VALUES
(1, "P001", "M001"),
(2, "P002", "M002"),
(3, "P003", "M003");

COMMIT;
