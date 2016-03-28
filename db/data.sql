
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_full_name`, `user_password`, `user_email`, `user_description`, `user_image`, `user_deleted`, `user_role_id`, `user_input_date`, `user_last_update`) VALUES
(1, 'admin', 'admin default', 'cfae66c98aa8d86383e07f1e1ea5d68e1cc6a613', 'admin@default.com', 'admin default', NULL, 0, 2, '2016-03-23 07:44:17', '2016-03-23 07:44:17');

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`, `role_input_date`, `role_last_update`) VALUES
(1, 'Admin', '2016-03-23 07:44:17', '2016-03-23 07:44:17'),
(2, 'Super Admin', '2016-03-23 07:44:17', '2016-03-23 07:44:17');

--
-- Dumping data for table `posting_category`
--

INSERT INTO `posting_category` (`category_id`, `category_name`, `category_input_date`, `category_last_update`) VALUES
(1, 'Bisnis', '2016-03-26 08:09:41', '2016-03-26 08:09:41'),
(3, 'Teknologi', '2016-03-26 08:28:34', '2016-03-26 08:37:31'),
(4, 'Gadget', '2016-03-26 08:38:54', '2016-03-26 08:38:54'),
(6, 'Programming', '2016-03-26 08:49:19', '2016-03-26 08:49:41'),
(7, 'Desain Web', '2016-03-26 09:14:10', '2016-03-26 09:14:32'),
(8, 'Linux', '2016-03-27 21:54:36', '2016-03-27 21:54:36');