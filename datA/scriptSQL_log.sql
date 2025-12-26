mysql>  
Query OK, 1 row affected (0.03 sec)

mysql> CREATE TABLE clients (
    ->     id INT AUTO_INCREMENT NOT NULL,
    ->     nom VARCHAR(100) NOT NULL,
    ->     prenom VARCHAR(100) NOT NULL,
    ->     email VARCHAR(150) NOT NULL UNIQUE,
    ->     telephone VARCHAR(20),
    ->     created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ->     PRIMARY KEY (id)
    -> );
ERROR 1046 (3D000): No database selected
mysql> use appbank1;
Database changed
mysql> CREATE TABLE clients (
    ->     id INT AUTO_INCREMENT NOT NULL,
    ->     nom VARCHAR(100) NOT NULL,
    ->     prenom VARCHAR(100) NOT NULL,
    ->     email VARCHAR(150) NOT NULL UNIQUE,
    ->     telephone VARCHAR(20),
    ->     created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ->     PRIMARY KEY (id)
    -> );
Query OK, 0 rows affected (0.09 sec)

mysql> CREATE TABLE comptes (
    ->     id INT AUTO_INCREMENT NOT NULL,
    ->     numero VARCHAR(50) NOT NULL UNIQUE,
    ->     solde DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    ->     type ENUM('courant', 'epargne') NOT NULL,
    ->     client_id INT NOT NULL,
    ->     created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ->     PRIMARY KEY (id),
    ->     CONSTRAINT fk_comptes_clients
    ->         FOREIGN KEY (client_id)
    ->         REFERENCES clients(id)
    ->         ON DELETE CASCADE
    ->         ON UPDATE CASCADE
    -> );
Query OK, 0 rows affected (0.10 sec)

mysql> CREATE TABLE transactions (
    ->     id INT AUTO_INCREMENT NOT NULL,
    ->     montant DECIMAL(10,2) NOT NULL,
    ->     type ENUM('DEPOT', 'RETRAIT') NOT NULL,
    ->     compte_id INT NOT NULL,
    ->     date_transaction DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ->     PRIMARY KEY (id),
    ->     CONSTRAINT fk_transactions_comptes
    ->         FOREIGN KEY (compte_id)
    ->         REFERENCES comptes(id)
    ->         ON DELETE CASCADE
    ->         ON UPDATE CASCADE
    -> );
Query OK, 0 rows affected (0.10 sec)

mysql> SHOW TABLES;
+--------------------+
| Tables_in_appbank1 |
+--------------------+
| clients            |
| comptes            |
| transactions       |
+--------------------+
3 rows in set (0.02 sec)

mysql> exit ; 
