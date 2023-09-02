CREATE TABLE locations (
  Name varchar(50),
  north varchar(25) NOT NULL,
  east varchar(25) NOT NULL,
  PRIMARY KEY (Name)
);

INSERT INTO locations VALUES ('Otago CompSci building','-45.866459667117375', '170.51839959000793');
INSERT INTO locations VALUES ('Wellington Parliment building','-41.27766252373128', '174.77635991007625');
