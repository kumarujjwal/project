-- cPanel mysql backup
GRANT USAGE ON *.* TO 'zerosptp'@'localhost' IDENTIFIED BY PASSWORD '422edd9d55d34926';
GRANT ALL PRIVILEGES ON `zerosptp\_zeros`.* TO 'zerosptp'@'localhost';
GRANT ALL PRIVILEGES ON `zerosptp\_%`.* TO 'zerosptp'@'localhost';
GRANT USAGE ON *.* TO 'zerosptp_admin'@'localhost' IDENTIFIED BY PASSWORD '36956727110660fa';
GRANT ALL PRIVILEGES ON `zerosptp\_zeros`.* TO 'zerosptp_admin'@'localhost';
