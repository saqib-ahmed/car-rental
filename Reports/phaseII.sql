create schema cre;
use cre;

create table driving_plan(pType varchar(10) primary key, discount INT, annual_fee float, Monthly_payment float);
create table credit_card(cardNo INT primary key, NameOnCard varchar(10), CVV INT, expiryDate datetime, billingAddress varchar(10));

create table  userr( username varchar(10), pasword varchar(10),email varchar(10),address varchar(10), firstName varchar(10),midInit varchar(10), lastName varchar(10),
phone INT, Uflag INT, pType varchar(10), cardNo INT, primary key(username), foreign key(pType) references driving_plan(pType), foreign key(cardNo) references credit_card(cardNo));

create table location(loName varchar(10), capacity INT, primary key(loName));

create table car(sNo INT, auxCable INT, umFlag INT, modelName varchar(10), cType varchar(10), color varchar(10), hourlyRate float, 
dailyRate float,  username  INT, seatingCap INT, transType varchar(10), loName varchar(10), primary key(sNo), foreign key(loName) references location(loName));


create table reservation (username varchar(10), lateFee float, loName varchar(10), pickDateTime datetime,
retDateTime datetime, estCost float, lateBy time, retStatus INT, sNo INT, primary key( username, pickDateTime, retDateTime), 
foreign key(loName) references location(loName), foreign key (sNo) references car(sNo), foreign key ( username) references  userr( username));




create table ex_time(username varchar(10) ,pickDateTime datetime, retDateTime datetime, extTime time, 
primary key( username, pickDateTime, retDateTime, extTime), 
foreign key( username, pickDateTime, retDateTime) references reservation( username, pickDateTime, retDateTime));

create table man_req(username varchar(10), date_time datetime, sNo INT, primary key(sNo, date_time),
foreign key (username) references userr(username), foreign key (sNo) references car(sNo));
create table prob(sNo INT, date_time datetime, problem varchar(10), primary key(sNo, date_time, problem),
foreign key (sNo, date_time) references man_req(sNo, date_time));
