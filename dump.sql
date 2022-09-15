-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: api_get
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `customer_id` varchar(300) NOT NULL,
  `json_data` json NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES ('5477c7f6-c579-44f0-9e33-0142bc095696','{\"City\": \"Paris\", \"Country\": \"FR\", \"ZipCode\": \"75000\", \"AccountName\": \"Quantic Factory\", \"ContactName\": \"Morgan Caron\", \"AddressLine1\": \"11 rue Diderot\", \"AddressLine2\": null}'),('99e06a8d-997c-4251-8cb7-27dab335ca1b','{\"City\": \"Tunis\", \"Country\": \"TN\", \"ZipCode\": \"1000\", \"AccountName\": \"Naâma\", \"ContactName\": \"Halima Ben Hassen\", \"AddressLine1\": \"2 Rue du 2 Mars 1934\", \"AddressLine2\": null}'),('bf74b017-740b-4e34-8294-0df4fc1dee7e','{\"City\": \"Astaffort\", \"Country\": \"FR\", \"ZipCode\": \"47000\", \"AccountName\": \"Francis Cabrel\", \"ContactName\": \"Francis Cabrel\", \"AddressLine1\": \"3 rue de la chanson\", \"AddressLine2\": null}');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` varchar(300) NOT NULL,
  `customer_id` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `amount` int NOT NULL,
  `order_num` varchar(300) NOT NULL,
  `currency` varchar(300) NOT NULL,
  `salesOrder` json NOT NULL,
  `validated` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES ('083a171e-86f6-41ca-bd46-3d066e83d3ae','99e06a8d-997c-4251-8cb7-27dab335ca1b','2022-09-13 18:30:32',171,'326753','EUR','[{\"Item\": \"8f6bc422-a0b1-4975-9782-502babbbaa86\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Khaki 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Khaki 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"3c393465-981e-4e85-b07e-13af762056c5\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Gold sand 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Gold sand 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"2470414f-772b-4217-9906-7750c63351e9\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Milky White 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Milky White 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"ba11ff3d-2c45-4076-8aa4-49336b39e910\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Mint 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Mint 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"978b685f-f059-432f-929d-e3e62db98217\", \"Amount\": 0, \"Discount\": 0, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 0, \"VATAmount\": 0, \"Description\": \"FRAIS DE TRANSPORT\", \"VATPercentage\": 0.2, \"ItemDescription\": \"FRAIS DE TRANSPORT\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"d7308dbd-ed91-4e4e-ae58-9ee945964bbe\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Dark clover 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Dark clover 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"62cf18c2-89ab-4bf1-ab34-4e598c17b7f4\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Dark pansy 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Dark pansy 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"01c51e89-68e5-4ba4-a3b7-c76bf95ab92b\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Peach 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Peach 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"cb70423c-626d-4b56-b3ce-f1513bb82d47\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Shell Beige 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Shell Beige 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"40222201-93d1-4f2d-a56c-49bc060ad114\", \"Amount\": 15.83, \"Discount\": -0.000210570646451918, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 3.17, \"Description\": \"GREEN FLASH - Navy Blue 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Navy Blue 15ML\", \"UnitDescription\": \"Piece\"}]','false'),('96b66c2b-3081-48b8-b6a4-5977c12c2ca0','bf74b017-740b-4e34-8294-0df4fc1dee7e','2022-09-13 18:30:32',89,'326756','EUR','[{\"Item\": \"82706172-4413-4ef9-937c-fa4eca30e21f\", \"Amount\": 0, \"Discount\": 0, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 0, \"VATAmount\": 0, \"Description\": \"GREEN FLASH - Peonie 15ML\", \"VATPercentage\": 0, \"ItemDescription\": \"GREEN FLASH - Peonie 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"6c5b5c6e-1e78-41aa-a017-5127094625aa\", \"Amount\": 74.17, \"Discount\": 0.0000449418003684819, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 74.17, \"VATAmount\": 14.83, \"Description\": \"GREEN FLASH - Coffret de Noel 24W - pre rempli\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - Coffret de Noel 24W - pre rempli\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"b81e7448-8a45-4ff5-ba3a-0d9ab35cc753\", \"Amount\": 0, \"Discount\": 1, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 15.83, \"VATAmount\": 0, \"Description\": \"GREEN FLASH - SNOW - 15ML\", \"VATPercentage\": 0.2, \"ItemDescription\": \"GREEN FLASH - SNOW - 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"0d9cf810-fdd1-4b26-8ad2-c4c1f0c001f7\", \"Amount\": 0, \"Discount\": 0, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 0, \"VATAmount\": 0, \"Description\": \"PUB -  Planche Stickers parfumes creme mains\", \"VATPercentage\": 0.2, \"ItemDescription\": \"PUB -  Planche Stickers parfumes crememains\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"64db5397-a0d2-4b28-b824-ff39a72ad341\", \"Amount\": 0, \"Discount\": 0, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 0, \"VATAmount\": 0, \"Description\": \"GREEN FLASH - Light Blue 15ML\", \"VATPercentage\": 0, \"ItemDescription\": \"GREEN FLASH - Light Blue 15ML\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"6905f992-6e55-489c-a369-4a5750c42177\", \"Amount\": 0, \"Discount\": 0, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 0, \"VATAmount\": 0, \"Description\": \"ACC - PINCES DE DEPOSE X5\", \"VATPercentage\": 0, \"ItemDescription\": \"ACC - PINCES DE DEPOSE X5\", \"UnitDescription\": \"Piece\"}, {\"Item\": \"978b685f-f059-432f-929d-e3e62db98217\", \"Amount\": 0, \"Discount\": 0, \"Quantity\": 1, \"UnitCode\": \"pc\", \"UnitPrice\": 0, \"VATAmount\": 0, \"Description\": \"FRAIS DE TRANSPORT\", \"VATPercentage\": 0.2, \"ItemDescription\": \"FRAIS DE TRANSPORT\", \"UnitDescription\": \"Piece\"}]','false');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'tester','tester','tester@email.com','webdevEnv');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-14 23:28:03
