create table chefs (
	uid varchar(32) not null primary key,
	name varchar(100) collate utf8mb4_uca1400_ai_ci not null,
	surname varchar(100) collate utf8mb4_uca1400_ai_ci not null
) collate = utf8mb4_general_ci;

create table difficulties (
	id int auto_increment primary key,
	name varchar(100) not null
);

create table ingredients (
	id int auto_increment primary key,
	name varchar(100) not null
);

create table roles (
	id int auto_increment primary key,
	name varchar(255) not null
) collate = utf8mb4_general_ci;

create table types (
	id int auto_increment primary key,
	name varchar(100) not null
);

create table users (
	uid varchar(32) not null primary key,
	name varchar(255) not null,
	surname varchar(255) not null,
	email varchar(255) not null,
	password varchar(100) not null,
	to_modify tinyint(1) default 0 not null,
	date_update datetime default current_timestamp() not null on update current_timestamp(),
	date_create datetime default current_timestamp() not null,
	constraint users_unique unique (email)
) collate = utf8mb4_general_ci;

DELIMITER $ $ CREATE TRIGGER add_role
AFTER
INSERT
	ON users FOR EACH ROW BEGIN
INSERT INTO
	user_role (uid_user)
VALUES
	(NEW.uid);

END $ $ DELIMITER;

create table recipes (
	uid varchar(32) collate utf8mb4_uca1400_ai_ci not null primary key,
	uid_user varchar(32) not null,
	uid_chef varchar(100) null,
	name varchar(100) collate utf8mb4_uca1400_ai_ci not null,
	steps text collate utf8mb4_uca1400_ai_ci not null,
	duration varchar(100) collate utf8mb4_uca1400_ai_ci null,
	description varchar(255) collate utf8mb4_uca1400_ai_ci null,
	kitchenware varchar(100) collate utf8mb4_uca1400_ai_ci null,
	nb_people int not null,
	id_difficulty int default 1 not null,
	date_create datetime default current_timestamp() not null,
	date_update datetime default current_timestamp() not null on update current_timestamp(),
	id_type int null,
	constraint recipes_chefs_uid_fk foreign key (uid_chef) references chefs (uid),
	constraint recipes_difficulties_FK foreign key (id_difficulty) references difficulties (id),
	constraint recipes_types_FK foreign key (id_type) references types (id),
	constraint recipes_users_uid_fk foreign key (uid_user) references users (uid)
) collate = utf8mb4_general_ci;

create table recipe_ingredients (
	id_ingredient int not null,
	quantity varchar(100) not null,
	uid_recipe varchar(32) not null,
	primary key (id_ingredient, uid_recipe),
	constraint recipe_ingredient_ingredient_Id_fk foreign key (id_ingredient) references ingredients (id),
	constraint recipe_ingredient_recipe_FK foreign key (uid_recipe) references recipes (uid)
);

create table user_reset_password (
	uid_user varchar(32) not null primary key,
	link varchar(64) not null,
	date_create datetime default current_timestamp() not null,
	constraint user_reset_password_users_FK foreign key (uid_user) references users (uid)
) collate = utf8mb4_general_ci;

create table user_role (
	uid_user varchar(32) not null,
	id_role int default 1 not null,
	date_update datetime default current_timestamp() null on update current_timestamp(),
	primary key (uid_user, id_role),
	constraint user_role_roles_FK foreign key (id_role) references roles (id),
	constraint user_role_users_FK foreign key (uid_user) references users (uid)
) collate = utf8mb4_general_ci;

create table user_tokens (
	uid varchar(32) not null primary key,
	uid_user varchar(32) not null,
	ip_address varchar(255) not null,
	token text not null,
	date_create datetime default current_timestamp() not null,
	constraint user_tokens_users_FK foreign key (uid_user) references users (uid)
) collate = utf8mb4_general_ci;
