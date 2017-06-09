create table users (
	id int not null unique auto_increment,
	first_name varchar(255),
	last_name varchar(255),
	age int,
	phone varchar(255) not null,
	CHECK (age >=18),
	primary key(id)
);

create table ads(
	id int not null unique auto_increment,
	title varchar(255) not null,
	tags varchar(255),
	location varchar(255) not null,
	created timestamp DEFAULT CURRENT_TIMESTAMP,
	last_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	user_id int not null, 
	primary key (id),
	Foreign key (user_id) references users(id)
	
);