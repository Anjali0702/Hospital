SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `appointmentform` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `department` varchar(100) NOT NULL,
  `doctor` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `appointmentform`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `appointmentform`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

INSERT INTO cardiology (id,name,phone,date,doctor)
SELECT id,name,phone,date,doctor
FROM appointmentform
WHERE department="Cardiology";

INSERT INTO radiology (id,name,phone,date,doctor)
SELECT id,name,phone,date,doctor
FROM appointmentform
WHERE department='Radiology';