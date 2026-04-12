/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.6.23-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: frsdb
-- ------------------------------------------------------
-- Server version	10.6.23-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladmin`
--

LOCK TABLES `tbladmin` WRITE;
/*!40000 ALTER TABLE `tbladmin` DISABLE KEYS */;
INSERT INTO `tbladmin` VALUES (1,'Admin','admin',8989898989,'admin@gmail.com','f925916e2754e5e03f75dd58a5733251',NULL);
/*!40000 ALTER TABLE `tbladmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcomments`
--

DROP TABLE IF EXISTS `tblcomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipeId` int(11) DEFAULT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `userEmail` varchar(200) DEFAULT NULL,
  `commentMessage` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcomments`
--

LOCK TABLES `tblcomments` WRITE;
/*!40000 ALTER TABLE `tblcomments` DISABLE KEYS */;
INSERT INTO `tblcomments` VALUES (1,1,'Rahul','rk@test.com','This is for testing.   This is for testing.   This is for testing.   This is for testing.   This is for testing.   This is for testing.  ','2023-08-13 04:37:22',1,'2023-08-14 09:56:07'),(2,1,'John Doe','john@test.com','This is the best recipe. Thank you much.','2023-08-13 04:39:06',1,'2026-04-09 15:29:06'),(3,1,'John Doe','john@test.com','This is the best recipe. Thank you much.','2023-08-13 15:33:50',1,'2026-04-09 15:29:24'),(4,1,'Garima','garima12@t.com','This is for testing purpose.','2023-08-13 16:50:40',NULL,NULL),(5,5,'Ajay','ajay@gmail.com','Nice recipe. I like it','2023-08-14 19:43:36',1,'2023-08-14 19:44:52');
/*!40000 ALTER TABLE `tblcomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblenquiry`
--

DROP TABLE IF EXISTS `tblenquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(200) DEFAULT NULL,
  `userEmail` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `commentMessage` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `adminRemark` mediumtext DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblenquiry`
--

LOCK TABLES `tblenquiry` WRITE;
/*!40000 ALTER TABLE `tblenquiry` DISABLE KEYS */;
INSERT INTO `tblenquiry` VALUES (1,'Anuj','ak@gmail.com','Test Subject','This for testing purpose ','2023-08-14 10:58:56','This ids for testing.','2023-08-14 15:13:14'),(2,'Apporva','ap@test.com','Regaring Recipe','This is for testing','2023-08-14 19:46:26','DOne','2023-08-14 19:46:42');
/*!40000 ALTER TABLE `tblenquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpages`
--

DROP TABLE IF EXISTS `tblpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblpages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpages`
--

LOCK TABLES `tblpages` WRITE;
/*!40000 ALTER TABLE `tblpages` DISABLE KEYS */;
INSERT INTO `tblpages` VALUES (1,'aboutus','About Us','                                <div style=\"text-align: center;\"><b><font size=\"6\">Welcome to Food Recipe System</font></b></div><div style=\"text-align: left;\"><div>Looking for vegetarian and vegan Indian Dinner recipes? Here are the best 40+ easy, full of flavor Dinner Recipes from curries, stir-fries, lentils, and rice dishes that your family will love.</div><div><br></div><div>This post includes popular restaurant/take-out favorites from Paneer makhani, Palak paneer, Dal makhani, and Vegetable biryani, to homestyle recipes like Kala chana curry, Moong khichdi, and many more!</div></div><div style=\"text-align: left;\"><p class=\"bodytext\" style=\"margin-bottom: 10px; color: rgb(33, 37, 41); line-height: 1.5; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><br></p></div>','2023-08-14 18:04:57'),(2,'contactus','Contact Us','<b>Food Recipe System Portal</b><div><b>Contact Number:</b>+91-96784532145</div><div><b>email: </b>info@gmail.com</div><div><b>Address : </b>XYZ street ABC</div>','2023-08-14 19:47:33');
/*!40000 ALTER TABLE `tblpages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrecipes`
--

DROP TABLE IF EXISTS `tblrecipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrecipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `recipeTitle` varchar(255) DEFAULT NULL,
  `recipePrepTime` int(11) DEFAULT NULL,
  `recipeCookTime` int(11) DEFAULT NULL,
  `recipeYields` int(11) DEFAULT NULL,
  `recipeIngredients` mediumtext DEFAULT NULL,
  `recipeDescription` mediumtext DEFAULT NULL,
  `recipePicture` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrecipes`
--

LOCK TABLES `tblrecipes` WRITE;
/*!40000 ALTER TABLE `tblrecipes` DISABLE KEYS */;
INSERT INTO `tblrecipes` VALUES (1,1,'HOMEMADE PASTA',30,60,5,'2 cups general purpose white flour,2 eggs,1 tablespoon olive oil,4 tablespoons water','Add all ingredients to a food processor.\r\nProcess until mixture starts to form a ball. You should knead the dough for at about ten minutes until it bouncers back when pressed down with your finger.\r\nYou may want to start with a little less water depending on the size of your eggs and moistness of your flour.\r\nWrap ball in plastic wrap and let rest for about an hour.\r\nThen make your pasta using your pasta machine or rolling out. Enjoy -- .','5ff0d64acbde003ecd13543f2b8f3a29.jpg','2023-08-10 18:12:28'),(2,1,'BEST BANANA BREAD',30,70,10,'1⁄2 cup butter, softened,1 cup granulated sugar,2 eggs, beaten,3 bananas, finely crushed (for serious and extreme moist and delicious, try 4 bananas),1 1⁄2 cups all-purpose flour,1 teaspoon baking soda,1⁄2 teaspoon salt,1⁄2 teaspoon vanilla (optional)','Remove odd pots and pans from oven.\r\nPreheat oven to 350º / 180º.\r\nCream together butter and sugar.\r\nAdd eggs and crushed bananas.\r\nCombine well.\r\nSift together flour, soda and salt. Add to creamed mixture. Add vanilla.\r\nMix just until combined. Do not overmix.\r\nPour into greased and floured loaf pan.\r\nBake at 350º / 180º for 55 minutes.\r\nKeeps well, refrigerated.','d3874240152e0e68e44ee02005fac3f9.jpg','2023-08-11 17:49:07'),(3,2,'Egg Curry Indian Style Recipe',10,15,3,'1 Onions Chopped,1/2 inch Ginger,5 – 6 Garlic Pods.,1 medium Fresh Green Chilli,1/4 tsp Sugar,1 tsp Coriander Powder,1 tsp Cumin Powder,1/2 tsp Red Chilli Powder,1/4 tsp Garam Masala Powder,3 -4 Fresh Tomatoes Grinded,1/4 cup Curd,4 Eggs Boiled,2 tbsp oil','In a blender make a fine paste of onions, ginger, garlic and green chilli.\r\nNow heat a kadai and add 2 tblsp oil for cooking.\r\nTip in the bay leaf and 1/4 tsp sugar\r\nNow immediately add the onion-garlic paste.\r\nStir continously and cook it till the paste turns deep brown.\r\nNow lower the flame and add the cumin powder, coriander powder, red chilly powder and garam masala powder. Add 1/2 tsblp water and cook till the water dries out.\r\nNow add the tomato puree.\r\nLet it cook till the oil springs up\r\nNow add well whisked curd.\r\nKeep stirring and cooking till the curd is completely gone and the masala has released all the oil.\r\nAt this stage 1 cup water and let it boil.\r\nYou can add salt at this stage.\r\nMeanwhile slice the eggs into half.\r\nOnce the gravy acquires desired consistency, place the sliced eggs in the curry. You can even crush the yolk of one of the eggs and put in the curry. This gives a nice body to the egg curry.\r\nGarnish the curry with chopped green coriander.','d971e878a2b40360ea87a4caafea6463.jpg','2023-08-13 16:35:20'),(4,2,'Yellow Moong Dal Recipe',5,10,3,'1 cup Yellow Moong Dal,1/2 tsp Turmeric Powder,1 tsp Salt,2 cups water,1 tsp Ghee / Butter,2 -3 Cloves Garlic,1 tsp Jeera (Cumin Seeds),1 tblsp chopped Green Coriander','Wash the dal 3 – 4 times and keep aside.\r\nNow in a pressure cooker add the washed dal, salt, turmeric pwoder and 2 cups of water.\r\nNow cook the dal for 2 whistles.\r\nWait till the pressure releases naturally.\r\nNow dish out the dal to a serving bowl.\r\nTake a tadka pan, heat the ghee in it.\r\nNow add jeera seeds and chopped garlic.\r\nCook till the garlic gets dark brown in color. This is important or the garlic will taste raw.\r\nNow add red chilly powder and immediately pour this tadka over the cooked dal.\r\nGarnish with chopped green coriander.\r\nYour peeli dal is ready to be served.','3af88f4447eff348bb2bb6df559ba9c3.jpg','2023-08-13 16:54:15'),(5,3,'Rice Recipe',20,50,10,'1 cup basmati rice – 190 grams,3 tablespoons Ghee (clarified butter),15 to 18 cashews,1 tablespoon raisins (without seeds),⅓ cup thinly sliced onions – 50 grams or 1 medium-sized,1.75 to 2 cups water for stove-top pan and 1.25 cups for instant pot,⅓ teaspoon rock salt (edible and food grade) or add as required,1 to 2 tablespoons chopped coriander leaves (cilantro) for garnish','Rice is a staple in Indian Cuisine. Obviously, apart from simple steamed rice, a variety of rice dishes are made in Indian cuisine. In this category, you will find vegetarian and vegan rice recipes. Some of the rice recipes are naturally gluten-free too.\r\n\r\nWe have steamed rice with lentils (dal) and curries. Apart from steamed rice being cooked in almost every household, there are some other standalone recipes that are exclusively made with rice.\r\n\r\nIn the Southern & Eastern India, rice is cooked everyday for lunch or dinner. While the Northern India has roti (whole wheat flat bread) as a regular staple. But in most Indian homes, you will find either roti or rice regularly in their meals.\r\n\r\nHere you will find a huge collection of 119 rice recipes. Many of them are from the Indian cuisine and some from asian and world cuisine. You will also find many varieties of biryani and pulao recipes.','676d91b5b8b77c78d494d05110edb3f6.jpg','2023-08-14 19:42:43');
/*!40000 ALTER TABLE `tblrecipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser`
--

LOCK TABLES `tbluser` WRITE;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` VALUES (1,'Anuj kumar','ak30@gmail.com',1234567890,'f925916e2754e5e03f75dd58a5733251','2023-08-10 17:12:34'),(2,'John Doe','john@test.com',4852136980,'f925916e2754e5e03f75dd58a5733251','2023-08-13 16:29:40'),(3,'Garima Singh','grma123@test.com',452136570,'f925916e2754e5e03f75dd58a5733251','2023-08-14 19:39:56');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-10  9:49:11
