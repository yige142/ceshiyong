# 一个小学生 Tim 的作业是判断三条线段是否能形成一个三角形。
#
# 然而，这个作业非常繁重，因为有几百组线段需要判断。
#
# 假设表 triangle 保存了所有三条线段的长度 x、y、z ，请你帮 Tim 写一个查询语句，来判断每组 x、y、z 是否可以组成一个三角形？
| x  | y  | z  |
|----|----|----|
| 13 | 15 | 30 |
| 10 | 20 | 15 |
对于如上样例数据，你的查询语句应该返回如下结果：

| x  | y  | z  | triangle |
|----|----|----|----------|
| 13 | 15 | 30 | No       |
| 10 | 20 | 15 | Yes      |

#1 用IF
SELECT *,IF(x+y>z AND x+z>y AND y+z>x,"YES","NO") t FROM triangle

#2 用 case when ..then 'Y' else 'N' END 'result'
# 补充 case 比 IF 速度查询快
SELECT *,CASE WHEN x+y>z AND x+z>y AND y+z>x THEN 'Yes' else
    'No'
    END 'result'
FROM triangle

# 输出结果
#  "x"	"y"	    "z"	    "result"
# "13"	"15"	"30"	"No"
# "10"	"20"	"15"	"Yes"
