# river-ping-water-level-data-retrieve

PHP code for pulling data from

ศูนย์อุทกวิทยาชลประทานภาคเหนือตอนบน
สำนักบริหารจัดการน้ำและอุทกวิทยา กรมชลประทาน

Upper Northern Region Irrigation Hydrology Center (CHIANGMAI , THAILAND) 
BUREAU OF WATER MANAGEMENT AND HYDROLOGY, ROYAL IRRIGATION DEPARTMENT THAILAND 

Data is update hourly but can be switch to realtime in some situation.

Original data is in Thai with local time. This code convert the local time to UNIX_TIMESTAMP and return it as a key.
You can change the code in the header for adjust water location and time.

Insert &update to get latest data (This code use catched file)
Insert &json to get data in json format

example : http://localhost&update&json

You can change the time/period by made change in the ?url (&yy and &mm)
?storage=P.1 is the code of water level monitoring station

Sample URL : http://hydro-1.rid.go.th/Data/HD-04/houly/water_today_search.php?storage=P.1&yy=2019&mm=07

If the water level of station P.1 higher than 3.7 metre. It will flood the Chiangmai city.

You'll need a PHP webserver and put our files in it.
