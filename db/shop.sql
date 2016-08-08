/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-08-08 17:01:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cates
-- ----------------------------
DROP TABLE IF EXISTS `cates`;
CREATE TABLE `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cates_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cates
-- ----------------------------
INSERT INTO `cates` VALUES ('11', 'No Style', 'no-style', '1', '0', 'No Style', '1', 'No Style', null, null);
INSERT INTO `cates` VALUES ('12', 'Áo thun No Style ', 'ao-thun-no-style', '2', '11', 'Áo thun No Style ', '1', 'Áo thun No Style ', null, null);
INSERT INTO `cates` VALUES ('13', 'Áo sơ mi No Style ', 'ao-so-mi-no-style', '2', '11', 'Áo sơ mi No Style ', '1', 'Áo sơ mi No Style ', null, null);
INSERT INTO `cates` VALUES ('14', 'Áo khoác No Style ', 'ao-khoac-no-style', '2', '11', 'Áo khoác No Style ', '1', 'Áo khoác No Style ', null, null);
INSERT INTO `cates` VALUES ('15', 'Quần short No Style ', 'quan-short-no-style', '2', '11', 'Quần short No Style', '1', 'Quần short No Style', null, null);
INSERT INTO `cates` VALUES ('16', 'Quần jean  No Style', 'quan-jean--no-style', '2', '11', 'Quần jean  No Style', '1', 'Quần jean  No Style', null, null);
INSERT INTO `cates` VALUES ('17', 'Adachi', 'adachi', '1', '0', 'Adachi', '1', 'Adachi', null, null);
INSERT INTO `cates` VALUES ('18', 'Áo thun Adachi', 'ao-thun-adachi', '2', '17', 'Áo thun Adachi', '1', 'Áo thun Adachi ', null, null);
INSERT INTO `cates` VALUES ('19', 'Áo sơ mi Adachi ', 'ao-so-mi-adachi', '2', '17', 'Áo sơ mi Adachi', '1', 'Áo sơ mi Adachi', null, null);
INSERT INTO `cates` VALUES ('20', 'Áo khoác Adachi', 'ao-khoac-adachi', '2', '17', 'Áo khoác Adachi', '1', 'Áo khoác Adachi ', null, null);
INSERT INTO `cates` VALUES ('21', 'Quần short Adachi', 'quan-short-adachi', '2', '17', 'Quần short Adachi', '1', 'Quần short Adachi', null, null);
INSERT INTO `cates` VALUES ('22', 'Quần jean Adachi', 'quan-jean-adachi', '2', '17', 'Quần jean Adachi ', '1', 'Quần jean Adachi', null, null);
INSERT INTO `cates` VALUES ('23', 'Váy đầm Adachi', 'vay-dam-adachi', '2', '17', 'Váy đầm Adachi', '1', 'Váy đầm Adachi', null, null);
INSERT INTO `cates` VALUES ('24', 'KiriMaru', 'kirimaru', '1', '0', 'KiriMaru', '1', 'KiriMaru', null, null);
INSERT INTO `cates` VALUES ('25', 'Áo thun tay ngắn', 'ao-thun-tay-ngan', '2', '24', 'Áo thun tay ngắn', '1', 'Áo thun tay ngắn', null, null);
INSERT INTO `cates` VALUES ('26', 'Áo thun tay dài', 'ao-thun-tay-dai', '2', '24', 'Áo thun tay dài', '1', 'Áo thun tay dài', null, null);
INSERT INTO `cates` VALUES ('27', 'Áo thun Ba Lỗ', 'ao-thun-ba-lo', '2', '24', 'Áo thun Ba Lỗ', '1', 'Áo thun Ba Lỗ', null, null);
INSERT INTO `cates` VALUES ('28', 'Áo khoác', 'ao-khoac', '2', '24', 'Áo khoác', '1', 'Áo khoác', null, null);
INSERT INTO `cates` VALUES ('29', 'Quần sooc', 'quan-sooc', '2', '24', 'Quần sooc', '1', 'Quần sooc', null, null);
INSERT INTO `cates` VALUES ('30', 'Áo sơ mi', 'ao-so-mi', '2', '24', 'Áo sơ mi', '1', 'Áo sơ mi', null, null);
INSERT INTO `cates` VALUES ('31', 'Giày nam', 'giay-nam', '1', '0', 'Giày nam', '1', 'Giày nam', null, null);
INSERT INTO `cates` VALUES ('32', 'Giày Kaito Kid', 'giay-kaito-kid', '2', '31', 'Giày Kaito Kid ', '1', 'Giày Kaito Kid ', null, null);
INSERT INTO `cates` VALUES ('33', 'Giày thể thao Yara', 'giay-the-thao-yara', '2', '31', 'Giày thể thao Yara', '1', 'Giày thể thao Yara', null, null);
INSERT INTO `cates` VALUES ('34', 'Giày da Mori', 'giay-da-mori', '2', '31', 'Giày da Mori', '1', 'Giày da Mori', null, null);
INSERT INTO `cates` VALUES ('35', 'Giày KiriMaru', 'giay-kirimaru', '2', '31', 'Giày KiriMaru', '1', 'Giày KiriMaru', null, null);
INSERT INTO `cates` VALUES ('36', 'Nón', 'non', '1', '0', 'Nón', '1', 'Nón', null, null);
INSERT INTO `cates` VALUES ('37', 'Nón Street Style', 'non-street-style', '2', '36', 'Nón Street Style', '1', 'Nón Street Style', null, null);
INSERT INTO `cates` VALUES ('38', 'Nón Hàn Quốc', 'non-han-quoc', '2', '36', 'Nón Hàn Quốc', '1', 'Nón Hàn Quốc', null, null);
INSERT INTO `cates` VALUES ('39', 'Nón Cối', 'non-coi', '2', '36', 'Nón Cối', '1', 'Nón Cối', null, null);
INSERT INTO `cates` VALUES ('40', 'Nón Snapback', 'non-snapback', '2', '36', 'Nón Snapback', '1', 'Nón Snapback', null, null);
INSERT INTO `cates` VALUES ('41', 'MaBư', 'mabu', '1', '0', 'MaBư', '1', 'MaBư', null, null);
INSERT INTO `cates` VALUES ('42', 'Áo thun MaBư', 'ao-thun-mabu', '2', '41', 'Áo thun MaBư ', '1', 'Áo thun MaBư ', null, null);
INSERT INTO `cates` VALUES ('43', 'Áo sơ mi MaBư', 'ao-so-mi-mabu', '2', '41', 'Áo sơ mi MaBư', '1', 'Áo sơ mi MaBư', null, null);
INSERT INTO `cates` VALUES ('44', 'Áo khoác MaBư', 'ao-khoac-mabu', '2', '41', 'Áo khoác MaBư', '1', 'Áo khoác MaBư', null, null);
INSERT INTO `cates` VALUES ('45', 'Giày nữ', 'giay-nu', '1', '0', 'Giày nữ', '1', 'Giày nữ', null, null);
INSERT INTO `cates` VALUES ('46', 'Giày thể thao Xuka', 'giay-the-thao-xuka', '2', '45', 'Giày thể thao Xuka', '1', 'Giày thể thao Xuka', null, null);
INSERT INTO `cates` VALUES ('47', 'Giày búp bê Ayumi', 'giay-bup-be-ayumi', '2', '45', 'Giày búp bê Ayumi', '1', 'Giày búp bê Ayumi', null, null);
INSERT INTO `cates` VALUES ('48', 'Giày cao gót Miyuki', 'giay-cao-got-miyuki', '2', '45', 'Giày cao gót Miyuki', '1', 'Giày cao gót Miyuki', null, null);
INSERT INTO `cates` VALUES ('49', 'Giày da Haibara', 'giay-da-haibara', '2', '45', 'Giày da Haibara', '1', 'Giày da Haibara', null, null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_07_27_094051_create_cates_table', '1');
INSERT INTO `migrations` VALUES ('2016_07_27_094950_create_products_table', '2');
INSERT INTO `migrations` VALUES ('2016_07_27_095923_create_product_images_table', '3');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  KEY `products_cate_id_foreign` (`cate_id`),
  KEY `products_user_id_foreign` (`user_id`),
  CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('19', 'Áo thun MaBư /F2001', 'ao-thun-mabu-f2001', '120000', '<h1>&Aacute;o thun mabu F2001</h1>\r\n\r\n<h2><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum&nbsp;</span></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">​​</span></span><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Lorem ipsum dolor sit amet Consectetur adipiscing elit</span></li>\r\n	<li><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Integer molestie lorem at massa Facilisis in pretium nisl aliquet</span></li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n</ul>\r\n', '<p>&Aacute;o thun MaBư /F2001</p>\r\n', 'product_1470621949.jpg', 'Áo thun MaBư /F2001', 'Áo thun MaBư /F2001', '42', '4', '2016-08-08 02:05:49', '2016-08-08 02:32:30');
INSERT INTO `products` VALUES ('20', 'Áo thun MaBư /F330', 'ao-thun-mabu-f330', '230000', '<h1>&Aacute;o thun mabu gi&aacute; tốt</h1>\r\n\r\n<h2><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum&nbsp;</span></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">​​</span></span><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Lorem ipsum dolor sit amet Consectetur adipiscing elit</span></li>\r\n	<li><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Integer molestie lorem at massa Facilisis in pretium nisl aliquet</span></li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n</ul>\r\n', '', 'product_1470622918.jpg', '', '', '42', '4', '2016-08-08 02:21:58', '2016-08-08 02:21:58');
INSERT INTO `products` VALUES ('21', 'Áo thun MaBư /F1203', 'ao-thun-mabu-f1203', '200000', '<h1>&Aacute;o thun mabu F1203</h1>\r\n\r\n<h2><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum&nbsp;</span></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">​​</span></span><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Lorem ipsum dolor sit amet Consectetur adipiscing elit</span></li>\r\n	<li><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Integer molestie lorem at massa Facilisis in pretium nisl aliquet</span></li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n</ul>\r\n', '', 'product_1470623699.jpg', '', '', '42', '4', '2016-08-08 02:34:59', '2016-08-08 02:34:59');
INSERT INTO `products` VALUES ('22', 'Áo thun MaBư /F2103', 'ao-thun-mabu-f2103', '30000', '<h1>&Aacute;o thun mabu F1203</h1>\r\n\r\n<h2><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum&nbsp;</span></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">​​</span></span><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Lorem ipsum dolor sit amet Consectetur adipiscing elit</span></li>\r\n	<li><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Integer molestie lorem at massa Facilisis in pretium nisl aliquet</span></li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n</ul>\r\n', '', 'product_1470624544.jpg', '', '', '42', '4', '2016-08-08 02:49:05', '2016-08-08 02:49:05');
INSERT INTO `products` VALUES ('23', 'Áo thun MaBư /F236', 'ao-thun-mabu-f236', '300000', '<h1>&Aacute;o thun mabu F236</h1>\r\n\r\n<h2><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum&nbsp;</span></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">​​</span></span><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Lorem ipsum dolor sit amet Consectetur adipiscing elit</span></li>\r\n	<li><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Integer molestie lorem at massa Facilisis in pretium nisl aliquet</span></li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n</ul>\r\n', '', 'product_1470624579.jpg', '', '', '42', '4', '2016-08-08 02:49:39', '2016-08-08 02:49:39');
INSERT INTO `products` VALUES ('24', 'Áo thun MaBư /F2355', 'ao-thun-mabu-f2355', '250000', '<h1>&Aacute;o thun mabu F2355</h1>\r\n\r\n<h2><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum&nbsp;</span></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">​​</span></span><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Lorem ipsum dolor sit amet Consectetur adipiscing elit</span></li>\r\n	<li><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Integer molestie lorem at massa Facilisis in pretium nisl aliquet</span></li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n</ul>\r\n', '', 'product_1470624650.jpg', '', '', '42', '4', '2016-08-08 02:50:50', '2016-08-08 02:50:50');
INSERT INTO `products` VALUES ('25', 'Áo khoác MaBư /F563', 'ao-khoac-mabu-f563', '350000', '<h1>&Aacute;o kho&aacute;c&nbsp;mabu F563</h1>\r\n\r\n<h2><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum&nbsp;</span></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">​​</span></span><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Lorem ipsum dolor sit amet Consectetur adipiscing elit</span></li>\r\n	<li><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Integer molestie lorem at massa Facilisis in pretium nisl aliquet</span></li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n</ul>\r\n', '', 'product_1470624907.jpg', '', '', '44', '4', '2016-08-08 02:55:07', '2016-08-08 02:55:07');
INSERT INTO `products` VALUES ('26', 'Áo khoác MaBư /F5565', 'ao-khoac-mabu-f5565', '350000', '<h1>&Aacute;o kho&aacute;c&nbsp;mabu F5565</h1>\r\n\r\n<h2><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum&nbsp;</span></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">​​</span></span><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Lorem ipsum dolor sit amet Consectetur adipiscing elit</span></li>\r\n	<li><span style=\"color:rgb(150, 151, 157); font-family:open sans,sans-serif\">Integer molestie lorem at massa Facilisis in pretium nisl aliquet</span></li>\r\n	<li>Nulla volutpat aliquam velit</li>\r\n</ul>\r\n', '', 'product_1470624935.jpg', '', '', '44', '4', '2016-08-08 02:55:35', '2016-08-08 02:55:35');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('65', 'product_14706219492250.jpg', '19', null, null);
INSERT INTO `product_images` VALUES ('66', 'product_14706219492028.jpg', '19', null, null);
INSERT INTO `product_images` VALUES ('67', 'product_1470621949301.jpg', '19', null, null);
INSERT INTO `product_images` VALUES ('68', 'product_1470621949493.jpg', '19', null, null);
INSERT INTO `product_images` VALUES ('69', 'product_1470622918336.jpg', '20', null, null);
INSERT INTO `product_images` VALUES ('70', 'product_14706229182678.jpg', '20', null, null);
INSERT INTO `product_images` VALUES ('71', 'product_1470622919165.jpg', '20', null, null);
INSERT INTO `product_images` VALUES ('72', 'product_14706229192070.jpg', '20', null, null);
INSERT INTO `product_images` VALUES ('73', 'product_14706236992998.jpg', '21', null, null);
INSERT INTO `product_images` VALUES ('74', 'product_14706236992016.jpg', '21', null, null);
INSERT INTO `product_images` VALUES ('75', 'product_1470623700671.jpg', '21', null, null);
INSERT INTO `product_images` VALUES ('76', 'product_1470624545384.jpg', '22', null, null);
INSERT INTO `product_images` VALUES ('77', 'product_14706245451492.jpg', '22', null, null);
INSERT INTO `product_images` VALUES ('78', 'product_14706245451039.jpg', '22', null, null);
INSERT INTO `product_images` VALUES ('79', 'product_14706245792787.jpg', '23', null, null);
INSERT INTO `product_images` VALUES ('80', 'product_14706245791185.jpg', '23', null, null);
INSERT INTO `product_images` VALUES ('81', 'product_14706245791904.jpg', '23', null, null);
INSERT INTO `product_images` VALUES ('82', 'product_14706246501181.jpg', '24', null, null);
INSERT INTO `product_images` VALUES ('83', 'product_14706246502704.jpg', '24', null, null);
INSERT INTO `product_images` VALUES ('84', 'product_1470624650186.jpg', '24', null, null);
INSERT INTO `product_images` VALUES ('85', 'product_1470624907937.jpg', '25', null, null);
INSERT INTO `product_images` VALUES ('86', 'product_14706249071804.jpg', '25', null, null);
INSERT INTO `product_images` VALUES ('87', 'product_14706249071108.jpg', '25', null, null);
INSERT INTO `product_images` VALUES ('88', 'product_14706249352184.jpg', '26', null, null);
INSERT INTO `product_images` VALUES ('89', 'product_1470624935621.jpg', '26', null, null);
INSERT INTO `product_images` VALUES ('90', 'product_14706249352344.jpg', '26', null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('4', 'admin', 'tranhai1993@gmail.com', '$2y$10$500wmEHbGTtPYaGfklXRKOr1UeiF4kXLEtvoFWGH0QXVDvU2xMF9K', '1', '1', 'zaGQwisRiO7f2EfPqnckFUdiTNdavZN4qKUcxVzcxHIYMsqtHC7PFBWRlzUZ', '2016-08-03 03:00:56', '2016-08-04 01:37:35');
INSERT INTO `users` VALUES ('5', 'tranhai', 'protk93@gmail.com', '$2y$10$dq7xUu0B//I1BEZAmaJzyumBkggztOvPdDwPFNJnB7LDawZROVhgG', '1', '1', 'LsFVjEq2zQK01ZNIy1Bz4rgn4QsOzBcgyZU76XWq7Rec0oTKW9gzjJvi9q5u', '2016-08-03 08:24:04', '2016-08-04 02:33:16');
INSERT INTO `users` VALUES ('7', 'abc', 'tranhai@gmail.com', '$2y$10$ugUyUZVGuaGvl.PDClrP7uZcYpj7z56WRLdrf3I/Oin14db6AQOI.', '1', '1', 'AtIJgIMcFEKKbZdf6kl9G8rGm4mgv4tV7NJZeDTw', '2016-08-03 08:24:45', '2016-08-03 09:35:55');
