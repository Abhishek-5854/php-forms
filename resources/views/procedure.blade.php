DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertDownload`(IN `f_name` VARCHAR(100) CHARSET utf8, IN `email_id` VARCHAR(100) CHARSET utf8, IN `mobile_no` VARCHAR(20) CHARSET utf8, IN `ip_address` VARCHAR(255) CHARSET utf8, IN `page_path` VARCHAR(255) CHARSET utf8, IN `browser_details` VARCHAR(255) CHARSET utf8, IN `created_at` TIMESTAMP, IN `industry_id` INT(20), IN `mobile_shorten` VARCHAR(15) CHARSET utf8, IN `mobile_encrypt` TEXT, IN `username_shorten` VARCHAR(255), IN `username_encrypt` TEXT)
BEGIN
INSERT INTO `free_trial_user` (`free_trial_id`, `full_name`, `company_name`, `start_timestamp`, `username`,`username_shorten`,`username_encrypt`, `password`, `contact_code`, `contact_number`,`contact_shorten`, `encrypted_contact_no`,`landline_no`, `country_state_city`, `zipcode`, `address_line_1`, `address_line_2`, `address_line_3`, `click_page`, `click_section`, `click_button`, `click_location`, `action`, `source_id`, `industry_id`, `plan_id`, `number_of_users`, `reseller_id`, `isactivated`, `activation_timestamp`, `enquiry_query`, `enquiry_active_device`, `enquiry_active_os`, `enquiry_location`, `enquiry_browser`, `enquiry_ip_address`, `enquiry_count`, `is_enquiry`, `is_login`, `enquiry_type`, `crm_sync_flag`, `crm_sync_remarks`, `crm_sync_timestamp`, `modules`, `hosting`, `scheduled_date`, `scheduled_time_slot_id`, `scheduled_before_one_day_flag`, `scheduled_before_one_hour_flag`, `scheduled_on_same_day`, `no_of_users`, `auto_price_quoted`, `auto_price_plan`, `enquiry_from_page`, `client_ip`, `client_browser`, `is_mars_sync`) VALUES (NULL, f_name, NULL, created_at, email_id, username_shorten,username_encrypt,'', NULL, mobile_no,mobile_shorten,mobile_encrypt ,'', '', '0', '', '', '', '', NULL, '', '', NULL, '0', industry_id, '0', NULL, '0', '0', '1800-01-01 06:51:54.000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'download', '0', NULL, NULL, '', '', '1800-01-01', '', '0', '0', '0', '', '0', '', page_path, ip_address, browser_details, '0');
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ViewIndustryData`()
BEGIN
SELECT * FROM `fk_temp_free_trial_user_industry_master1_idx` ; 
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ViewIndustryID`(IN `industry` VARCHAR(100) CHARSET utf8)
BEGIN
SELECT industry_id FROM `fk_temp_free_trial_user_industry_master1_idx` WHERE `industry_name`=industry;
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `guided_demo`(IN `full_name` VARCHAR(100), IN `company_name` VARCHAR(100), IN `contact_number` VARCHAR(20), IN `encrypted_contact_no` VARCHAR(1000), IN `username` VARCHAR(100), IN `scheduled_date` DATE, IN `scheduled_time_slot_id` VARCHAR(20), IN `client_ip` VARCHAR(255), IN `client_browser` VARCHAR(255))
BEGIN
INSERT INTO free_trial_user(scheduled_date, scheduled_time_slot_id, full_name, company_name, contact_number, encrypted_contact_no, username, client_ip, client_browser) VALUES(scheduled_date, scheduled_time_slot_id, full_name, company_name, contact_number, encrypted_contact_no, username, client_ip, client_browser);
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData`(IN `full_name` VARCHAR(100), IN `company_name` VARCHAR(100), IN `username` VARCHAR(100), IN `password` VARCHAR(255), IN `contact_number` VARCHAR(20), IN `industry_id` INT(11), IN `scheduled_date` DATE, IN `scheduled_time_slot_id` VARCHAR(20), IN `client_ip` VARCHAR(255), IN `client_browser` VARCHAR(255))
BEGIN
INSERT INTO free_trial_user (full_name,company_name,username,password,contact_number,industry_id,scheduled_date,scheduled_time_slot_id,client_ip,client_browser)
 VALUES (full_name,company_name,username,password,contact_number,industry_id,scheduled_date,scheduled_time_slot_id,client_ip,client_browser);
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData`(IN `full_name` VARCHAR(100), IN `company_name` VARCHAR(100), IN `username` VARCHAR(100), IN `password` VARCHAR(255), IN `contact_number` VARCHAR(20), IN `industry_id` INT(11), IN `scheduled_date` DATE, IN `scheduled_time_slot_id` VARCHAR(20), IN `client_ip` VARCHAR(255), IN `client_browser` VARCHAR(255), IN `username_shorten` VARCHAR(255), IN `username_encrypt` TEXT)
BEGIN

INSERT INTO free_trial_user (full_name,company_name,username,password,contact_number,industry_id,scheduled_date,scheduled_time_slot_id,client_ip,client_browser,username_shorten,username_encrypt)
 VALUES (full_name,company_name,username,password,contact_number,industry_id,scheduled_date,scheduled_time_slot_id,client_ip,client_browser,username_shorten,username_encrypt);
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`` PROCEDURE `getIndustryData`()
BEGIN

SELECT * FROM fk_temp_free_trial_user_industry_master1_idx;

END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertEnquiry`(IN `f_name` VARCHAR(100), IN `c_name` VARCHAR(100), IN `mobile_no` VARCHAR(20), IN `query` VARCHAR(2000), IN `ip_address` VARCHAR(255), IN `page_path` VARCHAR(255), IN `created_at` TIMESTAMP, IN `browser_details` VARCHAR(255), IN `mobile_short` VARCHAR(20), IN `mobile_encrypt` TEXT, IN `os` VARCHAR(255), IN `device` VARCHAR(255), IN `industry_id` INT(20), IN `email_id` VARCHAR(100), IN `location` VARCHAR(100), IN `username_shorten` VARCHAR(255), IN `username_encrypt` TEXT)
BEGIN
INSERT INTO `free_trial_user` ( `full_name`, `company_name`, `start_timestamp`, `username`,`username_shorten`,`username_encrypt`, `password`, `contact_code`, `contact_number`, `contact_shorten`, `encrypted_contact_no`, `landline_no`, `country_state_city`, `zipcode`, `address_line_1`, `address_line_2`, `address_line_3`, `click_page`, `click_section`, `click_button`, `click_location`, `action`, `source_id`, `industry_id`, `plan_id`, `number_of_users`, `reseller_id`, `isactivated`, `activation_timestamp`, `enquiry_query`, `enquiry_active_device`, `enquiry_active_os`, `enquiry_location`, `enquiry_browser`, `enquiry_ip_address`, `enquiry_count`, `is_enquiry`, `is_login`, `enquiry_type`, `crm_sync_flag`, `crm_sync_remarks`, `crm_sync_timestamp`, `modules`, `hosting`, `scheduled_date`, `scheduled_time_slot_id`, `scheduled_before_one_day_flag`, `scheduled_before_one_hour_flag`, `scheduled_on_same_day`, `no_of_users`, `auto_price_quoted`, `auto_price_plan`, `enquiry_from_page`, `client_ip`, `client_browser`, `is_mars_sync`) VALUES (f_name, c_name, created_at, email_id, username_shorten,username_encrypt,'', NULL, mobile_no, mobile_short, mobile_encrypt, '', '', '0', '', '', '', '', NULL, '', '', NULL, '0', industry_id, '0', NULL, '0', '0', '2022-07-08 07:12:19.000000', query, device, os, location, browser_details, ip_address, NULL, '1', '', 'enquiry', '0', NULL, NULL, '', '', '1800-01-01', '', '0', '0', '0', '', '0', '', page_path, ip_address, browser_details, '0');
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertvalue`(number_of_users int(11), full_name varchar(100), contact_number varchar(20), username varchar(100), company_name varchar(100), enquiry_query text)
BEGIN
INSERT INTO free_trial_user(number_of_users, full_name , contact_number , username , company_name , enquiry_query, start_timestamp, client_ip, client_browser, contact_shorten, encrypted_contact_no, username_shorten, username_encrypt ) VALUES(number_of_users, full_name , contact_number , username , company_name , enquiry_query, CURRENT_TIMESTAMP, client_ip, client_browser, contact_shorten, encrypted_contact_no,username_shorten, $username_encrypt);
END$$
DELIMITER ;
