-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2021 at 08:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `paid` bigint(11) NOT NULL,
  `others` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`id`, `username`, `paid`, `others`, `date`) VALUES
(2, 'John Doe', 10000, 'Tithe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `cell` varchar(12) NOT NULL,
  `capacity` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `capital` bigint(12) NOT NULL,
  `account` varchar(15) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`id`, `name`, `location`, `cell`, `capacity`, `address`, `type`, `capital`, `account`, `rating`) VALUES
(1, 'Deliverance Church Thika', 'Kiambu', '0712948663', 1000, 'General Kago Road', 'Main Church', 500000, '1001', 1),
(2, 'Deliverance Church Nairobi', 'Nairobi', '0798765432', 5000, 'Tom Mboya Street', 'Main Church', 1000000, '1234', 5),
(3, 'Deliverance Church Kabati', 'Kitui', '0711223344', 2000, 'Kabati - Kitui', 'Branch', 1000000, '202020', 7),
(4, 'Deliverance Church Eldoret', 'Uasin Gishu', '0755653267', 10000, '30100', 'Branch', 5000000, '202020', 8);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `rsvp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event`, `date`, `venue`, `rsvp`) VALUES
(1, 'National Youth Camp Meeting', '2020-07-01', 'Deliverance Church Nairobi', '0712345678'),
(3, 'Leaders VConference', '2020-03-21', 'Deliverance Church Kabati', '0711223344');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `min`, `max`) VALUES
(1, 'Youth', 15, 25),
(2, 'Leaders', 30, 60);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `district` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `district`, `country`) VALUES
(1, 'Central ', 'Kenya'),
(2, 'Kitui', 'Kenya'),
(3, 'Nairobi', 'Kenya'),
(4, 'Uasin Gishu', 'Kenya'),
(5, 'Mombasa', 'Kenya');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `natid` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cell` varchar(12) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `baptism` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `money` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `natid`, `gender`, `dob`, `type`, `username`, `password`, `address`, `cell`, `branch`, `baptism`, `email`, `money`) VALUES
(1, 'John Doe', '1900835', 'Male', '1998-08-03', 'Youth', 'john', '202020', 'MKU', '0712948663', 'Thika Church', '2017-12-02', '', 0),
(2, 'Mary Smith', '0856645', 'Female', '1996-05-08', 'Youth', 'mary', '202020', 'South B', '', 'Nairobi Church', '2017-05-20', '', 0),
(5, 'Billy Dan', '111222', 'Male', '2000-12-12', 'Youth', 'dan', '202020', 'Thika', '0755653267', 'Deliverance Church Nairobi', '2020-05-03', '', 0),
(6, 'Him His', '123456', 'Male', '1990-12-12', 'Young Adult', 'him', '202020', 'Nairobi', '1234567890', 'Deliverance Church Nairobi', '2019-08-16', 'test@test.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Pastor'),
(2, 'Deacon'),
(3, 'Deaconess'),
(4, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `sermons`
--

CREATE TABLE `sermons` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `date` date NOT NULL,
  `sermon` text NOT NULL,
  `verse` text NOT NULL,
  `preacher` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sermons`
--

INSERT INTO `sermons` (`id`, `topic`, `date`, `sermon`, `verse`, `preacher`) VALUES
(1, '5 Reasons Why Obedience Will Draw You Closer to God', '2020-03-04', 'Anyone who wants to know God—to walk closely with Him—must obey Him. Sounds like a strong statement, doesn’t it? But there is no way that we can come into a close relationship with the Lord, walk fully in THE BLESSING and enjoy the communion that our spirits desire without obeying Him.\r\nIf we will walk with Him, obey His Word, and follow the direction and leading of the Holy Spirit, then we will enjoy the close relationship that we desire and relish the benefits of that relationship. Here are five reasons why obedience will draw you closer to the Lord:\r\n\r\n \r\n\r\nReason No. 1: When you are obedient, you can walk with God.\r\nNo one can walk with God without being obedient. Just look at these three examples of people in the Old Testament who enjoyed walking closely with the Lord, and note how obedience played an important part in that relationship for each of them.\r\n\r\n \r\n\r\nEnoch\r\nThe Word records that “Enoch lived in close fellowship with God” for 300 years (Genesis 5:22)! Imagine spending 300 earthly years in close fellowship with the Lord—obeying His commands, learning His ways, and caring for the things that most concern Him. That was Enoch’s life. And the result? Scripture tells us that Enoch did not experience an earthly death. Instead, “he disappeared, because God took him” (verse 24).\r\n\r\n \r\n\r\nNoah\r\nNoah lived during a dark time. Scripture tells us that evil had grown to such an extent on the earth that “the Lord was sorry he had ever made [humanity]” (Genesis 6:6).\r\n\r\nThen He said He would “wipe this human race I have created from the face of the earth. Yes, and I will destroy every living thing” (verse 7). It was a desolate time, but then the Lord looked and saw Noah. The Word notes that “Noah found favor with the Lord” (verse 8). Instead of conforming to the wickedness of the civilization around him, Noah upheld morality and goodness. The result of Noah’s obedience was that he and his entire family were saved from the flood that destroyed every other living thing on earth.\r\n\r\n \r\n\r\nAdam\r\nWe all know about Adam’s failure, but consider his life before that detrimental mistake. He had walked in communion—daily relationship—with the Lord. God had breathed life into him (Genesis 2:7), set him in the magnificent Garden of Eden where all his needs were met (verse 15) and then gave him the privilege of naming all the animals (verse 19). That was the result of Adam’s obedience. He was set with a blessed life! In fact, his wife, Eve, was too. They only needed to continue to obey the Lord. Sadly, Adam followed the enemy’s voice instead and betrayed the trust that God had placed in him. That disobedience cost Adam big! He and Eve were thrown out of the Garden, forfeited THE BLESSING, and endured hardship the rest of their lives.\r\n\r\n \r\n\r\nReason No. 2: When you are obedient, you can obey God’s voice.\r\nThere are many good and kind people in the world who are without a relationship with the Lord and therefore cannot hear and follow His voice. As believers, we, on the other hand, have the ability to follow God and obey His voice. This is a privilege that belongs to His children. We can know His voice and nature through His Word, His Holy Spirit, and the wisdom He gives to other believers (i.e., pastors, ministers, mentors, prayer partners, godly friends, etc.).\r\n\r\n \r\n\r\nDeuteronomy 4:5-6 says, “Look, I now teach you these decrees and regulations just as the Lord my God commanded me, so that you may obey them in the land you are about to enter and occupy. Obey them completely, and you will display your wisdom and intelligence among the surrounding nations.”\r\n\r\n \r\n\r\nWhen we follow God’s voice, we help others see His wisdom and hopefully draw them to Him, too.\r\n\r\n \r\n\r\nReason No. 3: When you are obedient, you will be blessed.\r\nGod promises that if we will obey Him, blessings will follow. Just look at these verses that show the connection between God’s BLESSING and obedience:\r\n\r\nJoshua 1:8: “Study this Book of Instruction continually. Meditate on it day and\r\nnight so you will be sure to obey everything written in it. Only then will you prosper and succeed in all you do.”\r\nIsaiah 1:19: “If you will only obey me, you will have plenty to eat.”\r\nJohn 14:21: “Those who accept my commandments and obey them are the ones who love me. And because they love me, my Father will love them. And I will love them and reveal myself to each of them.”\r\n \r\n\r\nWhile God loves and shows favor to all of His children, Scripture is clear that there is an inherent blessing that comes as a result of obedience.\r\n\r\n \r\n\r\nReason No. 4: When you are obedient, you’re choosing God’s best.\r\nGod’s love for us is clear from the sacrifice He arranged through Jesus Christ. And by the power of His Holy Spirit, He drew us to Him and adopted us into His family. We can’t lose His love. But God is not a tyrant. He does not force His will on us. He always gives us the choice of whether to follow Him or not. If we follow Him, then we receive the privilege of THE BLESSING (see Reason No. 3). If we choose not to follow Him—to walk in disobedience—then we walk outside of that BLESSING. It’s our choice, one He has given to all His children throughout history.\r\n\r\n \r\n\r\n“‘Come now, let’s settle this,’ says the Lord. ‘Though your sins are like scarlet, I will make them as white as snow. Though they are red like crimson, I will make them as white as wool. If you will only obey me, you will have plenty to eat. But if you turn away and refuse to listen, you will be devoured by the sword of your enemies. I, the Lord, have spoken’” (Isaiah 1:18-20)!\r\n\r\n \r\n\r\nWe may choose to blatantly disobey the Lord by rebelling against Him and His Word. This is the case when we turn our backs on the Word, follow our own ways and knowingly sin. However, not all obedience is active; some is passive. Passive disobedience is much subtler. It may be allowing old ways of thinking (i.e., worldly carnal thinking or religious mindsets) to seep into our thinking instead of basing our thoughts on God’s Word. Disobedience can even include holding on to misinformation or remaining ignorant of the things of God.\r\n\r\n \r\n\r\n“How can we be held accountable for things we don’t know?” you might ask.\r\n\r\n \r\n\r\nWe can be because He has already given us His manual for living—His Word. We have the responsibility to open that Word, read it, meditate on it and allow it to shape our thinking. That is what obedience allows us—and requires us—to do.\r\n\r\n \r\n\r\nReason No. 5: When you are obedient, you’re trusting God to be God.\r\nObeying God means moving aside and allowing God—His Word, His Holy Spirit and His way of operating—to move in our lives. It means trusting (having faith) that He will be true to His Word. When we obey, we don’t try to control our lives and the situations around us by our own human strength. Instead, we focus on the Lord by keeping Him and His Word before our eyes and allowing Him to have His way and trusting that He will fulfill His promises.\r\n\r\n \r\n\r\nWe cannot claim to love God without obeying Him and His Word. Let’s commit to obey Him with heartfelt love and show an appreciation for all He has done for us. We serve a big, magnificent, awe-inspiring God. Let’s obey Him immediately and wholeheartedly so we can walk with Him closely and enjoy the benefits of our obedience!', 'Genesis 5:22, Genesis 6:6, Joshua 1:8, Isaiah 1:19', 'Pastor '),
(2, 'How to Show Love and Respect to Others', '2020-03-07', 'Introduction\r\nThe Bible says we are to love one another. Sounds good, but can we do it? Whoever said, \"I love mankind; it\'s people I can\'t stand,\" was about right.\r\n\r\nPeople are just irritating. I agree with the guy who said, \"To live above with those we love, oh, how that will be glory. To live below with those we know, now that\'s another story.\r\n\r\nEven people at church can be difficult to love. Sometimes we sing a chorus in church: \"I\'m so glad you\'re a part of the family of God,\" and then we look at the person beside us and sing, \"I\'m surprised you\'re part of the family of God.\"\r\n\r\nSometimes it\'s hard enough to love our own family. One guy told his wife that if she had really loved him she would have married someone else.\r\n\r\nHow do we make love a dominating characteristic of our lives?\r\n\r\nI. Make love a priority\r\nIndeed loving people is difficult. Yet this is what the Bible commands. \"For this is the message you have heard from the beginning: we should love one another\" (1 John 3:11). We spend time on what we deem important. For many of us these choices are valid: time with family and friends, work, prayer, serving the poor, fighting for rights, protesting wrongs. But as the Scripture reminds us, \"And if I donate all my goods to feed the poor, and if I give my body in order to boast but do not have love, I gain nothing\" (1 Cor. 13:3).\r\n\r\nEven though we have the freedom to set our own priorities, Jesus made a point of defining certain ones of them for us: \"\'Love the Lord your God with all your heart, with all your soul, and with all your mind.\' This is the greatest and most important commandment. The second is like it: \'Love your neighbor as yourself\'\" (Matt. 22:37-39). Love, then, is not a gray area the Scriptures. Jesus gave love priority over all other Christian virtues. Every thought, response, and act of goodwill must first pass through the fine filter of love, or it means nothing at all.\r\n\r\nIn \"Strength to Love\", Martin Luther King, Jr., encouraged us to realize that \"our responsibility as Christians is to discover the meaning of this command and seek passionately to live it out in our daily lives.\" But why love? What makes it so important?\r\n\r\nII. Understand the importance of love\r\nWhen Jesus spoke to the disciples regarding the first and second greatest commands, he explained that \"All the Law and the Prophets depend on these two commands\" (Matt. 22:40).\r\n\r\nTo the people of Israel, as well as for many believers today, it would seem more logical for obedience to be the peg from which the Law hangs, since the point of writing a law is adherence to it. And it is written, \"If you love Me, you will keep My commandments\" (John 14:15). Yet Jesus also said, \"I give you a new commandment: love one another. Just as I have loved you, you must also love one another\" (John 13:34). The apostle Paul goes on to tell us \"Love does no wrong to a neighbor. Love, therefore, is the fulfillment of the law\" (Rom. 13:10).\r\n\r\nThis may sound irrelevant to our generation that depends on police departments, guns, and force to uphold and fulfill the law. Yet Jesus\' simple command requires greater strength than any of us naturally possess - more power than any man-made weapon.\r\n\r\nThe logic of Paul\'s interpretation of Jesus\' command that love fulfills the Law seems equally simple. For if one loves his neighbor, he will not commit adultery with his neighbor\'s spouse. If he loves his coworker, he will not lie to him. And if loves his enemy, he will not slander him. Love fulfills the law, because if we truly love every person because he is a person, we will not desire to hurt or violate him or her, thus never break the law. God established love as the impetus for obedience.\r\n\r\nIII. Embody the distinguishing nature of love\r\nWhen we demonstrate Christian love, it distinguishes believers from the rest of the world. Jesus goes on to say, \"By this [love] all people will know that you are My disciples, if you have love for one another\" (John 13:35). Notice Jesus did not say that people will know that you are my disciples if you promote my agenda, or wear Christian T-shirts or a WWJD bracelet, or have a fish decal on your car, but rather if you love one another. A watching world will be persuaded not when our values are promoted but when they are incarnated, when we become purveyors of love. It is as though Jesus has given the entire world the right to judge whether or not one is His follower simply on the basis of their love for fellow human beings. The vivacious virtue of love distinguishes the Christian.\r\n\r\nFrom the very beginning, God\'s plan was to develop a people that reflected his character. And what is his character? Love. \"God is love, and the one who remains in love remains in God, and God remains in him. In this, love is perfected with us so that we may have confidence in the day of judgment; for we are as He is in this world\" (1 John 4:16-17). Believers are God\'s advertisement to a watching society as to how individuals could best live in that society. In fact, Christian love will always be the best apologetic that the church has.\r\n\r\nWhen Ira Gillett, missionary to East Africa, returned home to report on his activities overseas, he related an interesting phenomenon. Repeatedly, Gillett had noticed how groups of Africans would walk past government hospitals and travel many extra miles to receive medical treatment at the missionary compound. He finally asked a particular group why they walked the extra distance when the same treatments were available at the government clinics. The reply: \"The medicines may be the same but the hands are different.\r\n\r\nThat\'s the virtue of love incarnated. That kind of love makes a difference. Christ has no hands, but our hands; no feet, but our feet. We are his ambassadors, representing him to the world. And when we love as he as loved us, it will make the difference. People will notice. Christian love is indispensable.\r\n\r\nIV. Demonstrate the virtue of love\r\nHow do we demonstrate the distinctiveness of Christian love? Because virtue is moral action we practice, How can we practice the glorious virtue of love?\r\n\r\nA. Love values the other person\r\nLet\'s not confuse Christian love with its modern counterfeits - lust, sentimentality, and gratification. While love is a wonderful, warm feeling, it is not only a feeling. In fact, according to the Bible, love is primarily an active interest in the well-being of another person. Love acts for the benefit of others. According to William Barclay love \"is the spirit in the heart that will never seek anything but the highest good of its fellow man.\"\r\n\r\nGod loved us not because we had something to offer him, but rather because He had something to offer us. \"For God loved the world in this way: He gave His One and Only Son, so that everyone who believes in Him will not perish but have eternal life\" (John 3:16). God loved us so that He could demonstrate His mercy to us in the person of His Son.\r\n\r\nDr. W.A. Criswell, former pastor of First Baptist Church, Dallas, Texas, officiated at a lot of weddings. The nervous groom would always say, \"Dr. Criswell, how much do I owe you for this?\" And he\'d always smile and look at the groom and say, \"Aw, just pay me what she\'s worth.\" Dr. Criswell made a lot of money from weddings, because to each man his new bride was of extravagant value.\r\n\r\nIn like manner, everyone around us is of incredible value to God as a potential object of His mercy. His one and only Son died in their place. Because people matter so much to him, they ought to matter to us. And, we, therefore, need to love them as he loves them.\r\n\r\nB. Love is vulnerable to the other\r\nIn other words, love opens up its life to another person. It goes beyond sentimental feelings. It breaks down barriers. It exposes the heart.\r\n\r\nThink about Jesus. He left the glory of heaven to come to earth. He veiled His divinity and took on humanity. And what did it get him? \"He came to His own, and His own people did not receive Him\" (John 1:11). Can you imagine being away on a business trip for a week, coming home, and your family not recognizing you? That\'s similar to what Jesus experienced when he came to earth. Surely that must have hurt. Then, as Jesus hung on the cross, dying for these people that he loved, they hurled abuses, scorn, and ridicule. His heart was broken. And yet, He forgave them.\r\n\r\nChristian love is the most costly investment you will ever make. C. S. Lewis, in The Four Loves, describes the vulnerable nature of love.\r\n\r\n\"To love is to be vulnerable. Love anything, and your heart will certainly be wrung and possibly broken. If you want to make sure of keeping it intact, you must give your heart to no one, not even to an animal. Wrap it carefully round with hobbies and little luxuries. Avoid all entanglements. Lock it up safe in the casket or coffin of your selfishness. But in that casket - safe, dark, motionless, airless - it will change. It will not be broken. Instead, it will become unbreakable, impenetrable, irredeemable.\r\n\r\nC. Love entails a cost\r\nIt gets its hands dirty. It takes a chance. It goes out on a limb. It takes a gamble. Love makes a statement and leaves a legacy. It does the unexpected, surprising, and stirring. It performs acts that steal the heart and leaves an impression on the soul. Often these acts are never forgotten.\r\n\r\nI recently read a moving story about the founder of World Vision, the international Christian relief agency. Bob Pierce had advanced leukemia, but he chose to visit a colleague in Indonesia before he died. As he and others walked together through a small village, they came upon a young girl lying on a bamboo mat next to a river. She was dying of cancer and had only a short time to live.\r\n\r\nBob was indignant. He demanded to know why she wasn\'t in a clinic. But his friend explained that she was from the jungle and wished to spend her last days next to the river, where it was cool and familiar.\r\n\r\nAs Bob gazed at her, he felt such compassion that he got down on his knees in the mud, took her hand, and began stroking it. Although she didn\'t understand him, he prayed for her. Afterwards she looked up and said something, \"What did she say? Bob asked his friend.\r\n\r\nHis friend replied, \"She said, \'If I could only sleep again, if I could only sleep again.\'\" It seemed that her pain was too great to allow her the relief of rest.\r\n\r\nBob began to weep. Then he reached into his pocket and took out his own sleeping pills, the ones his doctor had given him because the pain from his leukemia was too great for him to sleep at night.\r\n\r\nHe handed the bottle to his friend. \"You make sure this young lady gets a good night\'s sleep,\" he said, \"as long as these pills last.\"\r\n\r\nBob was ten days away from where he could get his prescription refilled. That meant ten painful and restless nights. That day his love cost him greatly. But even in the midst of his suffering, God infused him with a supernatural sense of satisfaction that he had done the right thing.\r\n\r\nI\'m not saying that we should constantly abuse ourselves or become passive doormats. But Christian love inevitably carries costs. Even when the cost is high, we can nevertheless count on God to bring fulfillment to His followers. True love always costs. If there is no cost there is no love.\r\n\r\nConclusion\r\nIn the end, the goal of the Christian life is love. The measure of our maturity is our love for God and our love for others. If we fail in our love we have missed what it means to be a Christian.\r\n\r\nBut there is hope for the one who has failed in love. At the beginning I asked the question, \"Can we do it?\" Can we love others in this way? The answer, I\'m afraid, is \"No.\" We cannot love others like Christ - without Christ. The Lord, who forgave even those who crucified Him, stands ready to forgive you of your lack of love. He wants to show His mercy toward you today, to cleanse your loveless heart and fill it with His loving Holy Spirit. Receive His mercy. Place your trust in Christ and let Him teach you how to love as He has loved you.', 'John 13', 'Bishop\r\n'),
(3, 'Parenthood', '2020-03-08', 'Perhaps we should begin with a question: “Do you believe the Bible?” If the Bible says whosoever calls on the Lord shall be saved, does it mean maybe, sometimes, or some folks? Are we “usually” or “maybe” forgiven? Of course not! When the Bible says something is a spiritual fact or promise, it is 100% true! You believe that, don’t you? Of course you do – yet this verse is hard to take at face value; you’ve seen too many apparent contradictions of it. Solomon may boast in the teaching of his father (Proverbs 4:1-4) and crown it with our text – “Train up a child in the way he should go: and when he is old he will not depart from it.” But it was no so in his own life (1 Kings 11:1-4). So what shall we make of this verse? Its promise is not always true in the same sense that the salvation facts the apostles proclaimed are true. The book of Proverbs is a collection of sayings: proverbs by which a person’s life can be rightly directed. These proverbs give us common sense principles for life.  Train Up a Child  So When we read Proverbs 22:6 and say a child who is trained up in a godly fashion will always return to his roots, no matter how far he roams, it is true as a general rule, but not absolutely and always true, because every child has his own free will. But there is enough promise in this verse to let us know, when we are raising our children, that it is not in vain; enough promise to comfort the faithful and broken heart when the child strays.  Children are the source of great joy: Proverbs 23:24-25; Psalms 127:3-5; Proverbs 17:6. They can also be the source of great sorrow. The same man who spoke of children as a joy, as arrows in a quiver and said, “Blessed is the man whose quiver is full of them ” – this was David, who also moaned those heartbroken words: “O Absalom, my son, my son. Would to God I had died for you! ” His son Solomon would have broken his heart, too, if David had lived to see his idolatry. Rebekah said twice in Genesis that the marriages of Esau were a “grief of mind” and that she was “weary of life” because of him.  The waywardness of children is no respecter of persons. I think of a dear friend in the ministry who had a child on drugs, wandering over the country for years. No parent can point a finger at any other parent, for children are not robots who can be completely controlled, even by a loving Christian parent. And I do not wish to heap a pile of guilt on parents who have done all they could to train up their children right, and still the result has not been anything to write home about. There are no perfect parents, but most Christian parents I know truly desire to impart their faith to their children, and do the best they can.', 'Proverbs 22:6', 'Dan Him');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cell` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `name`, `cell`, `email`, `role`, `station`) VALUES
(4, 'billy', '202020', 'Billy', '0712948663', '1@test.com', 'Pastor', 'Thika'),
(5, 'dan', '202020', 'Dan Him', '0776870658', '2#@test.com', 'Pastor', 'Nairobi'),
(8, 'mary', '202020', 'Mary Smith', '1020304050', '55@test.com', 'Deaconess', 'Eldoret');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `category`) VALUES
(2, 'Branch'),
(1, 'Main Church');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district` (`district`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sermons`
--
ALTER TABLE `sermons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year` (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sermons`
--
ALTER TABLE `sermons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
