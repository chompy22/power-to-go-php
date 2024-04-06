CREATE TABLE `photos` (
                         `id` int(11) NOT NULL,
                         `name` varchar(100) NOT NULL,
                         `description` varchar(500) NOT NULL,
                         `userId` int(11) NOT NULL,
                         `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `login` varchar(100) NOT NULL,
                         `password` varchar(100) NOT NULL,
                         `email` varchar(100) NOT NULL,
                         `role` varchar(50) NOT NULL,
                         `date` date NOT NULL DEFAULT current_timestamp()) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `users` (`id`, `login`, `password`, `email`, `role`, `date`) VALUES
                             (1, 'michael_smith', 'password123', 'michael.smith@example.com', 'admin', '2024-03-28'),
    (2, 'jennifer_jones', 'letmein', 'jennifer.jones@example.com', 'admin', '2024-03-28'),
    (3, 'william_brown', 'adminpassword', 'william.brown@example.com', 'admin', '2024-03-28'),
    (4, 'elizabeth_davis', 'adminpass', 'elizabeth.davis@example.com', 'admin', '2024-03-28'),
    (5, 'james_miller', 'admin123', 'james.miller@example.com', 'admin', '2024-03-28');

INSERT INTO `photos` (`id`, `name`, `description`, `userId`, `date`) VALUES
                                                                        (1, 'Sunset', 'Beautiful sunset over the ocean', 1, '2024-03-28'),
                                                                        (2, 'Mountain Peak', 'View from the top of the mountain', 2, '2024-03-28'),
                                                                        (3, 'Cityscape', 'Skyline view of the city at night', 3, '2024-03-28'),
                                                                        (4, 'Beach', 'Sandy beach with palm trees', 4, '2024-03-28'),
                                                                        (5, 'Forest', 'Lush green forest scenery', 5, '2024-03-28');
