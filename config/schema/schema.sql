create database if not exists simplestock default character set utf8;

use simplestock;

drop table if exists purchase_orders_statuses;
create table purchase_orders_statuses
(
    id   int(11) not null,
    name varchar(255) default null,
    primary key (id)
) engine = innodb
  default charset = utf8;

drop table if exists provinces;
create table provinces
(
    id   int(11) not null auto_increment,
    name varchar(255) default null,
    primary key (id)
) engine = innodb
  default charset = utf8;

drop table if exists cities;
create table cities
(
    id          int(11) not null auto_increment,
    name        varchar(255) default null,
    province_id int(11) not null,
    primary key (id),
    key fk_cities_provinces_idx (province_id),
    constraint fk_cities_provinces foreign key (province_id) references provinces (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;

drop table if exists providers;
create table providers
(
    id               int(11)   not null auto_increment,
    employee_name    varchar(255)   default null,
    employee_surname varchar(255)   default null,
    company_name     varchar(255)   default null,
    address          varchar(255)   default null,
    website          varchar(255)   default null,
    email            varchar(255)   default null,
    phone            varchar(255)   default null,
    area             varchar(255)   default null,
    cuit             varchar(255)   default null,
    observations     varchar(255)   default null,
    city_id          int(11)   not null,
    company_id       int(11)        default null,
    created_at       timestamp null default current_timestamp,
    created_by       int(11)        default null,
    updated_at       timestamp null default current_timestamp on update current_timestamp,
    updated_by       int(11)        default null,
    primary key (id),
    key fk_providers_cities_idx (city_id),
    constraint fk_providers_cities foreign key (city_id) references cities (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;


drop table if exists companies;
create table companies
(
    id         int(11)   not null auto_increment,
    name       varchar(255)   default null,
    website    varchar(255)   default null,
    phone      varchar(255)   default null,
    created_at timestamp null default current_timestamp,
    updated_at timestamp null default current_timestamp on update current_timestamp,
    address    varchar(255)   default null,
    primary key (id)
) engine = innodb
  default charset = utf8;

insert into companies (id, name) values (1, 'HEAL S.A.');


drop table if exists categories;
create table categories
(
    id                 int(11)   not null auto_increment,
    name               varchar(255)   not null,
    company_id         int(11)        default null,
    created_at         timestamp null default current_timestamp,
    created_by         int(11)        default null,
    updated_at         timestamp null default current_timestamp on update current_timestamp,
    updated_by         int(11)        default null,
    primary key (id)
) engine = innodb
  default charset = utf8;

drop table if exists articles;
create table articles
(
    id             int(11)   not null auto_increment,
    name           varchar(255)   not null,
    description    varchar(255)   not null,
    security_stock int(11)        not null,
    stock          int(11)        default 0,
    internal_code  varchar(255)   default null,
    provider_code  varchar(255)   default null,
    cateogry_id    int(11)   not null,
    provider_id    int(11)   default null,
    company_id     int(11)   default null,
    created_at     timestamp null default current_timestamp,
    created_by     int(11)        default null,
    updated_at     timestamp null default current_timestamp on update current_timestamp,
    updated_by     int(11)        default null,
    primary key (id),
    key fk_articles_categories_idx (cateogry_id),
    key fk_articles_providers_idx (provider_id),
    constraint fk_articles_categories foreign key (cateogry_id) references categories (id) on delete no action on update no action,
    constraint fk_articles_providers foreign key (provider_id) references providers (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;


drop table if exists building_sites;
create table building_sites
(
    id           int(11)   not null auto_increment,
    name         varchar(255)   default null,
    start_date   date           default null,
    address      varchar(255)   default null,
    observations varchar(255)   default null,
    company_id   int(11)        default null,
    created_at   timestamp null default current_timestamp,
    created_by   int(11)        default null,
    updated_at   timestamp null default current_timestamp on update current_timestamp,
    updated_by   int(11)        default null,
    primary key (id)
) engine = innodb
  default charset = utf8;

drop table if exists employees;
create table employees
(
    id           int(11)   not null auto_increment,
    name         varchar(255)   not null,
    surname      varchar(255)   not null,
    cuil         varchar(255)   default null,
    phone        varchar(255)   default null,
    email        varchar(255)   default null,
    address      varchar(255)   default null,
    position     varchar(255)   default null,
    observations varchar(255)   default null,
    company_id   int(11)   default null,
    created_at   timestamp null default current_timestamp,
    updated_by   int(11)        default null,
    created_by   int(11)        default null,
    updated_at   timestamp null default current_timestamp on update current_timestamp,
    primary key (id)
) engine = innodb
  default charset = utf8;

drop table if exists inventory_issues;
create table inventory_issues
(
    id               int(11)   not null auto_increment,
    date             date      not null,
    employee_id      int(11)   not null,
    building_site_id int(11)   default null,
    company_id       int(11)        default null,
    created_at       timestamp null default current_timestamp,
    created_by       int(11)        default null,
    updated_at       timestamp null default current_timestamp on update current_timestamp,
    updated_by       int(11)        default null,
    primary key (id),
    key fk_inventory_issues_building_sites_idx (building_site_id),
    key fk_inventory_issues_employees_idx (employee_id),
    constraint fk_inventory_issues_building_sites foreign key (building_site_id) references building_sites (id) on delete no action on update no action,
    constraint fk_inventory_issues_employees foreign key (employee_id) references employees (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;

drop table if exists inventory_issues_articles;
create table inventory_issues_articles
(
    id                 int(11) not null auto_increment,
    quantity           varchar(255) not null,
    inventory_issue_id int(11) not null,
    article_id         int(11) not null,
    primary key (id),
    key fk_inventory_issues_articles_articles_idx (article_id),
    key fk_inventory_issues_articles_inventory_issues_idx (inventory_issue_id),
    constraint fk_inventory_issues_articles_articles foreign key (article_id) references articles (id) on delete no action on update no action,
    constraint fk_inventory_issues_articles_inventory_issues foreign key (inventory_issue_id) references inventory_issues (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;

drop table if exists inventory_receipts;
create table inventory_receipts
(
    id           int(11)      not null auto_increment,
    date         date         not null,
    number       varchar(255) not null,
    providers_id int(11)      null,
    company_id   int(11)      default null,
    created_at   timestamp    null default current_timestamp,
    created_by   int(11)           default null,
    updated_at   timestamp    null default current_timestamp on update current_timestamp,
    updated_by   int(11)           default null,
    primary key (id),
    key fk_inventory_receipts_providers_idx (providers_id),
    constraint fk_inventory_receipts_providers foreign key (providers_id) references providers (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;


drop table if exists inventory_receipts_articles;
create table inventory_receipts_articles
(
    id                   int(11) not null auto_increment,
    quantity             int(11) not null,
    article_id           int(11) not null,
    inventory_receipt_id int(11) not null,
    primary key (id),
    key fk_inventory_receipts_articles_articles_idx (article_id),
    key fk_inventory_receipts_articles_inventory_receipts_idx (inventory_receipt_id),
    constraint fk_inventory_receipts_articles_articles foreign key (article_id) references articles (id) on delete no action on update no action,
    constraint fk_inventory_receipts_articles_inventory_receipts foreign key (inventory_receipt_id) references inventory_receipts (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;

drop table if exists purchase_orders;
create table purchase_orders
(
    id           int(11)   not null auto_increment,
    date         varchar(255)   not null,
    observations varchar(255)   default null,
    provider_id  int(11)   not null,
    status_id    int(11)   not null,
    company_id   int(11)        default null,
    created_at   timestamp null default current_timestamp,
    created_by   int(11)        default null,
    updated_at   timestamp null default current_timestamp on update current_timestamp,
    updated_by   int(11)        default null,
    primary key (id),
    key fk_purchase_orders_providers_idx (provider_id),
    key fk_purchase_orders_purchase_orders_statuses_idx (status_id),
    constraint fk_purchase_orders_providers foreign key (provider_id) references providers (id) on delete no action on update no action,
    constraint fk_purchase_orders_purchase_orders_statuses foreign key (status_id) references purchase_orders_statuses (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;

drop table if exists purchase_orders_articles;
create table purchase_orders_articles
(
    id                int(11) not null auto_increment,
    quantity          int(11) not null,
    purchase_order_id int(11) not null,
    article_id        int(11) not null,
    primary key (id),
    key fk_purchase_orders_ticles_articles_idx (article_id),
    key fk_purchase_orders_articles_purchase_orders_idx (purchase_order_id),
    constraint fk_purchase_orders_articles_articles foreign key (article_id) references articles (id) on delete no action on update no action,
    constraint fk_purchase_orders_articles_purchase_orders foreign key (purchase_order_id) references purchase_orders (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;

drop table if exists users;
create table users
(
    id         int(11)   not null auto_increment,
    email      varchar(255)   not null,
    password   varchar(255)   not null,
    company_id int(11)   default null,
    created_at timestamp null default current_timestamp,
    created_by int(11)        default null,
    updated_at timestamp null default current_timestamp on update current_timestamp,
    updated_by int(11)        default null,
    primary key (id),
    key fk_users_tenants_idx (company_id),
    constraint fk_users_tenants foreign key (company_id) references companies (id) on delete no action on update no action
) engine = innodb
  default charset = utf8;
