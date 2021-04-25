--对于每个员工，查询他除最近一个月（即最大月）之外，剩下每个月的近三个月的累计薪水（不足三个月也要计算）。

--结果请按 Id 升序，然后按 Month 降序显示。

-- 示例：
-- 输入：
--
-- | Id | Month | Salary |
-- |----|-------|--------|
-- | 1  | 1     | 20     |
-- | 2  | 1     | 20     |
-- | 1  | 2     | 30     |
-- | 2  | 2     | 30     |
-- | 3  | 2     | 40     |
-- | 1  | 3     | 40     |
-- | 3  | 3     | 60     |
-- | 1  | 4     | 60     |
-- | 3  | 4     | 70     |
-- 输出：
--
-- | Id | Month | Salary |
-- |----|-------|--------|
-- | 1  | 3     | 90     |
-- | 1  | 2     | 50     |
-- | 1  | 1     | 20     |
-- | 2  | 1     | 20     |
-- | 3  | 3     | 100    |
-- | 3  | 2     | 40     |
--
-- 来源：力扣（LeetCode）
-- 链接：https://leetcode-cn.com/problems/find-cumulative-salary-of-an-employee
-- 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


select Id, AccMonth as Month, sum(Salary) as Salary FROM
(

	SELECT  a.Id as Id, a.month as AccMonth, sa.Month as Month, sa.Salary as Salary FROM salry as sa

	inner JOIN

	(

	SELECT salry.id,salry.`month`,salry.salary,m.m_month FROM salry,
		(
		SELECT id,max(month) m_month FROM salry GROUP BY id
		) AS m
	WHERE salry.id=m.id AND salry.`month` != m.m_month
	) AS a

	ON sa.id=a.id AND a.`month`-sa.`month`<=2 AND a.month - sa.Month >= 0
)as acc
 GROUP BY Id,AccMonth
 ORDER BY Id,Month DESC


--第一个子查询  SELECT id,max(month) m_month FROM salry GROUP BY id 筛选出他们不要的最大的那个月份
--输出
-- "id"	"m_month"
-- "1"	"4"
-- "2"	"2"
-- "3"	"3"

--第二个子查询
-- SELECT salry.id,salry.`month`,salry.salary,m.m_month FROM salry,
-- 		(
-- 		SELECT id,max(month) m_month FROM salry GROUP BY id
-- 		) AS m
-- 	WHERE salry.id=m.id AND salry.`month` != m.m_month ) AS a
-- "id"	"month"	"salary"	"m_month"
-- "1"	"1"	"20"	"4"
-- "2"	"1"	"20"	"2"
-- "1"	"2"	"30"	"4"
-- "3"	"2"	"40"	"3"
-- "1"	"3"	"40"	"4"
--屏蔽掉每个人最大的那个月份

--第三个子查询
-- 	SELECT  a.Id as Id, a.month as AccMonth, sa.Month as Month, sa.Salary as Salary FROM salry as sa

-- 	inner JOIN
-- 	(

-- 	SELECT salry.id,salry.`month`,salry.salary,m.m_month FROM salry,
-- 		(
-- 		SELECT id,max(month) m_month FROM salry GROUP BY id
-- 		) AS m
-- 	WHERE salry.id=m.id AND salry.`month` != m.m_month
-- 	) AS a
-- 	ON sa.id=a.id AND a.`month`-sa.`month`<=2 AND a.month - sa.Month >= 0

--"Id"	"AccMonth"	"Month"	"Salary"
 -- "1"     "1"	      "1"    "20"
 -- "1"     "2"	      "1"    "20"
 -- "1"     "3"	      "1"    "20"
 -- "2"     "1"	      "1"    "20"
 -- "1"     "2"	      "2"    "30"
 -- "1"     "3"	      "2"    "30"
 -- "3"     "2"	      "2"    "40"
 -- "1"     "3"	      "3"    "40"
--内连接查询 ON a.`month`-sa.`month`<=2 AND a.month - sa.Month >= 0 这两个条件还没太明白什么意思

--不加 AND后条件查询结果
-- "Id"	"AccMonth"	"Month"	"Salary"
    -- "1"	    "1"    	"1"   "20"
    -- "1"	    "2"    	"1"   "20"
    -- "1"	    "3"    	"1"   "20"
    -- "2"	    "1"    	"1"   "20"
    -- "1"	    "1"    	"2"   "30"
    -- "1"	    "2"    	"2"   "30"
    -- "1"	    "3"    	"2"   "30"
    -- "2"	    "1"    	"2"   "30"
    -- "3"	    "2"    	"2"   "40"
    -- "1"	    "1"    	"3"   "40"
    -- "1"	    "2"    	"3"   "40"
    -- "1"	    "3"    	"3"   "40"
    -- "3"	    "2"    	"3"   "60"
    -- "1"	    "1"    	"4"   "60"
    -- "1"	    "2"    	"4"   "60"
    -- "1"	    "3"    	"4"   "60"
    -- "1"	    "1"    	"4"   "70"
    -- "1"	    "2"    	"4"   "70"
    -- "1"	    "3"    	"4"   "70"
--分析 a.`month`-sa.`month`<=2  只取最大三个月的记录，   AND a.month - sa.Month >= 0 ？？？[存疑]