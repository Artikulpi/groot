
--
-- Dumping data for table `g_user_role`
--
INSERT INTO `g_user_role` (`role_id`, `role_name`, `role_input_date`, `role_last_update`) VALUES
(1, 'Super Admin', NULL, '2015-02-17 06:18:13'),
(2, 'Admin', NULL, '2015-02-17 06:18:13');

--
-- Dumping data for table `g_user`
--
INSERT INTO `g_user` (`user_id`, `user_name`, `user_full_name`, `user_password`, `user_email`, `user_description`, `user_role`, `user_input_date`, `user_last_update`) VALUES 
(1, 'admin', 'Admin', SHA1('password'), 'admin@example.com', 'Admin default', '1', NULL, CURRENT_TIMESTAMP);


--
-- Dumping data for table `mptt`
--
INSERT INTO `mptt` (`id`, `title`, `lft`, `rgt`, `parent`, `url`) VALUES
(1, 'Header', 1, 28, 0, '#'),
(2, 'Footer', 29, 38, 0, '#'),
(3, 'Home', 2, 3, 1, '/'),
(4, 'Privacy Policy', 30, 31, 2, '#'),
(5, 'Terms & Conditions', 32, 33, 2, '#'),
(6, 'Petunjuk & Aturan Umum', 34, 35, 2, '#'),
(7, 'Sitemap', 36, 37, 2, '#'),
(8, 'Contact', 4, 5, 1, 'contact');

--
-- Dumping data for table `g_post_category`
--
INSERT INTO `g_posts_category` (`category_id`, `category_name`, `category_input_date`, `category_last_update`) VALUES
(1, 'Uncategorized', '2014-06-20 06:55:00', '2014-06-20 06:55:00');

--
-- Dumping data for table `setting`
--

INSERT INTO `g_setting` (`setting_id`, `setting_name`, `setting_value`, `setting_description`) VALUES
(1, 'Favicon', '-', 'Favicon');
-- (2, 'Google Analytics ID', '-', 'Google Analytics ID');
