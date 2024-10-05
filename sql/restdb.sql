drop database if exists restmovie;
create database restmovie;
use restmovie;
CREATE TABLE `Movie` (
  `id` int primary key ,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
  );

insert into Movie values
(1001,'Ninja Turtels','https://lumiere-a.akamaihd.net/v1/images/image_b3c7d632.jpeg'),
(1002,'Fast and Furius','https://media.gq.com/photos/58ee5612eb11fb4e6bf49344/3:2/w_1944,h_1296,c_limit/fast-and-furious-future.jpg'),
(1003,'Into the Wild','https://assets.mubicdn.net/images/film/340/image-w856.jpg');

