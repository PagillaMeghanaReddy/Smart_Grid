DROP TABLE IF EXISTS custData;
DROP TABLE IF EXISTS dcvar;
DROP TABLE IF EXISTS dc;
DROP TABLE IF EXISTS general_info;
DROP TABLE IF EXISTS billProfile;
DROP TABLE IF EXISTS bidProfile;
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS Customer;

CREATE TABLE Customer (
	username VARCHAR (50) PRIMARY KEY,
	password VARCHAR (50),
	userid SERIAL ,
	activeOrIn BOOLEAN DEFAULT True
	-- UNIQUE (username)
);
INSERT INTO Customer  VALUES('abc1', '123', 1 ,True);
INSERT INTO Customer  VALUES('abc', '123', 2 ,True);


CREATE TABLE bidProfile(
	username VARCHAR(50) PRIMARY KEY REFERENCES Customer (username),
	cprVal INTEGER,
	offer BOOLEAN DEFAULT False,
	probability NUMERIC (3,2)
	-- UNIQUE (username)

);
INSERT INTO bidProfile VALUES('abc', 7, False, 0.70);
INSERT INTO bidProfile VALUES('abc1', 8, False, 0.64);


CREATE TABLE admin(
	username VARCHAR(50),
	password VARCHAR(50),
	userid INTEGER ,
	market_rate INTEGER
);

CREATE TABLE billProfile(
	-- uid INTEGER REFERENCES Customer (userid),
	username VARCHAR(50) PRIMARY KEY REFERENCES Customer(username),
	walletAmount INTEGER,
	fine INTEGER,
	date_paid_curr_month DATE,
	date_paid_last_month DATE,
	avg_usg_everyday INTEGER,
	avg_usg_monthly INTEGER,
	due_date DATE
);

CREATE TABLE general_info(
	curr_rate INTEGER,
	avg_cons_daily INTEGER,
	avg_cons_monthly INTEGER
);
INSERT INTO general_info  VALUES(1,10,300);

CREATE TABLE dc(
	-- shortage INTEGER,
	-- usage_total INTEGER,
	-- social_welfare INTEGER,
	username VARCHAR(50),
	password VARCHAR(50),
	userid INTEGER,
	due_pd INTEGER,
	inactive_pd INTEGER,
	-- curr_date DATE NOT NULL DEFAULT CURRENT_DATE,
	fine_per_day INTEGER
	-- cust_offer_made INTEGER []
);

CREATE TABLE dcvar(
	shortage INTEGER,
	usage_total INTEGER,
	social_welfare INTEGER,
	curr_date DATE NOT NULL DEFAULT CURRENT_DATE,
	cust_offer_made INTEGER[]
);

CREATE TABLE custData(
	username VARCHAR(50)  REFERENCES Customer (username),
	usage INTEGER,
	datewa DATE ,
	PRIMARY KEY(username,datewa)
);
INSERT INTO custData VALUES ('abc',10,'2020-05-01' );
INSERT INTO custData VALUES ('abc',20,'2020-05-02' );
INSERT INTO custData VALUES ('abc',30,'2020-05-03' );
INSERT INTO custData VALUES ('abc',40,'2020-05-04' );
INSERT INTO custData VALUES ('abc1',50,'2020-05-01' );
INSERT INTO custData VALUES ('abc1',60,'2020-05-02' );
INSERT INTO custData VALUES ('abc1',70,'2020-05-03' );
INSERT INTO custData VALUES ('abc1',80,'2020-05-04' );
INSERT INTO custData VALUES ('abc',80,'2020-06-04' );
INSERT INTO custData VALUES ('abc1',80,'2020-07-04' );

INSERT INTO custData VALUES ('abc',20,'2020-03-29' );
INSERT INTO custData VALUES ('abc1',32,'2020-03-29' );

--for calculating daily
 SELECT username,AVG(usage) INTO New_table2 FROM custData GROUP BY username;
--for calculating monthly
SELECT username,AVG(usage) as avg_usage,DATE_TRUNC('month',datewa) INTO New_table FROM custData GROUP BY DATE_TRUNC('month',datewa),username;
SELECT username, avg(avg_usage) FROM New_table GROUP BY username;
-- DATE - format YYYY-MM-DD

-- for calculating probability array
CREATE OR REPLACE FUNCTION calcProbability()
	RETURNS NUMERIC(3,2)[] AS
	$$
	DECLARE 
		prob NUMERIC(3,2)[];
		rec RECORD;
		cur CURSOR
			FOR SELECT *
			FROM Customer
			WHERE activeOrIn = True;
		x INT :=0;

		rec2 RECORD;
		cur2 CURSOR
			FOR SELECT *
			FROM bidProfile;
	BEGIN 
		OPEN cur;
		LOOP
			FETCH cur INTO rec;
			EXIT WHEN NOT FOUND;

			OPEN cur2;
			LOOP 
				FETCH cur2 INTO rec2;
				EXIT WHEN NOT FOUND;

				IF rec.username = rec2.username THEN
					prob[x] = rec2.probability;
					x := x+1;	
				END IF;
			END LOOP;
			CLOSE cur2;
			
		END LOOP;
		CLOSE cur;

		RETURN prob;
	END;
	$$

	LANGUAGE plpgsql;

--fr calculating cpr array
CREATE OR REPLACE FUNCTION calcCPRVal()
	RETURNS INTEGER[] AS
	$$
	DECLARE 
		prob INTEGER[];
		rec RECORD;
		cur CURSOR
			FOR SELECT *
			FROM Customer
			WHERE activeOrIn = True;
		x INT :=0;

		rec2 RECORD;
		cur2 CURSOR
			FOR SELECT *
			FROM bidProfile;
	BEGIN 
		OPEN cur;
		LOOP
			FETCH cur INTO rec;
			EXIT WHEN NOT FOUND;

			OPEN cur2;
			LOOP 
				FETCH cur2 INTO rec2;
				EXIT WHEN NOT FOUND;

				IF rec.username = rec2.username THEN
					prob[x] = rec2.cprVal;
					x := x+1;	
				END IF;
			END LOOP;
			CLOSE cur2;
			
		END LOOP;
		CLOSE cur;

		RETURN prob;
	END;
	$$

	LANGUAGE plpgsql;

-- for calculating number of customers
CREATE OR REPLACE FUNCTION calcN()
	RETURNS INTEGER AS
	$$
	DECLARE
		n INTEGER :=0;
		rec RECORD;
		cur CURSOR
			FOR SELECT *
			FROM Customer
			WHERE activeOrIn = True;

	BEGIN
		OPEN cur;
		LOOP
			FETCH cur INTO rec;
			EXIT WHEN NOT FOUND;
			 n:=n+1;
		END LOOP;
		CLOSE cur;

		RETURN n;

	END;		
	$$
	LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION Algo(cost INTEGER[], probability NUMERIC(3,2)[], n INTEGER, D INTEGER, C INTEGER)
	RETURNS INTEGER[] AS
	$$
	DECLARE
		output INTEGER[];
		pot_cost INTEGER[];
		



INSERT INTO dc(username, password, userid, due_pd, inactive_pd, fine_per_day) VALUES('dc','dc', 1, 15, 61, 10);
INSERT INTO admin VALUES('admin','admin', 111, 1);