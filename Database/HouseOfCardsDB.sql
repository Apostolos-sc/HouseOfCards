-- Author         : Sayma Haque
-- Date Created   : 12-02-2023
-- Last Edited By : Apostolos Scondrianis
-- Last Edited On : 03-03-2023
-- Filename       : HouseOfCardsDB.sql
-- Version        : 1.4
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 06:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HouseOfCardsDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `id` int(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `entryID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `positionID` int(10) NOT NULL,
  `postedOnDate` date,
  `postedOnTime` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`id`, `content`, `entryID`, `userID`, `positionID`, `postedOnDate`, `postedOnTime`) VALUES
(0, 'wow', 1, 1, 1, '2023-01-02', '07:23:10'),
(1, 'so cool', 1, 2, 2, '2023-01-03' , '12:11:20'),
(2, 'changed my life', 1, 3, 3, '2023-01-03', '13:12:15'),
(3, 'thumbs down', 2, 1, 1, '2023-02-01', '17:52:30'),
(4, 'get a life', 2, 2, 2, '2023-02-02', '23:15:15'),
(5, 'actually i agree with capital punishment', 2, 3, 3, '2023-02-03', '07:21:12'),
(6, 'pog', 2, 4, 4, '2023-02-04', '09:24:15'),
(7, 'pls send bob vagen', 3, 1 ,1, '2023-03-05', '07:15:21'),
(8, 'k.', 3, 2, 2, '2023-03-06', '16:23:15');


-- --------------------------------------------------------

--
-- Table structure for table `CommentReply`
--

CREATE TABLE `CommentReply` (
  `id` int(10) NOT NULL,
  `commentID` int(10) NOT NULL,
  `positionID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `content` varchar(200) NOT NULL,
  `postedOnDate` date,
  `postedOnTime` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CommentReply`
--

INSERT INTO `CommentReply` (`id`, `commentID`, `positionID`, `userID`, `content`, `postedOnDate`, `postedOnTime`) VALUES
(0, 0, 1, 3, 'cry abt it', '2023-02-01', '15:12:12'),
(1, 0, 2, 4, 'blah', '2023-02-02', '16:14:15'),
(2, 0, 3, 6, 'Jasmeender', '2023-02-03', '17:11:23'),
(3, 1, 1, 2, 'Siwon', '2023-01-05', '12:25:55'),
(4, 1, 2, 3, 'George', '2023-01-07', '16:35:25'),
(5, 3, 1, 1, 'Daniel', '2023-02-05', '12:45:55'),
(6, 3, 2, 5, 'Troy', '2023-02-06', '11:35:55'),
(7, 3, 3, 2, 'Barthalomew', '2023-02-07', '17:25:55'),
(8, 3, 4, 3, 'Putin', '2023-02-08', '18:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `id` int(10) NOT NULL,
  `entryID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`id`, `entryID`, `userID`, `rating`) VALUES
(0, 7, 0, 2),
(1, 3, 1, 4),
(2, 1, 2, 5),
(3, 6, 3, 2),
(4, 5, 4, 3),
(5, 2, 5, 1),
(6, 3, 6, 5),
(7, 8, 7, 2),
(8, 2, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wikiEntry`
--

CREATE TABLE `wikiEntry` (
  `id` int(10) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `requiredItems` varchar(200) NOT NULL,
  `objective` varchar(400) NOT NULL,
  `setUp` varchar(400) NOT NULL,
  `gamePlay` varchar(1500) NOT NULL,
  `rules` varchar(500) NOT NULL,
  `lastEditedBy` int(10) NOT NULL,
  `lastEditedDate` date,
  `lastEditedTime` time(6) DEFAULT NULL,
  `minPlayer` int(10) NOT NULL,
  `maxPlayer` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wikiEntry`
--

INSERT INTO `wikiEntry` (`id`, `gameName`, `requiredItems`, `objective`, `setUp`, `gamePlay`, `rules`, `lastEditedBy`, `lastEditedDate`, `lastEditedTime`, `minPlayer`, `maxPlayer`) VALUES
(0, 'Go Fish', '52 card deck', 'To win, a player must have the most sets of four matching number cards.', 'Deal seven cards (2-3 players) to each player or five cards (4-5 players), then place rest of the deck is placed between all players with additional room for placing the matching sets of cards.', 'During a players turn, the player may ask another player if they have a card, specifying the number. The player who was asked must give all cards of the number specified to the player who asked. If they do not have any cards of the specified number, they must say ""Gold Fish"", and the player who asked must draw a card from the deck. If a player does recieve one or more cards of that they asked for, their turn continues and they can ask any player for cards of a specific number again.\nWhen a player obtains all four cards of a number, they must place the set of cards face up in front of them for other players to see. The game ends when all thirteen sets of cards are placed face up, and the player with the most sets wins.', 'The cards rank from ace (high) to two (low). Suits are not important for this game.', 6, '2009-01-17', '15:15:15', 2, 5),
(1, 'Blackjack', '52 card deck', 'Each player attempts to beat the dealer by having a hand that adds up as close to 21 as possible, without going over 21.', 'One player must be designated as dealer. The dealer deals two cards face up to each player, however the dealer has one face up and one face down.', 'Each player must decide if they would like to get dealt another card (Hit) or remain with the cards they have (Stand). The dealer must deal out a card to any player who asks for a Hit, but if a player recieves a card and the total of their hand exceeds 21, they Bust, and lose the round. Once every player has Stand or has Bust, the dealer flips their face down card. If the dealers hand totals 16 or less, they must draw another card until their total is above 16. If the dealer Bust, each player who has not Bust wins the round. If there is a tie, neither dealer or player wins the round. \nIf any players get dealt a natural (a 10 or face card and an ace) they immediately win the round. If the dealer has a natural while any players do not have a natural, the dealer wins the round.','Face cards count for 10 points, and numbered cards count for their respective number value. Ace cards may count for 1 point or 11 points, each player may pick the value based on their needs during play. \nEach player can win or lose against the dealer, the results of one player does not impact the round for other players.', 6, '2009-01-17', '15:15:15', 2, 7),
(2, 'War', '52 card deck', 'Obtain the entire deck of cards.', 'Deal 26 cards (half the deck) to each player, the piles should be face down in front of each player.', 'Each round, each player will reveal the card on the top of their pile. The player with the higher card wins the round and takes both cards, placing them at the bottom of their pile. If there is a draw, both players will then reveal two more cards, one face down and one face up. The player with the higher card wins the round and takes all 6 cards. Repeat this process if another draw occurs. The player that obtains the entire deck of cards wins the game.', 'No additional rules', 6, '2009-01-17', '15:15:15', 2, 7),
(3, 'Thirty-One', '52 card deck', 'To win, a player must obtain a hand which is nearest to a total of 31 in cards of one suit during the showdown.', 'Deal three cards face down to each player, then place rest of the deck is placed between all players with additional room for a discard pile.', 'During a players turn, the player can choose to pick a card from the deck or discard pile and then they must discard a card. When a player is comfortable with their hand, they may call for a showdown by knocking on the table. Each player (not including the one who knocked) will have one more turn to try and improve their hand. The player with the lowest hand loses the round, and if the player who called for the showdown has the lowest hand, it counts as 2 losses. After losing 4 times, the player is out of the game. The last player left wins the game.', 'Face cards count for 10 points, Ace cards count for 11 points, and numbered cards count for their respective number value. A three of a kind is worth 30 points regardless of the card value.\n(Optional Rules) \nA hand greater than 31 will not be counted during the showdown.', 6, '2009-01-17', '15:15:15', 2, 10),
(4, 'Cheat', '52 card deck', 'To win, a player must play all their cards till hand is empty.', 'To win, a player must play all their cards till hand is empty.', 'On their turn, each player must place 1 to 4 cards face down on the table, they must announce how many of the card they have played. This statement does not need to be the truth. This process must start from aces, then proceed up to kings and starts over with aces again.\nAfter a player has played their cards and announced what they have played, any other player may call "Cheat" if they doubt the validity of the players move. The cards that were played are revealed and if the player did indeed play what they said they played, the player who called "Cheat" must take all the cards played up till this point. If the player did lie about what they played, they must take the cards.', '"Cheat" must be called before the next player plays their cards.', 6, '2009-01-17', '15:15:15', 2, 7),
(5, 'Speed', '52 card deck', 'To win, a player must play all their cards till their pile of cards is empty.', '"Place two cards beside each other, face down, between the players, then place two stacks of 5 cards, face down, on the outside of the two previous cards. \nSplit the rest of the deck between the players, this is their draw pile. Each player can draw 5 cards to their hand, leaving the rest of draw pile beside them."', 'Both players prepare to flip the 2 face down cards in the center, one player will countdown and then both players can flip the card. \nPlayers may play a card from their hand at anytime as long as it is 1 higher or lower in value than either of the face up cards in the center. Each player can draw cards from their draw pile until they have 5 cards. \nIf neither player has a card 1 higher or lower than either card in the center, then both players may agree to play a card from both relief piles (the stack of 5 cards placed beside the cards in the center). The game proceeds until one player plays all the cards in their draw pile and they win the game.', 'Players may not have more than 5 cards in their hand at any time. Both players must agree when to pull from the relief piles, counting down before doing so. An Ace can be played on a King and vice-versa.', 6, '2009-01-17', '15:15:15', 2, 7),
(6, 'Palace', '52 card deck', 'To win, a player must play all their cards till hand is empty.', '"Deal 3 cards to each player in three rows, they may not look at the cards. Then deal 6 cards as a hand to each player, they may look at the cards. Players select 3 cards from their hand to place on top of the 3 face down cards in front of them. \nThe rest of the deck is placed between the players as a draw pile, leaving room for a play pile. "', '"A card is drawn from the draw pile and placed in the play pile to start the game. \nOn a players turn, they must play a card of the same or higher value than the card on the top of the play pile. Multiple cards can be played as long as they are all equal. Players must draw cards to maintain a hand of 3 cards after playing a card. If a player does not have a card higher thant he card on top of the play pile, they must draw the entire play pile to their hand.\nOnce a players hand is empty, they must use the three face up cards in front of them to play their turn. After using up the face up cards, the player must then use the face down cards. When a player has played all their face down cards, they win the game.', 'Cards are ranked from (highest) Ace, King and down to 3 (lowest) \n2s reset the pile back down to 2, so the next player can play any card \n7s only allows the next player to play a card lower than 7 \n10s remove what is currently in the play pile from the game, the player who played it can play any card after', 6, '2009-01-17', '15:15:15', 2, 7),
(7, 'Trash', '52 card deck', 'To win, a player must be the first to complete a sequence of ten cards, from ace through ten', 'Deal ten cards to each player face down in two rows of five cards each. Players are not allowed to look at their cards. The remaining cards are placed face down to form the draw pile.', 'On their turn, the player draws a card from the draw pile. If the card is any card ace through ten, the player places that card in its correct location in the two rows dealt to them; the top left of the two rows being aces, and the bottom right being tens. The player must remove the face down card that is occupying that location and turn it face up. This card, in turn, is placed in its appropriate location, if available, displacing the face down card that was there. This continues until the player finds a card that cannot be placed - a Queen or a King or a number card whose location is already occupied by a face up card with that number. The player must then discard the unplayable card, placing it face up on the table next to the draw pile to begin a discard pile, and the turn to play passes to the next player. \nThe next player will begin their turn by drawing either the top card of the face down stock pile or the top card of the discard pile. The player will then repeat the steps mentioned previously, placing the card in the correct location in their set of two rows. \nSince Jacks are wild, a Jack can be placed face up in any location containing a face down card, displacing the card that was there. Also a pip card whose correct location currently contains a face up Jack can be placed in that location displacing the Jack, which can then be moved to any other location with a face down card, displacing the card that was there. \nIf the draw pile runs out before anyone completes their layout, the cards of the discard pile, apart from its top card which is left in place, are shuffled to make a new draw pile.', 'Numeric cards hold their respective values, Jacks are wild cards, and Queens and Kings automatically end the players turn', 6, '2009-01-17', '15:15:15', 2, 7),
(8, 'Crazy Eights', '52 card deck', 'To win, a player must play all their cards till hand is empty.', 'Deal 5 cards to each player, face down. The rest of the deck is placed face down in the center of the table and forms the draw pile. Flip the top card of the draw pile and places it in a separate pile, this card forms the start of the discard pile. If the flipped card is an eight, it is buried in the middle of the pack and the next card is flipped.', 'On their turn, a player must play one card which matches the suit or number/face of the card on top of the discard pile.\nIf unable to play, cards are drawn from the top of the stock until they draw a card they can play. A player may choose to draw a card, even if the player holds a playable card. If the draw pile is emptied when a player is drawing cards, the player must pass.\nEights are a wild card, when played, the player must specify a suit for the next player must match or play another eight.', 'The player who is the first to have no cards left wins the game. The winning player collects from each other player the value of the cards remaining in that players hand as follows:\nEach eight = 50 points\nEach K, Q, J or 10 = 10 points\nEach ace = 1 point\nEach other card is worth their numeric value', 6, '2009-01-17', '15:15:15', 2, 7),
(9, 'Big Two', '52 card deck', 'To win, a player must play all their cards till hand is empty.', 'Deal the deck into 4 even hands, each player will take one (ignore the extra hand if playing with less than 4 players).', 'The player with the lowest card may begin the game. They must play any standard poker hand which includes the lowest card. The next player must play the same type of hand as the previous player but with higher values. When a player cannot play, they may pass. If all player cannot beat the previous hand and pass, the player who played the previous hand can play any hand they would like. Once a player`s hand is empty, they win the game.', 'Cards are ranked from (highest)2s, Aces, Kings down to 3 (lowest), with suits being ranked (highest) Spades, Hearts, Clubs, Diamonds (lowest).\nThis game uses standard poker hands and rankings.\nSingle < Pair < Two Pairs < Three of a Kind < Straight < Flush < Full House < Four of a Kind < Straight Flush < Royal Flush', 6, '2009-01-17', '15:15:15', 2, 4),
(10, 'Rum', '52 card deck', 'Each player tries to form matched sets consisting of groups of three or four of a kind, or sequences of three or more cards of the same suit.', 'Deal 10 cards to each player (two players), or 7 cards (3-4 players), or 6 cards (5-6). The remaining cards are placed face down on the table, forming the draw pile.\nThe top card of the draw pile is turned face up and becomes the upcard. It is placed next to the draw pile to start the discard pile.', 'On their turn a player must either draw a card or take the top card of the discard pile and add it to their hand. The player may play any matching set face up on the table. If the player does not wish to play a matching set or cannot play one, they must discard a card, face up. If a player chose to draw the card from the top of the discard pile, they may not discard the same card they drew. \nA player may add one or more cards from their had to any matched set that has been set on the table on their turn, this includes the fourth card of any three set, or any card that continues the sequence. However, if all the cards remaining in the players hand match, they may immediately play their cards.\nWhen a player gets rid of all their cards, they win the game.', 'No additional rules', 6, '2009-01-17', '15:15:15', 2, 7),
(11, 'Solitaire', '52 card deck', 'The player must organize the cards into four piles (foundations), in order of sequence and in suit.', 'Deal out 7 piles of cards (Tableau) beside each other, with the leftmost pile containing 1 card and each proceeding pile containing 1 more than the previous (7 cards in the rightmost). Flip the topmost card in each pile.\nPlace the rest of the deck above the leftmost pile, this is the draw pile. Leave space above the 4 rightmost piles, this is where the foundations will be played.', 'The player may move any face up card within the Tableau to another pile if it is of the opposite suit colour and is in sequence with the card it is being moved onto. When a face down card is unblocked (has no card on top), it can be flipped over and is now moveable.\nAt any time, the player may start building the foundations by placing face up cards in order from Ace to King based on suit in the foundations spot above the right most Tableau piles.\nIf any moves cannot be made, flip the top card in the draw pile and place it in a discard pile beside. This card can be played in the Tableau or the foundations.\nIf there is an empty pile within the Tableau, only a king may be played in the spot to start a sequence.\nThe player must continue moving cards until they are able to form the foundations in proper sequence and suit and win. ', 'Cards are ranked from King (highest) to Ace (lowest).\nCards on the Tableau may only be played on top of each other when they are of the opposite suit colour and are 1 less than the card below.', 6, '2009-01-17', '15:15:15', 2, 7),
(12, 'Poker', '52 card deck', 'To win a round, a player must be the first to make a group of four of a kind in his hand, or not to be the last player to notice and be taken out of the game. The last player standing wins the game.', 'Based on the number of players, find the corresponding amount of matching sets of cards (all suits of one card) from the deck. Shuffle the matching sets and deal four cards to each player, this forms each players hand, they may look at the cards but not show others.', 'Each player may discard a card by passing the card face down to the player on their left, the player on their left can then pick up the card and add it to their hand. There is no turn system, players should continue passing cards to make it difficult to keep up the pace.\nA player may not have more than 4 cards in their hand at anytime.\nAs soon as a player collects four cards of one value, they should stop passing or picking up cards and put a finger on their nose. The other players must stop passing as well and place a finger on their nose as well. The last person to do so is the Pig and is taken out of play.\nThe game continues until one player is left, this player is the winner of the game.', 'No additional rules', 6, '2009-01-17', '15:15:15', 2, 7),
(13, 'Snap', '52 card deck', 'To win, a player must win all of the cards.', 'Deal the deck evenly between each player, the cards must remain face down. Each player places their piles in front of them with space for a discard pile.', 'Going around the table, each player must flip their top card and place it in the discard pile. When a player flips a card that matches the top most card of another players discard pile, the first player to notice may call "Snap!". This player wins both piles and adds the cards to the bottom of their pile.\nIf two players call "Snap!" at the same time, the two piles are combined and placed face up in the center to form a Snap Pot. Play continues as normal, but if a player flips a card that matches the top most card of the Snap Pot, players may call "Snap!" and recieve the Snap Pot.\nIf a player runs out of cards in their face-down pile, they must flip their discard pile over and use the pile to continue playing.', 'No additional rules', 6, '2009-01-17', '15:15:15', 2, 7),
(14, 'Six Card Golf', '52 card deck', 'The player with the lowest total score after nine holes is the winner.', 'Deal 6 cards face down to each player. The remainder of the cards are placed face down forming the draw pile, and the top card is flipped to start the discard pile beside it. Players arrange their cards in 2 rows of 3 in front of them and turn 2 cards face up. The remaining cards stay face down and cannot be looked at.', 'On their turn, the player must draw single cards from either the draw pile or discard pile. The drawn card may either be swapped for one of the players six cards, or discarded. If the card is swapped for one of the face down cards, the card swapped in remains face up. The round ends when all of a players have their cards face-up and the score for each player can be counted.\nA game is nine "holes" (deals), and the player with the lowest total score is the winner.', 'An Ace counts as 1 point.\nA 2 counts as minus 2 points.\nEach numeral card from 3 to 10 scores face value.\nA jack or queen scores 10 points.\nA king scores zero points.\nApair of equal cards in the same column scores zero points for the column', 6, '2009-01-17', '15:15:15', 2, 7);


-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `accessLevel` int(10) NOT NULL,
  `userGroup` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`accessLevel`, `userGroup`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'User'),
(4, 'Banned');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userAccessLevel` int(10) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `dob` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `userAccessLevel`, `fname`, `lname`, `password`, `dob`) VALUES
(1, 'adminsayma', 'sayma@gmail.com', '1', 'Sayma', 'Haque', 'adminpass', '2009-01-17'),
(2, 'adminapostolos', 'apostolos@gmail.com', '1', 'Apostolos', 'Lname', 'adminpass', '2009-01-17'),
(3, 'admincarter', 'carter@ucalgary.ca', '1', 'Carter', 'Lname', 'adminpass', '2009-01-17'),
(4, 'adminethan', 'ethan@ucalgary.ca', '1', 'Ethan', 'Lname', 'adminpass', '2009-01-17'),
(5, 'adminjamie', 'jamie@gmail.com', '1', 'Jamie', 'Lname', 'adminpass', '2009-01-17'),
(6, 'adminnick', 'nick@gmail.com', '1', 'Nick', 'Lname', 'adminpass', '2009-01-17'),
(7, 'adminalex', 'alex@gmail.com', '1', 'Alex', 'Lname', 'adminpass', '2009-01-17'),
(8, 'normaluser', 'mrnormal@gmail.com', '3', 'Guy', 'Normal', 'password', '2009-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `Favourite`
--

CREATE TABLE `Favourite` (
  `userID` int(10) NOT NULL,
  `entryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Favourite`
--

INSERT INTO `Favourite` (`userID`, `entryID`) VALUES
(1, 3),
(1, 4),
(1, 8),
(1, 14),
(2, 5),
(2, 6),
(2, 7),
(3, 2),
(3, 4),
(3, 8),
(3, 10);

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `CommentReply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wikiEntry`
--
ALTER TABLE `wikiEntry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD PRIMARY KEY (`userID`, `entryID`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`accessLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `CommentReply`
--
ALTER TABLE `CommentReply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Rating`
--
ALTER TABLE `Rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `wikiEntry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
