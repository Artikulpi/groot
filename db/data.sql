
--
-- Dumping data for table `g_user_role`
--
INSERT INTO `user_role` (`role_id`, `role_name`, `role_input_date`, `role_last_update`) VALUES
(1, 'Super Admin', NULL, '2015-02-17 06:18:13'),
(2, 'Admin', NULL, '2015-02-17 06:18:13');

--
-- Dumping data for table `g_user`
--
INSERT INTO `user` (`user_id`, `user_name`, `user_full_name`, `user_password`, `user_email`, `user_description`, `user_role_id`, `user_input_date`, `user_last_update`) VALUES 
(1, 'admin', 'Admin', 'cfae66c98aa8d86383e07f1e1ea5d68e1cc6a613', 'admin@example.com', 'Admin default', '1', NULL, CURRENT_TIMESTAMP);