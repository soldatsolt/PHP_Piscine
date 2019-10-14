<?php
require_once 'config.php';
$conn = mysqli_connect('db', "root", "root", "rush_db", 3306);
if (mysqli_connect_errno($conn))
{
    echo "Error1 : " . mysqli_connect_error();
    return (NULL);
}
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS ".DIR_TABLE);
mysqli_close($conn);
$conn = database();
$query = "DROP TABLE IF EXISTS items, orders, ordered, categories, users";
mysqli_query($conn, $query);
var_dump(mysqli_error($conn));
$query = "CREATE TABLE `products` (
	`price` int(11) NOT NULL,
	`quantity` int(11) NOT NULL DEFAULT '0',
	`name` varchar(64) NOT NULL,
	`category` varchar(32) NOT NULL,
	`hero` varchar(32) NOT NULL,
	`id` int(11) NOT NULL,
	`url` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
  )
  INSERT INTO `products` (`price`, `quantity`, `name`, `category`, `hero`, `id`, `url`) VALUES
(4, 0, 'Флэш против негодяев', 'Flash', 'Flash', 1, 'https://files.slack.com/files-pri/TE6FVDN1Y-FPDQ5P1GW/__________________________________________.__________2.jpg'),
(5, 0, 'Аквамен книга 4', 'Aquaman', 'Aquaman', 2, 'https://files.slack.com/files-pri/TE6FVDN1Y-FPDDUFRUP/______________________________.__________4.jpg'),
(5, 0, 'Лига справедливости 6', 'Ligue', 'Ligue', 3, 'https://files.slack.com/files-pri/TE6FVDN1Y-FNYQK19SN/____________________________________________________________________.__________6.jpg'),
(5, 0, 'ТОР', '-', '-', 4, 'https://static-eu.insales.ru/r/w-r8fiH5Z14/fit/530/530/ce/1/plain/images/products/1/141/252141709/tor-kto-derjit-molot.jpg@webp'),
(7, 0, 'Batman 675', 'Batman', 'Batman', 5, 'https://im0-tub-ru.yandex.net/i?id=664df8c30484206188c110ebec04d61e-l&n=13'),
(15, 0, 'Batman 201', 'Batman', 'Batman', 6, 'https://im0-tub-ru.yandex.net/i?id=301ad6d8bfff4a6dd4ef55b1daf0ff0f-l&n=13&w=236&h=350'),
(14, 0, 'Flash 94', 'Flash', 'Flash', 7, 'https://im0-tub-ru.yandex.net/i?id=8e46a85b522cc2800ee2dadf02d00b5e-l&n=13'),
(10, 0, 'Flash 29', 'Flash', 'Flash', 8, 'https://im0-tub-ru.yandex.net/i?id=8689aacd0abb9fe56f029dec97b3b8f0-l&n=13'),
(10, 0, 'JUSTICE!', 'Ligue', 'Ligue', 9, 'https://i.ebayimg.com/00/s/MTYwMFgxMDQx/z/hb8AAOSwBXhbF~tv/$_57.JPG?set_id=8800005007'),
(50, 0, '1 Legue', 'Ligue', 'Ligue', 10, 'https://im0-tub-ru.yandex.net/i?id=8fff3806f675d886c6b2881ab9c659af-l&n=13'),
(40, 0, 'Aquaman2', 'Aquaman', 'Aquaman', 11, 'https://im0-tub-ru.yandex.net/i?id=da5d5070eed649a10bc8118022a262c1-l&n=13'),
(30, 0, 'Aquaman31', 'Aquaman', 'Aquaman', 12, 'https://im0-tub-ru.yandex.net/i?id=c5b5bccb76fbf32ec9597136689534c8-l&n=13');
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=1000
;";
mysqli_query($conn, $query);
var_dump(mysqli_error($conn));
$query = "CREATE TABLE `categories` (
`id`  int(8) UNSIGNED NOT NULL AUTO_INCREMENT ,
`category`  text NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=1
;
";
mysqli_query($conn, $query);
var_dump(mysqli_error($conn));
$query = "CREATE TABLE `users` (
	`login` varchar(32) NOT NULL,
	`mail` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'default',
	`passwd` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
  )
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=1
;";
mysqli_query($conn, $query);
var_dump(mysqli_error($conn));
$query = "CREATE TABLE `orders` (
`id`  int(8) UNSIGNED NOT NULL AUTO_INCREMENT ,
`client_id`  int(8) NOT NULL ,
`status`  int(8) NOT NULL ,
`time`  timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=1
;";
mysqli_query($conn, $query);
var_dump(mysqli_error($conn));
mysqli_query($conn, $query);
var_dump(mysqli_error($conn));
$hash = hash('sha512', 'admin');
mysqli_query($conn, "INSERT INTO users (`login`, `passwd`, `admin`) VALUES ('admin', '.$hash.', 1) ");
mysqli_close($conn);
echo "<br/><br/><b>DB has been installed.</b>";
echo "<br/>Login: admin<br/>Password: admin.<br/>Please change the password and delete install.php"
