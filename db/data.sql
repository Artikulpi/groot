
--
-- Dumping data for table `user_role`
--
INSERT INTO `user_role` (`role_id`, `role_name`, `role_input_date`, `role_last_update`) VALUES
(1, 'Super Admin', NULL, '2015-02-17 06:18:13'),
(2, 'Admin', NULL, '2015-02-17 06:18:13');

--
-- Dumping data for table `user`
--
INSERT INTO `user` (`user_id`, `user_name`, `user_full_name`, `user_password`, `user_email`, `user_description`, `user_role_id`, `user_input_date`, `user_last_update`) VALUES 
(1, 'admin', 'Admin', 'cfae66c98aa8d86383e07f1e1ea5d68e1cc6a613', 'admin@example.com', 'Admin default', '1', NULL, CURRENT_TIMESTAMP);

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_name`, `setting_value`, `setting_description`) VALUES
(1, 'Favicon', '-', 'Favicon'),
(2, 'google', '-', 'Google Analytics ID'),
(3, 'from', '-', 'sender email'), 
(4, 'from_name', '-', 'email name'), 
(5, 'protocol', 'smtp', 'protocol email'), 
(6, 'smtp_host', 'ssl://smtp.gmail.com', 'smpt host email'), 
(7, 'smtp_port', '465', 'smpt port email'), 
(8, 'smtp_user', '-', 'smpt user email'), 
(9, 'smtp_pass', '-', 'password email'), 
(10, 'smtp_timeout', '30', 'smtp timeout email'), 
(11, 'mailtype', 'html', 'mailtype email'), 
(12, 'charset', 'utf-8', 'charset email'), 
(13, 'newline', '\\r\\n', 'newline email'), 
(14, 'crlf', '\\r\\n', 'crlf email');


INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_value`, `contact_description`) VALUES 
('1', 'contact_name', 'Groot', 'Contact Name'), 
('2', 'email', '-', 'Contact Email'), 
('3', 'phone', '-', 'Contact Phone Number'), 
('4', 'address', '-', 'Contact Address'), 
('5', 'facebook', '-', 'Facebook'), 
('6', 'twitter', '-', 'Twitter');