#一所美国大学有来自亚洲、欧洲和美洲的学生，他们的地理信息存放在如下 student 表中。
| name   | continent |
|--------|-----------|
| Jack   | America   |
| Pascal | Europe    |
| Xi     | Asia      |
| Jane   | America   |
 
写一个查询语句实现对大洲（continent）列的 透视表 操作，使得每个学生按照姓名的字母顺序依次排列在对应的大洲下面。输出的标题应
依次为美洲（America）、亚洲（Asia）和欧洲（Europe）。

对于样例输入，它的对应输出是：

| America | Asia | Europe |
|---------|------|--------|
| Jack    | Xi   | Pascal |
| Jane    |      |        |


官方题解提示
使用 session 变量为每个大洲分配单独的行自增 id。例如下面语句为美洲的学生分配行自增 id。
SELECT
    row_id, America
FROM
    (SELECT @am:=0) t,
    (SELECT
         @am:=@am + 1 AS row_id, name AS America
     FROM
         student
     WHERE
             continent = 'America'
     ORDER BY America) AS t2
#输出结果
| row_id | America |
|--------|---------|
| 1      | Jack    |
| 2      | Jane    |

参考上列用leftjoin解 ，（本地显示答案正确，提交力扣预期结果一样，但提交完后显示错误）
SELECT
    America,Asia,Europe
FROM
    (SELECT @am:=0,@num:=0,@asia_num:=0) t,#设置ID自增列
    (SELECT
         @am:=@am + 1 AS row_id, name AS America
     FROM
         618_student
     WHERE
             continent = 'America'
     ORDER BY America ASC
    ) AS t2 left JOIN
    (
        SELECT
            @num:=@num + 1 AS e_id, name AS Europe
        FROM
            618_student
        WHERE
                continent = 'Europe'
    )AS t3 ON t2.row_id=t3.e_id
            LEFT JOIN
    (
        SELECT @asia_num:=@asia_num+1 AS a_id, name AS Asia
        From 618_student
        WHERE continent='Asia'
    )AS t4 ON t4.a_id=t2.row_id


#进阶，用该方法统计投票公司按横向显示公司名，纵向显示该公司每天投票的数值
SELECT
--  *
--  ,
a_id,vote_num1 AS '武汉创点智能科技',vote_num2 AS '深圳杰普特',cf.make_time
FROM(
     (SELECT @am:=0,@n:=0) t,
     (select @am:=@am+1 as a_id,count(a.id) as vote_num1,a.id,a.company,a.prize,d.creat_time,d.make_time

      FROM `ims_awards_apply` AS a inner JOIN `ims_vote_detail` d

      ON a.id=d.participator_id WHERE id=64 GROUP BY make_time) as cf

        left JOIN

    (select @n:=@n+1 as j_id,count(a.id) as vote_num2,a.id,a.company,a.prize,d.creat_time,d.make_time

     FROM `ims_awards_apply` AS a inner JOIN `ims_vote_detail` d

     ON a.id=d.participator_id WHERE id=65 GROUP BY make_time) as j
    ON j.j_id=cf.a_id

)
 #输出结果
"a_id"	"武汉创点智能科技"	"深圳杰普特"	"make_time"
"1"	    "48"	        "22"	     "2021-04-29"
"2"	    "46"	        "31"	     "2021-04-30"
"3"	    "94"	        "11"	     "2021-05-01"
"4"	    "132"	        "9"	         "2021-05-02"
"5"	    "65"	        "13"	     "2021-05-03"
"6"	    "78"	        "11"	     "2021-05-04"
"7"	    "66"	        "16"	     "2021-05-05"
"8"	    "284"	        "21"	     "2021-05-06"
"9"	    "107"	        "7"	         "2021-05-07"
"10"	"65"	        "2"	         "2021-05-08"
"11"	"44"	        "3"	         "2021-05-09"
"12"	"277"	        "5" 	     "2021-05-10"
"13"	"55"	        "5"	         "2021-05-11"
"14"	"13"	        "10"	     "2021-05-13"
"15"	"47"	        "4"	         "2021-05-14"
"16"	"30"	        "8"	         "2021-05-15"
"17"	"20"	        "5"	         "2021-05-16"
"18"	"2"	            "9"	         "2021-05-17"
