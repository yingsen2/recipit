create table user(
`id` int(11) not null auto_increment primary key,
`account` varchar(48) not null,
`password` varchar(48) not null,

`name` varchar(48) not null

)engine=myisam default charset=utf8;


create table blog(
`id` int(11) not null auto_increment primary key,
`title` varchar(128) not null,
`content` text not null


)engine=myisam default charset=utf8;



create table comment(
`id` int(11) not null auto_increment primary key,

`user_id` int(11) not null,
`blog_id` int(11) not null, 
`time` int(11) not null,

`content` text

)engine=myisam default charset=utf8;


create table cuisine(
`id` int(11) auto_increment primary key not null,
`cuisine_name` varchar(48) not null,
`cuisine_price` int(4) not null,
`cuisine_img` varchar(128) not null,
`cuisine_intro` text not null
)engine=myisam default charset=utf8;