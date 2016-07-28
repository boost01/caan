-- MySQL dump 10.10
--
-- Host: p50mysql59.secureserver.net    Database: caancatmobile
-- ------------------------------------------------------
-- Server version	5.0.67.d7-ourdelta-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adoptions`
--

DROP TABLE IF EXISTS `adoptions`;
CREATE TABLE `adoptions` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `age` varchar(10) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `status` varchar(5) NOT NULL,
  `special` varchar(5) NOT NULL default 'n',
  `cotm` varchar(1) NOT NULL default 'n',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=266 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adoptions`
--


/*!40000 ALTER TABLE `adoptions` DISABLE KEYS */;
LOCK TABLES `adoptions` WRITE;
INSERT INTO `adoptions` VALUES (150,'maggie','3 yr','diluted calico','female','tolerates other cats.  wants owner that will pet her and give her attention and treats.  her coloring is stunning.','out','n','n'),(151,'blue eyes','kitten','','','','out','n','n'),(101,'puddin','4 month','brown tabby','male','affectionate, rub the belly, good w/dogs','out','n','n'),(114,'bailey','','','male','','out','n','n'),(116,'baboon','','','male','','out','n','n'),(117,'spats and fearless','','','male','fearless is female','out','n','n'),(208,'vamp','2','beige/grey diluted calico','male','history:  lost street cat vamp is the king of the CQ, loves catnip and playing, teddy bear face','out','n','n'),(120,'asia','','','female','','out','n','n'),(122,'betty (mom)','','','female','mom of moe curly and larry','out','n','n'),(123,'curly','9 weeks ap','white/grey','male','','out','n','n'),(124,'larry','9 weeks ap','grey','male','','out','n','n'),(182,'bear','3 months','fluffy dark charcoal long hair','male','in foster care, foster mom says:  beautiful green eyes, gentle and inquisitive, he likes to ly quietly beside you while being stroked, his long fur is very very soft and he loves to be brushed','out','n','n'),(126,'petulia','2','DSH silver tortoise shell','female','Petula is a cuddly 2 year old silvery tortoiseshell cat with an affectionate, loving disposition.\r\nRescued this past winter, Petula was homeless and suffered severely frostbitten toes and ears. She completely recovered in hospital, but her ears could not be saved so she now has cute little “ruffles” - that show off her beautiful green eyes! She is truly a unique, one of a kind survivor and needs a “forever” home without other cats. Petula is spayed and vaccinated.','out','n','n'),(130,'momma man','1.5 yr','','male','History:  found homeless.  likes to be groomed, very interactive, gorgeous green eyes','out','n','n'),(129,'josie','4 yr','','female','history:  street cat roaming, plays like a young cat, laser pointer is her favorite or any string with feathers on the end\r\nADOPTED August, 2009','out','n','n'),(133,'beauty','about 9 yr','','female','history:  surrendered.  CQ diva. truly a \'queen\' quiet and interacts in play when she feels like it, loves to sit on a lap and get her head and neck rubbed.','out','n','n'),(131,'marvin','1 yr','brown, sleek tabby ','male','came to us abandoned, cuddle bug, playful, lap cat, walks with a swagger','out','n','n'),(132,'sylvester','1.5 yr','domestic short hair','male','history:  abandoned, homeless.  stoic, very vocal, human attention is important for him','out','n','n'),(148,'diego 1','10 month','organd/white','male','history:  somebody tried to castrate him with a rubber band.  about a week later he was taken to the vet.  he went to emergency surgery and he is now looking for a home.  He is starting to trust people again.  he is handsome with striking yellow eyes.','out','n','n'),(135,'huey luey dewey','8-9 weeks','brown tabby','','history:  little feral kittens, lived in a steel mill and now they are being fostered.\r\n\r\nhuey is a boy, luey ad dewey are female','out','n','n'),(136,'mitsou','8 weeks','torty DSH','female','history: homeless and lost, now in foster care','out','n','n'),(137,'chicita','2 months','black w/med long hair','female','history:  homeless and lost','out','n','n'),(138,'mia','2 months','black','female','history: homeless and lost','out','n','n'),(139,'pitou','2 months','grey/shite','male','history: homeless and lost','out','n','n'),(140,'riley','2 months','smoke tabby DSH','female','history:  homeless and lost','out','n','n'),(141,'pekoe','8 weeks','orange','male','history:  homeless and lost, now in foster care','out','n','n'),(244,'nikky','3 month','orange tabby','male','timid and very playful','in','n','n'),(143,'sherman','8 weeks','orange white with black spot o','male','history:  homeless and lost, now in foster care','out','n','n'),(169,'phil','1 or 2','black/white','male','cuddle bug, he loves laser pointers','out','n','n'),(146,'mannis','3 yr','all white ','male','nmannis is deaf but you\'d never know it.  he is a couch potato, loves to watch t.v. , a quiet soul.','out','n','n'),(149,'webz','','','','ADOPTED on May 9th, ','out','n','n'),(152,'antique','kitten','','','','out','n','n'),(153,'keytra 2','8 months','lion','','keytra is not for adoption. please donate to TEARS to help Keytra (see our links page) \r\nShe hurt her foot and needed surgery today (June 1, 2009)\r\n\r\nTEARS rescue abused and abandoned exotics and rehabilitate  ','in','n','n'),(155,'fudge 1','11 month','chocolate black DSH','male','history:  homeless lost, very friendly, likes people','out','n','n'),(223,'katie','','','','','out','n','n'),(251,'Max','4 month','kitten','male','Foster mom says: Max is a real boy. He likes to run and jump and play. He\'s alert and curious. He likes to be petted and will purr loudly, but not much into the lengthy holding stuff \r\n','in','n','n'),(250,'Timothy','4 months','kitten','male','Foster mom says: Timmy, is a love-bug. Plays and romps but loves to be withyou lots. Purrs loudly and lov es to be held or cuddled wherever you are, he will be to. \r\n','in','n','n'),(241,'scooter','2 yr','tabby','male','smart as a whip, a real character loves to ly in your lap , playful, scooper of food, really different kind of guy , bull in a china shop, energetic, loves to play with others','out','n','n'),(222,'sweetpea','','','','','out','n','n'),(164,'Minnehaha','kitten','','female','i am the smallest girl kitten of my litter and have the softest black swath down my head and back.  i was a little timid when i went to live with foster grandma but you wouldn\'t know it now.  i like to climb legs so i can sit on your head or shoulder and tickle your ears.  i also like to stick my head into slippers- even while you are wearing them!  Pick me!  Pick me!  (littermates are mercury, tyrone and nutmeg)','out','n','n'),(165,'Mercury2','kitten','','female','i am the fastest girl kitten this side of the Canada-US border.  i can get through an open door before you can blink!  so you will have to be pretty sharp to keep up with me.  when i slow down though, i love to be cuddled and held and will heap lots of kitty kisses on you.  i love toys and other kitties to play with in addition to a human or two.  please consider taking me home- for good. you won\'t have any regrets. \r\n(littermates are minnehaha, tyrone, and nutmeg) ','out','n','n'),(166,'Nutmeg','kitten','','female','i am the lightest coloured tabby of my litter and am a girl kitten.  i can rough and tumble with my big brother with ease, but i\'m also gentle and will purr happily lying curled up on your lap.  my foster granma brushes me and cuddles me after she and i play with shoelaces, balls and other fun things.  i would love a new home with another friendly cat.  if you are looking for a beautiful cat with a sweet disposition , you don\'t need to look any further. ( littermates are tyrone, mercury and minnehaha)','out','n','n'),(168,'A Bouquet of Kitties','kittens','','','We are happy and healthy kittens rescued by Dr. Julia.  for the last few weeks, we have been growing up with our foster grandma.  we are not sure what happened to our mom but she doesn\'t need to worry about us.  we are looking forward to having our very own loving families to live with forever. nutmeg, tyrone, mercury and minnehaha','in','n','n'),(193,'fonz','3 month','tuxedo type black and white','female','unique spot on leg, part of the cirque de soliel \"TEAM\"','out','n','n'),(195,'bob','2 yr','orange white color','male','bob tail due to injury','out','n','n'),(173,'kittenjune','','','','','out','n','n'),(174,'kitteninbed','','','','','out','n','n'),(194,'bobby','4 month','black and white, white mustach','','great things come in small packages','out','n','n'),(199,'sable','','','','adopted august 3\r\nSteph and sable congratulations!\r\n','out','n','n'),(200,'chaplin','','','female','I am the original push-over, stroke me and I will fall on my back to make it easy for you to stroke my tummy.  I have long fluffy fur in black and white and a beauty spot on my nose.  And just to remind you I am a girl, my nose and inside my ears are the prettiest pink.  I play, I purr, I eat well and I love people and other kittens I love to e cuddled and held and will heap lots of kitty kisses on you.  I love toys and other kitties to play with in addition to a human or two.  Please consider taking me home - for good.  You won\'t have any regrets ','out','n','n'),(201,'Teddy','','','male','I am a cuddler from the get-go.  I love to be close to humans and will sit in your lap for quite a while if you let me.  I am also a boy-kitten with short white hair with tabby patches and a solid little body.  I LOOOOVE my food and so you may have to feed me several smaller meals a day - but i\'m woth it.  I will keep you entertained all day long.  I get along with everybody, so if you already have another pet, that would be just fine with me.','out','n','n'),(183,'sweetie','3 months','tabby','female','in foster care, foster mom says:  she is a wee little one.  she looks like her mother, a beautiful tabby with lots of caramel and black markings.  her short fur is silky soft.  she loves to be held close and gently stroked.  her sweet little face is absolutely adorable.  she is sometimes timid and yet not afraid to occasionally pounce on her brothers and play','out','n','n'),(184,'fuzy','3 months','tabby','male','in foster care, foster mom says:  fuzy is a twin to his sister ramey. i called him fuzy because Dr. Murray from Court Animal was trying to find a difference in appearance between the two.  a fuzzy little spot on his face with striped markings on either side was a good clue, other than the girl boy difference.  fuzy has caramel and black markings , a cute little short haired tabby. he has great temperament and such a kind little heart.  fuzy likes to be gently brushed and is a purr machine','out','n','n'),(185,'ramey','3 months','tabby','female','in foster care, foster mom says:  ramey is an adorable little tabby with short silky hair.  she has black and caramel markings.  she has a cute little face with markings between and above her eyes in the shape of a rams horn turned slightly inward.  ramey is a spunky little one eager to play and explore.  she is always ready for a little wrestle with her brothers.  ramey likes to be gently brushed when she is finished playing.  definetly a delightful little kitty.','out','n','n'),(186,'tiger','3 months','tabby','male','in foster care, foster mom says:  tiger is a very accurate description of this grey speckled and striped short haired tabby.  he is a playful little guy, always ready to stalk and pounce on his unsuspecting brothers and sisters.  he pretends to be a tough guy but when i scoop him up and stroke his belly he is a softy, closing his eyes and purring like a baby tiger.  when he is in quiet mode, i gently lay him on his back and brush his striped belly, he loves it!  what a regal looking boy he is.','out','n','n'),(188,'Clara','kitten','DSH','female','I am such a girl! I have a pink nose and pink ears and the cutest little black bow on top of my head.  I am the smallest in the family, but I can still rough and tumble with my big brothers with ease. Right now I enjoy being a kitten and playing with my siblings, but I do love being cuddled too.  I love toys – you know strings and balls and anything else. Everything is a toy when you are a kitten! My foster grandma is teaching me that fingers and toes (yours) are not toys, but sometimes I forget. I would love a new home with another friendly cat or kitten.','out','n','n'),(189,'Beau','kitten','DSH','male','I am also a white and tabby patched boy-kitten but have a charming mask of tabby over one eye.  I am most like Tino in personality and will undoubtedly become the ultimate lap-cat. In the meantime I love to play with my siblings and all sorts of toys.  I think I would be lonely without another cat to keep me company so if you have love enough for two, make me one of the two you take.  You will have no regrets with adopting me.','out','n','n'),(190,'Bopper','kitten','DSH','male','I may look tough (well as tough as a kitten can look anyway) but I loooove being stroked and petted.  I have the cutest mew and the loudest purr. How can you resist me?  I am very affectionate and like company so a home with another friendly cat would be my idea of heaven. I am white with big patches of tabby here and there and Gramma calls me her special boy.','out','n','n'),(191,'Tino','kitten','DSH','male','Apparently I was named after Valentino the famous lover, but I was too small for such a big name so I’m just Tino. Some people get me confused with Bopper but I’m really different. I sometimes prefer being cuddled to even playing. I like to have company so if you have lots of love and attention to go around, I’m the Tino for you. I am white with tabby patches, with one little bit of tabby on my tummy.','out','n','n'),(192,'vince','3 month','orange colored','male','black mark on right ear, playful and loveable','out','n','n'),(196,'james','9 month','gray tabby','male','beautiful sweet adorable affectionate','out','n','n'),(197,'mom','1 yr 2 mon','white, black striped','female','unique individual','out','n','n'),(198,'barry white','2 yr 3 mon','black beauty','male','ask mary about barry white\'s habits, he is a good boy','out','n','n'),(202,'Peekaboo','','','male','What kind of name is that for a boy -kitten?  My foster Gramma named me that because I have a patch of tabby over one eye and the rest of my face is white.  I am short hair but quite fluffy and I love to play with strings and balls and all sorts of toys.  I can\'t seem to sit still for very long but i purr happily when i am held - for a minute anyway.  I have been raissed with my brother and sister and so always have had someone to cuddle up with and play with.  I\'m sure I can get along with kids and other cats and kittens so maybe you can be my new mom or dad.','in','n','n'),(203,'lina','4 month','white with 2 gray patches','female','little miss dynamite, full of beans, sibling to lou, they love each other','out','n','n'),(204,'minou','2','white, black top of head','male','stunning features, pleasant, playful and vocal','out','n','n'),(205,'leo','4 month','marble brown tabby','female','gorgeous and rare tabby, very laid back, loveable, cuddler','out','n','n'),(206,'tonka','4 month','grey tabby','male','exceptional ball skills, balanced, plays well, cuddler','out','n','n'),(207,'lou','4 month','white with cool black patches','male','dynamite, cibling to lina, they love each other.','out','n','n'),(209,'TJ','2','male gray tabby','male','TJ (also known as toe jam) .  his one toe had to be amputated due to an injury.  he is the biggest ham and loves to cuddle.  his eyes are piercing and he\'s always in your face. he loves kitties and other cats','out','n','n'),(210,'tom','5 months','black long hair','male','tom is sibling to jerry.  he is curious and full of energy.','out','n','n'),(211,'jerry','5 months','black short hair','male','jerry is sibling to tom.  jerry is also curious and full of energy','out','n','n'),(212,'sassy','5 months','tuxedo black white','','sassy was in foster care.  she is a real \'farter\" ask mary....or was it really mary? ','out','n','n'),(226,'mack','','','','','out','n','n'),(247,'tiny','4 month','brown tabby','male','gentle playful, loves belly rubbed, a kisser','out','n','n'),(248,'smoke','5 monnth','silver/gray','male','curious, quiet, affectionate','out','n','n'),(249,'Princess','','','','','out','n','n'),(252,'collette','6 month','black','female','intelligent, resembles siamese personality','in','n',''),(253,'princess','5 month','black','female','fluffy and playful','in','n',''),(254,'violet','6 month','silver tabby','female','cuddlebug','out','n',''),(227,'Jackie','','','','','out','n','n'),(255,'stripes','7 month','gray tabby','male','gray tabby with black paws, male play is his priority','in','n',''),(256,'suzie','5 month','tabby','female','black smudge on her nose, timid until her tummy gets rubbed','in','n',''),(228,'Iris','','','','','out','n','n'),(257,'sally','7 month','silver tabby','female','hug monster, needs loving arms','in','n',''),(258,'callie','2 yr','calico','female','typical calico personality, morning player','in','n',''),(229,'Sparrow','8 month','','','Born 8 months ago with a congenital eye defect in an animal hospital, she has lived in the hospital until her eye was removed. She recovered very well and has grown into an 8-month old, gorgeous DLH female with a warm, affectionate personality. This little heroine needs a \"forever\" home.  Contact 905 401 0016 for more information about this heroic, little cat.\"\r\n','out','n','n'),(230,'Tammy','','','','','out','n','n'),(242,'fluffy','5 month','black','female','playful, loveable, nervous of bigger cdadts, loves to smell you and she is very vocal','in','n','n'),(245,'spring','7 yr','torti','female','temperamental, only cat in the house please','in','n','n'),(246,'love','1 1/2 yr','white/black markings','female','with intense eyes, loves laser play, loves to be pet, an independent player \r\n','in','n','y'),(239,'charolette','1 1/2','black','female','beautiful amber eyes, she tolerates cats but will play,  very warm once she know you','out','n','n'),(259,'fraser','6 month','black','male',' black with silver markings, looking for a loving home','in','n',''),(260,'tuxedo','8 month','tuxedo','male','sleek quiet player','in','n',''),(261,'chris','6 yr','black','male','mr sophhistication, loves brushing and loving','in','n',''),(262,'kaz','5 month','orange tabby','male','play is my  second name','in','n',''),(263,'jacklyn','5 yr','brown gray','female','loves to eat and cuddle','in','n',''),(264,'blackie hugo','7 month','black','male','very affectionate','in','n',''),(265,'ginger','young','orange white','female','little temperamental but can change with TLC','in','n','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `adoptions` ENABLE KEYS */;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `user` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--


/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
LOCK TABLES `blog` WRITE;
INSERT INTO `blog` VALUES (21,'Open Forum','OPEN FORUM at Cat Quarters Sun Feb 21st at 9:30 am for community feedback, positive input and discussion, interested members to work toward positive objectives and change ( if you aren\'t already a memeber you can become a member at the meeting) \r\n\r\n\r\n','Barb','2010-02-11 23:23:04'),(17,'Welcome to the NEW C.A.A.N Blog','Welcome one and all to the new C.A.A.N Catmobile blog. Keep \r\nan eye on the blog for updates to the website, as well as notes \r\nfrom our various contributing staff members about all the \r\nwonderful things that are going on in the world of C.A.A.N.\r\n\r\nFor your convenience, we have an RSS feed so you can follow us \r\nusing your favourite reader.','Kevin','2010-02-11 18:50:02'),(22,'OPEN FORUM change of location','Please note the change of location \r\non Sunday February 21st at 9:30 am the open forum will be held at Art\'s Restaurant, 45 Geneva St. St. Catharines in the meeting room\r\n\r\nthank you ','Barb','2010-02-17 13:47:42'),(23,'Charity Fraud Awareness Quiz ','Capital One and CanadaHelps Invite You to Take Our Charity Fraud Awareness Quiz To Earn a Chance to Win $20,000 to Donate To the Charity of Your Choice.\r\nBy being diligent and asking the right questions, Canadians can confidently support those causes that are near and dear to their hearts, while protecting themselves from fraud and ID theft\r\n\r\nvisit www.canadahelps.org to take the quiz ','Barb','2010-03-03 02:30:16'),(24,'PC ferals request to sign petition','please see the PC Ferals website to find more information about signing a petition for the feral cat colony at Bath Correctional Institute.','Barb','2010-03-20 09:34:31'),(25,'\"SPAY\"ghetti Dinner and Penny Sale','CAAN is hosting an all you CAAN eat \"SPAY\"ghetti \r\nDinner and Penny Sale at:\r\nSt. Andrew\'s Parish Hall\r\n7 St. Andrew\'s Ave. (corner of Hwy # 8)\r\nGrimsby, ON L3M 3R9\r\nApril 21,2010 4:30 to 7pm\r\nticket:\r\n$8.00   Adult and take out\r\n$4.00   6 and under\r\nFree    3 and under\r\nAvailable in advance or at the door requesting \r\ndonations of cat food, treats, litter etc.\r\n\r\ncontact (905)945-1473 or (905)401-0016\r\n<A HREF=\" http://caancatmobile.org/images/spayghetti.jpg\" target=_blank>Poster</A>','Leslie','2010-03-26 15:32:36'),(26,' no kill day April 1st  see the history','please see a note from nathan winograd from  the no kill advocacy centre  and pause to celebrate and remember \'no kill day\' our webmaster will add the link  ','Barb','2010-04-02 10:10:45'),(27,'A Celebration of Compassion link','As promised, here is the link for the article <A HREF=\"http://www.nathanwinograd.com/?p=3207\" target=\"_blank\">A Celebration of Compassion</A> by Nathan J. Winograd','Webmaster','2010-04-02 15:57:57'),(28,'National Volunteer WEEK  April 18-24','Thank you to all our volunteers, including our fabulous volunteer coordinator Mary..\r\nSee CAAN\'s nomination for volunteer of the year in our april newletter...Dr. Julia Murray\r\n\r\nthanks ','Barb','2010-04-17 10:36:35');
UNLOCK TABLES;
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

--
-- Table structure for table `eventlist`
--

DROP TABLE IF EXISTS `eventlist`;
CREATE TABLE `eventlist` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `img` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventlist`
--


/*!40000 ALTER TABLE `eventlist` DISABLE KEYS */;
LOCK TABLES `eventlist` WRITE;
INSERT INTO `eventlist` VALUES (4,'\"SPAY\"ghetti Dinner and Penny Sale','CAAN is hosting an all you CAAN eat \"SPAY\"ghetti Dinner and \r\nPenny Sale at:\r\nSt. Andrew\'s Parish Hall\r\n7 St. Andrew\'s Ave. (corner of Hwy # 8)\r\nGrimsby, ON L3M 3R9\r\nApril 21,2010 4:30 to 7pm\r\nticket:\r\n$8.00 Adult and take out\r\n$4.00 6 and under\r\nFree 3 and under\r\nAvailable in advance or at the door requesting \r\ndonations of cat food, treats, litter etc.\r\ncontact (905)945-1473 or (905)401-0016','1431969930');
UNLOCK TABLES;
/*!40000 ALTER TABLE `eventlist` ENABLE KEYS */;

--
-- Table structure for table `forsale`
--

DROP TABLE IF EXISTS `forsale`;
CREATE TABLE `forsale` (
  `id` int(5) NOT NULL auto_increment,
  `image` varchar(25) NOT NULL,
  `imgwidth` varchar(5) NOT NULL,
  `imgheight` varchar(5) NOT NULL,
  `desc` varchar(300) NOT NULL,
  `price` varchar(10) NOT NULL,
  `sale` varchar(5) NOT NULL default 'no',
  `saleprice` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forsale`
--


/*!40000 ALTER TABLE `forsale` DISABLE KEYS */;
LOCK TABLES `forsale` WRITE;
INSERT INTO `forsale` VALUES (1,'book1','420','630','TNR, Past, Present and Future, <i>a history of the Trap-Neuter Return movement</i><br>by Ellen Perry Berkeley','$15.00','no',''),(2,'book2','460','665','Redemption, <i>The myth of pet overpopulation and the <b>No Kill</b> revolution in America</i><br>by Nathan J. Winograd','$20.00','no',''),(3,'set1','400','570','Handraising kittens book and DVD set','$20.00','no',''),(4,'bumper1','800','310','Bumper Sticker','$2.00','no',''),(5,'magnet1','360','730','Alley Cat Allies magnet','$4.00','no',''),(6,'magnet2','595','385','Save A Life Magnet (dog and cat)','$4.00','no',''),(7,'magnet3','410','580','Save A Life Magnet (cat)','$4.00','no',''),(8,'button1','450','450','Spay/Neuter pin badge','$4.00','no',''),(9,'tshirt1','530','540','','','no','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `forsale` ENABLE KEYS */;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL default 'Barb',
  `email` varchar(30) NOT NULL default 'bdvern@cogeco.ca',
  `event_id` varchar(5) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--


/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
LOCK TABLES `gallery` WRITE;
INSERT INTO `gallery` VALUES (0,'Bake Sale','Barb','bdvern@cogeco.ca','0'),(1,'Candy','Barb','bdvern@cogeco.ca','0'),(2,'Cat Poster','Barb','bdvern@cogeco.ca','0'),(3,'Cleo','Barb','bdvern@cogeco.ca','0'),(4,'Crunchie','Barb','bdvern@cogeco.ca','0'),(5,'Dale','Barb','bdvern@cogeco.ca','0'),(6,'Dale\'s Annie','Barb','bdvern@cogeco.ca','0'),(7,'Dog Visitors','Barb','bdvern@cogeco.ca','0'),(8,'Donna','Barb','bdvern@cogeco.ca','0'),(9,'Dusty','Barb','bdvern@cogeco.ca','0'),(10,'Garfield, Gorilla and Julia','Barb','bdvern@cogeco.ca','0'),(11,'Gumbo','Barb','bdvern@cogeco.ca','0'),(12,'Joan and snake','Barb','bdvern@cogeco.ca','0'),(13,'Kim and Lilly','Barb','bdvern@cogeco.ca','0'),(14,'Kittens','Barb','bdvern@cogeco.ca','0'),(15,'Lucy','Barb','bdvern@cogeco.ca','0'),(16,'M&M','Barb','bdvern@cogeco.ca','0'),(17,'Michelle, Diane, Gerrie and pups','Barb','bdvern@cogeco.ca','0'),(18,'Mittens','Barb','bdvern@cogeco.ca','0'),(19,'Patti and Lisa','Barb','bdvern@cogeco.ca','0'),(20,'Percy','Barb','bdvern@cogeco.ca','0'),(21,'Pet Valu Glendale','Barb','bdvern@cogeco.ca','0'),(22,'Storm','Barb','bdvern@cogeco.ca','0'),(23,'Sue and Sharon','Barb','bdvern@cogeco.ca','0'),(24,'Wendy','Barb','bdvern@cogeco.ca','0'),(25,'Buster','Barb','bdvern@cogeco.ca','1'),(26,'Boots','Barb','bdvern@cogeco.ca','1'),(27,'Blackster','Barb','bdvern@cogeco.ca','1'),(28,'Big Daddy','Barb','bdvern@cogeco.ca','1'),(29,'Cat tubing','Barb','bdvern@cogeco.ca','1'),(30,'Cathy and Dr B.','Barb','bdvern@cogeco.ca','1'),(31,'Chocolate being prepped','Barb','bdvern@cogeco.ca','1'),(32,'Dale & Holly','Barb','bdvern@cogeco.ca','1'),(33,'Dale & Nancy','Barb','bdvern@cogeco.ca','1'),(34,'Dayley','Barb','bdvern@cogeco.ca','1'),(35,'Dr J & Dr B','Barb','bdvern@cogeco.ca','1'),(36,'Dr J & Dr Nina','Barb','bdvern@cogeco.ca','1'),(37,'Dr J, Joan, Janet & Dr B','Barb','bdvern@cogeco.ca','1'),(38,'Dr J & Roseanna','B','bdvern@cogeco.ca','1'),(39,'Dr Nina & Dusty','Barb','bdvern@cogeco.ca','1'),(40,'Dusty, Harry & Dr Nina','Barb','bdvern@cogeco.ca','1'),(41,'Dail and cat recovering','Barb','bdvern@cogeco.ca','1'),(42,'Gail and cat recovering','Barb','bdvern@cogeco.ca','1'),(43,'Glenna','Barb','bdvern@cogeco.ca','1'),(44,'Janet & Tracy','Barb','bdvern@cogeco.ca','1'),(45,'Jenn','Barb','bdvern@cogeco.ca','1'),(46,'Ken & Roseanna','Barb','bdvern@cogeco.ca','1'),(47,'Kitten 2','Barb','bdvern@cogeco.ca','1'),(48,'Kitten 1','Barb','bdvern@cogeco.ca','1'),(49,'Linda','Barb','bdvern@cogeco.ca','1'),(50,'Lucy & Chocolate','B','bdvern@cogeco.ca','1'),(51,'Marble','Barb','bdvern@cogeco.ca','1'),(52,'Mat','Barb','bdvern@cogeco.ca','1'),(53,'Nancy','Barb','bdvern@cogeco.ca','1'),(54,'Patti','Barb','bdvern@cogeco.ca','1'),(55,'Pepper','Barb','bdvern@cogeco.ca','1'),(56,'Prepping Chocolate','Barb','bdvern@cogeco.ca','1'),(57,'Riley','Barb','bdvern@cogeco.ca','1'),(58,'Sharon','Barb','bdvern@cogeco.ca','1'),(59,'Sharon\'s babies','Barb','bdvern@cogeco.ca','1'),(60,'Smokey','Barb','bdvern@cogeco.ca','1'),(61,'Some of us','Barb','bdvern@cogeco.ca','1'),(62,'Surgery prep','Barb','bdvern@cogeco.ca','1'),(63,'Tanya','Barb','bdvern@cogeco.ca','1'),(64,'The Board','Barb','bdvern@cogeco.ca','1'),(65,'Tracy, Cathy & Mat','Barb','bdvern@cogeco.ca','1'),(66,'Wendy P','Barb','bdvern@cogeco.ca','1'),(67,'Wendy R','Barb','bdvern@cogeco.ca','1'),(68,'Charlie\'s Angels','Barb','bdvern@cogeco.ca','1'),(69,'Thank You!','Barb','bdvern@cogeco.ca','1'),(70,'ellen diane nancy','Barb','bdvern@cogeco.ca','2'),(71,'garfield and friend','Barb','bdvern@cogeco.ca','2'),(72,'joan facepainting','Barb','bdvern@cogeco.ca','2'),(73,'joan facepainting 2','Barb','bdvern@cogeco.ca','2'),(74,'joan face painting 3','Barb','bdvern@cogeco.ca','2'),(75,'joan face painting 4','Barb','bdvern@cogeco.ca','2'),(76,'kitty cat barb','Barb','bdvern@cogeco.ca','2'),(77,'kitty cat ellen and diane','Barb','bdvern@cogeco.ca','2'),(78,'kitty cat ellen','Barb','bdvern@cogeco.ca','2'),(79,'kitty cat joan','Barb','bdvern@cogeco.ca','2'),(80,'kitty cat julia','Barb','bdvern@cogeco.ca','2'),(81,'kitty cat nancy','Barb','bdvern@cogeco.ca','2'),(82,'kitty cat wendy','Barb','bdvern@cogeco.ca','2'),(83,'kitty cat mary','Barb','bdvern@cogeco.ca','2'),(84,'Barb 1','Barb','bdvern@cogeco.ca','3'),(85,'Barb 2','Barb','bdvern@cogeco.ca','3'),(86,'Betty','Barb','bdvern@cogeco.ca','3'),(87,'Bounce','Barb','bdvern@cogeco.ca','3'),(88,'Cathy and Cats','Barb','bdvern@cogeco.ca','3'),(89,'Cathy','Barb','bdvern@cogeco.ca','3'),(90,'Dale','Barb','bdvern@cogeco.ca','3'),(91,'Diane & Tanya','Barb','bdvern@cogeco.ca','3'),(92,'Diane','Barb','bdvern@cogeco.ca','3'),(93,'Dr Julia & Gail','Barb','bdvern@cogeco.ca','3'),(94,'Dr Julia & Matt','Barb','bdvern@cogeco.ca','3'),(95,'Dr Julia','Barb','bdvern@cogeco.ca','3'),(96,'Elizabeth, Kim & Janet','Barb','bdvern@cogeco.ca','3'),(97,'Gail','Barb','bdvern@cogeco.ca','3'),(98,'Gloria, Lucy & David','Barb','bdvern@cogeco.ca','3'),(99,'Great Grandma','Barb','bdvern@cogeco.ca','3'),(100,'Janet, Cathy, Mat, Sue, CHeryl & Mar','Barb','bdvern@cogeco.ca','3'),(101,'Janet','Barb','bdvern@cogeco.ca','3'),(102,'Kathy & Glenna','Barb','bdvern@cogeco.ca','3'),(103,'Kim C','Barb','bdvern@cogeco.ca','3'),(104,'Kira','Barb','bdvern@cogeco.ca','3'),(105,'Marina feeding a kitten','Barb','bdvern@cogeco.ca','3'),(106,'Marina, Sheryl & Cathy','Barb','bdvern@cogeco.ca','3'),(107,'Mary & Gloria','Barb','bdvern@cogeco.ca','3'),(108,'Mat & Kim B','Barb','bdvern@cogeco.ca','3'),(109,'Mat','Barb','bdvern@cogeco.ca','3'),(110,'Olive','Barb','bdvern@cogeco.ca','3'),(111,'Peter','Barb','bdvern@cogeco.ca','3'),(112,'Prepped 1','Barb','bdvern@cogeco.ca','3'),(113,'Prepped','Barb','bdvern@cogeco.ca','3'),(114,'Rascal','Barb','bdvern@cogeco.ca','3'),(115,'Rebecca','Barb','bdvern@cogeco.ca','3'),(116,'Roseanna','Barb','bdvern@cogeco.ca','3'),(117,'Shadow','Barb','bdvern@cogeco.ca','3'),(118,'Sheryl','Barb','bdvern@cogeco.ca','3'),(119,'Smokey','Barb','bdvern@cogeco.ca','3'),(120,'Squaker','Barb','bdvern@cogeco.ca','3'),(121,'Sue','Barb','bdvern@cogeco.ca','3'),(122,'Taya & Tony','Barb','bdvern@cogeco.ca','3'),(123,'Silent Auction','Barb','bdvern@cogeco.ca','4'),(124,'Busy At Work','Barb','bdvern@cogeco.ca','4'),(125,'Carrousel','Barb','bdvern@cogeco.ca','4'),(126,'Hanging Out','Barb','bdvern@cogeco.ca','4'),(127,'Hide And Seek','Barb','bdvern@cogeco.ca','4'),(128,'Horse Whisperer','Barb','bdvern@cogeco.ca','4'),(129,'Peek-A-Boo','Barb','bdvern@cogeco.ca','4'),(130,'Secretary Bird','Barb','bdvern@cogeco.ca','4'),(131,'Splash Of Orange','Barb','bdvern@cogeco.ca','4'),(132,'Catmobile','Barb','bdvern@cogeco.ca','5'),(133,'Gerri 2','Barb','bdvern@cogeco.ca','5'),(134,'Gerri','Barb','bdvern@cogeco.ca','5'),(135,'Janet 2','Barb','bdvern@cogeco.ca','5'),(136,'Janet & Gerri','Barb','bdvern@cogeco.ca','5'),(137,'Janet','Barb','bdvern@cogeco.ca','5'),(138,'Joan','Barb','bdvern@cogeco.ca','5'),(139,'Mary Lou 2','Barb','bdvern@cogeco.ca','5'),(140,'Mar Lou 3','Barb','bdvern@cogeco.ca','5'),(141,'Wendy & Joan','Barb','bdvern@cogeco.ca','5'),(142,'Some Volunteers','Barb','bdvern@cogeco.ca','5'),(143,'Chris & Thank You cake','Barb','bdvern@cogeco.ca','143'),(144,'A great team','Barb','bdvern@cogeco.ca','6'),(145,'Barb & Dr. Nina','Barb','bdvern@cogeco.ca','6'),(146,'Betty & Gloria','Barb','bdvern@cogeco.ca','6'),(147,'Cat prep','Barb','bdvern@cogeco.ca','6'),(148,'Cat prep 2','Barb','bdvern@cogeco.ca','6'),(149,'Crista in recovery','Barb','bdvern@cogeco.ca','6'),(150,'Dr. J and Cathy','Barb','bdvern@cogeco.ca','6'),(151,'Dr. J','Barb','bdvern@cogeco.ca','6'),(152,'Dr. Nina','Barb','bdvern@cogeco.ca','6'),(153,'Elizabeth & Crista','Barb','bdvern@cogeco.ca','6'),(154,'Elizabeth','Barb','bdvern@cogeco.ca','6'),(155,'In recovery','Barb','bdvern@cogeco.ca','6'),(156,'In Surgery','Barb','bdvern@cogeco.ca','6'),(157,'Kathie','Barb','bdvern@cogeco.ca','6'),(158,'Kim & Mat','Barb','bdvern@cogeco.ca','6'),(159,'Kim','Barb','bdvern@cogeco.ca','6'),(160,'Kristi & Cathy','Barb','bdvern@cogeco.ca','6'),(161,'Krista','Barb','bdvern@cogeco.ca','6'),(162,'Krista 2','Barb','bdvern@cogeco.ca','6'),(163,'Lee, Dr. Nina & Lucy','Barb','bdvern@cogeco.ca','6'),(164,'Lucy & Kim','Barb','bdvern@cogeco.ca','6'),(165,'Lucy and cat','Barb','bdvern@cogeco.ca','6'),(166,'Mary','Barb','bdvern@cogeco.ca','6'),(167,'Mat & Betty','Barb','bdvern@cogeco.ca','6'),(168,'Recovery, Sharon','Barb','bdvern@cogeco.ca','6'),(169,'Recovery, Sharon','Barb','bdvern@cogeco.ca','6'),(170,'Recovery','Barb','bdvern@cogeco.ca','6'),(171,'Recovery 2','Barb','bdvern@cogeco.ca','6'),(172,'Snoopy','Barb','bdvern@cogeco.ca','6'),(173,'Surgery','Barb','bdvern@cogeco.ca','6'),(174,'Teamwork','Barb','bdvern@cogeco.ca','6'),(175,'Tracy','Barb','bdvern@cogeco.ca','6'),(176,'Betty','Barb','bdvern@cogeco.ca','7'),(177,'Volunteers','Barb','bdvern@cogeco.ca','7'),(178,'Black Cat prep','Barb','bdvern@cogeco.ca','7'),(179,'Cathy','Barb','bdvern@cogeco.ca','7'),(180,'Dr Murray','Barb','bdvern@cogeco.ca','7'),(181,'Dr Murray 2','Barb','bdvern@cogeco.ca','7'),(182,'untitled','Barb','bdvern@cogeco.ca','7'),(183,'Ear tip For Identification','Barb','bdvern@cogeco.ca','7'),(184,'End Of The Night','Barb','bdvern@cogeco.ca','7'),(185,'Getting Ready','Barb','bdvern@cogeco.ca','7'),(186,'Kristi, not at the RDS','Barb','bdvern@cogeco.ca','7'),(187,'Learning','Barb','bdvern@cogeco.ca','7'),(188,'Learning 2','Barb','bdvern@cogeco.ca','7'),(189,'Prep 1','Barb','bdvern@cogeco.ca','7'),(190,'Prep 2','Barb','bdvern@cogeco.ca','7'),(191,'Prep 3','Barb','bdvern@cogeco.ca','7'),(192,'Prep 4','Barb','bdvern@cogeco.ca','7'),(193,'Prep 5','Barb','bdvern@cogeco.ca','7'),(194,'Recovery','Barb','bdvern@cogeco.ca','7'),(195,'Recovery 2','Barb','bdvern@cogeco.ca','7'),(196,'Recovery Team','Barb','bdvern@cogeco.ca','7'),(197,'Sue In Recovery','Barb','bdvern@cogeco.ca','7'),(198,'Teaching','Barb','bdvern@cogeco.ca','7'),(199,'Tracy','Barb','bdvern@cogeco.ca','7'),(200,'Tracy 2','Barb','bdvern@cogeco.ca','7'),(201,'Tracy, Sue, Gloria','Barb','bdvern@cogeco.ca','7'),(1000,'Syringe for Crystal Bowl','Barb','bdvern@cogeco.ca','8'),(203,'','Barb','bdvern@cogeco.ca','9'),(1001,'Crystal Bowl for Necklace','Barb','bdvern@cogeco.ca','8'),(1002,'Necklace for Candlesticks','Barb','bdvern@cogeco.ca','8'),(202,'','Barb','bdvern@cogeco.ca','9'),(204,'','Barb','bdvern@cogeco.ca','9'),(205,'','Barb','bdvern@cogeco.ca','9'),(206,'','Barb','bdvern@cogeco.ca','9'),(207,'','Barb','bdvern@cogeco.ca','9'),(208,'','Barb','bdvern@cogeco.ca','9'),(209,'','Barb','bdvern@cogeco.ca','9'),(210,'','Barb','bdvern@cogeco.ca','9'),(211,'','Barb','bdvern@cogeco.ca','9'),(212,'','Barb','bdvern@cogeco.ca','9'),(213,'','Barb','bdvern@cogeco.ca','9'),(214,'','Barb','bdvern@cogeco.ca','9'),(215,'','Barb','bdvern@cogeco.ca','9'),(216,'','Barb','bdvern@cogeco.ca','9'),(217,'','Barb','bdvern@cogeco.ca','9'),(218,'','Barb','bdvern@cogeco.ca','9'),(219,'netherlans horse rescue','Barb','bdvern@cogeco.ca','9'),(220,'thank you Jane','Barb','bdvern@cogeco.ca','9'),(221,'thank you Jennifer','Barb','bdvern@cogeco.ca','9'),(222,'thank you Julia','Barb','bdvern@cogeco.ca','9'),(223,'thank you Sue','Barb','bdvern@cogeco.ca','9'),(224,'thank you Sybille','Barb','bdvern@cogeco.ca','9'),(225,'The Buttery','Barb','bdvern@cogeco.ca','9'),(226,'','Barb','bdvern@cogeco.ca','10'),(227,'','Barb','bdvern@cogeco.ca','10'),(228,'','Barb','bdvern@cogeco.ca','10'),(229,'','Barb','bdvern@cogeco.ca','10'),(230,'','Barb','bdvern@cogeco.ca','9'),(231,'ho ho ho','Barb','bdvern@cogeco.ca','10'),(232,'meow meow','Barb','bdvern@cogeco.ca','10'),(233,'meow','Barb','bdvern@cogeco.ca','10'),(234,'my reindeer','Barb','bdvern@cogeco.ca','10'),(235,'picasso (steph)','Barb','bdvern@cogeco.ca','10'),(236,'tiger','Barb','bdvern@cogeco.ca','10'),(237,'who\'s that cat','Barb','bdvern@cogeco.ca','10'),(238,'canada eh','Barb','bdvern@cogeco.ca','11'),(239,'canada','Barb','bdvern@cogeco.ca','11'),(240,'canadian elf','Barb','bdvern@cogeco.ca','11'),(241,'','Barb','bdvern@cogeco.ca','11'),(242,'','Barb','bdvern@cogeco.ca','11'),(243,'julia and kitties','Barb','bdvern@cogeco.ca','11'),(244,'julia elf','Barb','bdvern@cogeco.ca','11'),(245,'karen','Barb','bdvern@cogeco.ca','11'),(246,'mary','Barb','bdvern@cogeco.ca','11'),(247,'michael','Barb','bdvern@cogeco.ca','11'),(248,'patti and annie','Barb','bdvern@cogeco.ca','11'),(249,'peanut\'s new mom karen','Barb','bdvern@cogeco.ca','11'),(250,'steph and erin kittie cats','Barb','bdvern@cogeco.ca','11'),(251,'cat quarters christmas','Barb','bdvern@cogeco.ca','12'),(252,'elf Julia','Barb','bdvern@cogeco.ca','12'),(253,'elf Mary','Barb','bdvern@cogeco.ca','12'),(254,'John and Gladys','Barb','bdvern@cogeco.ca','12'),(255,'marylou julia  karen mary barb(front)','Barb','bdvern@cogeco.ca','12'),(256,'Polly','Barb','bdvern@cogeco.ca','12');
UNLOCK TABLES;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;

--
-- Table structure for table `gallery_comment`
--

DROP TABLE IF EXISTS `gallery_comment`;
CREATE TABLE `gallery_comment` (
  `id` int(5) NOT NULL auto_increment,
  `photo_id` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7941 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_comment`
--


/*!40000 ALTER TABLE `gallery_comment` DISABLE KEYS */;
LOCK TABLES `gallery_comment` WRITE;
INSERT INTO `gallery_comment` VALUES (14,'14','barb','kittens have been adopted and have a home','',''),(13,'3','barb','cleo has been adopted and has a home','',''),(12,'1','barb','candy has been adopted and has a home','',''),(10,'15','barb','this picture is called lucy. \r\nthis gallery is looking good','',''),(11,'15','Kevin','That was a typ0, I have changed it now','',''),(15,'20','barb','percy has been adopted and has a home','',''),(16,'15','nancy little','hey lucy! what are you doing ? good action pick.\r\n  be sure to ask me again to help. would love to.\r\ngood job !','',''),(17,'18','dusty','this is my barn cat...shes not for adoption:P','',''),(21,'6','dale baer','you got to admit- she\'s a cutie!!\r\n','',''),(22,'22','barb','on tuesday sept 2 storm was adopted!','',''),(25,'4','barb','beautiful crunchie has a home, adopted oct 4.','',''),(26,'137','brittany','Nice outfit','',''),(27,'175','Kevin','Oh God... to think I am married to her.','',''),(28,'31','Wendi','Wow...what a beautiful cat. Is she/he a feral cat??? Keep up the good work. I have alot of praise for all of you. Wendi','24.36.210.103','10:55:33, 01.04.2009'),(7938,'1001','','Rick receiving the fruit bowl in exchange for a 10k necklace','',''),(7937,'1000','','Gerrie receiving the blue syringe in exchange for her crystal fruit bowl.','',''),(7939,'1002','','Gerrie receiving the 10k necklace for 2 etched real crystal candlesticks.','','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `gallery_comment` ENABLE KEYS */;

--
-- Table structure for table `gallery_event`
--

DROP TABLE IF EXISTS `gallery_event`;
CREATE TABLE `gallery_event` (
  `id` int(5) NOT NULL auto_increment,
  `event` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_event`
--


/*!40000 ALTER TABLE `gallery_event` DISABLE KEYS */;
LOCK TABLES `gallery_event` WRITE;
INSERT INTO `gallery_event` VALUES (0,'Bake Sale at Pet Valu, Glendale','2008-08-09','<P>Thanks to all the volunteers for a successful BBQ and Bake Sale at the Pendale Plaza on Saturday August 9th.  We had a fantastic group of volunteers and hopefully everyone had fun and enjoyed the food.  I know I did.  After expenses, we raised $465.63.\r\n<P>\r\nThe baking was amazing - thanks so much to all the bakers.  And to all those who have a sweet tooth!  There was very little left and Donna & Dayle had sold almost all the rest in the store by the time I left.\r\n<P>\r\nThanks to Donna & Dayle for all their help and hosting the event at Pet Valu and for their suggestion to have the bake sale!\r\n<P>\r\nThanks to the weather too!  In spite of being \"skyjacked\" by fences and equipment, everything seemed to work out well and we had great weather.\r\n<P>\r\nThanks to Sue who added yet more fun to the day.  I think I bought something everytime I walked by her yard sale!\r\n<P>\r\nThanks to Dr. Murray for all her efforts to resolve the overpopulation problem and who inspires the rest of us to try to help.\r\n<P>\r\nLucy'),(1,'Wild Cat Wednesday','2008-08-13',''),(2,'Grape & Wine Festival','2008-09-27',''),(3,'Wild Cat Wednesday','2008-11-19',''),(4,'Silent Auction','2008-12-15','<P>We are having a silent auction and people can go to <A HREF=\"#\" onClick=window.open(\"directions.html\",null,\"statusbar=no,menubar=no,toolbar=no,height=680,width=560\")>Court Animal Hospital</A> to place their bids on these 8 pictures. It closes Dec 15.'),(5,'Santa Parade 2008','2008-11-30','<P>6th Annual St. Catharines Santa Claus Parade and party at Market Square'),(6,'spay/neuter clinic','2009-02-10',''),(7,'Charlie\'s angels volunteer training, at MCM','2009-05-11',''),(8,'One Blur Syringe Barter','2009-10-26','<P>Starting with one syringe filled with blue die, we are going to make continuous trades until we reach our goal of a building operating as a spay/neuter clinic and Cat QUARTERS (a socialization home for fostering cats and kittens).\r\n<P>We would like to thank everyone who has generously donated to make this dream a reality.'),(9,'Operation NorthStar Conference','2009-11-21','<P>We would like to thank all those who attended the conference.'),(10,'Home For The Holidays','2009-11-28','<P>stay tuned for more exciting events as we work to make niagara a no kill community.<p>Thanks to all your efforts , we were able to adopt over 80 cats and kittens into their new homes.\r\nthe home for the holidays was a great success and we thank you all.'),(11,'Home For The Holidays','2009-12-07','<P>stay tuned for more exciting events as we work to make niagara a no kill community.<p>Thanks to all your efforts , we were able to adopt over 80 cats and kittens into their new homes.\r\nthe home for the holidays was a great success and we thank you all.'),(12,'2009 christmas','2009-12-28','<P>From the board of CAAN to all the volunteers supporters, donors, a thank-you  and best wishes for the new year.');
UNLOCK TABLES;
/*!40000 ALTER TABLE `gallery_event` ENABLE KEYS */;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(5) NOT NULL auto_increment,
  `url` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `desc` varchar(310) NOT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_3` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--


/*!40000 ALTER TABLE `links` DISABLE KEYS */;
LOCK TABLES `links` WRITE;
INSERT INTO `links` VALUES (1,'www.nokilladvocacycenter.org','No Kill Community','The No Kill Advocacy Center is the nation’s first organization dedicated solely to the promotion of a No Kill nation. And it is the only national animal welfare agency that is staffed by people who have actually worked in and created a No Kill community.','charlie'),(2,'www.alleycat.org','Alley Cat Allies','Through outreach, education, and community building, Alley Cat Allies serves as the expert on Trap-Neuter-Return and supports the efforts of citizens humanely caring for cats.','charlie'),(3,'www.petfinder.com','Pet Finder','Petfinder is an on-line, searchable database of animals that need homes. It is also a directory of over 10,000 animal shelters and adoption organizations across the USA, Canada and Mexico.','charlie'),(4,'www.petfinder.com/shelters/ON138.html','Kitty Cat Keep','Kitty Cat Keep is a no-kill, non-profit, 100% volunteer animal rescue group who deal mainly with the \"strays\" and \"throwaways\" in the Niagara Region.','charlie'),(5,'www.places4paws.ca','Places for Paws','\"Places for Paws\" is your one stop shop to locate everything relating to your dog, including; off-leash parks, pet friendly restaurants and accommodation and vet clinics.','charlie'),(6,'www.pawsniagara.com/','P.A.W.S.','<B>PAWS NIAGARA</B> is a consortium of a number of local agencies and is a volunteer driven program. It is designed to improve the quality of life of people with disabling or terminal illnesses by preserving and promoting the human/pet bond.','assist'),(7,'www.niagaraactionforanimals.org','N.A.f.A.','Niagara Action for Animals (NAfA) is an all-volunteer, registered charity that works through public education and community assistance to foster a more compassionate society which respects the innate worth of all beings.','assist'),(8,'www.lchs.ca/','St. Catharines','','humane'),(9,'www.wellandhumanesociety.org/','Welland','','humane'),(10,'www.niagarafallshumanesociety.com/','Niagara Falls','','humane'),(11,'www.forteriespca.org/','Fort Erie','','humane'),(14,'','','Animal Assistance\r\n contact 905-322-6429','assist'),(16,'www.alleycat.org/NetCommunity/Document.Doc?id=36','feral cat housing','feral cat housing from alley cat allies','charlie'),(17,'www.neighborhoodcats.org/info/wintershelter.htm','feral cat housing','feral cat housing from neighborhood cats','charlie'),(19,'','TEARS ( the exotic animal rescue society)','TEARS rescues abused and abandoned exotics and rehabilitates see Keytra\'s picture on our adoptions page (she is not for adoption) please donate to TEARS to help Keytra, she hurt her foot and needed surgery today (june 1, 2009) tearsociety@hotmail.com or look us up on facebook','charlie'),(22,'www.missingpetpartnership.org','Missing Pet Partnership ','national, (USA)nonprofit organization dedicated to reuniting lost companion animals with their owners/guardians. We offer behavior-based lost pet recovery tips, referrals to lost pet services, and Missing Animal Response (MAR) seminars that train professional and volunteer pet detectives.','charlie'),(21,'www.flickr.com/photos/jennyjenna','Jennifer McCready Photography','Jennifer volunteers with us and captures the essence of the kitty cats with her excellent photography that we then use as our adoption pictures to find homes for the cats thanks jennifer','charlie'),(24,'www.uan.org','United Animal Nations','United Animal Nations (UAN) is recognized as North AMerica\'s leading provider of emergency animal sheltering and disaster relief services and a key advocate for the critical needs of animals. UAN deploys Emergency Animal Rescue Service (EARS) volunteers when formally invited by an agency in need.','assist');
UNLOCK TABLES;
/*!40000 ALTER TABLE `links` ENABLE KEYS */;

--
-- Table structure for table `lost_found`
--

DROP TABLE IF EXISTS `lost_found`;
CREATE TABLE `lost_found` (
  `id` int(5) NOT NULL auto_increment,
  `lost_found` varchar(10) NOT NULL,
  `aname` varchar(15) NOT NULL,
  `acolour` varchar(30) NOT NULL,
  `adesc` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `alocal` varchar(300) NOT NULL,
  `pname` varchar(15) NOT NULL,
  `tel1` varchar(3) NOT NULL,
  `tel2` varchar(3) NOT NULL,
  `tel3` varchar(4) NOT NULL,
  `pemail` varchar(50) NOT NULL,
  `reward` varchar(5) NOT NULL default 'no',
  `rewardd` varchar(10) NOT NULL,
  `verified` varchar(5) NOT NULL default 'no',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lost_found`
--


/*!40000 ALTER TABLE `lost_found` DISABLE KEYS */;
LOCK TABLES `lost_found` WRITE;
INSERT INTO `lost_found` VALUES (2,'Lost','Gizzy','Calico','9 yr old female, she is really friendly and will come when her name is called.','2009-04-09','The Berkley Drive (Bunting/Carlton) area.','Lisa Avery','905','935','9043','','no','','yes'),(1,'Lost','Mack','Solid gray (no pattern)',' 4 white paws, white chest, white flash between eyes, white patches on belly, gray nose; some white near mouth, micro-chipped; neutered male, 1 yr old.','2008-08-30','Near lock 7 in Thorold','','905','227','9722','','yes','','yes'),(3,'Found','unknown','charcoal grey','He is charcoal grey and about 2 months old. Scared of dogs, but otherwise very affectionate and smart','2009-07-12','Close to Edgemere Road and Kraft Road in Fort Erie.',' Marcie','905','871','2577','','no','','yes'),(50,'lost','Sylvester','black and white','Sylvester has been missing since Thurs. Sept. 10th, last seen that morning.  He is a very friendly cat, he would approach anyone.  A good word to describe him is debonaire.  He kinda has this snobbyness about him.  He is very heavy to pick up, but he is not fat, just big.','2009-09-10','Rockwood Avenue area','Kathryn or Marc','905','687','2539','','yes','','yes');
UNLOCK TABLES;
/*!40000 ALTER TABLE `lost_found` ENABLE KEYS */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(5) NOT NULL auto_increment,
  `page` varchar(25) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date` varchar(20) NOT NULL,
  `bold` varchar(10) NOT NULL,
  `italic` varchar(10) NOT NULL,
  `color` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--


/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
LOCK TABLES `messages` WRITE;
INSERT INTO `messages` VALUES (1,'meeting','next feral support mtg Monday May 3rd at 7:30 p.m.,CatQuarters 144 Church St.#1,St. Catharines\" please see the blog for \'spay\'ghetti fundraiser info \" \" ','2010-04-16','bold','','darkblue'),(2,'catmobile','we are now operation MAD CAT and In 2009 we have s/n 312 cats, thank you. Our Penn centre visit was a great success and thanks to all who visited and volunteereed','2010-02-12','bold','','darkred'),(3,'sale','we need people to sponsor MAD CAT MONDAY\'S. your $500. will spay neuter microchip vaccinate deworm deflea between 10-15 stray/feral cats. sponsors receive a certificate to display in their home or business, exposure on our website, and a display at the participating clinic. thank-you\"  \r\n \r\n','2009-04-24','bold','','darkred'),(4,'adoptions','Foster homes needed, please contact905-401-0016 see \"about us \"page for info ONE BLUE SYRINGE BARTER\" .. Cat litter and food needed at Cat Quarters','2009-12-18','','','black');
UNLOCK TABLES;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

--
-- Table structure for table `volunteers`
--

DROP TABLE IF EXISTS `volunteers`;
CREATE TABLE `volunteers` (
  `id` int(6) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `loads` varchar(25) NOT NULL,
  `loade` varchar(25) NOT NULL,
  `theres` varchar(25) NOT NULL,
  `theree` varchar(25) NOT NULL,
  `uloads` varchar(25) NOT NULL,
  `uloade` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `volunteers`
--


/*!40000 ALTER TABLE `volunteers` DISABLE KEYS */;
LOCK TABLES `volunteers` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `volunteers` ENABLE KEYS */;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `id` int(25) NOT NULL auto_increment,
  `needs` varchar(1000) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--


/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
LOCK TABLES `wishlist` WRITE;
INSERT INTO `wishlist` VALUES (1,'');
UNLOCK TABLES;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

