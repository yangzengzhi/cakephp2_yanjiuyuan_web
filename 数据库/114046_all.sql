SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS  `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_title` varchar(30) DEFAULT NULL COMMENT '新闻标题',
  `ch_id` int(10) unsigned NOT NULL COMMENT 'channel_id',
  `ch_parent_id` int(10) unsigned NOT NULL COMMENT '父分类',
  `channel_type` tinyint(2) unsigned DEFAULT NULL COMMENT '1为中文',
  `news_author` varchar(30) DEFAULT '' COMMENT '新闻作者',
  `news_img` varchar(100) DEFAULT NULL COMMENT '图片预览',
  `news_content` text COMMENT '新闻内容',
  `news_date` int(10) unsigned DEFAULT NULL COMMENT '新闻添加日期',
  `sort` tinyint(3) unsigned DEFAULT '0' COMMENT '排序',
  `is_delete` tinyint(3) unsigned DEFAULT '1' COMMENT '是否删除:1是,0否',
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '1显示',
  `show` tinyint(3) unsigned DEFAULT '0' COMMENT '1为首页滑动显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=gbk COMMENT='新闻表';

insert into `news`(`id`,`news_title`,`ch_id`,`ch_parent_id`,`channel_type`,`news_author`,`news_img`,`news_content`,`news_date`,`sort`,`is_delete`,`status`,`show`) values
('21','习近平出席全国生态环境保护大会并发表重要讲话','22','3','1','admin','/upload/adv_img/2018-05/5b091e4e5c1ea.jpg','　　5月18日至19日，全国生态环境保护大会在北京召开。中共中央总书记、国家主席、中央军委主席习近平出席会议并发表重要讲话。　　新华社记者 王晔 摄','1526790904','0','1','1','1'),
('22','习近平出席全国生态环境保护大会并发表重要讲话','22','3','1','admin','/upload/adv_img/2018-05/5b091e3ab283f.jpg','　　5月18日至19日，全国生态环境保护大会在北京召开。中共中央总书记、国家主席、中央军委主席习近平出席会议并发表重要讲话。　　新华社记者 王晔 摄','1526790904','0','1','1','1'),
('23','这是中文频道','18','1','1','admin','/upload/adv_img/2018-05/5b091e26a3d4b.jpg','这不是一个简单的中文频道','1527319279','0','1','1','1'),
('24','这不只是一个频道','22','3','1','admin','/upload/news_img/2018-05/5b090d4de4da1.jpg','显示这个图片','1527319885','0','1','1','1'),
('25','习近平主持中共中央政治局会议','18','1','1','admin',null,'新华社北京5月31日电  中共中央政治局5月31日召开会议，审议《乡村振兴战略规划（2018－2022年）》和《关于打赢脱贫攻坚战三年行动的指导意见》。中共中央总书记习近平主持会议。
　　会议指出，党的十九大提出实施乡村振兴战略，是以习近平同志为核心的党中央着眼党和国家事业全局、顺应亿万农民对美好生活的向往，对“三农”工作作出的重大决策部署，是决胜全面建成小康社会、全面建设社会主义现代化国家的重大历史任务，是新时代做好“三农”工作的总抓手。
　　会议认为，乡村振兴战略规划（2018－2022年）细化实化工作重点和政策措施，部署若干重大工程、重大计划、重大行动，形成了今后5年落实中央一号文件的政策框架。要全面贯彻党的十九大精神，以习近平新时代中国特色社会主义思想为指导，加强党对“三农”工作的领导，坚持稳中求进工作总基调，牢固树立新发展理念，落实高质量发展的要求，坚持农业农村优先发展，按照产业兴旺、生态宜居、乡风文明、治理有效、生活富裕的总要求，建立健全城乡融合发展体制机制和政策体系，统筹推进农村经济建设、政治建设、文化建设、社会建设、生态文明建设和党的建设，加快推进乡村治理体系和治理能力现代化，加快推进农业农村现代化，走中国特色社会主义乡村振兴道路，让农业成为有奔头的产业，让农民成为有吸引力的职业，让农村成为安居乐业的美丽家园。
　　会议要求，各级党委和政府要提高思想认识，真正把实施乡村振兴战略摆在优先位置，把党管农村工作的要求落到实处，把坚持农业农村优先发展的要求落到实处。各地区各部门要树立城乡融合、一体设计、多规合一理念，抓紧编制乡村振兴地方规划和专项规划或方案，做到乡村振兴事事有规可循、层层有人负责。要针对不同类型地区采取不同办法，做到顺应村情民意，既要政府、社会、市场协同发力，又要充分发挥农民主体作用，目标任务要符合实际，保障措施要可行有力。要科学规划、注重质量、稳步推进，一件事情接着一件事情办，一年接着一年干，让广大农民在乡村振兴中有更多获得感、幸福感、安全感。
　　会议认为，党的十八大以来，以习近平同志为核心的党中央把脱贫攻坚工作纳入“五位一体”总体布局和“四个全面”战略布局，对打赢脱贫攻坚战作出一系列重大部署，采取了一系列超常规的举措，构筑了全党全社会扶贫的强大合力。各地各部门认真贯彻落实党中央决策部署，全面推进精准扶贫、精准脱贫，脱贫攻坚取得决定性进展，谱写了人类反贫困史上的辉煌篇章，为全球减贫事业贡献了中国智慧和中国方案。
　　会议指出，党的十九大把脱贫攻坚战作为决胜全面建成小康社会必须打赢的三大攻坚战之一，作出全面部署。未来3年，还有3000万左右农村贫困人口需要脱贫。我们必须清醒认识打赢脱贫攻坚战面临的困难和挑战，切实增强责任感和紧迫感，再接再厉、精准施策，以更有力的行动、更扎实的工作，集中力量攻克贫困的难中之难、坚中之坚，确保坚决打赢脱贫这场对如期全面建成小康社会、实现第一个百年奋斗目标具有决定性意义的攻坚战。
　　会议强调，要坚持精准扶贫、精准脱贫基本方略，坚持中央统筹、省负总责、市县抓落实的工作机制，坚持大扶贫工作格局，坚持脱贫攻坚目标和现行扶贫标准，聚焦深度贫困地区和特殊贫困群体，突出问题导向，优化政策供给，下足绣花功夫，着力激发贫困人口内生动力，着力夯实贫困人口稳定脱贫基础，着力加强扶贫领域作风建设，切实提高贫困人口获得感，确保到2020年贫困地区和贫困群众同全国一道进入全面小康社会，为实施乡村振兴战略打好基础。
　　会议强调，要集中力量支持深度贫困地区脱贫攻坚，着力改善深度贫困地区发展条件，着力解决深度贫困地区群众特殊困难，着力加大深度贫困地区政策倾斜力度。要强化到村到户到人的精准帮扶举措，加大产业扶贫力度，全力推进就业扶贫，深入推动易地扶贫搬迁，加强生态扶贫，着力实施教育脱贫攻坚行动，深入实施健康扶贫工程，加快推进农村危房改造，强化综合保障性扶贫，开展贫困残疾人脱贫行动，开展扶贫扶志行动，树立脱贫光荣导向，弘扬自尊、自爱、自强精神，提高贫困群众自我发展能力。
　　会议强调，各级党委和政府要把打赢脱贫攻坚战作为重大政治任务，进一步落实脱贫攻坚责任制。要完善脱贫攻坚考核监督评估机制，提高考核评估质量和水平，切实解决基层疲于迎评迎检问题。要保持贫困县党政正职稳定，加强对脱贫一线干部的关爱激励。要开展扶贫领域腐败和作风问题专项治理，集中力量解决扶贫领域形式主义、官僚主义的突出问题，坚决依纪依法惩治贪污挪用、截留私分、虚报冒领、强占掠夺等行为。要深入宣传脱贫攻坚典型经验，宣传脱贫攻坚取得的成就。
　　会议还研究了其他事项。','1527771541','0','1','1','0');
DROP TABLE IF EXISTS  `channels`;
CREATE TABLE `channels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel_title` varchar(30) DEFAULT NULL COMMENT '频道标题',
  `parent_id` int(1) unsigned zerofill DEFAULT NULL COMMENT '父id',
  `status` tinyint(2) unsigned DEFAULT NULL COMMENT '1为显示',
  `sort` varchar(255) DEFAULT NULL COMMENT '排序',
  `channel_type` tinyint(2) unsigned DEFAULT NULL COMMENT '2为英文',
  `is_delete` tinyint(2) unsigned DEFAULT '1' COMMENT '是否删除:1是,0否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=gbk COMMENT='频道表';

insert into `channels`(`id`,`channel_title`,`parent_id`,`status`,`sort`,`channel_type`,`is_delete`) values
('1','研究院概况','0','1','0','1','1'),
('2','研发队伍','0','1','0','1','1'),
('3','科学研究','0','1','0','1','1'),
('4','科研成果','0','1','0','1','1'),
('5','学术交流','0','1','0','1','1'),
('6','高端培训','0','1','0','1','1'),
('7','通知与公告','0','0','255','1','1'),
('8','English1','0','1','0','2','1'),
('9','English2','0','1','0','2','1'),
('10','English3','0','1','0','2','1'),
('11','English4','0','1','0','2','1'),
('12','English5','0','1','0','2','1'),
('13','English6','0','1','0','2','1'),
('14','English7','0','0','255','2','1'),
('15','学术讲座','5','1',null,'1','1'),
('16','国际论坛','5','1',null,'1','1'),
('17','学术会议','5','1',null,'1','1'),
('18','组织架构','1','1',null,'1','1'),
('19','收费标准','2','1',null,'1','1'),
('20','论文','6','1',null,'1','1'),
('21','科研项目','4','1',null,'1','1'),
('22','项目领域','3','1',null,'1','1'),
('23','研究生培养','6','1',null,'1','1');
DROP TABLE IF EXISTS  `companys`;
CREATE TABLE `companys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL COMMENT '公司名称',
  `company_intro` text COMMENT '公司简介',
  `company_img` varchar(255) DEFAULT NULL COMMENT '公司LOGO',
  `company_address` varchar(50) NOT NULL COMMENT '公司地址',
  `company_tel` varchar(11) DEFAULT NULL COMMENT '公司电话',
  `company_email` varchar(50) DEFAULT NULL COMMENT '公司邮箱',
  `company_icp` varchar(20) DEFAULT NULL COMMENT '公司icp',
  `company_tax` varchar(20) DEFAULT NULL COMMENT '传真',
  `type` tinyint(3) unsigned DEFAULT '1' COMMENT '1中文2英文',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gbk COMMENT='公司信息表';

insert into `companys`(`id`,`company_name`,`company_intro`,`company_img`,`company_address`,`company_tel`,`company_email`,`company_icp`,`company_tax`,`type`) values
('1','Cardinal QiTian International Collaboratory','','/upload/company_img/2018-05/5b012674abd8f.png','GongZhou','1338112129','992335959@qq.com','89754621','86-020-81237926','2'),
('2','合作实验室','','/upload/company_img/2018-05/5b012674abd8f.png','GongZhou','1338112129','992335959@qq.com','89754621','86-020-81237926','1');
DROP TABLE IF EXISTS  `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` int(10) unsigned NOT NULL COMMENT '活动ID',
  `member_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '姓名',
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '年龄',
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '电话',
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '地址',
  `create_time` int(10) unsigned NOT NULL COMMENT '创建时间',
  `is_delete` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否删除:1是,0否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='留资表';

DROP TABLE IF EXISTS  `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` int(10) unsigned DEFAULT NULL,
  `modified` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

insert into `users`(`id`,`username`,`password`,`role`,`created`,`modified`) values
('1','admin','e10adc3949ba59abbe56e057f20f883e','1',null,'1527318788');
SET FOREIGN_KEY_CHECKS = 1;

