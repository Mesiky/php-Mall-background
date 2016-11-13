-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-12 03:20:13
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chaoren`
--

-- --------------------------------------------------------

--
-- 表的结构 `chaoren_commodity`
--

CREATE TABLE IF NOT EXISTS `chaoren_commodity` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `commodityName` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `chaoren_commodity`
--

INSERT INTO `chaoren_commodity` (`Id`, `commodityName`) VALUES
(1, '男装女装'),
(2, '户外健身'),
(3, '家用电器'),
(5, '童装玩具'),
(6, '家具用品'),
(7, '本地服务'),
(8, '配件配饰'),
(9, '手机数码'),
(11, '汽车用品'),
(12, '智能家居');

-- --------------------------------------------------------

--
-- 表的结构 `chaoren_login`
--

CREATE TABLE IF NOT EXISTS `chaoren_login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(11) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `chaoren_login`
--

INSERT INTO `chaoren_login` (`Id`, `user`, `pwd`, `email`) VALUES
(9, 'administors', '527315916c9064949f12cb133f8506c8', 'admin@qq.com'),
(13, 'admin', '527315916c9064949f12cb133f8506c8', '924256520@qq.com'),
(14, '924256520', '527315916c9064949f12cb133f8506c8', '924256520@qq.com'),
(15, 'admin4', '527315916c9064949f12cb133f8506c8', '924256520@qq.com'),
(16, 'admin5', '21232f297a57a5a743894a0e4a801fc3', 'amdin'),
(17, 'admin6', '21232f297a57a5a743894a0e4a801fc3', 'admin@qq.com'),
(18, '924256520', '527315916c9064949f12cb133f8506c8', '924256520@qq.com'),
(20, 'cpcpcpcpcp', '527315916c9064949f12cb133f8506c8', '924256520@qq.com'),
(21, 'ccccccppppp', '527315916c9064949f12cb133f8506c8', '924256520@qq.com'),
(22, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@qq.com'),
(23, 'admins', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(24, '924256520dq', '9de4a3de8d28f07e49f2927151540b30', '924256520@qq.com'),
(25, '851147924', '527315916c9064949f12cb133f8506c8', '851147924@qq.com'),
(26, '841087815', '54ca59aa5a6d882f7431d8b25bc3e7af', '924256520@qq.com'),
(27, '1772996621', '04a1abc36194b6ad7c42a3ae877b0555', '1772996621@qq.com'),
(28, '9242565202', 'c78353f4fb33cca20d02ba91cbb87920', '924256520@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `chaoren_user`
--

CREATE TABLE IF NOT EXISTS `chaoren_user` (
  `useid` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `userPwd` varchar(100) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  PRIMARY KEY (`useid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `chaoren_user`
--

INSERT INTO `chaoren_user` (`useid`, `userName`, `userPwd`, `userEmail`) VALUES
(1, '9242423423', '527315916c9064949f12cb133f8506c8', '92425652w0@qq.com'),
(2, '92425652220', '527315916c9064949f12cb133f8506c8', '92425652ww0@qq.com'),
(4, '841087815', '527315916c9064949f12cb133f8506c8', '841087815@qq.com'),
(5, '924256520', '527315916c9064949f12cb133f8506c8', '924256520@qq.com'),
(6, '924256521', '527315916c9064949f12cb133f8506c8', '924256521@qq.com'),
(7, '924256520dq', '527315916c9064949f12cb133f8506c8', '1772996621@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `sort_img`
--

CREATE TABLE IF NOT EXISTS `sort_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_src` varchar(200) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `sort_img`
--

INSERT INTO `sort_img` (`id`, `img_src`, `pid`) VALUES
(1, '8bfc6fe7020223a8b4e80a86af825bb9.jpg', 1),
(2, 'bc8c34394550c082cab03524aec25cf4.jpg', 2),
(3, 'ee6f985e38552cd25951d5b70dd8115c.jpg', 2),
(4, '6acb2acd6e472c546ee715d39695919b.jpg', 3),
(5, '5e46ccffa0189b3d3164c6e96bc24e34.jpg', 4),
(6, '50f70476f34ce621960d3e77e00bdae6.jpg', 4),
(7, '2ef5915e887b89486c272e19f42af1b8.jpg', 5),
(8, 'b18201e7e353dd334ba91cc132972e1f.jpg', 5),
(9, 'beab301b4cdbaf59cca8e01aae70fd10.jpg', 5),
(10, 'c3c27e54b8ea38fb8ca19d33569ef1da.jpg', 6),
(11, '18f59bc229a4505ae0b5bf5264f300d4.jpg', 7),
(12, '8fd74e74c0d6e6e312010dfc7c1bdc0e.jpg', 7),
(13, 'ff909ba8a3004963d52c1283fdba3ae5.png', 8),
(14, 'b36a444d78bb425954031db83be05854.jpg', 8),
(15, 'dd2f7f5909dc9b4e47671e66dd73d80d.jpg', 8),
(16, 'af793f38a2dabe0210b43988b99937a6.jpg', 9),
(17, 'a1de4c13308438453d0afa7e75ba4a99.jpg', 9),
(18, 'efed3c9c91f3f40c4e3aae52c6511547.jpg', 10),
(19, '4b9c313f117c8beb05b5e6b4033d6ffc.jpg', 10),
(20, '369ea58454affb2fc5a88e4ece5d39f0.jpg', 11),
(21, '1163e4fb176ecf0f60a80b06876c2364.png', 11),
(22, 'cb46efbd2a01f41fe0ef9cb37c1f96b4.jpg', 12),
(23, '361d527ad562bb838cfa87063726d85a.jpg', 12),
(24, '2ed39dac7f4e1e37f9cfcd027f6f2d6c.jpg', 13),
(25, 'afbb9d53655d926f9fb12514702e894b.jpg', 14),
(26, 'dd8c2e9f918537abeea8b8c353eb0b16.jpg', 15),
(27, '640b07b8bc84ea09bebab42d0fe267c0.jpg', 15),
(28, '373eb275e6a73728c6c96794097cafaa.jpg', 16);

-- --------------------------------------------------------

--
-- 表的结构 `sort_pro`
--

CREATE TABLE IF NOT EXISTS `sort_pro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_name` varchar(20) NOT NULL,
  `sort_no` int(11) NOT NULL,
  `sort_num` int(11) NOT NULL,
  `sort_price` int(11) NOT NULL,
  `sort_content` varchar(200) NOT NULL,
  `time` int(11) NOT NULL,
  `is_show` int(11) NOT NULL DEFAULT '1',
  `is_hot` int(11) NOT NULL DEFAULT '0',
  `Tid` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `sort_pro`
--

INSERT INTO `sort_pro` (`id`, `sort_name`, `sort_no`, `sort_num`, `sort_price`, `sort_content`, `time`, `is_show`, `is_hot`, `Tid`) VALUES
(1, '情侣装秋冬装新款韩范休闲套头针织衫潮男格', 1222, 233, 79, '<p>正品支持退换 秋冬季情侣装 原宿大码毛衣 新款						\r\n			正品支持退换 秋冬季情侣装 原宿大码毛衣 新款正品支持退换 秋冬季情侣装 原宿大码毛衣 新款正品支持退换 秋冬季情侣装 原宿大码毛衣 新款</p>', 1478559600, 1, 0, 1),
(2, '日系复古潮牌纯色麻花毛衣男秋冬款休闲打底', 16206, 244, 159, '<p><span style="line-height:1.5;">商品详情页中的划线价（例如-129.00-）为厂家指导建议价并非原价，该价格有可能成交过，也有可能因为商业原因未曾成交过，促销价为店铺实时销售价，请各位顾客知悉。</span><span style="line-height:1.5;">商品详情页中的划线价（例如-129.00-）为厂家指导建议价并非原价，该价格有可能成交过，也有', 1478591240, 1, 0, 1),
(3, '8seconds|8秒男装/女装权志龙G', 256541, 234, 199, '<p>8seconds|8秒男装/女装权志龙GD限量款条纹圆领纯棉T恤256541X04 <br/>8seconds|8秒男装/女装权志龙GD限量款条纹圆领纯棉T恤256541X04 <br/>8seconds|8秒男装/女装权志龙GD限量款条纹圆领纯棉T恤256541X04 <br/></p>', 1478591398, 1, 0, 1),
(4, '唯力固服装店展示架女装店装修衣服架子男装', 88, 2441, 580, '<p>\r\n					唯力固服装店展示架女装店装修衣服架子男装复古落地式中岛架货架	\r\n\r\n\r\n										16年新品 挂衣高度 可在 1.6米或 1.7米						\r\n			唯力固服装店展示架女装店装修衣服架子男装复古落地式中岛架货架	\r\n\r\n\r\n										16年新品 挂衣高度 可在 1.6米或 1.7米唯力固服装店展示架女装店装修衣服架子男装复古落地式中岛架货架	\r\n\r\n\r\n', 1478591529, 1, 0, 1),
(5, '梦想巴士潮夏装拼色休闲半袖情侣纯色空白棒', 5607, 231, 66, '<p>梦想巴士潮夏装拼色休闲半袖情侣纯色空白棒球衫男装女装短袖梦想巴士潮夏装拼色休闲半袖情侣纯色空白棒球衫男装女装短袖梦想巴士潮夏装拼色休闲半袖情侣纯色空白棒球衫男装女装短袖梦想巴士潮夏装拼色休闲半袖情侣纯色空白棒球衫男装女装短袖梦想巴士潮夏装拼色休闲半袖情侣纯色空白棒球衫男装女装短袖<br/></p>', 1478591629, 1, 0, 1),
(6, '情侣装夏装2016新款潮创意风筝个性男装', 1310001, 565, 39, '<p>情侣装夏装2016新款潮创意风筝个性男装简约百搭纯棉短袖T恤女装情侣装夏装2016新款潮创意风筝个性男装简约百搭纯棉短袖T恤女装情侣装夏装2016新款潮创意风筝个性男装简约百搭纯棉短袖T恤女装情侣装夏装2016新款潮创意风筝个性男装简约百搭纯棉短袖T恤女装情侣装夏装2016新款潮创意风筝个性男装简约百搭纯棉短袖T恤女装</p>', 1478559600, 1, 0, 1),
(7, '男装/女装Bigbang权志龙GD同款个', 4323423, 2122, 59, '<p>男装/女装Bigbang权志龙GD同款个性飞机小猫椰树刺绣印花短袖T恤 <br/>男装/女装Bigbang权志龙GD同款个性飞机小猫椰树刺绣印花短袖T恤 <br/>男装/女装Bigbang权志龙GD同款个性飞机小猫椰树刺绣印花短袖T恤 <br/>男装/女装Bigbang权志龙GD同款个性飞机小猫椰树刺绣印花短袖T恤 <br/></p>', 1478592310, 1, 0, 1),
(8, '服装店衣架展示架吊挂铁艺男装女装陈列货架', 23423, 322, 59, '<p>服装店衣架展示架吊挂铁艺男装女装陈列货架吊顶壁挂上墙吊架组合 <br/>服装店衣架展示架吊挂铁艺男装女装陈列货架吊顶壁挂上墙吊架组合 <br/>服装店衣架展示架吊挂铁艺男装女装陈列货架吊顶壁挂上墙吊架组合 <br/>服装店衣架展示架吊挂铁艺男装女装陈列货架吊顶壁挂上墙吊架组合 服装店衣架展示架吊挂铁艺男装女装陈列货架吊顶壁挂上墙吊架组合 <br/></p>', 1478592417, 1, 0, 1),
(9, 'Xiaomi/小米', 6821784, 435, 699, '<p>Xiaomi/小米 红米手机3S 大屏指纹解锁智能手机Xiaomi/小米 红米手机3S 大屏指纹解锁智能手机Xiaomi/小米 红米手机3S 大屏指纹解锁智能手机Xiaomi/小米 红米手机3S 大屏指纹解锁智能手机Xiaomi/小米 红米手机3S 大屏指纹解锁智能手机Xiaomi/小米 红米手机3S 大屏指纹解锁智能手机</p>', 1478559600, 1, 0, 9),
(10, 'Apple/苹果', 32423, 999, 6388, '<p>Apple/苹果 iPhone 7 PlusApple/苹果 iPhone 7 PlusApple/苹果 iPhone 7 PlusApple/苹果 iPhone 7 PlusApple/苹果 iPhone 7 Plus</p>', 1478559600, 1, 0, 9),
(11, '联想zuk', 1601160, 3242, 1199, '<p><br/>联想zuk Z2 3+32G内存全网通指纹识双卡安卓手机联想zuk Z2 3+32G内存全网通指纹识双卡安卓手机联想zuk Z2 3+32G内存全网通指纹识双卡安卓手机联想zuk Z2 3+32G内存全网通指纹识双卡安卓手机联想zuk Z2 3+32G内存全网通指纹识双卡安卓手机联想zuk Z2 3+32G内存全网通指纹识双卡安卓手机联想zuk Z2 3+32G内存全网通指纹识双卡', 1478559600, 1, 0, 9),
(12, '华为honor/荣耀', 1160678, 555, 1399, '<p>华为honor/荣耀 荣耀7移动增强版32G智能手机华为honor/荣耀 荣耀7移动增强版32G智能手机华为honor/荣耀 荣耀7移动增强版32G智能手机华为honor/荣耀 荣耀7移动增强版32G智能手机</p>', 1478559600, 1, 0, 9),
(13, 'Coolpad/酷派', 1606872, 4333, 899, '<p>Coolpad/酷派 C106 cool1双摄双卡全网通4G智能手机Coolpad/酷派 C106 cool1双摄双卡全网通4G智能手机Coolpad/酷派 C106 cool1双摄双卡全网通4G智能手机Coolpad/酷派 C106 cool1双摄双卡全网通4G智能手机Coolpad/酷派 C106 cool1双摄双卡全网通4G智能手机Coolpad/酷派 C106 cool1双摄双卡全网', 1478559600, 1, 0, 9),
(14, 'Huawei/华为', 160687233, 3534, 1499, '<p>Huawei/华为 G9 青春版全网通手机P9Huawei/华为 G9 青春版全网通手机P9Huawei/华为 G9 青春版全网通手机P9Huawei/华为 G9 青春版全网通手机P9</p>', 1478559600, 1, 0, 9),
(15, 'nubia/努比亚 Z11 mini指纹', 32423, 344, 1099, '<p>nubia/努比亚 Z11 mini指纹智能手机大内存美颜拍照nubia/努比亚 Z11 mini指纹智能手机大内存美颜拍照nubia/努比亚 Z11 mini指纹智能手机大内存美颜拍照nubia/努比亚 Z11 mini指纹智能手机大内存美颜拍照nubia/努比亚 Z11 mini指纹智能手机大内存美颜拍照nubia/努比亚 Z11 mini指纹智能手机大内存美颜拍照</p>', 1478593458, 1, 0, 9),
(16, 'Meizu/魅族 魅蓝note3全网通电', 325423, 788, 999, '<p>Meizu/魅族 魅蓝note3全网通电信版移动联通4G手机Meizu/魅族 魅蓝note3全网通电信版移动联通4G手机Meizu/魅族 魅蓝note3全网通电信版移动联通4G手机Meizu/魅族 魅蓝note3全网通电信版移动联通4G手机Meizu/魅族 魅蓝note3全网通电信版移动联通4G手机Meizu/魅族 魅蓝note3全网通电信版移动联通4G手机</p>', 1478593520, 1, 0, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
