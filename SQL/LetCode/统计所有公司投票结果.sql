SELECT
    激光加工装备创新贡献奖,t2.score AS 分数1, t2.t2_id AS 排名1,
    激光应用方案技术创新奖,t3.score AS 分数2, t3.t3_id AS 排名2,
    黑科技技术创新奖,t4.score AS 分数3, t4.t4_id AS 排名3,
    工业激光器创新贡献奖,t5.score AS 分数4, t5.t5_id AS 排名4,
    超快激光器创新贡献奖,t6.score AS 分数5, t6.t6_id AS 排名5,
    光纤激光器创新贡献奖,t7.score AS 分数6, t7.t7_id AS 排名6,
    激光微加工系统创新贡献奖,t8.score AS 分数7, t8.t8_id AS 排名7,
    激光配套系统创新贡献奖,t9.score AS 分数8, t9.t9_id AS 排名8,
    激光加工头创新贡献奖,t10.score AS 分数9, t10.t10_id AS 排名9,
    激光器件创新贡献奖,t11.score AS 分数10, t11.t11_id AS 排名10,
    激光行业杰出进步企业奖,t12.score AS 分数11, t12.t12_id AS 排名11,
    激光行业影响力企业奖,t13.score AS 分数12, t13.t13_id AS 排名12
FROM(
     (SELECT @num_id1:=0,@num_id2:=0,@num_id3:=0,@num_id4:=0,@num_id5:=0,@num_id6:=0,@num_id7:=0,@num_id8:=0,@num_id9:=0,@num_id10:=0,@num_id11:=0,@num_id12:=0) t,
     (SELECT company AS '激光加工装备创新贡献奖',score,@num_id1:=@num_id1+1 AS t2_id FROM `ims_awards_apply` WHERE prize='激光加工装备创新贡献奖' AND status=1 ORDER BY score desc) AS t2

        LEFT JOIN
    (SELECT company AS '激光应用方案技术创新奖',score, @num_id2:=@num_id2+1 AS t3_id FROM `ims_awards_apply` WHERE prize='激光应用方案技术创新奖' AND status=1 ORDER BY score desc) AS t3
    ON t2.t2_id=t3.t3_id

        LEFT JOIN
    (SELECT company AS '黑科技技术创新奖',score, @num_id3:=@num_id3+1 AS t4_id FROM `ims_awards_apply` WHERE prize='黑科技技术创新奖' AND status=1 ORDER BY score desc) AS t4
    ON t2.t2_id=t4.t4_id

        LEFT JOIN
    (SELECT company AS '工业激光器创新贡献奖',score, @num_id4:=@num_id4+1 AS t5_id FROM `ims_awards_apply` WHERE prize='工业激光器创新贡献奖' AND status=1 ORDER BY score desc) AS t5
    ON t2.t2_id=t5.t5_id

        LEFT JOIN
    (SELECT company AS '超快激光器创新贡献奖',score, @num_id5:=@num_id5+1 AS t6_id FROM `ims_awards_apply` WHERE prize='超快激光器创新贡献奖' AND status=1 ORDER BY score desc) AS t6
    ON t2.t2_id=t6.t6_id

        LEFT JOIN
    (SELECT company AS '光纤激光器创新贡献奖',score, @num_id6:=@num_id6+1 AS t7_id FROM `ims_awards_apply` WHERE prize='光纤激光器创新贡献奖' AND status=1 ORDER BY score desc) AS t7
    ON t2.t2_id=t7.t7_id

        LEFT JOIN
    (SELECT company AS '激光微加工系统创新贡献奖',score, @num_id7:=@num_id7+1 AS t8_id FROM `ims_awards_apply` WHERE prize='激光微加工系统创新贡献奖' AND status=1 ORDER BY score desc) AS t8
    ON t2.t2_id=t8.t8_id

        LEFT JOIN
    (SELECT company AS '激光配套系统创新贡献奖',score, @num_id8:=@num_id8+1 AS t9_id FROM `ims_awards_apply` WHERE prize='激光配套系统创新贡献奖' AND status=1 ORDER BY score desc) AS t9
    ON t2.t2_id=t9.t9_id


        LEFT JOIN
    (SELECT company AS '激光加工头创新贡献奖',score, @num_id9:=@num_id9+1 AS t10_id FROM `ims_awards_apply` WHERE prize='激光加工头创新贡献奖' AND status=1 ORDER BY score desc) AS t10
    ON t2.t2_id=t10.t10_id

        LEFT JOIN
    (SELECT company AS '激光器件创新贡献奖',score, @num_id10:=@num_id10+1 AS t11_id FROM `ims_awards_apply` WHERE prize='激光器件创新贡献奖' AND status=1 ORDER BY score desc) AS t11
    ON t2.t2_id=t11.t11_id

        LEFT JOIN
    (SELECT company AS '激光行业杰出进步企业奖',score, @num_id11:=@num_id11+1 AS t12_id FROM `ims_awards_apply` WHERE prize='激光行业杰出进步企业奖' AND status=1 ORDER BY score desc) AS t12
    ON t2.t2_id=t12.t12_id

        LEFT JOIN
    (SELECT company AS '激光行业影响力企业奖',score, @num_id12:=@num_id12+1 AS t13_id FROM `ims_awards_apply` WHERE prize='激光行业影响力企业奖' AND status=1 ORDER BY score desc) AS t13
    ON t2.t2_id=t13.t13_id
        )




#初始语句--下
-- SELECT * FROM(
-- (SELECT @num_id1:=0,@num_id2:=0,@num_id3:=0,@num_id4:=0,@num_id5:=0,@num_id6:=0,@num_id7:=0,@num_id8:=0,@num_id9:=0,@num_id10:=0,@num_id11:=0,@num_id12:=0) t,
-- (SELECT company AS '激光加工装备创新贡献奖',prize,score,@num_id1:=@num_id1+1 AS t2_id FROM `ims_awards_apply` WHERE prize='激光加工装备创新贡献奖' AND status=1 ORDER BY score desc) AS t2
--
-- LEFT JOIN
-- (SELECT company AS '激光应用方案技术创新奖',prize,score, @num_id2:=@num_id2+1 AS t3_id FROM `ims_awards_apply` WHERE prize='激光应用方案技术创新奖' AND status=1 ORDER BY score desc) AS t3
-- ON t2.t2_id=t3.t3_id
--
-- LEFT JOIN
-- (SELECT company AS '黑科技技术创新奖 ',prize,score, @num_id3:=@num_id3+1 AS t4_id FROM `ims_awards_apply` WHERE prize='黑科技技术创新奖 ' AND status=1 ORDER BY score desc) AS t4
-- ON t2.t2_id=t4.t4_id
-- )