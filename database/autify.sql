-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: authify
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `authify_sessions`
--

DROP TABLE IF EXISTS `authify_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authify_sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(45) NOT NULL,
  `emp_id` varchar(45) NOT NULL,
  `emp_name` varchar(255) DEFAULT NULL,
  `emp_firstname` varchar(255) DEFAULT NULL,
  `emp_jobtitle` varchar(255) DEFAULT NULL,
  `emp_dept` varchar(255) DEFAULT NULL,
  `emp_prodline` varchar(255) DEFAULT NULL,
  `emp_station` varchar(255) DEFAULT NULL,
  `generated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authify_sessions`
--

LOCK TABLES `authify_sessions` WRITE;
/*!40000 ALTER TABLE `authify_sessions` DISABLE KEYS */;
INSERT INTO `authify_sessions` VALUES (2084,'338234b3-4171-4b43-9d05-1c4e87d26882','1707','Constante, Vaneza S.','Vaneza','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:04:02'),(2085,'f7a2c01a-7099-4203-9969-69f34659caa4','166','Gatpandan, Menchie U.','Menchie','PPC Supervisor','PPC','PL6 (ADLT)','PPC','2025-11-04 07:06:46'),(2086,'83512d93-762a-407d-812b-20d0b6828e9a','1747','Labuni, Matthew Zion P.','Matthew Zion','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:11:17'),(2087,'1f07d0f3-fc90-499e-ac99-08c3e80444a3','1650','Delgado, Alexander M.','Alexander','ESD Technician 1','Quality Management System','G & A','ESD','2025-11-04 07:14:26'),(2088,'fec42874-54dc-4075-b5fc-4511736923c5','PL1','PL1','PL1','Store User','Production','Consignment','NA','2025-11-04 07:16:43'),(2089,'2e1af588-88b3-41a6-9c68-c203b8939e82','17807','Lotino, Krizia R.','Krizia','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:29:17'),(2090,'92755ecd-7b95-4b3a-85fc-37c4608317c4','17807','Lotino, Krizia R.','Krizia','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:29:18'),(2091,'85d4a926-5f90-4b80-90d4-80a2f0f932f9','17807','Lotino, Krizia R.','Krizia','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:30:07'),(2092,'530b9186-be89-42b1-9604-717ce4c68584','1705','Tañada, Jester Ryan B.','Jester Ryan','Programmer 1','MIS','G & A','MIS','2025-11-04 07:34:26'),(2093,'a8fdf5cb-d628-42bc-a759-e29e8d64e933','845','Pakingan, Abigail M.','Abigail','Senior HR Supervisor','Human Resource','G & A','Gen. HR & Administration','2025-11-04 07:35:03'),(2094,'aadf725a-f5f2-4e91-bf95-94134d2d93f8','1707','Constante, Vaneza S.','Vaneza','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:40:15'),(2095,'3063864e-60ef-4efa-ad8d-f05519609790','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:44:14'),(2096,'49a40492-2f58-47fb-8541-0ed6ff6553d1','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:44:42'),(2097,'cd86f762-00fa-451f-af1a-b323e9a53d0a','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:45:03'),(2098,'3736884c-7305-429d-b1b7-d8b6369d8721','710','Loyola, Rhen-ren L.','Rhen-Ren','Equipment Engineering Supervisor / Equipment Specialist','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:47:20'),(2099,'5de76cc8-2011-41eb-be87-a98ac3db8d83','1283','Cahigan, Arman S.','Arman','Equipment Engineering Section Head','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 07:53:09'),(2100,'3296979c-0eed-4dbc-8d0e-cbb7b0321f0b','1747','Labuni, Matthew Zion P.','Matthew Zion','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:53:20'),(2101,'75e59e63-a46a-46a0-a1b8-0db625d68c9d','1747','Labuni, Matthew Zion P.','Matthew Zion','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 07:53:20'),(2102,'55bc2895-d1c0-4470-8885-4126a0b43b35','1283','Cahigan, Arman S.','Arman','Equipment Engineering Section Head','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 08:26:41'),(2103,'c0530023-ba6e-4c40-8853-79ca053f49fe','1283','Cahigan, Arman S.','Arman','Equipment Engineering Section Head','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 08:28:58'),(2104,'e0859a52-ca87-4ccf-852c-03b8951dcfc4','PL1','PL1','PL1','Store User','Production','Consignment','NA','2025-11-04 08:29:07'),(2105,'13ffcfd1-28c6-4fda-abd4-fbe653e8af71','PL1','PL1','PL1','Store User','Production','Consignment','NA','2025-11-04 08:29:11'),(2106,'e9fbb4c6-c5ac-4938-a5e8-500b57c08c28','1552','Abanico, Catherine P.','Catherine','Equipment Technician 1','Equipment Engineering','G &amp; A','PM / Calibration','2025-11-04 08:29:13'),(2107,'e0a51e45-5195-46e0-add0-95a35d126bf8','1707','Constante, Vaneza S.','Vaneza','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 08:36:33'),(2108,'c419a7d3-f1dd-4382-b9e6-fe5b5a71aeac','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 08:50:28'),(2109,'06e4d7fc-eb24-4ee9-8622-d1dc51d1d4d3','1718','Bandilla, Ariel John B.','Ariel John','Programmer 1','MIS','G & A','MIS','2025-11-04 09:05:31'),(2110,'58e42e2d-136e-4447-b909-0d6af8c1ebaa','1718','Bandilla, Ariel John B.','Ariel John','Programmer 1','MIS','G & A','MIS','2025-11-04 09:07:33'),(2111,'4b590592-6714-43ce-b824-9de4f8cc3fb5','PL1','PL1',NULL,'Store User',NULL,NULL,NULL,'2025-11-04 09:07:57'),(2112,'7455303d-a41a-4e02-846e-dfe2d2f44a50','1718','Bandilla, Ariel John B.','Ariel John','Programmer 1','MIS','G & A','MIS','2025-11-04 09:09:35'),(2113,'0d980998-4f78-483f-a447-9e74dccc840b','PL1','PL1',NULL,'Store User',NULL,NULL,NULL,'2025-11-04 09:09:53'),(2114,'7183d2b7-619e-4053-b7da-403c09d3e5da','1718','Bandilla, Ariel John B.','Ariel John','Programmer 1','MIS','G & A','MIS','2025-11-04 09:16:23'),(2115,'090b87e8-9e73-4b10-907c-c27483f0c479','PL1','PL1 (ADGT)',NULL,'Store User','Production',NULL,NULL,'2025-11-04 09:16:39'),(2116,'60ec9fb5-206d-43b1-94b2-f12c2b8832c5','1718','Bandilla, Ariel John B.','Ariel John','Programmer 1','MIS','G & A','MIS','2025-11-04 09:19:54'),(2117,'dacaedba-9ca0-44ee-875e-ebbfb7b5f3cb','PL1','PL1 (ADGT)',NULL,'Store User','Production',NULL,NULL,'2025-11-04 09:25:29'),(2118,'ebbbef65-2878-404e-8680-2d6ad18f7ac8','1283','Cahigan, Arman S.','Arman','Equipment Engineering Section Head','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 09:26:40'),(2119,'b6e8c7d9-d2a9-4ed1-ac89-5f2c6f6a308f','751','Ungson, Leila B.','Leila','MIS Senior Supervisor','MIS','G & A','MIS','2025-11-04 10:07:44'),(2120,'98d599f4-fbf2-41ad-aa1d-3e9d6de02736','1788','Eugenio, Halley Joan B.','Halley Joan','Sr. Equipment Engineer','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 10:34:43'),(2121,'219a96df-2cb7-4ae3-b597-5c0876eb0082','1788','Eugenio, Halley Joan B.','Halley Joan','Sr. Equipment Engineer','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 10:34:50'),(2122,'2f379e03-a18d-4b27-9e85-92b0c8c9841b','1788','Eugenio, Halley Joan B.','Halley Joan','Sr. Equipment Engineer','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 10:34:50'),(2123,'0e342c30-1a61-447c-a1dc-c58b5bddf089','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 10:37:54'),(2124,'6ecac9be-f0cd-4eab-9874-508e8e62e283','13944','Diaz, Marwino R.','Marwino','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 10:38:50'),(2125,'b8edd799-d250-491b-bf38-f6721bbf7a6c','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 10:39:46'),(2126,'e45fbaa2-a34e-40be-befa-f080d7220e5d','1788','Eugenio, Halley Joan B.','Halley Joan','Sr. Equipment Engineer','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 10:41:10'),(2127,'3d270e09-17d2-48f2-8cf0-6a8502b53f6c','1788','Eugenio, Halley Joan B.','Halley Joan','Sr. Equipment Engineer','Equipment Engineering','G & A','Equipment Engineering','2025-11-04 10:43:25'),(2128,'ea8daa58-2854-4c0b-90c6-eac845861af5','1705','Tañada, Jester Ryan B.','Jester Ryan','Programmer 1','MIS','G & A','MIS','2025-11-04 10:46:57'),(2129,'4122729e-93a2-44ab-a022-36c057a59b14','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 10:51:34'),(2130,'2883fccc-de67-4eaf-91a6-61512f1fafcf','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 10:56:14'),(2131,'141ec54f-58b3-4912-a53a-8446b49053d9','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 10:57:52'),(2132,'f0741a2f-cbf4-4a93-a235-4436e555b25f','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 11:03:18'),(2133,'61eddf49-f898-42cb-8e21-c2bdbe78bc8c','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 11:03:34'),(2134,'0cd880c6-fcf0-44b0-a7e4-880d135d9c8e','1742','Seniel, Rommel A.','Rommel','Equipment Technician 1','Equipment Engineering','G & A','PM / Calibration','2025-11-04 11:04:11'),(2135,'644af4e0-d21c-4262-b65e-c758cd6101e8','1705','Tañada, Jester Ryan B.','Jester Ryan','Programmer 1','MIS','G & A','MIS','2025-11-04 11:05:23'),(2136,'1025377b-202c-45c9-a6a4-3892c8b3d413','1390','Mendoza, Cazielyn U.','Cazielyn','HR Assistant 1','Human Resource','G & A','Gen. HR & Administration','2025-11-04 11:08:41');
/*!40000 ALTER TABLE `authify_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-04 11:16:26
