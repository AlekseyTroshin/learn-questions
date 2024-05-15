CREATE TABLE IF NOT EXISTS `users`
(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `email` varchar(255) NOT NULL UNIQUE KEY,
    `password` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `login` varchar(255) DEFAULT NULL,
    `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `categories`
(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `user_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `cards`
(
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `quest` varchar(255) NOT NULL,
    `description` TEXT NOT NULL,
    `user_id` INT NOT NULL,
    `category_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
    FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `email`, `password`, `name`, `login`, `role`) VALUES
(1, 'admin@admin.ru', '$2y$10$qIo0yPCAbWUrJDNKju.TeuAMeypLbsxtK46MjhUmf.DxCrJpO/NY6', 'admin', 'admin', 'admin'),
(2, 'u@u.ru', '$2y$10$nA1x4TlUFSgcQB8prSMNnuAl6nrDupxXKH//INUt6J21Jp1SqSqq2', 'user', 'user', 'user');

INSERT INTO `categories` (`id`, `name`, `user_id`) VALUES
(1, 'homes', 1),
(2, 'computers', 1),
(3, 'peoples', 1);


INSERT INTO `cards` (`id`, `quest`, `description`, `user_id`, `category_id`) VALUES
(1, 'дома дома', 'да есть дома ага дома', 1, 1),
(2, 'компушка', 'супер пупер нах', 1, 1),
(3, 'что вы думаете о людях', 'я люблю людей )', 1, 1);