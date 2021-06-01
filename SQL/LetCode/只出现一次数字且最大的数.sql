表 my_numbers 的 num 字段包含很多数字，其中包括很多重复的数字。
+---+
|num|
+---+
| 8 |
| 8 |
| 3 |
| 3 |
| 1 |
| 4 |
| 5 |
| 6 |


#group by num 获得显示次数  hanving count 获得条件
SELECT MAX(num) num FROM( SELECT * FROM `more_field` GROUP BY num HAVING count(num)=1) as m