# river-ping-water-level-data-converter

PHP code for pulling data from

ศูนย์อุทกวิทยาชลประทานภาคเหนือตอนบน
สำนักบริหารจัดการน้ำและอุทกวิทยา กรมชลประทาน

Upper Northern Region Irrigation Hydrology Center (CHIANGMAI , THAILAND) 
BUREAU OF WATER MANAGEMENT AND HYDROLOGY, ROYAL IRRIGATION DEPARTMENT THAILAND 

Original data is in Thai with local time. This code convert the local time to UNIX_TIMESTAMP and return it as a key.
You can change the code in the header for adjust water location and time.

Insert &update to get latest data (This code use catch file method)
Insert &json to get data in json format

check_array($new_data);

You can change the time/period by made change in the ?url (&yy and &mm)

Sample URL : http://hydro-1.rid.go.th/Data/HD-04/houly/water_today_search.php?storage=P.1&yy=2019&mm=07
