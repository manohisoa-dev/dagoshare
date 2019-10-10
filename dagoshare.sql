/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.24 : Database - dagoshare
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `actualites` */

DROP TABLE IF EXISTS `actualites`;

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  `description` text,
  `nouveau` enum('oui','non') DEFAULT 'oui',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `actualites` */

insert  into `actualites`(`id`,`libelle`,`description`,`nouveau`,`created_at`,`updated_at`) values (2,'Changement de nom de domaine','lorem ipsum','oui','2019-09-23 20:39:48','2019-09-23 20:39:48'),(3,'Nouvelle colaboration','lorem','oui','2019-09-24 03:51:33','2019-09-24 03:51:33');

/*Table structure for table `aides` */

DROP TABLE IF EXISTS `aides`;

CREATE TABLE `aides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `aides` */

insert  into `aides`(`id`,`titre`,`description`,`created_at`,`updated_at`) values (1,'Création de compte','test','2019-09-24 18:59:09','2019-09-24 18:59:09');

/*Table structure for table `bug_resolutions` */

DROP TABLE IF EXISTS `bug_resolutions`;

CREATE TABLE `bug_resolutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bug_id` int(11) NOT NULL,
  `conclusion` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `bug_resolutions` */

insert  into `bug_resolutions`(`id`,`bug_id`,`conclusion`,`created_at`,`updated_at`) values (1,1,'Cette page a été corrigé','2019-09-29 06:34:40','2019-09-29 06:34:40');

/*Table structure for table `bug_types` */

DROP TABLE IF EXISTS `bug_types`;

CREATE TABLE `bug_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `bug_types` */

insert  into `bug_types`(`id`,`libelle`,`created_at`,`updated_at`) values (1,'Anomalie','2019-09-29 05:53:52','2019-09-29 05:53:52'),(2,'Page introuvable (404)','2019-09-29 06:05:43','2019-09-29 06:05:43'),(3,'Erreur serveur (500)','2019-09-29 06:05:58','2019-09-29 06:05:58');

/*Table structure for table `bugs` */

DROP TABLE IF EXISTS `bugs`;

CREATE TABLE `bugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bug_type_id` int(11) NOT NULL,
  `statut` enum('en_attente','corriger') DEFAULT 'en_attente',
  `titre` varchar(200) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `bugs` */

insert  into `bugs`(`id`,`bug_type_id`,`statut`,`titre`,`url`,`description`,`created_at`,`updated_at`) values (1,2,'corriger','Page introuvable après login','http://dago-share.loc/admin/bug/create','Quand on click sur tel bouton, il y a un erreur 404','2019-09-29 06:08:47','2019-09-29 06:34:40'),(2,1,'en_attente','Le Tchat ne marche pas','http://dago-share.loc/home','quand on écrit un message, on ne peut pas l\'envoyer','2019-09-29 06:36:26','2019-09-29 06:36:26');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`id`,`libelle`,`description`,`created_at`,`updated_at`) values (1,'Business','Business','2019-09-29 12:50:10','2019-09-29 12:50:10'),(2,'Programmation','Programmation','2019-09-29 12:50:24','2019-09-29 12:50:24'),(3,'IT','Destinées aux professionnels de l\'informatique','2019-09-29 12:51:07','2019-09-29 12:51:07'),(4,'Design & Illustration','orientées design & illustration','2019-09-29 12:51:30','2019-09-29 12:51:30'),(5,'Retouche d\'images & Photographie','Trucs & astuces des meilleurs photographes','2019-09-29 12:52:11','2019-09-29 12:52:11'),(6,'Vidéo & Audio','Consacrées à la vidéo et à l\'audio','2019-09-29 12:52:50','2019-09-29 12:52:50'),(7,'3D & CAO','construction 3D','2019-09-29 12:53:10','2019-09-29 12:53:10'),(8,'Web','Vous saurez comment développer des applications web et mobiles','2019-09-29 12:53:47','2019-09-29 12:53:47'),(9,'Formation pour grand public','consacrées à l\'iLife','2019-09-29 12:56:02','2019-09-29 12:56:02');

/*Table structure for table `commentaire_evaluations` */

DROP TABLE IF EXISTS `commentaire_evaluations`;

CREATE TABLE `commentaire_evaluations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire_id` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `attribuer_par` int(11) DEFAULT NULL COMMENT 'Utisateur qui a évalué le comentaires',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `commentaire_evaluations` */

/*Table structure for table `commentaires` */

DROP TABLE IF EXISTS `commentaires`;

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text,
  `note` float DEFAULT NULL COMMENT '(varie de 1 à 5 : notes qui a été envoyé par l''auteur du commentaire)',
  `point_globale` int(11) DEFAULT NULL COMMENT '(points globale du commentaire)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `commentaires` */

/*Table structure for table `demandes` */

DROP TABLE IF EXISTS `demandes`;

CREATE TABLE `demandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `compte_facebook` varchar(200) DEFAULT NULL,
  `description` text,
  `statut` enum('en_attente','en_cours','fait','annuler') DEFAULT 'en_attente',
  `personnel_id` int(11) NOT NULL COMMENT 'reçu_par',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `demandes` */

/*Table structure for table `fichier_liens` */

DROP TABLE IF EXISTS `fichier_liens`;

CREATE TABLE `fichier_liens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier_id` int(11) NOT NULL,
  `qualite_id` int(11) DEFAULT NULL,
  `lien` varchar(255) NOT NULL,
  `hebergeur` varchar(200) DEFAULT NULL,
  `langue_id` int(11) NOT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `taille` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fichier_liens` */

/*Table structure for table `fichier_tags` */

DROP TABLE IF EXISTS `fichier_tags`;

CREATE TABLE `fichier_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `fichier_tags` */

insert  into `fichier_tags`(`id`,`fichier_id`,`tag_id`,`created_at`,`updated_at`) values (1,5,1,'2019-10-01 03:13:46','2019-10-01 03:13:46'),(2,5,9,'2019-10-01 03:13:46','2019-10-01 03:13:46');

/*Table structure for table `fichier_telechargements` */

DROP TABLE IF EXISTS `fichier_telechargements`;

CREATE TABLE `fichier_telechargements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fichier_telechargements` */

/*Table structure for table `fichier_types` */

DROP TABLE IF EXISTS `fichier_types`;

CREATE TABLE `fichier_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(125) NOT NULL,
  `class` varbinary(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `fichier_types` */

insert  into `fichier_types`(`id`,`libelle`,`class`,`created_at`,`updated_at`) values (1,'Vidéo','fa-film','2019-09-24 20:22:47','2019-09-29 16:23:32'),(2,'Document','fa-file','2019-09-24 20:22:55','2019-09-29 16:23:59'),(3,'Audio','fa-music','2019-09-24 20:23:00','2019-09-29 16:24:14');

/*Table structure for table `fichiers` */

DROP TABLE IF EXISTS `fichiers`;

CREATE TABLE `fichiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ajouter_par` int(11) NOT NULL DEFAULT '0',
  `titre` varchar(200) NOT NULL COMMENT 'optionnel',
  `titre_original` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sous_categorie_id` int(11) DEFAULT NULL,
  `fichier_type_id` int(11) DEFAULT NULL,
  `mot_de_passe` varchar(200) DEFAULT NULL,
  `realisation` varchar(200) DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `annee` year(4) DEFAULT NULL,
  `taille` float DEFAULT NULL,
  `taille_unite` enum('oct','ko','mo','go','to') DEFAULT 'mo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `fichiers` */

insert  into `fichiers`(`id`,`ajouter_par`,`titre`,`titre_original`,`description`,`category_id`,`sous_categorie_id`,`fichier_type_id`,`mot_de_passe`,`realisation`,`duree`,`annee`,`taille`,`taille_unite`,`created_at`,`updated_at`) values (1,1,'L\'essentiel d\'Arduino UNO',NULL,'L\'essentiel d\'Arduino UNO description',3,NULL,1,'formation-gratuit.com','Video2Brain','00:15:00',2015,535,'mo','2019-09-29 13:17:30','2019-09-29 13:17:30'),(2,1,'Rédaction de cahier de charge d',NULL,'Rédaction de cahier de charge d\'un site internet description',1,NULL,1,NULL,'Video2Brain','01:15:00',2015,266,'oct','2019-09-29 16:15:47','2019-09-29 16:15:47'),(3,1,'Linux Magazine Hors-Série No.66 - Le Guide Apache',NULL,'Linux Magazine Hors-Série No.66 - Le Guide Apache',3,NULL,2,NULL,'Magazine / France',NULL,2016,254,'mo','2019-09-29 16:34:56','2019-09-29 16:34:56'),(4,1,'Japanese Language Course',NULL,'Vous trouverez sur cette version une réplique de mon site consultable hors-ligne. Cependant, en raison des limitations dûes au format HTML statique, cette version ne être une replique exacte. En effet, certaines fonctionnalités n\'ont pu être conservées. C\'est pourquoi par exemple, vous ne retrouverez pas ici de moteurs de recherche mais un système adapté.\r\n\r\nIl y a quelques liens sur les fiches de kanji qui sont défectueux, c\'est normal car ces kanji n\'ont pas été référencés. Mis à part cela, si vous remarquiez d\'autres liens défectueux, n\'hésitez pas à m\'en faire part.\r\n\r\nCette version peut être diffusée librement. Cependant toute reproduction même partielle, par quelque procédé que ce soit, est interdite sans autorisation expresse.',9,NULL,3,NULL,'kanji',NULL,2001,270,'mo','2019-09-29 16:38:06','2019-09-29 16:38:06'),(5,1,'V2b  Découverte de laravel5','V2b  Découverte de laravel5','V2b  Découverte de laravel5 desc',8,NULL,1,NULL,'Video2Brain','01:10:00',2016,790,'mo','2019-10-01 03:13:46','2019-10-01 03:13:46');

/*Table structure for table `fonctions` */

DROP TABLE IF EXISTS `fonctions`;

CREATE TABLE `fonctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `fonctions` */

insert  into `fonctions`(`id`,`libelle`,`created_at`,`updated_at`) values (1,'Résponsable Marketing','2019-09-24 18:36:02','2019-09-24 18:36:02'),(2,'Modérateur','2019-09-24 18:36:12','2019-09-24 18:36:12'),(3,'Développeur','2019-09-29 06:38:18','2019-09-29 06:38:18'),(4,'Graphiste','2019-09-29 06:38:34','2019-09-29 06:38:34');

/*Table structure for table `langues` */

DROP TABLE IF EXISTS `langues`;

CREATE TABLE `langues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `libelle` varchar(60) NOT NULL,
  `prefixe` varchar(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `langues` */

insert  into `langues`(`id`,`code`,`libelle`,`prefixe`,`created_at`,`updated_at`) values (1,'mg','Madagascar','261','2019-09-24 05:18:08','2019-09-24 05:18:08'),(2,'fr','France','33','2019-09-24 05:18:19','2019-09-24 05:18:19'),(4,'en','Anglais','44','2019-09-25 04:45:41','2019-09-25 04:45:41');

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disk` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregate_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_disk_directory_filename_extension_unique` (`disk`,`directory`,`filename`,`extension`),
  KEY `media_disk_directory_index` (`disk`,`directory`),
  KEY `media_aggregate_type_index` (`aggregate_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `media` */

/*Table structure for table `mediables` */

DROP TABLE IF EXISTS `mediables`;

CREATE TABLE `mediables` (
  `media_id` int(10) unsigned NOT NULL,
  `mediable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediable_id` int(10) unsigned NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) unsigned NOT NULL,
  PRIMARY KEY (`media_id`,`mediable_type`,`mediable_id`,`tag`),
  KEY `mediables_mediable_id_mediable_type_index` (`mediable_id`,`mediable_type`),
  KEY `mediables_tag_index` (`tag`),
  KEY `mediables_order_index` (`order`),
  CONSTRAINT `mediables_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `mediables` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_07_16_154349_create_mediable_tables',1),(4,'2019_09_21_174057_create_aides',2),(5,'2019_09_21_201240_create_table_qualites',3),(6,'2019_09_21_211757_create_table_actualites',3),(7,'2019_09_21_211814_create_table_categories',3),(8,'2019_09_21_211841_create_table_commentaire_evaluations',3),(9,'2019_09_21_211857_create_table_commentaires',3),(10,'2019_09_21_211913_create_table_demandes',3),(11,'2019_09_21_211939_create_table_fichier_liens',3),(12,'2019_09_21_212010_create_table_fichier_telechargements',3),(13,'2019_09_21_212029_create_table_fichier_types',3),(14,'2019_09_21_212040_create_table_fichiers',3),(15,'2019_09_21_212057_create_table_fonctions',3),(16,'2019_09_21_212112_create_table_langues',3),(17,'2019_09_21_212141_create_table_pages',3),(18,'2019_09_21_212205_create_table_personnels',3),(19,'2019_09_21_212244_create_table_regle_generales',3),(20,'2019_09_21_212259_create_table_regle_types',3),(21,'2019_09_21_212325_create_table_sous_categories',3),(22,'2019_09_21_212341_create_table_tags',3),(23,'2019_09_24_203957_create_bugs',4),(24,'2019_09_24_204023_create_bug_types',4),(25,'2019_09_25_045649_create_bug_resolutions',5),(26,'2019_09_26_124623_create_permission_tables',6),(27,'2019_09_29_064413_timestamp_priorites',6),(28,'2019_09_29_064449_timestamp_todos',6),(29,'2019_10_01_025320_create_fichier_tags',7);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `model_has_roles` */

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `description` longtext,
  `route` varchar(125) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `nouvelle_onglet` enum('oui','non') DEFAULT 'non',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pages` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `permissions` */

/*Table structure for table `personnels` */

DROP TABLE IF EXISTS `personnels`;

CREATE TABLE `personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fonction_id` int(11) NOT NULL,
  `date_embauche` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `personnels` */

/*Table structure for table `priorites` */

DROP TABLE IF EXISTS `priorites`;

CREATE TABLE `priorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) DEFAULT NULL,
  `class` varchar(125) DEFAULT NULL COMMENT 'Ex : primary, danger, warning, etc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `priorites` */

insert  into `priorites`(`id`,`libelle`,`class`,`created_at`,`updated_at`) values (1,'Très haute','danger','2019-09-29 07:01:49','2019-09-29 07:01:49'),(2,'Haute','warning','2019-09-29 07:01:58','2019-09-29 07:01:58'),(3,'Moyenne','primary','2019-09-29 07:02:27','2019-09-29 07:02:52'),(4,'Basse','info','2019-09-29 07:03:08','2019-09-29 07:03:40'),(5,'Très basse','default','2019-09-29 07:03:34','2019-09-29 07:03:34');

/*Table structure for table `qualites` */

DROP TABLE IF EXISTS `qualites`;

CREATE TABLE `qualites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `qualites` */

insert  into `qualites`(`id`,`libelle`,`created_at`,`updated_at`) values (1,'HD','2019-09-24 20:24:10','2019-09-24 20:24:10'),(2,'Ultra HD','2019-09-24 20:24:16','2019-09-24 20:24:16'),(3,'Blu-Ray','2019-09-24 20:24:24','2019-09-24 20:24:24');

/*Table structure for table `regle_generales` */

DROP TABLE IF EXISTS `regle_generales`;

CREATE TABLE `regle_generales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regle_type_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `regle_generales` */

/*Table structure for table `regle_types` */

DROP TABLE IF EXISTS `regle_types`;

CREATE TABLE `regle_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `regle_types` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `roles` */

/*Table structure for table `sous_categories` */

DROP TABLE IF EXISTS `sous_categories`;

CREATE TABLE `sous_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sous_categories` */

insert  into `sous_categories`(`id`,`category_id`,`libelle`,`created_at`,`updated_at`) values (1,1,'Bureautiques','2019-09-29 12:57:19','2019-09-29 12:57:19');

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `tags` */

insert  into `tags`(`id`,`libelle`,`created_at`,`updated_at`) values (1,'php','2019-09-29 13:18:18','2019-09-29 13:18:18'),(2,'html','2019-09-29 13:18:23','2019-09-29 13:18:23'),(3,'css','2019-09-29 13:18:28','2019-09-29 13:18:28'),(4,'javascript','2019-09-29 13:18:34','2019-09-29 13:18:34'),(5,'jquery','2019-09-29 13:18:41','2019-09-29 13:18:41'),(6,'sql','2019-09-29 13:18:46','2019-09-29 13:18:46'),(7,'python','2019-09-29 13:18:51','2019-09-29 13:18:51'),(8,'ruby','2019-09-29 13:18:56','2019-09-29 13:18:56'),(9,'laravel','2019-09-29 13:19:05','2019-09-29 13:19:05'),(10,'symfony','2019-09-29 13:19:12','2019-09-29 13:19:12'),(11,'django','2019-09-29 13:19:17','2019-09-29 13:19:17');

/*Table structure for table `todos` */

DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priorite_id` int(11) DEFAULT NULL,
  `libelle` varchar(200) DEFAULT NULL,
  `description` text,
  `statut` enum('en_attente','fait') DEFAULT 'en_attente',
  `fait_le` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `todos` */

insert  into `todos`(`id`,`priorite_id`,`libelle`,`description`,`statut`,`fait_le`,`created_at`,`updated_at`) values (1,3,'Mise en marche du tchat','Faire fonctionner la tchat : \r\n- mini-tchat\r\n- Message en haut à droite','en_attente',NULL,'2019-10-01 20:30:44','2019-09-29 07:05:48'),(2,4,'Mise en marche du système de notification','Faire en sorte que le système de notification fonctionne','en_attente',NULL,'2019-09-29 07:06:25','2019-09-29 07:06:25'),(3,2,'Gestion des roles','Mettre en marche les roles\r\n- restriction des utilisateurs\r\n- restriction des menus qui s\'affichent selon le rôle de l\'utilisateur connecté','en_attente',NULL,'2019-09-29 07:07:05','2019-09-29 07:13:02'),(4,1,'Gestion des fichiers','- Modifier le template de fichier\r\n-  Faire fonctionner le recherche par fichier en haut à gauche\r\n- Alimenter les tables : tags, catégories, sous-catégorie, qualités','en_attente',NULL,'2019-09-29 07:10:31','2019-09-29 07:10:31'),(5,3,'Gestion des demandes','Paufiner la gestion des demandes','en_attente',NULL,'2019-09-29 07:11:00','2019-09-29 07:11:00'),(6,5,'Tableau de bord','Dynamiser le tableau de bord, statistique par catégorie, statistique de téléchargement, etc','en_attente',NULL,'2019-09-29 07:11:59','2019-09-29 07:11:59'),(7,4,'Modification template erreur','Améliorer l\'affichage des templates erreurs','en_attente',NULL,'2019-09-29 07:51:13','2019-09-29 07:51:13'),(8,1,'Ajout du Carbon','Ajout le package carbon pour humaniser les dates et heures','fait','2019-10-01 10:26:18','2019-10-01 03:20:30','2019-10-01 03:20:30');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compte_fb` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` enum('masculin','feminin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `users` */

insert  into `users`(`id`,`nom`,`prenom`,`compte_fb`,`email`,`email_verified_at`,`ip`,`password`,`remember_token`,`sexe`,`adresse`,`created_at`,`updated_at`) values (1,'Rakoto','Lita',NULL,'rakoto@gmail.com',NULL,NULL,'$2y$10$/2knM95Xqxj1JkANLFVN1OHdk4VveIfj7migCL7mxpmL2IfNLO8LO',NULL,NULL,NULL,'2019-09-21 17:23:30','2019-09-21 17:23:30');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
