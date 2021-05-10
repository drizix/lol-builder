CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nickname` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `build_champion` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `champion_id` varchar(255),
  `summener_spell_1` varchar(255),
  `summener_spell_2` varchar(255),
  `item_1` varchar(255),
  `item_2` varchar(255),
  `item_3` varchar(255),
  `item_4` varchar(255),
  `item_5` varchar(255),
  `item_6` varchar(255),
  `item_7` varchar(255),
  `user_id` int
);

CREATE TABLE `champion` (
  `id` int PRIMARY KEY,
  `name` varchar(255),
  `image` varchar(255),
  `icone` varchar(255)
);

ALTER TABLE `build_champion` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

ALTER TABLE `champion` ADD FOREIGN KEY (`id`) REFERENCES `build_champion` (`champion_id`);
