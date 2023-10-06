GRANT SELECT, INSERT, UPDATE, DELETE 
ON blog.*
TO sysuser@localhost 
IDENTIFIED BY 'secret';


-- exitで出てから下記のコードを入力する
./mysql -usysuser -psecret