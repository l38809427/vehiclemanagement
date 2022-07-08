create DATABASE vehicle_management;
CREATE TABLE `vehicle_management`.`mission` (`name` VARCHAR(15) NOT NULL , `destination` VARCHAR(15) NOT NULL , `launch_date` DATE NOT NULL , `type` VARCHAR(15) NOT NULL , `crew_size` INT NOT NULL , `target_id` INT NOT NULL , PRIMARY KEY (`name`));
CREATE TABLE `vehicle_management`.`targets` (`id` INT NOT NULL , `name` VARCHAR(15) NOT NULL , `first_mission` INT NOT NULL , `type` VARCHAR(15) NOT NULL , `no_missions` INT NOT NULL , PRIMARY KEY (`id`));
CREATE TABLE `vehicle_management`.`astronaut` (`astronaut_id` INT NOT NULL , `name` VARCHAR(15) NOT NULL , `no_missions` INT NOT NULL , PRIMARY KEY (`astronaut_id`));
CREATE TABLE `vehicle_management`.`attends` (`mission_name` VARCHAR(15) NOT NULL , `no_missions` INT NOT NULL , `astronaut_id` INT NOT NULL , PRIMARY KEY (`mission_name`, `astronaut_id`));
